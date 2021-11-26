<?php

namespace App\Http\Livewire\Admin\Create;

use App\Models\Package;
use Illuminate\Support\Facades\Storage;
use PDF;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Livewire\Component;

class CreateInvoice extends Component
{

    public Package $package;

    public function mount($package)
    {
        $this->package = $package;
    }

    public function downloadPDF(Package $selected)
    {
        $invoiceInfos = Package::with('packagetype', 'shipper', 'member')
            ->where('id', $this->package->id)->get();

        $pdf = PDF::loadView('livewire.admin.create.create-invoice',compact('invoiceInfos'))->output();

        Storage::disk('invoiceBill')->put($selected->tracking_no.".pdf",$pdf);

        return response()->streamDownload(
            fn () => print($pdf),
            $selected->tracking_no.".pdf"
        );



    }

    public function render()
    {
        return view('livewire.admin.create.create-invoice', [
            'invoiceInfos' => Package::with('packagetype', 'shipper', 'member')
                ->where('id', $this->package->id)->get()
        ]);
    }
}
