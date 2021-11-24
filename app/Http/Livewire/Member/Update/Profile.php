<?php

namespace App\Http\Livewire\Member\Update;

use App\Models\Member;
use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public User $user;
    public Member $member;
    public $password;
    public $password_current;
    public $password_confirmation;

    public $changepass = false;

    protected array $rules = [
        'user.username' => 'required:min:4',
        'member.trn' => 'required|max:9',
        'user.email' => 'required|email',
        'member.address' => 'required',
        'changepass' => 'required',

    ];

    public function alterUser(): void
    {

        $this->validate();

        $this->user->update();
        $this->member->update();

        $this->dispatchBrowserEvent('close-modal');
        $this->dispatchBrowserEvent('show-alert');
        session()->put('success', 'Profile Updated Successful');
        $this->emit('refresh');

        $this->password = '';
        $this->password_confirmation = '';
    }

    public function changePassword(): void
    {
        $this->validateOnly([
            'password' => 'exclude_if::changepass,==,false|min:4|confirmed'
        ]);

        if ($this->changepass) {

            $this->user->setAttribute('password', $this->password);

        }
    }

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->member = Member::where('user_id', auth()->id())->first();
    }

    public function updated(): void
    {
        $this->validate();
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.member.update.profile')
            ->extends('layouts.base');
    }
}
