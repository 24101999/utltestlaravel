<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Isset_;

class Homecontroller extends Controller
{
    public function index($id)
    {


        if ($id == '') {
            return \redirect('/');
        }

        return \view('home', ['id' => $id]);
    }
    public function api()
    {
        header("Access-Control-Allow-Headers: Authorization, Content-Type");
        header("Access-Control-Allow-Origin: *");
        header('content-type: application/json; charset=utf-8');

        $get = DB::table('user')->get();

        print_r(\json_encode($get));
    }
    public function apidados()
    {
        header("Access-Control-Allow-Headers: Authorization, Content-Type");
        header("Access-Control-Allow-Origin: *");
        header('content-type: application/json; charset=utf-8');

        $get = DB::table('veiculos')->leftJoin('manutencao', 'manutencao.placa', '=', 'veiculos.placa')->select('veiculos.marca', 'veiculos.modelo', 'veiculos.versao', 'veiculos.nome', 'manutencao.data', 'veiculos.placa', 'manutencao.placa')->get();



        print_r(\json_encode($get));
    }
}