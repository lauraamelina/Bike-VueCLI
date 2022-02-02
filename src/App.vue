<template>
  <v-app>
    <v-navigation-drawer
        v-model="drawer"
        app>
      <v-list>
        <v-list-item links
                     v-for="lista in menu"
                     :key="lista.nombre"
                     :to="lista.path">
          <v-list-item-action>
            <v-icon>mdi-{{lista.icono }}</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title> {{ lista.nombre }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-app-bar
      app
      color="primary"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Velobike</v-toolbar-title>
    </v-app-bar>

    <v-main>
      <v-container fluid>
        <transition mode="out-in" enter-active-class="animate__animated animate__fadeInLeft">
          <router-view></router-view>
        </transition>

      </v-container>

    </v-main>

    <v-footer padless class="accent">
      <v-col
          class="text-center"
          cols="12"
      >
        <p class="footer"> Escuela Da Vinci 2021 — <strong>ADM</strong></p>

      </v-col>
    </v-footer>


  </v-app>
</template>

<script>

export default {
  name: 'App',

  data: () => ({
    menu:[
      {
        nombre: 'Home',
        icono: 'home',
        path:'/'
      },
      {
        nombre: 'Ingresar',
        icono:'book-open-blank-variant',
        path:'/ingresar'
      },
      {
        nombre:'Recorridos',
        icono:'bicycle',
        path:'/recorrido'
      },
      {
        nombre: 'Retos',
        icono: 'check',
        path:'/retos'
      },
    ],
    drawer: null,
    recorridos:[],
  }),

mounted(){
  fetch("https://apivelobike.000webhostapp.com/api.php")
      .then(response => response.json())
      .then(response => {
        this.recorridos = response;
        localStorage.setItem("recorridos",JSON.stringify(this.recorridos))
      })
      .catch( err => console.error('Hubo un error al hacer el Fetch: ' + err));



}
};
</script>
<style>
.footer {
  color: white;
  margin-bottom: 0 !important;
}
</style>