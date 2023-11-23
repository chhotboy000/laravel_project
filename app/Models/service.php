<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
    protected $table ='services';
    protected $primaryKey = 'id';
    protected $fillable = ['ser_name', 'ser_price', 'updated_at', 'created_at'];

    public function treatments()
    {
        return $this->hasMany(treatment::class, 'treatment_id', 'id');
    }
    // public function treatment()
    //     {
    //         $query = $this->belongsTo(treatment::class, 'service1_id', 'id');
    //         for ($i = 2; $i <= 10; $i++) {
    //             $query->orWhere('service' . $i . '_id', $this->id);
    //         }
    //         return $query;
    //     }
}
