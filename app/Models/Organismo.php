<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organismo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','slug','representante','activo'];

    public function documentos():HasMany
    {
        return $this->hasMany(Documento::class);
    }
}
