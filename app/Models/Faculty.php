<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Faculty extends Model
{
    use Loggable;
    use SoftDeletes;

    protected $table = 'tbl_fakultas';
    protected $fillable = [
        'kode_fakultas',
        'nama_fakultas',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function studyPrograms()
    {
        $this->hasMany(StudyProgram::class);
    }
}
