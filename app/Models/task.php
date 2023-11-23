<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;

    protected $table ='tasks';
    protected $primaryKey='id';

    protected $fillable = [
        'day',
        'time',
        'title',
        'check',
        'user_id',
        'status',
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
