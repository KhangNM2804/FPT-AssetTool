<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    protected $fillable = [
        'code',
        'name',
        'user_id',
        'quantity',
        'category_asset_id',
        'price',
        'document_number',
        'material_code',
        'date_of_use',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
  
    public function category()
    {
        return $this->belongsTo(CategoryAsset::class);
    }
}
