<?php

namespace App\Models\Form;

use App\Models\AcademicYear;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MahasiswaAsing extends Model
{
    use SoftDeletes;
    use Loggable;

    protected $table = 'seleksi_mahasiswa_asing';
    protected $fillable = [
        'academic_year_id',
        'jumlah_mahasiswa_aktif',
        'jumlah_mahasiswa_asing_full_time',
        'jumlah_mahasiswa_asing_part_time',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function academicYear() {
        return $this->hasOne(AcademicYear::class, 'id', 'academic_year_id');
    }
}
