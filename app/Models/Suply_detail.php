<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suply_detail extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'suply_detail';
    
    protected $fillable = ['id','id_barang','id_transaksi','qty','harga','subtotal'];

    public function getIncrementing(){
        return false;
    }
    public function getKeyType(){
        return 'string';
    }


}
