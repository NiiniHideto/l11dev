<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeraOne extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'str_a',
        'str_b',
        'str_c',
        'pic_a',
        'pic_b',
        'pic_c',
        'theme',
    ];

}
