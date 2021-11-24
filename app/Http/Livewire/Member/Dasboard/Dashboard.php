<?php

namespace App\Http\Livewire\Member\Dasboard;

use App\Models\Package;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{

    use WithPagination;

    public $column = 'tracking_no';
    public $order = 'desc';
    public $status = '';
    public $pagintor = 10;

    public $search = '';

    public $invoicePre = false;
    public $url;

    protected $listeners = ['refresh' => 'render'];

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

    public function invoicePreview(Package $selected)
    {
        $this->url = $selected->invoiceUrl();

        $this->invoicePre = true;
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render()
    {

        return view('livewire.member.dasboard.dashboard', [
            'recents' => Package::with('member', 'shipper', 'packagetype')

                ->where('member_id', auth()->id())

                ->where('created_at', 'like', "%" . '2021' . "%")

                ->whereHas('shipper',function ($query){
                    $query->where('name','like','%'.$this->search.'%');
                })

                ->orwhere('weight','like','%'.$this->search.'%')

                ->orwhere('estimated_cost','like','%'.$this->search.'%')

                ->orwhere('tracking_no','like','%'.$this->search.'%')

                ->orwhere('internal_tracking','like','%'.$this->search.'%')

                ->latest()

                ->paginate($this->pagintor),

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
