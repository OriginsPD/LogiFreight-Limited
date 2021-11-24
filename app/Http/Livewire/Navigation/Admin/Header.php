<?php

namespace App\Http\Livewire\Navigation\Admin;

use App\Models\Member;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        return view('livewire.navigation.admin.header',[
            'personalInfo' => Member::with('user')->get(),
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
