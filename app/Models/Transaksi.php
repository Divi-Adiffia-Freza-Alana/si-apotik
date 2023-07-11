<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaksi extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'transaction';
    
    protected $fillable = ['id','total','keterangan'];

    public function getIncrementing(){
        return false;
    }
    public function getKeyType(){
        return 'string';
    }

    /*public function keeperfoto()
    {
        return $this->hasMany(Keeper_foto::Class, 'id_keeper', 'id');
    }*/

    public function barang()
    {
        return $this->belongsToMany(Barang::class,'transaction_detail','id_barang','id_transaksi');
    }

}
