<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    protected $table = "pengunjung";

    protected $fillable = ["ID","nama","alamat","telepon","email"];

    protected $primaryKey = "ID";

    protected $keyType="string";
}
