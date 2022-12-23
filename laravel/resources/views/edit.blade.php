@extends('head')

<link rel="stylesheet" href="./css/forms.css">

<div class="form">
    <form action={{route('update', [$get[0]->id])}} method="POST">
        @method('put')
        @csrf
        <input type="text" class="input" value="{{$get[0]->modelo}}" name="modelo">
        <input type="text" class="input" value="{{$get[0]->marca}}" name="marca">
        <input type="text" class="input" value="{{$get[0]->versao}}" name="versao">
        <input type="text" class="input" value="{{$get[0]->placa}}" name="placa">
        <button class="button">editar</button>
    </form>
</div>

<script src="./js/forms.js"></script>