<?php

namespace App\Http\Livewire\Admin;

use App\Models\Package;
use Livewire\Component;
use Livewire\WithPagination;

class AdminDashboard extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.admin-dashboard',[
            'recents' => Package::with('member','shipper','packagetype')->paginate(10),
        ])
            ->extends('layouts.admin');
    }
}
