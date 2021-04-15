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
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (session('city') == null) session()->put('city', 'Astana');
        $city = City::where('name', session('city'))->pluck('id')[0];
        $rooms = Room::orderBy('created_at', 'desc')->where('city_id', $city)->paginate(12);
        if($request->ajax()){
            $view = view('room.display', compact('rooms'))->render();
            return response()->json(['html'=>$view]);
        }
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
            return $this->show($room->id);
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
            'description' => 'required|string|max:500',
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

        return $this->show($room_id);
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
        $room = Room::find($id);
        $cities = DB::table('cities')->orderBy('id')->pluck('id', 'name');
        return view('room.update', compact('room', 'cities'));
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
        $request->validate([
            'room_pictures' => 'nullable',
            'room_pictures.*' => 'mimes:jpg,jpeg,png',
            'title' => 'required|string|max:255',
            'city' => 'required',
            'address' => 'required|string|max:255',
            'description' => 'required|string|max:500',
        ]);        

        Room::where('id', $id)->update([
            'city_id' => $request->city,
            'title' => $request->title,
            'address' => $request->address,
            'description' => $request->description,
        ]);

        if ($request->room_pictures != null) {
            $photos = Photo::where('room_id', $id);
            $photos->delete();
            Storage::delete('room/'.$id.'/photo');
            foreach($request->file('room_pictures') as $key => $room_picture) {
                $name = 'room/'.$id.'/photo/'.($key+1);
                $room_picture->storeAs('public', $name);
                Photo::create([
                'room_id' => $id,
                'path' => $name,
            ]);
            }
        }
        
        return $this->show($id);
        
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
