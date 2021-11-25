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

    public $memberInfo;

    public $column = 'tracking_no';
    public $order = 'desc';
    public $status = '';
    public $pagintor = 10;

    public $search = '';

    public $invoicePre = false;
    public $invoiceAct = false;

    public $url;

    protected $listeners = ['refresh' => 'render'];

    protected $rules = [
        'packageEdit.tracking_no' => 'required',
        'packageEdit.internal_tracking' => 'required',
        'packageEdit.packagetype_id' => 'required',
        'packageEdit.shipper_id' => 'required',
        'packageEdit.arrival_date' => 'required|after:today',
        'packageEdit.weight' => 'required|min:1',
        'packageEdit.actually_cost' => 'required|min:500.00|numeric'
    ];

    public function packageUpdate()
    {
        $this->validate();

        dd(404);

        $this->packageEdit->setAttribute('status','warehouse');
        $this->packageEdit->update();

        sleep(1);

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
        session()->put('success','Package Updated Successful');
        $this->emit('refresh');
        $this->packageEdit = new Package;
    }

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
        $this->packageEdit = $selected;
        $this->packageEdit->internal_tracking = 'LFL58697';

        $this->memberInfo = $this->packageEdit->member->member_num;

        $this->invoiceAct = true;
    }

    public function packageFee()
    {
        if ($this->packageEdit->weight > 3.5) {

            $this->packageEdit->actually_cost = $this->packageEdit->estimated_cost + (1500 * $this->packageEdit->weight);

        } else {

            $this->packageEdit->actually_cost = 1500 + $this->packageEdit->estimated_cost;
        }
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

            'description' => PackageType::all(),
            'merchants' => Shipper::all(),
        ])
            ->extends('layouts.admin');
    }
}
