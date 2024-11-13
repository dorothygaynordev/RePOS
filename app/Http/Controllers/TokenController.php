<?php

namespace App\Http\Controllers;

use App\Models\puestoModel;
use App\Models\tokenModel;

use Illuminate\Http\Request;
use Illuminate\Support\Str;


class TokenController extends Controller
{
    public function index()
    {

        $puestos = puestoModel::get();


        return view('tokenGeneration', compact('puestos'));
    }
    public function token(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'centro' => 'required',
            'fecha' => 'required|date',
            'colaborador' => 'required',
            'usuario' => '',
            'puesto' => ''
        ]);



        // Concatenar los datos y la cadena aleatoria
        $combinedData = $validatedData['centro'] . $validatedData['fecha'] . $validatedData['colaborador'] . $validatedData['puesto'];

        // dd($combinedData);
        // Aplicar MD5 al valor combinado
        $token_md5 = md5($combinedData);

        // dd($token_md5);

        $token_md5 = strtoupper($token_md5);

        // Tomar los primeros 6 dígitos del token MD5
        $first_6_digits = substr($token_md5, 0, 6);

        // Combinar centro, número de colaborador y los primeros 6 dígitos del token MD5
        $new_token = $validatedData['centro'] . $validatedData['puesto'] . $first_6_digits;

        // Guardar los datos en la tabla
        $token = new tokenModel();

        $token->token = $new_token;
        $token->tienda = $validatedData['centro'];
        $token->fechaUso = $validatedData['fecha'];
        $token->colaborador = $validatedData['colaborador'];
        $token->generador = $validatedData['usuario'];

        $puestos = puestoModel::get();


        $token->save();
        // dd($new_token);
        // // Otras operaciones que necesites hacer
        return view('tokenGeneration', ['new_token' => $new_token, 'puestos' => $puestos]);
    }

    public function tokensGenerated()
    {

        $tokens = tokenModel::get();
        // dd($tokens);

        return view('tokensGenerated', compact('tokens'));
    }
}
