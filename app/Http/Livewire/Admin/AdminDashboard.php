<?php

namespace App\Http\Livewire\Admin;

use App\Models\Package;
use App\Models\PackageType;
use App\Models\Shipper;
use Livewire\Component;
use Livewire\WithPagination;

class AdminDashboard extends Component
{
    use WithPagination;

    public Package $package;
    public Package $packageEdit;

    public $column = 'tracking_no';
    public $order = 'desc';
    public $status = '';
    public $pagintor = 10;

    public $search = '';

    public $invoicePre = false;
    public $invoiceAct = false;

    public $url;

    protected $listeners = ['refresh' => 'render'];

    public function filter($col)
    {
        $this->column = $col;
    }

    public function seeMore()
    {
        $this->pagintor += 5;

        $total = Package::count();

        if ($this->pagintor >= $total) {
            $this->dispatchBrowserEvent('hide-see-more');
        }

    }

    public function invoicePreview(Package $selected)
    {
        $this->url = $selected->invoiceUrl();

        $this->invoicePre = true;
    }

    public function invoiceAction(Package $selected)
    {
        $this->package = $selected;

        $this->invoiceAct = true;
    }


    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->package = new Package;
        $this->packageEdit = new Package;
    }

    public function render()
    {
        return view('livewire.admin.admin-dashboard', [
            'recents' => Package::with('member', 'shipper', 'packagetype')
                ->where('created_at', 'like', "%" . '2021' . "%")
                ->whereHas('shipper', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->orwhere('weight', 'like', '%' . $this->search . '%')
                ->orwhere('estimated_cost', 'like', '%' . $this->search . '%')
                ->orwhere('tracking_no', 'like', '%' . $this->search . '%')
                ->orwhere('internal_tracking', 'like', '%' . $this->search . '%')
                ->latest()
                ->paginate($this->pagintor),

            'allpackages' => Package::with('member', 'shipper', 'packagetype')
                ->where('status', 'like', '%' . $this->status . '%')
                ->orderBy($this->column, $this->order)
                ->paginate($this->pagintor),

            'recentCount' => Package::latest()
                ->where('created_at', 'like', "%" . '2021' . "%")
                ->count(),

            'readyCount' => Package::where('status', 'warehouse')
                ->count(),

            'deliveryCount' => Package::where('status', 'delivered')
                ->count(),

            'transitCount' => Package::where('status', 'In-Transit')
                ->count(),

        ])
            ->extends('layouts.admin');
    }
}
