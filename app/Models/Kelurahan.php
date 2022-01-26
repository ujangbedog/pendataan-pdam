<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'id_kecamatan', 'nama'];
    protected $table = 'tb_kelurahan';

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'id', 'id_kecamatan');
    }
}
