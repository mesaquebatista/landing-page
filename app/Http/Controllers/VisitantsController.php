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
        // dd($request->all());
        $validatedData = $request->validate($this->validations());

        // TODO: Requisição a API do CEP
        // $city
        // $district
        // $street

        $visitant = new Visitant;
        $visitant->name = $validatedData['name'];
        $visitant->email = $validatedData['email'];
        $visitant->nascimento = date("Y-m-d", strtotime(str_replace("/", "-", $validatedData['nascimento'])));
        
        if($visitant->save()){
            $message = "Sucesso!";
            return view('visitants.thanks', compact($message));
        }else{
            $message = "Error ao cadastrar!";
            return view('visitants.thanks', compact($message));
        }
    }

    public function validations(){
        return [
            'name'      => ['required'],
            'cep'       => ['required'],
            'email'     => ['required', 'unique:visitants'],
            'nascimento'=> ['required']
        ];
    }
}
