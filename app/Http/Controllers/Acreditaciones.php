<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Acreditaciones_model;

class Acreditaciones extends Controller
{
    public function get_by_placa(Request $request)
    {

        if ($response = Acreditaciones_model::get_by_placa($request->placa)) {

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

    public function get_all()
    {

        if ($response = Acreditaciones_model::get_all()) {

            if ($response != '[]') {
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

    public function change(Request $request)
    {

        if (Acreditaciones_model::change($request->id_acreditacion)) {
            return response()->json([
                'status' => 200, 'msg' => 'ok'
            ], 200);
        } else {
            return response()->json([
                'status' => 503, 'msg' => 'No se puedo actualizar el registro'
            ], 503);
        }
    }
}
