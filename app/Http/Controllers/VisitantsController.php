<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitant;

class VisitantsController extends Controller
{
    //
    public function index(Request $request){
        return view('visitants.index');
    }

    public function store(Request $request){
        $visitant = new Visitant;
    }
}
