<?php

namespace App\Http\Livewire\Admin\Create;

use App\Models\Member;
use App\Models\Package;
use App\Models\PackageType;
use App\Models\Shipper;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class PreAlert extends Component
{

    use WithFileUploads;

    public User $user;
    public Member $member;
    public Package $package;
    public $password;
    public $upload;

    public $action;

    protected array $rules = [
        'member.member_num' => 'required',
        'user.username' => 'required',
        'user.email' => 'required|email',
        'package.tracking_no' => 'required',
        'package.internal_tracking' => 'required',
        'package.packagetype_id' => 'required',
        'package.shipper_id' => 'required',
        'package.arrival_date' => 'required|after:today',
        'package.weight' => 'required|min:1',
        'package.estimated_cost' => 'sometimes',
    ];

    public function newMemberPackage(): void
    {
        if ($this->action == 1) {

            $this->validate([
                'member.member_num' => 'required',
                'user.username' => 'required',
                'user.email' => 'required|email',
            ]);

            $id = $this->createMember();

            session()->put('success', 'Member Created Successful');

        } elseif ($this->action == 2) {

            $this->validate([
                'member.id' => 'required',
                'package.tracking_no' => 'required',
                'package.internal_tracking' => 'required',
                'package.packagetype_id' => 'required',
                'package.shipper_id' => 'required',
                'package.arrival_date' => 'required|after:today',
                'package.weight' => 'required|min:1',
                'package.estimated_cost' => 'sometimes',
            ]);

            $this->createPackage($this->member->id);

            $id = $this->member->id;

            session()->put('success', 'Package Created Successful');


        } elseif ($this->action == 3) {

            $this->validate([
                'member.member_num' => 'required',
                'user.username' => 'required',
                'user.email' => 'required|email',
                'package.tracking_no' => 'required',
                'package.internal_tracking' => 'required',
                'package.packagetype_id' => 'required',
                'package.shipper_id' => 'required',
                'package.arrival_date' => 'required|after:today',
                'package.weight' => 'required|min:1',
                'package.estimated_cost' => 'sometimes',
            ]);

            $this->createMember();
            $id = $this->member->getAttributeValue('id');

            $this->createPackage($id);

            session()->put('success', 'Member And Package Created Successful');

        }

//        $arrived->execute($id);

        sleep(1);

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
        $this->emit('refresh');

        $this->mount();

    }

    public function createMember(): mixed
    {

        $this->user->setAttribute('password', 'password123');
        $this->user->save();
        $id = $this->user->getAttributeValue('id');

        $this->member->setAttribute('user_id', $id);
        $this->member->setAttribute('mailaddress', $this->member->member_num . ' Tillman Plains Quentinland, FL 44091');
        $this->member->save();

        return $this->member->getAttributeValue('id');
    }

    public function createPackage($id): void
    {
        if ($this->upload) {
            $invoiceName = $this->upload->store('/', 'invoicePhoto');
            $this->package->setAttribute('invoice', $invoiceName);
        }

        $this->package->setAttribute('member_id', $id);
        $this->package->setAttribute('status', 'On-Their-Way-To-Jamaica');
        $this->package->setAttribute('created_at', now());
        $this->package->save();
    }

    public function generateMembernum(): void
    {
        $this->member->member_num = Str::random(2) . random_int(10000, 99999);

    }

    public function updated(){

        if ($this->action == 1) {

            $this->validate([
                'member.member_num' => 'required',
                'user.username' => 'required',
                'user.email' => 'required|email',
            ]);

        } elseif ($this->action == 2) {

            $this->validate([
                'member.id' => 'required',
                'package.tracking_no' => 'required',
                'package.internal_tracking' => 'required',
                'package.packagetype_id' => 'required',
                'package.shipper_id' => 'required',
                'package.arrival_date' => 'required|after:today',
                'package.weight' => 'required|min:1',
                'package.estimated_cost' => 'sometimes',
            ]);

        } elseif ($this->action == 3) {

            $this->validate([
                'member.member_num' => 'required',
                'user.username' => 'required',
                'user.email' => 'required|email',
                'package.tracking_no' => 'required',
                'package.internal_tracking' => 'required',
                'package.packagetype_id' => 'required',
                'package.shipper_id' => 'required',
                'package.arrival_date' => 'required|after:today',
                'package.weight' => 'required|min:1',
                'package.estimated_cost' => 'sometimes',
            ]);

        }


    }

    public function mount()
    {
        $this->user = new User;
        $this->member = new Member;
        $this->package = new Package;
        $this->package->internal_tracking = 'LFL58697';
    }

    public function render()
    {
        return view('livewire.admin.create.pre-alert', [
            'members' => Member::with('user')->get(),
            'merchants' => Shipper::all(),
            'description' => PackageType::all()
        ]);
    }
}
