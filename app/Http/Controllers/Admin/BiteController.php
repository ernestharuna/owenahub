<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slice;
use Illuminate\Http\Request;

class BiteController extends Controller
{
    public function store(Request $request, Slice $slice)
    {
        // dd($request);
        $data = $request->validate([
            'title' => ['required', 'max:100'],
            'description' => 'required',
            'position' => 'required',
            'content' => ['required', 'min:10'],
        ]);

        try {
            $existing_bite = $slice->bite()->where('position', $data['position'])->first();
            if ($existing_bite) {
                return back()->with('error', 'A bite with the same position already exists.');
            }

            $slice->bite()->create($data);
            return redirect(route('admin.slice.show', $slice->id))->with('status', 'Slice Created!');
        } catch (\Exception $e) {
            throw $e;
            return back()->with('error', 'Something went wrong');
        }
    }
}