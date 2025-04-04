<?php

namespace App\Http\Controllers;

use App\Models\Esemeny;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EsemenyController extends Controller
{

    //csak a felső hármat adja vissza amelyek legutóbb módosítva lettek
    public function getTopUserEvents($user_id){
        $data = DB::table('esemenies')
        ->select('*')
        ->where('user_id', '=', $user_id)
        ->orderBy('updated_at', 'DESC')
        ->limit(3)
        ->get();
        
        return $data;
    }

    //az összeset adja vissza:
    public function getAllUserEvents($user_id){
        $data = DB::table('esemenies')
        ->select('*')
        ->where('user_id', '=', $user_id)
        ->get();
        
        return $data;
    }


    //minden eventet visszaad felhasználótól függetlenül
    public function getEvents(){
        return Esemeny::all();      
    }

    //adott esemény minden adatát adja vissza
    public function getSpecificEvent($esemeny_id){
        $data = DB::table('esemenies')
        ->where('esemeny_id', '=', $esemeny_id)
        ->get();
        
        return $data;
    }

    //minden felhasználó minden adatát visszaadja:
        public function returnUser($egyeni_vegpont){
            $data = DB::table('users')
            ->where('egyeni_vegpont', '=', $egyeni_vegpont)
            ->select('*')
            ->get();
    
            return $data;
        }

    //foglalasi oldal adatok betoltesehez szüks vegpont lekerdezese:
    public function getEventDetails($egyeni_vegpont){
        $data = DB::table('users')
        ->where('egyeni_vegpont', '=', $egyeni_vegpont)
        ->join('esemenies', 'users.id', '=', 'esemenies.user_id')
        ->join('rendezs', 'esemenies.esemeny_id', '=', 'rendezs.esemeny_id')
        ->get();

        return $data;
    }

    /*public function getSpecificEvent(){
        
    }*/
}
