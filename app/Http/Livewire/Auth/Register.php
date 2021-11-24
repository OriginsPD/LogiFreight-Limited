<?php

namespace App\Http\Livewire\Auth;

use App\Models\Member;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class Register extends Component
{

    public Member $member;
    public $username;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'username' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:4|confirmed',
        'member.trn' => 'required|max:9',
        'member.address' => 'required',

    ];

    public function createMember()
    {
        $this->validate();

        $id = User::create([
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
        ])->id;

        $memberNum = Str::random(6);

        Member::create([
            'user_id' => $id,
            'member_num' => $memberNum,
            'trn' => $this->member->trn,
            'address' => $this->member->address,
            'mailaddress' => $memberNum. '@logifreight.com'
        ]);

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password])) {

            return redirect()->route('member.dashboard');

        }

        $this->addError('username', trans('auth.failed'));

    }

    public function updated(): void
    {
        $this->validate();
    }

    public function mount(): void
    {
        $this->member = new Member;
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
