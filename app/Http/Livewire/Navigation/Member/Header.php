<?php

namespace App\Http\Livewire\Navigation\Member;

use App\Models\Member;
use App\Models\Package;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{


    public function render()
    {
        return view('livewire.navigation.member.header',[
            'personalInfo' => Member::with('user')
                ->where('user_id',auth()->id())->first(),
        ]);
    }

    public function logout(): Redirector|Application|RedirectResponse
    {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect('/');
    }
}
