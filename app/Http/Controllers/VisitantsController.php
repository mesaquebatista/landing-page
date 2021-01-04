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

        $validatedData = $request->validate($this->validations());

        // TODO: Requisição a API do CEP

        $visitant = new Visitant;
        $visitant->name = $validatedData['name'];
        $visitant->email = $validatedData['email'];
        $visitant->nasciemnto = ['nascimento'];

    }

    public function validations(){
        return [
            'name'      => ['required'],
            'cep'       => ['required'],
            'email'     => ['unique:visitants'],
            'nascimento'=> ['required']
        ];
    }
}
