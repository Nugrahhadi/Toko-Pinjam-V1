<?php

namespace App\Livewire\Admin;

use App\Models\Item;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class ItemEditor extends Component
{
    use WithFileUploads;

    public ?Item $item = null;

    public $name, $slug, $description, $original_price, $donation_price;
    public $stock = 1;
    public $category_id, $location_id;
    public $weight;
    public $is_active = true;

    public $completeness; // kelengkapan
    public $how_to_use; // cara pakai
    public $how_to_borrow; // cara pinjam (field baru)

    // Gambar
    public $existing_images = []; // path yang sudah tersimpan (string[])
    public $image_files = []; // file baru yang diupload (TemporaryUploadedFile[])

    public function mount(?string $itemId = null): void
    {
        if ($itemId) {
            $this->item = \App\Models\Item::findOrFail($itemId);

            $this->fill([
                "name" => $this->item->name,
                "slug" => $this->item->slug,
                "description" => $this->item->description,
                "original_price" => $this->item->original_price,
                "donation_price" => $this->item->donation_price,
                "stock" => $this->item->stock,
                "category_id" => $this->item->category_id,
                "location_id" => $this->item->location_id,
                "weight" => $this->item->weight,
                "is_active" => $this->item->is_active,
                "completeness" => $this->item->completeness,
                "how_to_use" => $this->item->how_to_use,
                "how_to_borrow" => $this->item->how_to_borrow, // NEW
            ]);

            $this->existing_images = $this->item->images ?: [];
        }
    }

    protected function rules(): array
    {
        return [
            "name" => ["required", "string", "max:255"],
            "slug" => [
                "nullable",
                "string",
                "max:255",
                Rule::unique("items", "slug")->ignore($this->item?->id),
            ],
            "description" => ["required", "string"],
            "original_price" => ["nullable", "numeric", "min:0"],
            "donation_price" => ["required", "numeric", "min:0"],
            "stock" => ["required", "integer", "min:0"],
            "category_id" => ["required", "exists:categories,id"],
            "location_id" => ["required", "exists:locations,id"],
            "weight" => ["nullable", "numeric", "min:0"],
            "is_active" => ["required", "boolean"],
            "completeness" => ["nullable", "string"],
            "how_to_use" => ["nullable", "string"],
            "how_to_borrow" => ["nullable", "string"], // NEW

            // Validasi file upload (boleh banyak)
            "image_files.*" => ["image", "mimes:jpg,jpeg,png,webp", "max:4096"],
        ];
    }

    public function removeExistingImage(int $index): void
    {
        if (isset($this->existing_images[$index])) {
            unset($this->existing_images[$index]);
            $this->existing_images = array_values($this->existing_images);
        }
    }

    public function removeNewImage(int $index): void
    {
        if (isset($this->image_files[$index])) {
            unset($this->image_files[$index]);
            $this->image_files = array_values($this->image_files);
        }
    }

    public function save()
    {
        $this->validate();

        // Pastikan slug unik
        $slug = $this->slug ?: Str::slug($this->name);
        $base = $slug;
        $i = 1;
        while (
            Item::where("slug", $slug)
                ->when(
                    $this->item,
                    fn($q) => $q->where("id", "!=", $this->item->id),
                )
                ->exists()
        ) {
            $slug = "{$base}-{$i}";
            $i++;
        }

        // Upload file baru → simpan path ke storage/public/items
        $uploadedPaths = [];
        foreach ($this->image_files as $file) {
            $uploadedPaths[] = $file->store("items", "public"); // contoh hasil: items/abc.jpg
        }

        // Gabungkan gambar lama (yang masih dipertahankan) + yang baru diupload
        $images = array_values(
            array_filter(array_merge($this->existing_images, $uploadedPaths)),
        );

        $data = [
            "name" => $this->name,
            "slug" => $slug,
            "description" => $this->description,
            "original_price" => $this->original_price,
            "donation_price" => $this->donation_price,
            "stock" => $this->stock,
            "images" => $images,
            "category_id" => $this->category_id,
            "location_id" => $this->location_id,
            "weight" => $this->weight,
            "is_active" => (bool) $this->is_active,
            "completeness" => $this->completeness,
            "how_to_use" => $this->how_to_use,
            "how_to_borrow" => $this->how_to_borrow, // NEW
        ];

        if ($this->item) {
            $this->item->update($data);
            session()->flash("message", "Barang diperbarui.");
        } else {
            $this->item = Item::create($data);
            session()->flash("message", "Barang dibuat.");
        }

        // Reset upload sementara supaya preview bersih
        $this->image_files = [];

        return redirect()->route("admin.items");
    }

    public function render()
    {
        return view("livewire.admin.item-editor", [
            "categories" => Category::orderBy("name")->get(["id", "name"]),
            "locations" => Location::orderBy("name")->get(["id", "name"]),
        ])
            ->extends("layouts.admin")
            ->section("content");
    }
}
