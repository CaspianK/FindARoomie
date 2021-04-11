<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\City;
use App\Models\Photo;
use App\Models\Room;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // $cities = City::all()->pluck('id');
        // $rooms = Room::whereIn('city_id', $cities)->get();
        $rooms = Room::orderBy('id', 'desc')->get();
        $cities = City::orderBy('id', 'asc')->whereIn('id', $rooms->pluck('city_id'))->pluck('id', 'name');
        return view('room.index', compact('rooms', 'cities'));
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
            'photo1' => 'required|mimes:jpg,jpeg,png',
            'photo2' => 'required|mimes:jpg,jpeg,png',
            'photo3' => 'required|mimes:jpg,jpeg,png',
            'title' => 'required|string|max:255',
            'city' => 'required',
            'address' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);        

        $profile_id = User::find(auth()->user()->id)->profile->id;
        Room::create([
            'profile_id' => $profile_id,
            'city_id' => $request->city,
            'title' => $request->title,
            'address' => $request->address,
            'description' => $request->description,
        ]);

        $room_id = Room::where('profile_id', $profile_id)->pluck('id')[0];
        $photo1 = 'room/'.$profile_id.'/photo/1';
        $photo2 = 'room/'.$profile_id.'/photo/2';
        $photo3 = 'room/'.$profile_id.'/photo/3';
        $request->file('photo1')->storeAs('public', $photo1);
        $request->file('photo2')->storeAs('public', $photo2);
        $request->file('photo3')->storeAs('public', $photo3);
        Photo::create([
            'room_id' => $room_id,
            'path' => $photo1,
        ]);
        Photo::create([
            'room_id' => $room_id,
            'path' => $photo2,
        ]);
        Photo::create([
            'room_id' => $room_id,
            'path' => $photo3,
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
        $room = Room::find($id);
        if ($room === null) return abort(404);
        $bookmark = null;
        if (Auth::check()) {
            $bookmark = Bookmark::where('user_id', auth()->user()->id)->where('room_id', $id)->exists();
        }
        return view('room.show', compact('room', 'bookmark'));
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
