<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Acreditaciones_model extends Model
{
    public static function get_by_placa($placa = '')
    {
        $result = DB::table('acreditaciones as a')
            ->select('a.nombre', 'a.fecha_fin as vigencia', 'a.folio_expediente', 'ea.descripcion as estatus', 'a.placa', 'tc.desc_corta as descripcion')
            ->join('cat_estatus_acreditaciones as ea', 'ea.estatus', '=', 'a.estatus_acreditacion')
            ->join('tipo_acreditaciones as tc', 'tc.tipo_acreditacion', '=', 'a.tipo_acreditacion')
            ->where('a.placa', $placa)
            ->first();

        return $result;
    }

    public static function get_all()
    {
        $result = DB::table('acreditaciones as a')
            ->select('a.nombre', 'a.fecha_fin as vigencia', 'a.folio_expediente', 'ea.descripcion as estatus', 'a.placa', 'tc.desc_corta as descripcion')
            ->join('cat_estatus_acreditaciones as ea', 'ea.estatus', '=', 'a.estatus_acreditacion')
            ->join('tipo_acreditaciones as tc', 'tc.tipo_acreditacion', '=', 'a.tipo_acreditacion')            
            ->first();

        return $result;
    }
}
