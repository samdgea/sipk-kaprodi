<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenEducation extends Model
{
    use Loggable;
    use HasFactory;

    protected $table = 'dosen_education';

    protected $fillable = [
        'id_dosen',
        'education_type',
        'university_name',
        'enrollment_major',
        'graduation_date',
        'ipk_score',
    ];

    public function dosenDetail() {
        return $this->belongsTo(Dosen::class);
    }
}
