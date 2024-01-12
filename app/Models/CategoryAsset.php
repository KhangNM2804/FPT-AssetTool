<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryAsset extends Model
{
    use HasFactory;
    use HasFactory;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $fillable = [
        'name',
        'status',
        'count_asset',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

   
}
