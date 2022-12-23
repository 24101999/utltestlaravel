@extends('head')

<link rel="stylesheet" href="./css/infoveiculos.css">
<link rel="stylesheet" href="./css/forms.css">

<div class="form">
    <h1>Manutenção</h1>
    <form  method="POST">
        @csrf
        <input type="text" class="input" value="{{$get[0]->marca}}" name="marca">
        <input type="text" class="input" value="{{$get[0]->modelo}}" name="modelo">
        <input type="text" class="input" value="{{$get[0]->placa}}" name="placa">
        <input type="text" class="input" placeholder="tipo de manutencao" name="tipo">
        <input type="text" class="input" placeholder="Valor" name="valor">
        <label for="">Data da Manutenção</label>
        <input class="input" type="date" placeholder="Data" name="data">
        <button name="button" class="button">Cadastrar</button>
    </form>
</div>

<script src="./js/forms.js"></script>