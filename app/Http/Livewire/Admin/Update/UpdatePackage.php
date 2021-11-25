<?php

namespace App\Http\Livewire\Admin\Update;

use App\Models\Member;
use App\Models\Package;
use App\Models\PackageType;
use App\Models\Shipper;
use Livewire\Component;

class UpdatePackage extends Component
{
    public Package $package;

    public $memberInfo;

    protected array $rules = [
        'package.internal_tracking' => 'required',
        'package.tracking_no' => 'required',
        'package.packagetype_id' => 'required',
        'package.shipper_id' => 'required',
        'package.arrival_date' => 'required|after:today',
        'package.weight' => 'required|min:1',
        'package.actually_cost' => 'required|min:500.00|numeric'
    ];

    public function alterPackage()
    {
        $this->validate();

        $this->package->setAttribute('status', 'warehouse');
        $this->package->update();

        sleep(1);

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
        session()->put('success', 'Package Updated Successful');
        $this->emit('refresh');
//        $this->package = new Package;
    }

    public function packageFee()
    {
        if ($this->package->weight > 3.5) {

            $this->package->actually_cost = $this->package->estimated_cost + (1500 * $this->package->weight);

        } else {

            $this->package->actually_cost = 1500 + $this->package->estimated_cost;
        }
    }

    public function updated()
    {
        $this->validate();
    }

    public function mount(Package $package)
    {

        $this->package = $package;

        $this->package->internal_tracking = 'LFL58697';

        $this->packageFee();

        $this->memberInfo = Member::where('id', $this->package->member_id)->value('member_num');
    }

    public function render()
    {
        return view('livewire.admin.update.update-package', [
            'description' => PackageType::all(),
            'merchants' => Shipper::all(),
        ])->extends('layouts.admin');
    }
}
