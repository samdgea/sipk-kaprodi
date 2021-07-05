<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LKPSDocuments extends Model
{
    protected $table = 'report_lkps_documents';
    protected $fillable = [
        'document_path',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    public function createdBy()
    {
        $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function updatedBy()
    {
        $this->belongsTo(User::class, 'updated_by', 'id');
    }

    public function deletedBy()
    {
        $this->belongsTo(User::class, 'deleted_by', 'id');
    }
}
