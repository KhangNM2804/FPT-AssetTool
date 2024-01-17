<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetDetail extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $fillable = [
        'asset_id',
        'room_id',
        'quantity',
        'receiver_id',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
    
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function reciver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
