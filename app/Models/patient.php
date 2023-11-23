<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\treatment;

class patient extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guard = 'patient';
    protected $table ='patients';
    protected $primaryKey='id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'symtomp',
        'gender',
    ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

     protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function treatments()
    {
        return $this->hasMany(treatment::class, 'treatment_id','id');
    }
    public function patients()
    {
        return $this->hasMany(bill::class, 'bill_id','id');
    }
}
