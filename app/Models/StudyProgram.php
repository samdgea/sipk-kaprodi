<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyProgram extends Model
{
    use Loggable;
    use SoftDeletes;

    protected $table = 'tbl_program_studi';
    protected $fillable = [
        'faculty_id',
        'kode_program_studi',
        'nama_program_studi',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
