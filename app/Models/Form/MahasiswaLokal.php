<?php

namespace App\Models\Form;

use App\Models\AcademicYear;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MahasiswaLokal extends Model
{
    use SoftDeletes;
    use Loggable;

    protected $table = 'seleksi_mahasiswa_lokal';
    protected $fillable = [
        'academic_year_id',
        'daya_tampung_mhs',
        'jumlah_calon_pendaftar',
        'jumlah_lulus_seleksi',
        'jumlah_mahasiswa_reguler_baru',
        'jumlah_mahasiswa_transfer_baru',
        'jumlah_mahasiswa_reguler_aktif',
        'jumlah_mahasiswa_transfer_aktif',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function academicYear() {
        return $this->hasOne(AcademicYear::class, 'id', 'academic_year_id');
    }
}
