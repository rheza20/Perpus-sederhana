<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table="book";

    protected $fillable = ["kode","judul"];
    
    protected $primaryKey = "kode";

    protected $keyType="string";
}
