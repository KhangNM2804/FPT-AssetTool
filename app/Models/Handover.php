<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handover extends Model
{
    use HasFactory;
    protected $fillable = ['asset_details_id', 'user_id'];
    protected $hidden = ['created_at', 'updated_at'];
    
    public function assetDetail()
    {
        return $this->belongsTo(AssetDetail::class, 'asset_details_id');
    }
    public function user()
    {
        return $this->belongsTo(AssetDetail::class, 'user_id');
    }
}
