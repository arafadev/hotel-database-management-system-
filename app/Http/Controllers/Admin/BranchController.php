<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\Hotel;
use App\Models\admin\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::latest()->get();
        $hotel = Hotel::findOrFail(1);
        return view('admin.branch.branch_index', compact('branches', 'hotel'));
    }
    public function add(Request $request)
    {
        $this->validate($request, [
            'hotel_id' => 'required|numeric',
            'branch_name' => 'required|max:20',
            'status' => 'required|numeric',
        ]);

        Branch::insert([
            'hotel_id' => $request->hotel_id,
            'branch_name' => $request->branch_name,
            'status' => $request->status
        ]);

        return redirect()->back()->with('message', 'Branch added Successfully');
    }
    public function delete($id)
    {
        Branch::findOrFail($id)->delete();
        return redirect()->back()->with('message', 'Branch Deleted Successfully');
    }
    public function active($id)
    {
        Branch::findOrFail($id)->update(['status' => 1]);
        
        return redirect()->back()->with('message', 'Branch Active Successfully');

    }
    public function inactive($id)
    {
        
        Branch::findOrFail($id)->update(['status' => 0]);
        
        return redirect()->back()->with('message', 'Branch InActive Successfully');
    }
}
