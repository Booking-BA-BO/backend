<?php

namespace App\Http\Controllers;

use App\Models\Esemeny;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EsemenyController extends Controller
{
    public function getUserEvents($user_id){
        return Esemeny::all()
        ->where('user_id', '=', $user_id);        
    }
}
