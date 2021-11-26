<?php

namespace App\Http\Livewire\Member\Create;

use App\Models\Member;
use App\Models\Package;
use App\Models\PackageType;
use App\Models\Shipper;
use Livewire\Component;
use Livewire\WithFileUploads;

class PreAlert extends Component
{
    use WithFileUploads;

    public Package $package;
    public $upload;

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

        $invoiceName = $this->upload->store('/','invoicePhoto');

        $id = Member::where('user_id',auth()->id())->value('id');

        $this->package->setAttribute('member_id',$id);
        $this->package->setAttribute('status','Pending');
        $this->package->setAttribute('invoice',$invoiceName);
        $this->package->setAttribute('created_at',now());
        $this->package->save();

        sleep(1);

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
        session()->put('success','Package Created Successful');
        $this->emit('refresh');
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
