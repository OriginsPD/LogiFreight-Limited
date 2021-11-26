<?php

namespace App\Action\Mail;

use App\Mail\PackageArrival;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class PackageArrived
{

    public function execute($value)
    {

        $packageInfo = Package::with('member')->where('id',$value)->first();

        Mail::to($packageInfo->member->user->email)->send(new PackageArrival($packageInfo));
    }

}
