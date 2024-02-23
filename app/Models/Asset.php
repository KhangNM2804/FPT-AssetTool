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
        'unit',
        'invoice_number',
        'image',
        'material_code',
        'date_of_use',
        'status',
        'note'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
 
    public static function boot()
    {
        parent::boot();
        static::updating(function ($asset) {
            $asset->assetDetail()->where('status',AssetDetail::STATUS_ACTIVE)->update(['status' => $asset->status]);
        });
    }
    public function delete()
    {
        // Xóa tất cả các AssetDetail liên quan trước khi xóa Asset
        $this->assetDetail()->delete();
        return parent::delete();
    }
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
    public function assetDetail()
    {
        return $this->hasMany(AssetDetail::class, 'asset_id');
    }
    
}
