<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicRegistration extends Model
{
    use HasFactory;

    protected $table = 'academic_registration';

    protected $fillable = [
        'tahun_akademik_id',
        'mahasiswa_id',
        'registration_result',
        'reregistration_result'
    ];

    public function tahunAkademik()
    {
        return $this->hasOne(AcademicYear::class, 'id', 'tahun_akademik_id');
    }
}
