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
    public $operational;
    public $buy_goods;
    public $event;
    public $promotion;
    public $maintenance;
    public $others;

    // Financial Reports
    public $report_year;
    public $report_quarter = 'I';
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
            'operational' => 0,
            'buy_goods' => 0,
            'event' => 0,
            'promotion' => 0,
            'maintenance' => 0,
            'others' => 0,
        ]);
        $this->operational = $allocation->operational;
        $this->buy_goods = $allocation->buy_goods;
        $this->event = $allocation->event;
        $this->promotion = $allocation->promotion;
        $this->maintenance = $allocation->maintenance;
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
            'operational' => 'required|integer|min:0',
            'buy_goods' => 'required|integer|min:0',
            'event' => 'required|integer|min:0',
            'promotion' => 'required|integer|min:0',
            'maintenance' => 'required|integer|min:0',
            'others' => 'required|integer|min:0',
        ]);

        DonationAllocation::query()->first()->update([
            'operational' => $this->operational,
            'buy_goods' => $this->buy_goods,
            'event' => $this->event,
            'promotion' => $this->promotion,
            'maintenance' => $this->maintenance,
            'others' => $this->others,
        ]);

        session()->flash("message", "Alokasi donasi berhasil disimpan.");
    }

    public function uploadReport(): void
    {
        $this->validate([
            'report_year' => 'required|integer|min:2020|max:2050',
            'report_quarter' => 'required|in:I,II,III,IV',
            'report_file' => 'required|file|mimes:pdf|max:5120',
        ]);

        // Check unique constraint
        $existing = FinancialReport::where('year', $this->report_year)
            ->where('quarter', $this->report_quarter)
            ->first();

        if ($existing) {
            $this->addError('report_quarter', 'Laporan untuk tahun dan kuartal ini sudah ada.');
            return;
        }

        // Store PDF in public storage
        $path = $this->report_file->store('financial-reports', 'public');

        FinancialReport::create([
            'year' => $this->report_year,
            'quarter' => $this->report_quarter,
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
            ->orderBy('quarter', 'asc')
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
