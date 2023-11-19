<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vigencia extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function documentos():HasMany
    {
        return $this->hasMany(Documento::class);
    }
}
