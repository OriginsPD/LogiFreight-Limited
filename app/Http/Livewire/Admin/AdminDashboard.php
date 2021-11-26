<?php

namespace App\Http\Livewire\Admin;

use App\Action\Mail\PackageArrived;
use App\Action\Mail\PackageStatus;
use App\Models\Customs;
use App\Models\Package;
use App\Models\PackageCheckpoint;
use Livewire\Component;
use Livewire\WithPagination;

class AdminDashboard extends Component
{
    use WithPagination;

    public Package $package;
    public Package $packageEdit;
    public PackageCheckpoint $packageCheck;
    public Customs $customs;

    public $column = 'tracking_no';
    public $order = 'desc';
    public $status = '';
    public $pagintor = 10;


    public $search = '';

    public $invoicePre = false;
    public $invoiceAct = false;
    public $invoiceGen = false;

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

    public function invoiceAction(Package $selected): void
    {
        $this->package = $selected;

        if ($this->package->status === 'Ready-For-Pick-Up' || $this->package->status === 'delivered') {

            $this->dispatchBrowserEvent('show-alert');
            session()->put('success', 'Package Already Process');

        } else {

            $this->invoiceAct = true;
        }


    }

    public function invoiceReady(Package $selected, PackageStatus $status): void
    {
        $this->package = $selected;

        if ($this->package->status === 'On-Their-Way-To-Jamaica') {

            $this->package->setAttribute('status', 'warehouse');

            $this->package->update();

            $status->execute($this->package->id);

            $this->packageCheckPoint($selected);

            $this->dispatchBrowserEvent('show-alert');
            session()->put('success', 'Package Updated Successful');

        } else {

            $this->dispatchBrowserEvent('show-alert');
            session()->put('success', "Package Has Been Process");
        }

        $this->emit('refresh');
    }

    public function invoiceDelivery(Package $selected, PackageArrived $arrived): void
    {
        $this->package = $selected;


        if ($this->package->status === 'warehouse') {

            $this->package->setAttribute('status', 'Ready-For-Pick-Up');

            $this->package->update();

            $arrived->execute($this->package->id);

            $this->packageCheckPoint($selected);

            $this->dispatchBrowserEvent('show-alert');
            session()->put('success', 'Package Updated Successful');

        } else {

            $this->dispatchBrowserEvent('show-alert');
            session()->put('success', "Package Has Been Process");
        }

        $this->emit('refresh');
    }

    public function invoiceGen(Package $selected): void
    {
        $this->package = $selected;
        $this->invoiceGen = true;
    }

    public function packageCheckPoint(Package $package)
    {
        $this->package = $package;
//        $this->customs->setAttribute('package_id',$this->package->getAttributeValue('id'));
//        $this->customs->save();

        $this->packageCheck->setAttribute('package_id', $this->package->getAttributeValue('id'));
        $this->packageCheck->setAttribute('date', now());
        $this->packageCheck->save();
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->package = new Package;
        $this->packageEdit = new Package;

        $this->customs = new Customs;

        $this->packageCheck = new PackageCheckpoint;
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
                ->where('created_at', 'like', "%" . '2021' . "%")
                ->count(),

            'deliveryCount' => Package::where('status', 'delivered')
                ->where('created_at', 'like', "%" . '2021' . "%")
                ->count(),

            'transitCount' => Package::where('status', 'On-Their-Way-To-Jamaica')
                ->where('created_at', 'like', "%" . '2021' . "%")
                ->count(),

        ])
            ->extends('layouts.admin');
    }
}
