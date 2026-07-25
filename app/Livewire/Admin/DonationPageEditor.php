<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\DonationSetting;
use App\Models\DonationLeaderboard;
use App\Models\DonationTestimonial;
use App\Models\ImpactStat;
use App\Models\DonationAllocation;
use App\Models\FinancialReport;
use Illuminate\Support\Facades\Storage;

class DonationPageEditor extends Component
{
    use WithPagination;
    use WithFileUploads;

    public string $activeTab = 'settings'; // Tab control: settings, impact, allocation, reports

    // Settings (Total & Target Donasi)
    public $total_amount;
    public $goal_amount;

    // Impact Stats (Data Dampak)
    public $saved_money;
    public $co2_prevented;
    public $waste_prevented;

    // Donation Allocation
    public $item_procurement;
    public $website_operations;
    public $creative_work;
    public $digital_subscriptions;
    public $others;

    // Financial Reports
    public $report_year;
    public $report_file;

    protected $rules = [
        "total_amount" => ["required", "numeric", "min:0"],
        "goal_amount" => ["required", "numeric", "min:0"],
    ];

    public function mount(): void
    {
        // Donasi settings
        $setting = DonationSetting::first() ?? DonationSetting::create([
            "total_amount" => 0,
            "goal_amount" => 1000000,
        ]);
        $this->total_amount = $setting->total_amount;
        $this->goal_amount = $setting->goal_amount;

        // Impact stats
        $impact = ImpactStat::first() ?? ImpactStat::create([
            'saved_money' => 0,
            'co2_prevented' => 0,
            'waste_prevented' => 0,
        ]);
        $this->saved_money = $impact->saved_money;
        $this->co2_prevented = $impact->co2_prevented;
        $this->waste_prevented = $impact->waste_prevented;

        // Donation allocations
        $allocation = DonationAllocation::first() ?? DonationAllocation::create([
            'item_procurement' => 0,
            'website_operations' => 0,
            'creative_work' => 0,
            'digital_subscriptions' => 0,
            'others' => 0,
        ]);
        $this->item_procurement = $allocation->item_procurement;
        $this->website_operations = $allocation->website_operations;
        $this->creative_work = $allocation->creative_work;
        $this->digital_subscriptions = $allocation->digital_subscriptions;
        $this->others = $allocation->others;

        // Defaults for report upload
        $this->report_year = date('Y');
    }

    public function saveSettings(): void
    {
        $this->validate();
        DonationSetting::query()
            ->first()
            ->update([
                "total_amount" => $this->total_amount,
                "goal_amount" => $this->goal_amount,
            ]);
        session()->flash("message", "Pengaturan donasi berhasil disimpan.");
    }

    public function saveImpact(): void
    {
        $this->validate([
            'saved_money' => 'required|integer|min:0',
            'co2_prevented' => 'required|integer|min:0',
            'waste_prevented' => 'required|integer|min:0',
        ]);

        ImpactStat::query()->first()->update([
            'saved_money' => $this->saved_money,
            'co2_prevented' => $this->co2_prevented,
            'waste_prevented' => $this->waste_prevented,
        ]);

        session()->flash("message", "Data dampak lingkungan berhasil disimpan.");
    }

    public function saveAllocation(): void
    {
        $this->validate([
            'item_procurement' => 'required|integer|min:0',
            'website_operations' => 'required|integer|min:0',
            'creative_work' => 'required|integer|min:0',
            'digital_subscriptions' => 'required|integer|min:0',
            'others' => 'required|integer|min:0',
        ]);

        DonationAllocation::query()->first()->update([
            'item_procurement' => $this->item_procurement,
            'website_operations' => $this->website_operations,
            'creative_work' => $this->creative_work,
            'digital_subscriptions' => $this->digital_subscriptions,
            'others' => $this->others,
        ]);

        session()->flash("message", "Alokasi donasi berhasil disimpan.");
    }

    public function uploadReport(): void
    {
        $this->validate([
            'report_year' => 'required|integer|min:2020|max:2050',
            'report_file' => 'required|file|mimes:pdf|max:5120',
        ]);

        // Check unique constraint
        $existing = FinancialReport::where('year', $this->report_year)->first();

        if ($existing) {
            $this->addError('report_year', 'Laporan untuk tahun ini sudah ada.');
            return;
        }

        // Store PDF in public storage
        $path = $this->report_file->store('financial-reports', 'public');

        FinancialReport::create([
            'year' => $this->report_year,
            'pdf_path' => $path,
        ]);

        $this->reset(['report_file']);
        session()->flash("message", "Laporan keuangan berhasil diunggah.");
    }

    public function deleteReport($id): void
    {
        $report = FinancialReport::findOrFail($id);

        // Delete file from disk
        if ($report->pdf_path && Storage::disk('public')->exists($report->pdf_path)) {
            Storage::disk('public')->delete($report->pdf_path);
        }

        $report->delete();
        session()->flash("message", "Laporan keuangan berhasil dihapus.");
    }

    public function setTab(string $tab): void
    {
        $this->activeTab = $tab;
    }

    /** Data providers (ringkas) */
    public function getTop3Property()
    {
        return DonationLeaderboard::with("user")
            ->orderByRaw("position IS NULL")
            ->orderBy("position")
            ->orderByDesc("amount")
            ->take(3)
            ->get();
    }

    public function getLatest5TestimonialsProperty()
    {
        return DonationTestimonial::with("user")
            ->where("approved", true)
            ->latest("id")
            ->take(5)
            ->get();
    }

    public function render()
    {
        $setting = DonationSetting::first();
        $reportsList = FinancialReport::orderBy('year', 'desc')
            ->get();

        return view("livewire.admin.donation-page-editor", [
            "setting" => $setting,
            "top3" => $this->top3,
            "latest5" => $this->latest5Testimonials,
            "reportsList" => $reportsList,
        ])
            ->extends("layouts.admin")
            ->section("content");
    }
}
