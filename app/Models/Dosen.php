<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use Loggable;
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

    public function dosenEducation() {
        return $this->hasOne(DosenEducation::class, 'id_dosen', 'id');
    }
}
