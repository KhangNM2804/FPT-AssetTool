<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public $category;
    public $manager;
    use HasFactory;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $fillable = [
        'manager_id',
        'category_room_id',
        'name',
        'index',
        'status',
        'count_asset',
        'created_by'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function category_room()
    {
        return $this->belongsTo(CategoryRoom::class, 'category_room_id');
    }
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
    public function assetDetails()
    {
        return $this->hasMany(AssetDetail::class, 'room_id');
    }
}
