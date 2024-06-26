<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorDashboardController extends Controller
{
    public function __invoke()
    {
        $sessions = Session::where('mentor_id', auth('mentor')->id())->get();

        return view('mentor.dashboard', [
            'sessions' => $sessions
        ]);
    }
}
