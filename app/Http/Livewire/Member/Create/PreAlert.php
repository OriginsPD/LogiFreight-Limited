<?php

namespace App\Http\Livewire\Member\Create;

use App\Models\Member;
use App\Models\Package;
use App\Models\PackageType;
use App\Models\Shipper;
use Illuminate\Support\Str;
use Livewire\Component;

class PreAlert extends Component
{
    public Package $package;

    protected $rules = [
        'package.tracking_no' => 'required',
        'package.packagetype_id' => 'required',
        'package.shipper_id' => 'required',
        'package.expected_date' => 'required|after:today',
        'package.weight' => 'required|min:1',
        'package.estimated_cost' => 'required|min:500.00|numeric'
    ];

    public function createAlert(): void
    {
        $this->validate();

        $this->package->setAttribute('member_id',auth()->id());
        $this->package->setAttribute('status','In-Transit');
        $this->package->setAttribute('created_at',now());
        $this->package->save();

        $this->dispatchBrowserEvent('close-modal');
        session()->put('success','Package Created Successful');
        $this->package = new Package;

    }

    public function mount()
    {
        $this->package = new Package;
    }

    public function render()
    {
        return view('livewire.member.create.pre-alert', [
            'memberInfo' => Member::with('user')
                ->where('user_id', auth()->id())->first(),

            'merchants' => Shipper::all(),
            'description' => PackageType::all()
        ]);
    }
}
