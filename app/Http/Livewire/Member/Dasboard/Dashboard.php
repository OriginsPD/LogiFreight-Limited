<?php

namespace App\Http\Livewire\Member\Dasboard;

use App\Models\Package;
use Livewire\Component;

class Dashboard extends Component
{

    public $column = 'tracking_no';
    public $order = 'desc';
    public $status = '';
    public $pagintor = 10;

    public function filter($col)
    {
        $this->column = $col;
    }

    public function seeMore()
    {
        $this->pagintor += 5;

        $total = Package::where('member_id', auth()->id())
            ->count();

        if ($this->pagintor >= $total) {
            $this->dispatchBrowserEvent('hide-see-more');
        }

    }

    public function render()
    {

        return view('livewire.member.dasboard.dashboard', [
            'recents' => Package::with('member', 'shipper', 'packagetype')
                ->where('member_id', auth()->id())
                ->where('created_at', 'like', "%" . '2021' . "%")
                ->latest()->paginate($this->pagintor),

            'allpackages' => Package::with('member', 'shipper', 'packagetype')
                ->where('member_id', auth()->id())
                ->where('status', 'like', '%' . $this->status . '%')
                ->orderBy($this->column, $this->order)
                ->paginate($this->pagintor),

            'recentCount' => Package::latest()
                ->where('created_at', 'like', "%" . '2021' . "%")
                ->where('member_id', auth()->id())
                ->count(),

            'readyCount' => Package::where('status', 'warehouse')
                ->where('member_id', auth()->id())
                ->count(),

            'deliveryCount' => Package::where('status', 'delivered')
                ->where('member_id', auth()->id())
                ->count(),

            'transitCount' => Package::where('status', 'In-Transit')
                ->where('member_id', auth()->id())
                ->count(),
        ])
            ->extends('layouts.base');
    }
}
