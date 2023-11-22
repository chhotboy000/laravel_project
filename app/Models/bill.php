<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    use HasFactory;
    protected $table ='bills';
    protected $primaryKey = 'id';
    public function treatments()
    {
        return $this->belongsTo(treatment::class, 'treatment_id','id');
    }
    public function patients()
    {
        return $this->belongsTo(patient::class, 'patient_id','id');
    }

}