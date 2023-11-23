<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\patient;

class treatment extends Model
{
    use HasFactory;
    protected $table ='treatments';
    protected $primaryKey='id';

    protected $fillable = [
        'weight',
        'height',
        'blood',
        'temp',
        'testing',
        'note',
        'dateReExam',
        'medicine1', 'frequency1',
        'medicine-2', 'frequency-2',
        'medicine-3', 'frequency-3',
        'medicine-4', 'frequency-4',
        'medicine-5', 'frequency-5',
        'medicine-6', 'frequency-6',
        'medicine-7', 'frequency-7',
        'medicine-8', 'frequency-8',
        'medicine-9', 'frequency-9',
        'medicine-10', 'frequency-10',
        'patient_id',
    ];
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id','id');
    }
    public function bill()
    {
        return $this->hasOne(bill::class, 'bill_id','id');
    }
}
