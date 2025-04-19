<?php

namespace App\Http\Controllers;

use App\Models\Esemeny;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EsemenyController extends Controller
{

    //csak a felső hármat adja vissza amelyek legutóbb módosítva lettek
    public function getTopUserEvents($user_id)
    {
        $data = DB::table('esemeny')
            ->select('*')
            ->where('user_id', '=', $user_id)
            ->orderBy('updated_at', 'DESC')
            ->limit(3)
            ->get();

        return $data;
    }

    //az összeset adja vissza:
    public function getAllUserEvents($user_id)
    {
        $data = DB::table('esemeny')
            ->select('*')
            ->where('user_id', '=', $user_id)
            ->get();

        return $data;
    }


    //minden eventet visszaad felhasználótól függetlenül
    public function getEvents()
    {
        return Esemeny::all();
    }

    //adott esemény minden adatát adja vissza
    public function getSpecificEvent($esemeny_id)
    {
        $data = DB::table('esemeny')
            ->where('esemeny_id', '=', $esemeny_id)
            ->get();

        return $data;
    }

    //minden felhasználó minden adatát visszaadja:
    public function returnUser($egyeni_vegpont)
    {
        $data = DB::table('users')
            ->where('egyeni_vegpont', '=', $egyeni_vegpont)
            ->select('name', 'email')
            ->get();

        return $data;
    }

    //foglalasi oldal adatok betoltesehez szüks vegpont lekerdezese:
    public function getEventDetails($egyeni_vegpont)
    {
        $data = DB::table('users')
            ->where('egyeni_vegpont', '=', $egyeni_vegpont)
            ->join('esemeny', 'users.id', '=', 'esemeny.user_id')
            ->get();

        return $data;
    }

    public function getUsersEvents($user_id)
    {
        $data = DB::table('esemeny')
            ->where('user_id', '=', $user_id)
            ->get();

        return $data;
    }

    public function modifyUserData(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        $validated = $request->validate([
            'name' => 'nullable|string',
            'vezetek_nev' => 'nullable|string|max:255',
            'kereszt_nev' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:users,email,' . $user_id,
            'telefon' => 'nullable|string|max:20',
        ]);

        $user->name = $validated['name'] ?? $user->name;
        $user->vezetek_nev = $validated['vezetek_nev'] ?? $user->vezetek_nev;
        $user->kereszt_nev = $validated['kereszt_nev'] ?? $user->kereszt_nev;
        $user->email = $validated['email'] ?? $user->email;
        $user->telefon = $validated['telefon'] ?? $user->telefon;

        $user->save();

        return response()->json([
            'message' => 'Felhasználói adatok sikeresen frissítve.',
            'user' => $user,
        ]);
    }

    public function postNewEventType(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'nev' => 'required|string|max:50',
            'leiras' => 'required|string',
            'hely' => 'required|string|max:50',
            'kapacitas' => 'required|integer|min:1',
            'ar' => 'required|integer|min:0',
            'foglalastol' => 'nullable|integer|min:1',
            'foglalasig' => 'nullable|integer|min:1',
        ]);

        $validated['foglalastol'] = $validated['foglalastol'] ?? 90;
        $validated['foglalasig'] = $validated['foglalasig'] ?? 1;

        Esemeny::create([
            'user_id' => $validated['user_id'],
            'nev' => $validated['nev'],
            'leiras' => $validated['leiras'],
            'hely' => $validated['hely'],
            'kapacitas' => $validated['kapacitas'],
            'ar' => $validated['ar'],
            'foglalastol' => $validated['foglalastol'],
            'foglalasig' => $validated['foglalasig'],
        ]);

        return response()->json([
            'message' => 'Az új esemény felvitele sikeres volt',
        ]);
    }

    public function modifyEventData(Request $request, $event_id)
    {
        $event = Esemeny::findOrFail($event_id);

        $validated = $request->validate([
            'nev' => 'required|string|max:50',
            'leiras' => 'required|string',
            'hely' => 'required|string|max:50',
            'kapacitas' => 'required|integer|min:1',
            'ar' => 'required|integer|min:0',
            'foglalastol' => 'nullable|integer|min:1',
            'foglalasig' => 'nullable|integer|min:1',
        ]);

        $event->nev = $validated['nev'] ?? $event->nev;
        $event->leiras = $validated['leiras'] ?? $event->leiras;
        $event->hely = $validated['hely'] ?? $event->hely;
        $event->kapacitas = $validated['kapacitas'] ?? $event->kapacitas;
        $event->ar = $validated['ar'] ?? $event->ar;
        $event->foglalastol = $validated['foglalastol'] ?? $event->foglalastol;
        $event->foglalasig = $validated['foglalasig'] ?? $event->foglalasig;

        $event->save();

        return response()->json([
            'message' => 'Adatok sikeresen frissítve',
            'event' => $event,
        ]);
    }

    public function getSpecEventTimes($event_id)
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

    public function allHostDates($egyeni_vegpont){
        $data = DB::table('rendez')
        ->join('esemeny', 'rendez.esemeny_id', '=', 'esemeny.esemeny_id')
        ->join('users', 'esemeny.user_id', '=', 'users.id')
        ->where('users.egyeni_vegpont', '=', $egyeni_vegpont)
        ->get();

        return $data;
    }

    /*public function modifyEventData(){
        getUsersEvents
    }*/
}
