<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'barang';
    
    protected $fillable = ['id','id_category','nama','harga','keterangan','foto','foto_url'];

    public function getIncrementing(){
        return false;
    }
    public function getKeyType(){
        return 'string';
    }

    public function category()
    {
        return $this->hasMany(Category::Class, 'id', 'id_category');
    }

    public function transaksi()
    {
        return $this->belongsToMany(Transaksi::class,'transaction_detail','id_barang','id_transaksi');
    }


}
