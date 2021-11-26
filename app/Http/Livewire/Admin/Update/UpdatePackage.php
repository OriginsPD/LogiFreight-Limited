<?php

namespace App\Http\Livewire\Admin\Update;

use App\Action\Mail\PackageArrived;
use App\Action\Mail\PackageStatus;
use App\Models\Customs;
use App\Models\Member;
use App\Models\Package;
use App\Models\PackageCheckpoint;
use App\Models\PackageType;
use App\Models\Shipper;
use Livewire\Component;

class UpdatePackage extends Component
{
    public Package $package;
    public PackageCheckpoint $packageCheck;
    public Customs $customs;

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

    public function alterPackage(PackageStatus $status): void
    {
        $this->validate();

        $this->package->setAttribute('status', 'On-Their-Way-To-Jamaica');
        $this->package->update();

        sleep(1);

        $status->execute($this->package->getAttributeValue('id'));

        $this->customs->setAttribute('package_id',$this->package->getAttributeValue('id'));
        $this->customs->save();

        $this->packageCheck->setAttribute('package_id',$this->package->getAttributeValue('id'));
        $this->packageCheck->setAttribute('date',now());
        $this->packageCheck->save();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
        session()->put('success', 'Package Updated Successful');
        $this->emit('refresh');
//        $this->package = new Package;
    }

    public function packageFee(): void
    {
        if ($this->package->weight >= 3.5 && $this->package->weight < 8.5) {

            $this->package->actually_cost = $this->package->estimated_cost + (($this->package->estimated_cost / 0.15) * $this->package->weight);

        } elseif ($this->package->weight >= 8.5 && $this->package->weight < 12.5){

            $this->package->actually_cost = $this->package->estimated_cost + (( ($this->package->estimated_cost / 0.15) + 600 ) * $this->package->weight);

        } elseif ($this->package->weight > 12.5){

            $this->package->actually_cost = $this->package->estimated_cost + (( ($this->package->estimated_cost / 0.15) + 600 + 600 ) * $this->package->weight);

        } else {

            $this->package->actually_cost = ($this->package->estimated_cost / 15) + $this->package->estimated_cost;
        }
    }

    public function updated()
    {
        $this->validate();
    }

    public function mount(Package $package)
    {
        $this->customs = new Customs;

        $this->packageCheck = new PackageCheckpoint;

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
