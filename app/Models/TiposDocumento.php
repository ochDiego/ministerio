<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TiposDocumento extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','slug','activo'];

    public function documentos():HasMany
    {
        return $this->hasMany(Documento::class);
    }
}
