<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {   
        $hotel = Hotel::findOrFail(1);
        return view('admin.hotel.hotel_index', compact('hotel'));
    }
}
