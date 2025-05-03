<?php

namespace App\Http\Controllers;

use App\Models\Rendez;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RendezController extends Controller
{
    
    public function getSpecEventDates($event_id){
        $today = Carbon::today()->toDateString();
    
        $data = DB::table('rendez')
            ->where('esemeny_id', '=', $event_id)
            ->where('datum', '>', $today)
            ->get();
        
        return $data;
    }

    public function getAllEventDates($event_id)
    {
        $data = DB::table('rendez')
            ->select('*')
            ->where('esemeny_id', '=', $event_id)
            ->get();

        return $data;
    }

    public function postEventTimes(Request $request)
    {
        $validated = $request->validate([
            'esemeny_id' => 'required|integer|exists:esemenyek,id',
            'idopontok' => 'required|array|min:1',
            'idopontok.*.datum' => 'required|date',
            'idopontok.*.nyitva' => 'required|boolean',
        ]);
    
        foreach ($validated['idopontok'] as $idopont) {
            Rendez::create([
                'esemeny_id' => $validated['esemeny_id'],
                'datum' => $idopont['datum'],
                'nyitva' => $idopont['nyitva'],
            ]);
        }
    
        return response()->json([
            'message' => 'Időpontok sikeresen mentve.',
        ]);
    }

    public function storeEventHost(Request $request)
    {
    $request->validate([
        'esemeny_id' => 'required|integer',
        'datum' => 'required|date|after:today',
        'nyitva' => 'required|boolean',
    ]);
    $data = $request->all();
    Rendez::create([
        'esemeny_id' => $data['esemeny_id'],
        'datum' => Carbon::createFromFormat('Y-m-d H:i:s', $data['datum']),
        'nyitva' => $data['nyitva'] ?? false,
    ]);
    return response()->json(['message' => 'Esemény sikeresen mentve'], 201);
    }
}
