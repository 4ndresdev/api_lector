<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Acreditaciones_model extends Model
{
    public static function get_by_placa($placa = '')
    {
        return DB::table('acreditaciones as a')
            ->select('a.nombre', 'a.id_acreditacion', 'a.fecha_fin as vigencia', 'a.folio_expediente', 'ea.descripcion as estatus', 'a.placa', 'tc.desc_corta as descripcion')
            ->join('cat_estatus_acreditaciones as ea', 'ea.estatus', '=', 'a.estatus_acreditacion')
            ->join('tipo_acreditaciones as tc', 'tc.tipo_acreditacion', '=', 'a.tipo_acreditacion')
            ->where('a.placa', $placa)
            ->first();
    }

    public static function get_all()
    {
        return DB::table('acreditaciones as a')
            ->select('a.nombre', 'a.id_acreditacion', 'a.placa2', 'a.placa3', 'a.fecha_fin as vigencia', 'a.folio_expediente', 'ea.descripcion as estatus', 'a.placa', 'tc.desc_corta as descripcion', 'a.nuevo')
            ->join('cat_estatus_acreditaciones as ea', 'ea.estatus', '=', 'a.estatus_acreditacion')
            ->join('tipo_acreditaciones as tc', 'tc.tipo_acreditacion', '=', 'a.tipo_acreditacion')
            ->orderBy('a.id_acreditacion', 'desc')
            ->where('a.nuevo', 1)
            ->orWhere('a.nuevo', 2)
            ->get();
    }

    public static function change($id_acreditacion)
    {
        return DB::table('acreditaciones')
            ->where('id_acreditacion', $id_acreditacion)
            ->update(['nuevo' => 3]);
    }
}
