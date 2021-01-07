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

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://viacep.com.br/ws/'. $validatedData['cep'] .'/json/');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);

        $dados = json_decode($output);

        $city = $dados->localidade;
        $district = $dados->bairro;
        $street = $dados->logradouro;
        $uf = $dados->uf;
        // dd(empty($district));

        $visitant = new Visitant;
        $visitant->name = $validatedData['name'];
        $visitant->email = $validatedData['email'];
        $visitant->nascimento = date("Y-m-d", strtotime(str_replace("/", "-", $validatedData['nascimento'])));
        $visitant->endereco = $street .(empty($district) ? '' : ', '. $district . ', '). $city . '/'. $uf . ', ' . $validatedData['cep'];
        
        if($visitant->save()){
            $message = "Sucesso!";
            return view('visitants.thanks', compact('message'));
        }else{
            $message = "Error ao cadastrar!";
            return view('visitants.thanks', compact('message'));
        }
    }

    public function validations(){
        return [
            'name'      => ['required'],
            'cep'       => ['required', 'min:9'],
            'email'     => ['required', 'unique:visitants', 'email'],
            'nascimento'=> ['required']
        ];
    }
}
