<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManutencaoController extends Controller
{
    public function index($id)
    {
        $get = DB::table('veiculos')->where('id', $id)->get();

        return \view('infoveiculos', ['id' => $id, 'get' => $get]);
    }

    public function insert($id)
    {
        $get = DB::table('veiculos')->where('id', $id)->get();

        $marca = \filter_input(\INPUT_POST, 'marca');
        $modelo = \filter_input(\INPUT_POST, 'modelo');
        $tipo = \filter_input(\INPUT_POST, 'tipo');
        $valor = \filter_input(\INPUT_POST, 'valor');
        $data = \filter_input(\INPUT_POST, 'data');
        $placa = \filter_input(\INPUT_POST, 'placa');

        if (isset($_POST['button'])) {
            $insert = DB::table('manutencao')->insert(['marca' => $marca, 'modelo' => $modelo, 'tipo' => $tipo, 'valor' => $valor, 'data' => $data, 'placa' => $placa]);

            return \redirect("/info$id");
        }
        return \view('infoveiculos', ['get' => $get, 'id' => $id, 'marca' => $marca, 'modelo' => $modelo, 'tipo' => $tipo, 'valor' => $valor, 'data' => $data, 'placa' => $placa]);
    }
}