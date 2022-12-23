@extends('head')

<link rel="stylesheet" href="./css/veiculos.css">

<div id="app">
    <div class="modal" :class="modal">
        <button class="button-modal" @@click="closed()">X</button>
        <div class="form-veiculo">
            <form method="POST">
                @csrf
                <input type="text" placeholder="marca" name="marca">
                <input type="text" placeholder="modelo" name="modelo">
                <input type="text" placeholder="versao" name="versao">
                <input type="text" placeholder="placa" name="placa">
                <div class="" v-for="dado in dados" key="dado">
                    <input type="radio" placeholder="nome de usuario" name="nome" :value="dado.nome">
                    <label name='nome'>@{{dado.nome}}</label><br>
                </div>
                <button name="button">cadastrar</button>
            </form>
        </div>
    </div>
    <div class="dados-veiculo">
        <button class="bt-cadastro" @@click="open()">Cadastrar Veiculo</button>
        <div class="veiculos-div">
                    <div class="veiculos" v-for="dado in veiculos" key="dado">
                        <div class="">
                            <h2>@{{dado.marca}}</h2>
                            <p>@{{dado.modelo}}</p>
                            <p>@{{dado.versao}}</p>
                            <p>@{{dado.nome}}</p>
                            <p>@{{dado.placa}}</p>
                        </div>
                        <div class="buttons-veiculo">
                            <a :href="edit + dado.id">
                                <button class="bt-editar">Editar</button>
                            </a>
                            <a :href="excluir + dado.id">
                                <button class="bt-deletar">Deletar</button>
                            </a>
                            <a :href="info + dado.id">
                                <button class="bt-info">Fazer Manutenção</button>
                            </a>
                        </div>
                    </div>
        </div>
    </div>

</div>

<script type="module">
    import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
  
    createApp({
      data() {
        return {
          message: 'Hello Vue!',
          dados:'',
          veiculos:'',
          modal:'',
          edit:'edit',
          excluir:"delete",
          info:"info"
        }
      },
      methods: {
        get(){
            const th = this
            axios.get('/api').then((res)=>{
                th.dados = res.data
                console.log(th.dados)
            })
        },
        open(){
            this.modal = 'active'
        },
        closed(){
            this.modal = ''
        },
        getveiculo(){
            const th = this
            axios.get('/apiVeiculo').then((res)=>{
                th.veiculos = res.data
            })
        },
    },
    mounted() {
        this.get()
        this.getveiculo()
    },
    }).mount('#app')
</script>