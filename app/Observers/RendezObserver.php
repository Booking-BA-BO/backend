<?php

namespace App\Observers;

use App\Models\Rendez;
use App\Models\Esemeny;
use Carbon\Carbon;

class RendezObserver
{
    /**
     * Handle the Rendez "created" event.
     */
    public function created(Rendez $rendez)
     {
        $esemeny = Esemeny::find($rendez->esemeny_id);

        if (!$esemeny) {
            return;
        }

        $datum = Carbon::parse($rendez->datum);
        $now = Carbon::now();

        $foglalastol = $datum->copy()->subDays($esemeny->foglalastol);
        $foglalasig = $datum->copy()->subDays($esemeny->foglalasig);

        $rendez->nyitva = $now->between($foglalastol, $foglalasig);
        $rendez->save();
    }

    /**
     * Handle the Rendez "updated" event.
     */
    public function updated(Rendez $rendez): void
    {
        //
    }

    /**
     * Handle the Rendez "deleted" event.
     */
    public function deleted(Rendez $rendez): void
    {
        //
    }

    /**
     * Handle the Rendez "restored" event.
     */
    public function restored(Rendez $rendez): void
    {
        //
    }

    /**
     * Handle the Rendez "force deleted" event.
     */
    public function forceDeleted(Rendez $rendez): void
    {
        //
    }
}
