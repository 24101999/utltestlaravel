@extends('head')

<link rel="stylesheet" href="./css/forms.css">

<div class="form">
<h1>CADASTRO</h1>

    <form method="POST">
        @csrf
<input type="text" required class="input" name="nome" placeholder="nome">
<input type="email" required class="input" name="email" placeholder="E-mail">
<input type="password" required class="input" name="senha" placeholder="Senha">
<button class="button" >Cadastro</button>
    </form>
</div>

<script src="./js/forms.js"></script>

