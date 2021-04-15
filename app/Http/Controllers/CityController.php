<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request) {
        session()->put('city', $request->city);
        return redirect()->back();
    }
}
