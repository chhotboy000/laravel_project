<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class schedule extends Model
{
    use HasFactory;
    protected $table ='schedules';
    protected $primaryKey='id';

    protected $fillable = [
        'scheid',
        'day',
        'time',
        'job',
        'user_id',
        
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
