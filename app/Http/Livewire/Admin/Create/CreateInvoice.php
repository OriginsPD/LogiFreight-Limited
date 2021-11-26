<?php

namespace App\Http\Livewire\Admin\Create;

use App\Models\Package;
use Livewire\Component;

class CreateInvoice extends Component
{

    public Package $package;

    public function mount($package)
    {
        $this->package = $package;
    }

    public function render()
    {
        return view('livewire.admin.create.create-invoice',[
            'invoiceInfos' => Package::with('packagetype','shipper','member')
                ->where('id',$this->package->id)->get()
        ]);
    }
}
