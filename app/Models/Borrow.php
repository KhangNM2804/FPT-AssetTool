<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    const STATUS_PENDING = 1;
    const STATUS_BORROWED = 2;
    const STATUS_PAID = 3;
    const STATUS_CANCELED = 4;
    

    protected $fillable = [
        'user_id',
        'start_at',
        'end_at',
        'status'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function details()
    {
        return $this->hasMany(BorrowDetail::class, 'borrow_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
