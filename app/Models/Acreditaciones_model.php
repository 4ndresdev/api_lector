<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Acreditaciones_model extends Model
{
    public static function get_all($fecha)
    {

        if (empty($fecha)) {
            return DB::table('acreditaciones as a')
                ->select('a.nombre', 'a.id_acreditacion', 'a.fecha_fin as vigencia', 'a.folio_expediente', 'a.placa', 'tc.desc_corta as descripcion', 'a.nuevo', 'a.fecha_registro')
                ->join('tipo_acreditaciones as tc', 'tc.tipo_acreditacion', '=', 'a.tipo_acreditacion')
                ->orderBy('a.fecha_registro', 'asc')
                ->get();
        } else {
            return DB::table('acreditaciones as a')
                ->select('a.nombre', 'a.id_acreditacion', 'a.fecha_fin as vigencia', 'a.folio_expediente', 'a.placa', 'tc.desc_corta as descripcion', 'a.nuevo', 'a.fecha_registro')
                ->join('cat_estatus_acreditaciones as ea', 'ea.estatus', '=', 'a.estatus_acreditacion')
                ->join('tipo_acreditaciones as tc', 'tc.tipo_acreditacion', '=', 'a.tipo_acreditacion')
                ->orderBy('a.fecha_registro', 'asc')
                ->whereRaw("fecha_registro::timestamp > to_timestamp(?, 'YYYY-MM-DD HH24:MI:SS')", [$fecha])
                ->get();
        }
    }
}
