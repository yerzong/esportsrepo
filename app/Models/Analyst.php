<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analyst extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user',
        'date_of_birth',
        'image',
    ];
}
