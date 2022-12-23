@extends('head')

<link rel="stylesheet" href="./css/home.css">

<div id="app">
  <div class="manutencoes">
    <div class=""><h1>@{{msg}}</h1></div>
    <div class="dados" v-for="dado in dados" key="dado">
      <div v-if="dados[id -1].data < data && dados[id -1].data > menosdata ">
        <li>@{{dados[id -1].marca}}</li>
        <li>@{{dados[id -1].modelo}}</li>
        <li>@{{dados[id -1].versao}}</li>
        <li>@{{dados[id -1].nome}}</li>
        <li>@{{dados[id -1].data}}</li>
      </div>
    </div>
</div>
  </div>

<script type="module">

    import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'
    
    createApp({
      data() {
        return {
          id:{{$id}},
          msg: 'Manutençoes',
          dados:[],
          data:"",
          menosdata:""
        }
      },
      methods: {
        get(){
          const th = this
            axios.get('/dados').then((res)=>{
                th.dados = res.data
            })
        },
        time(){
          const date = new Date()
  
          const dia  = String(date.getDate()).padStart(2, '0')
          const dias  = String(date.getDate() + 7).padStart(2, '0')
          const menosdias  = String(date.getDate() - 7).padStart(2, '0')

          const mes = String(date.getMonth() + 1).padStart(2, '0')

          let menoslimite = menosdias+'/'+mes
          let limite = dias+'/'+mes
          
          this.data = limite
          this.menosdata = menoslimite

        },
      },
      mounted() {
        this.get()
        this.time()
      },
    }).mount('#app')
  </script>