<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrow_id',
        'category_assets_id',
        'quantity'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function borrow()
    {
        return $this->belongsTo(Borrow::class, 'borrow_id');
    }
    public function category()
    {
        return $this->belongsTo(CategoryAsset::class, 'category_assets_id');
    }
}
