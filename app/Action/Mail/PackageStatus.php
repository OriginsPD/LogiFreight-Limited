<?php

namespace App\Action\Mail;

use App\Mail\PackageArrival;
use App\Mail\PackageUpdate;
use App\Models\Package;
use Illuminate\Support\Facades\Mail;

class PackageStatus
{

    public function execute($value)
    {

        $packageInfo = Package::with('member')->where('id',$value)->first();

        Mail::to($packageInfo->member->user->email)->send(new PackageUpdate($packageInfo));
    }

}
