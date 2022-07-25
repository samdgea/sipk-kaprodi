<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Model
{
    use Loggable;
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'faculty_id',
        'study_program_id',
        'first_name',
        'last_name',
        'tahun_daftar',
        'gender',
        'program_studi'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $lastNim = self::where('faculty_id', $model->faculty_id)->where('tahun_daftar', $model->tahun_daftar)->where('study_program_id', $model->study_program_id)->latest('id')->first();
            $facultyCode = DB::table('tbl_fakultas')->where('id', $model->faculty_id)->first()->kode_fakultas;
            $studyProgramCode = DB::table('tbl_program_studi')->where('id', $model->study_program_id)->first()->kode_program_studi;
            if (empty($lastNim)) {
                $model->nim_mahasiswa = substr($model->tahun_daftar, -2) . $facultyCode . $studyProgramCode . str_pad("1", 4, "0", STR_PAD_LEFT);
            } else {
                $lastNim = (int)substr($lastNim->nim_mahasiswa, -4) + 1;
                $model->nim_mahasiswa = substr($model->tahun_daftar, -2) . $facultyCode . $studyProgramCode . str_pad($lastNim, 4, "0", STR_PAD_LEFT);
            }
        });
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function fakultas()
    {
        return $this->hasOne(Faculty::class, 'id', 'faculty_id');
    }

    public function studyProgram()
    {
        return $this->hasOne(StudyProgram::class, 'id', 'study_program_id');
    }

    public function detailSemester()
    {
        return $this->hasMany(DetailSemester::class, 'mahasiswa_id', 'id');
    }
}
