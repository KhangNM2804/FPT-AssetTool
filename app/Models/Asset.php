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
        'group_assets_id',
        'price',
        'total_price',
        'document_number',
        'denominator',
        'symbol',
        'invoice_number',
        'image',
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
        return $this->belongsTo(CategoryAsset::class, 'category_asset_id');
    }
    public function group()
    {
        return $this->belongsTo(GroupAsset::class, 'group_assets_id');
    }
    public function getInvoiceAttribute()
    {
        return $this->denominator . $this->symbol . $this->invoice_number;
    }
    
}
