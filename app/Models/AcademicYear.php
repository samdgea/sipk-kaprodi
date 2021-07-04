<?php

namespace App\Models;

use App\Models\Form\MahasiswaAsing;
use App\Models\Form\MahasiswaLokal;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicYear extends Model
{
    use SoftDeletes;
    use Loggable;

    protected $table = 'tahun_akademik';
    protected $fillable = [
        'tahun_akademik',
        'semester_akademik',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function borangMahasiswaLokal()
    {
        return $this->hasOne(MahasiswaLokal::class, 'academic_year_id', 'id');
    }

    public function borangMahasiswaAsing()
    {
        return $this->hasOne(MahasiswaAsing::class, 'academic_year_id', 'id');
    }
}
