<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $profile = $user->profile;
        if ($profile === null) {
            return view('profile.create');
        }
        $room = $profile->room;
        return view('profile.index', compact('profile', 'room'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile = User::find(auth()->user()->id)->profile;
        if ($profile !== null) {
            return redirect(RouteServiceProvider::HOME);
        }
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|max:17',
            'gender' => 'required|string|max:10',
            'profile_picture' => 'required|mimes:jpg,jpeg,png',
            'bio' => 'required|string|min:50',
            'instagram' => 'nullable|string',
            'spotify' => 'nullable|string',
        ]);

        $filename = 'profile/'.auth()->user()->id.'/picture';
        $request->file('profile_picture')->storeAs('public', $filename);
        Profile::create([
            'user_id' => auth()->user()->id,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
            'profile_picture' => $filename,
            'birthdate' => $request->birthdate,
            'bio' => $request->bio,
            'instagram' => $request->instagram,
            'spotify' => $request->spotify,
        ]);
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::where('user_id', $id)->firstOrFail();
        if ($profile === null) return abort(404);
        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
