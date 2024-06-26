<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'history',
        'vision',
        'mission',
        'goals',
        'is_active'
    ];
}
