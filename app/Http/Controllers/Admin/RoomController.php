<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\admin\Room;
use App\Models\admin\Hotel;
use App\Models\admin\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->get();
        return view('admin.room.room_index', compact('rooms'));
    }
    public function add()
    {
        $hotel = Hotel::first();
        $branches = Branch::where('status', 1)->get();
        return view('admin.room.add_room', compact('hotel', 'branches'));
    }
    public function store(Request $request)
    {

        $this->validate($request, [
            'hotel_id' => 'required',
            'branch_id' => 'required',
            'room_name' => 'required',
            'description' => 'string|nullable',
            'price' => 'required',
            'type' => 'required',
            'coupon' => 'string',
        ]);

        Room::insert([
            'hotel_id' => $request->hotel_id,
            'branch_id' => $request->branch_id,
            'room_name' => $request->room_name,
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
            'coupon' => $request->coupon,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.rooms')->with('message', 'Room added Successfully');
    }


    public function delete($id)
    {
        Room::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Room Deleted Successfully');
    }
    public function edit($id)
    {
        $hotel = Hotel::first();
        $branches = Branch::where('status', 1)->get();
        $room = Room::findOrFail($id);
        return view('admin.room.edit_room', compact('hotel', 'branches', 'room'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'hotel_id' => 'required',
            'branch_id' => 'required',
            'room_name' => 'required',
            'description' => 'string|nullable',
            'price' => 'required',
            'type' => 'required',
            'coupon' => 'string',
        ]);

        Room::findOrFail($id)->update([
            'hotel_id' => $request->hotel_id,
            'branch_id' => $request->branch_id,
            'room_name' => $request->room_name,
            'description' => $request->description,
            'price' => $request->price,
            'type' => $request->type,
            'coupon' => $request->coupon,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('admin.rooms')->with('message', 'Room Updated Successfully');
    }
}
