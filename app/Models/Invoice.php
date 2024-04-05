<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'denominator',
        'symbol',
        'invoice_number',
        'path',
        'user_id'

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
