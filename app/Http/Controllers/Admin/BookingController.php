<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\admin\Hotel;
use App\Models\admin\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Room;

class BookingController extends Controller
{
    public function add()
    {
        $hotel = Hotel::first();
        $branches = Branch::latest()->get();
        $rooms = Room::latest()->get();
        return view('admin.book.add_book', compact('hotel', 'branches', 'rooms'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'hotel_id' => 'required',
            'branch_id' => 'required',
            'room_id' => 'required',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'required|string',
            'price' => 'required|numeric',
            'coupon' => 'string',
        ]);
        Booking::insert([
            'hotel_id' => $request->hotel_id,
            'branch_id' => $request->branch_id,
            'room_id' => $request->room_id,
            'first_name' => $request->first_name,
            'last_name' => $request->first_name,
            'address' => $request->address,
            'price' => $request->price,
            'coupon' => $request->coupon,
            'status' => 0,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.add_book')->with('message', 'Book added Successfully');
    }
    public function index()
    {
        $booking = Booking::latest()->get();
        return view('admin.book.index', compact('booking'));
    }
}
