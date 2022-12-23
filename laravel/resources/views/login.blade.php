@extends('head')

<link rel="stylesheet" href="./css/forms.css">

<div class="form">
<h1>LOGIN</h1>

    <form method="POST">
        @csrf
<input type="email" required class="input" name="email" placeholder="E-mail">
<input type="password" required class="input" name="senha" placeholder="Senha">
<button class="button" >Login</button>
    </form>
    <div class="links">
        <a href="/cadastro">Cadastre-se</a>
        <a href="/veiculos">Cadastre seu veiculo</a>
    </div>
</div>

<script src="./js/forms.js"></script>