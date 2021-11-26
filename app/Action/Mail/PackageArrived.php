<?php

namespace App\Action\Mail;

use App\Mail\PackageArrival;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class PackageArrived
{

    public function execute($value)
    {

        $packageInfo = Package::with('member')->where('id',$value)->first();

        $url = $this->invoiceUrl($packageInfo->member->member_num);

        $data = array(
            'username' => $packageInfo->member->user->username,
            'TrackIn' => $packageInfo->tracking_no,
            'InterTrack' => $packageInfo->internal_tracking,
            'url' => $url,
        );


        Mail::to($packageInfo->member->user->email)->send(new PackageArrival($data));
    }

    public function invoiceUrl($select): string
    {
        return $select
            ? Storage::disk('invoiceBill')->url($select)
            : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim('henry@mail.com')));
    }

}
