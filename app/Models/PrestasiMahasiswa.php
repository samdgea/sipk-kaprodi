<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrestasiMahasiswa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'prestasi_mahasiswa';

    protected $fillable = [
        'mahasiswa_id',
        'tipe_prestasi',
        'nama_prestasi',
        'tanggal_perolehan_prestasi',
        'file_dokumen_prestasi',
        'created_by',
        'updated_by',
        'deleted_by'
    ];
}
