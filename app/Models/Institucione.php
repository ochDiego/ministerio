<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Institucione extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','slug','representante','activo'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function documentos():HasMany
    {
        return $this->hasMany(Documento::class);
    }
}
