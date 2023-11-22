<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\treatment;
use Kyslik\ColumnSortable\Sortable;
class medicine extends Model
{
    use HasFactory, Sortable;
    protected $table ='medicines';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'quantity','price','type','expire','import', 'updated_at', 'created_at'];
    public $sortable = ['name', 'quantity','price','type','expire','import'];

    public function treatments()
    {
        return $this->hasMany(treatment::class, 'treatment_id','id');
    }


}
