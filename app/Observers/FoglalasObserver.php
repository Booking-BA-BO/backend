<?php

namespace App\Observers;

use App\Models\Esemeny;
use App\Models\Foglalas;
use App\Models\Rendez;

class FoglalasObserver
{
    /**
     * Handle the Foglalas "created" event.
     */
    public function created(Foglalas $foglalas): void
    {
        $rendezveny = Rendez::find($foglalas->rendezveny_id);
        if ($rendezveny && $rendezveny->foglalasok()->sum('db') >= $rendezveny->kapacitas) {
            $rendezveny->update(['nyitva' => false]);
        }
    }
    

    /**
     * Handle the Foglalas "updated" event.
     */
    public function updated(Foglalas $foglalas): void
    {
        //
    }

    /**
     * Handle the Foglalas "deleted" event.
     */
    public function deleted(Foglalas $foglalas): void
    {
        //
    }

    /**
     * Handle the Foglalas "restored" event.
     */
    public function restored(Foglalas $foglalas): void
    {
        //
    }

    /**
     * Handle the Foglalas "force deleted" event.
     */
    public function forceDeleted(Foglalas $foglalas): void
    {
        //
    }
}
