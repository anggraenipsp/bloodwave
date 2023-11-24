<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'sampul',
        'created_at',
    ];

    public function artikelFile()
    {
        return $this->hasMany(ArtikelFile::class, 'id_artikel');
    }
}
