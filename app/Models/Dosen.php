<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $fillable = [
        'first_name',
        'last_name',
        'nidn',
        'date_joined',
        'is_active',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
