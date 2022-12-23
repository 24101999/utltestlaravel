<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function cadastro()
    {

        $nome = \filter_input(\INPUT_POST, 'nome');
        $email = \filter_input(\INPUT_POST, 'email');
        $senha = \filter_input(\INPUT_POST, 'senha');

        $get = '';
        $no[] = '';
        $em[] = '';
        $se[] = '';

        if ($nome and $senha and $email) {
            $get = DB::table('user')->get();

            foreach ($get as $value) {
                $no[] = $value->nome;
                $em[] = $value->email;
                $se[] = $value->senha;
            }
            if (\in_array($email, $em) || \in_array($senha, $se) || \in_array($nome, $no)) {
                return \redirect('/cadastro');
            }
        }
        if ($nome and $senha and $email) {

            $insert = DB::table('user')->insert(['nome' => $nome, 'email' => $email, 'senha' => $senha]);
            return \redirect('/');
        }
        return \view('cadastro', ['get' => $get, 'nome' => $nome, 'email' => $email, 'senha' => $senha]);
    }

    public function login()
    {

        $em = \filter_input(\INPUT_POST, 'email');
        $se = \filter_input(\INPUT_POST, 'senha');

        if (!isset($_SESSION)) {
            \session_start();
        }

        $_SESSION['email'] = $em;
        $_SESSION['senha'] = $se;


        $get = DB::table('user')->get();

        foreach ($get as $key => $val) {
            $nome[] = $val->nome;
            $email[] = $val->email;
            $senha[] = $val->senha;
            $id = $val->id;
            $valores[] = $val->email . $val->senha . $val->id;


            if (\in_array($em, $email) and \in_array($se, $senha)) {
                return \redirect("/home$id");
            }
        }

        return \view('login', ['get' => $get, 'se' => $se, 'em' => $em]);
    }
}
