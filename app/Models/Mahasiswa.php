<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use Loggable;
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'first_name',
        'last_name',
        'nim_mahasiswa',
        'tahun_daftar',
        'gender',
        'program_studi'
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getProgramStudiAttribute()
    {
        $kodeProdi = substr($this->nim_mahasiswa, 2, 2);
        $kodeJurusan = substr($this->nim_mahasiswa, 4, 2);
        switch ($kodeProdi) {
            case "33":
                return "Arsitektur D3";
            case "34":
                return "Arsitektur S1";
            case "43":
                return "Sistem Informasi D3";
            case "44":
                return "Teknik Informatika S1";
            case "45":
                return "Teknik Industri";
            default:
                return "?";
        }
    }

    public function detailSemester()
    {
        return $this->hasMany(DetailSemester::class, 'mahasiswa_id', 'id');
    }
}
