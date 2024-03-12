<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Mentor;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        $mentors = Mentor::get();
        $bookings = Booking::where('user_id', auth()->id())->with('session')->latest()->get();
        return view('user.sessions.index', [
            'mentors' => $mentors,
            'bookings' => $bookings
        ]);
    }

    public function all_mentors()
    {
        $mentors = Mentor::get();
        return view('user.mentor.index', [
            'mentors' => $mentors
        ]);
    }

    public function show_mentor(Mentor $mentor)
    {
        return view('user.mentor.show', [
            'mentor' => $mentor
        ]);
    }

    public function create_booking(Request $request)
    {
        $data = $request->validate([
            'topic' => 'required',
            'session_id' => 'required'
        ]);

        $request->user()->booking()->create($data);

        return redirect(route('user.session.index'))->with('status', 'Session booked!');
    }
}