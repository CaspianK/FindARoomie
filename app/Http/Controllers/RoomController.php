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
        $rooms = Room::orderBy('created_at', 'desc')->paginate(12);
        return view('room.index', compact('rooms'));
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
        $cities = DB::table('cities')->orderBy('id')->pluck('id', 'name');
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
            'room_pictures' => 'required',
            'room_pictures.*' => 'mimes:jpg,jpeg,png',
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
        foreach($request->file('room_pictures') as $key => $room_picture) {
            $name = 'room/'.$room_id.'/photo/'.($key+1);
            $room_picture->storeAs('public', $name);
            Photo::create([
            'room_id' => $room_id,
            'path' => $name,
        ]);
        }

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
        $photos = Photo::where('room_id', $room->id)->get();
        return view('room.show', compact('room', 'bookmark', 'photos'));
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
