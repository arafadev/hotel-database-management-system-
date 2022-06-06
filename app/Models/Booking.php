<?php

namespace App\Models;

use App\Models\admin\Branch;
use App\Models\admin\Hotel;
use App\Models\admin\Room;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }
    
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

}
