<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtikelFile extends Model
{
    use HasFactory;

    protected $table = 'artikel_file';

    protected $fillable = [
        'id_artikel',
    ];

    public function artikel()
    {
        return $this->belongsTo(Artikel::class, 'id_artikel');
    }
}
