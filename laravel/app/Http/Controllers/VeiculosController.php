<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VeiculosController extends Controller
{
    public function index()
    {
        return \view('veiculos');
    }
    public function veiculoapi()
    {
        $get = DB::table('veiculos')->get();

        \print_r(\json_encode($get));
    }
    public function insert()
    {

        $el = \filter_input(\INPUT_GET, 'nome');

        \print_r($el);

        $modelo = \filter_input(\INPUT_POST, 'modelo');
        $marca = \filter_input(\INPUT_POST, 'marca');
        $versao = \filter_input(\INPUT_POST, 'versao');
        $nome = \filter_input(\INPUT_POST, 'nome');
        $placa = \filter_input(\INPUT_POST, 'placa');

        if (isset($_POST['button'])) {
            $insert = DB::table('veiculos')->insert(['modelo' => $modelo, 'marca' => $marca, 'versao' => $versao, 'nome' => $nome, 'placa' => $placa]);
            return \redirect('/veiculos');
        }

        return \view('veiculos', ['modelo' => $modelo, 'marca' => $marca, 'versao' => $versao, 'nome' => $nome, 'el' => $el, 'placa' => $placa]);
    }

    public function edit($id)
    {
        $get = DB::table('veiculos')->where('id', $id)->get();
        $getall = DB::table('veiculos')->get();

        return \view('edit', ['id' => $id, 'get' => $get, 'getall' => $getall]);
    }

    public function update($id)
    {
        $modelo = \filter_input(\INPUT_POST, 'modelo');
        $marca = \filter_input(\INPUT_POST, 'marca');
        $versao = \filter_input(\INPUT_POST, 'versao');
        $placa = \filter_input(\INPUT_POST, 'placa');

        if ($modelo and $marca and $versao) {
            $update = DB::table('veiculos')->where('id', $id)->update(['modelo' => $modelo, 'marca' => $marca, 'versao' => $versao, 'placa' => $placa]);

            return \redirect("/edit$id");

            return \redirect('/edit', ['id' => $id, 'modelo' => $modelo, 'marca' => $marca, 'versao' => $versao, 'placa' => $placa]);
        }
    }
    public function delete($id)
    {
        $delete = DB::table('veiculos')->where('id', $id)->delete();

        return redirect("/veiculos");

        return \view('veiculos');
    }
}