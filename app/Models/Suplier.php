<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suplier extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'suplier';
    
    protected $fillable = ['id','nama','no_hp','alamat'];

    public function getIncrementing(){
        return false;
    }
    public function getKeyType(){
        return 'string';
    }


}
