<?php

namespace App\Observers;

use App\Models\Documento;

class DocumentoObserver
{
    /**
     * Handle the Documento "created" event.
     */
    public function creating(Documento $documento): void
    {
        if(! \App::runningInConsole()){
            $documento->user_id = auth()->user()->id;
        }
    }

}
