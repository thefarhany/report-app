<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kotama extends Model
{
    use HasFactory;

    protected $fillable = [
        'kotama',
        'kesatuan',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
