<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile = User::find(auth()->user()->id)->profile;
        if ($profile === null) {
            return redirect(RouteServiceProvider::CREATE_PROFILE);
        }
        $room = $profile->room;
        if ($room !== null) {
            return redirect(RouteServiceProvider::HOME);
        }
        $cities = DB::table('cities')->pluck('id', 'name');
        return view('room.create', compact('cities'));
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
            'title' => 'required|string|max:255',
            'city' => 'required',
            'address' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        Room::create([
            'profile_id' => User::find(auth()->user()->id)->profile->id,
            'city_id' => $request->city,
            'title' => $request->title,
            'address' => $request->address,
            'description' => $request->description,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
