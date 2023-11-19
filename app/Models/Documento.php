<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = [
        'organismo_id',
        'institucione_id',
        'tipos_documento_id',
        'tema_id',
        'vigencia_id',
        'fecha_suscripcion',
        'archivo',
        'activo',
    ];

    public function vigencia():BelongsTo
    {
        return $this->belongsTo(Vigencia::class);
    }

    public function institucione():BelongsTo
    {
        return $this->belongsTo(Institucione::class);
    }

    public function organismo():BelongsTo
    {
        return $this->belongsTo(Organismo::class);
    }

    public function tema():BelongsTo
    {
        return $this->belongsTo(Tema::class);
    }

    public function tiposDocumento():BelongsTo
    {
        return $this->belongsTo(TiposDocumento::class);
    }
}
