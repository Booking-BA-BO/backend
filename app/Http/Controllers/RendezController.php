<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RendezController extends Controller
{
    
    public function getSpecEventDates($event_id){
        $today = Carbon::today()->toDateString();
    
        $data = DB::table('rendezs')
            ->where('esemeny_id', '=', $event_id)
            ->where('datum', '>', $today)
            ->get();
        
        return $data;
    }
}
