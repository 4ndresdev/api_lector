<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acreditaciones_model;

class Acreditaciones extends Controller
{
    public function get_all(Request $request)
    {

        if ($response = Acreditaciones_model::get_all($request->fecha)) {

            return response()->json(
                $response,
                200,
                [
                    'Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'
                ],
                JSON_UNESCAPED_UNICODE
            );
        } else {
            return response()->json([
                'status' => 404, 'msg' => 'No hay resultados'
            ], 404);
        }
    }
}
