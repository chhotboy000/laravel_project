<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chatbox extends Model
{
    use HasFactory;
    protected $table ='chatboxes';
    protected $primaryKey='id';
    protected $fillable = [
        'name',
        'mess',
    ];
}
