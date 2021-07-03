<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSemester extends Model
{
    use Loggable, HasFactory;

    protected $table = 'detail_semester';

    protected $fillable = [
        'mahasiswa_id',
        'semester',
        'ips'
    ];

    public function detailMahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }

}
