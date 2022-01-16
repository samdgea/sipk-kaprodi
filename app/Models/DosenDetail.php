<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenDetail extends Model
{
    use Loggable;
    use HasFactory;

    protected $table = 'dosen_details';

    protected $fillable = [
        'id_dosen',
        'address',
        'email_address',
        'phone_number',
        'home_number',
        'others'
    ];

    protected $casts = [
        'others' => 'json'
    ];
}
