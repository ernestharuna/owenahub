<?php

namespace App\Livewire\Mentor\Profile;

use App\Http\Controllers\DisplayImageController;
use Livewire\Component;
use App\Models\SocialHandle;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class ManageSocials extends Component
{
    #[Validate('max:30')]
    public $instagram;

    #[Validate('max:30')]
    public $linkedin;

    #[Validate('max:30')]
    public $x_twitter;

    #[Validate('max:30')]
    public $facebook;

    public function mount()
    {
        $this->instagram = Auth::user()->social_handle->instagram ?? "";
        $this->linkedin = Auth::user()->social_handle->linkedin ?? "";
        $this->x_twitter = Auth::user()->social_handle->x_twitter ?? "";
        $this->facebook = Auth::user()->social_handle->facebook ?? "";
    }

    public function saveSocials()
    {
        if (SocialHandle::where('mentor_id', auth()->id())->exists()) {
            request()->user('mentor')->social_handle()->update([
                'instagram' => $this->instagram,
                'linkedin' => $this->linkedin,
                'x_twitter' => $this->x_twitter,
                'facebook' => $this->facebook,
            ]);
            return redirect('/mentor/dashboard/profile/manage-socials')->with('status', 'Updated!');
        }

        request()->user('mentor')->social_handle()->create([
            'instagram' => $this->instagram,
            'linkedin' => $this->linkedin,
            'x_twitter' => $this->x_twitter,
            'facebook' => $this->facebook,
        ]);

        return redirect('/mentor/dashboard')->with('status', 'Profile updated!');
    }

    public function render()
    {
        return view('livewire.mentor.profile.manage-socials');
    }
}
