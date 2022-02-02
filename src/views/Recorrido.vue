<template>
  <div class="contenedor">
    <h1> Mis recorridos </h1>
     
          <show-recorridos
          :array="this.array"
          @borrar-recorrido="borrar"
          >
          </show-recorridos>
  </div>
</template>

<script>

import ShowRecorridos from '../components/Show-Recorridos.vue';

export default {
  name: "Recorrido",
  components: {
    ShowRecorridos,
  },

  data: function() {
    return {
      array: [],

    }
  },
  mounted: function() {
    fetch("https://apivelobike.000webhostapp.com/api/todos.php")
          .then(res => res.json())
          .then(res => {
            this.array = res;          
            localStorage.setItem("data",JSON.stringify(this.array))
         
          })
          .catch( error => console.error('Hubo un error: ' + error),
            this.array=JSON.parse(localStorage.getItem("data"))  
          )
          
  },

  methods: {
    
    borrar(x) {
      
      var id = new FormData();
      id.append('id', x);
      console.log(x);
      
      
      let eliminar = confirm( `¿Deseas eliminar este recorrido?`);
      if (eliminar) {
        fetch('https://apivelobike.000webhostapp.com/api/eliminar.php', {
          method: 'POST',
          body: id
        })
        .then(res=> res.json())
        .then(res=> {
          console.log(res);
          this.array = res;

           localStorage.setItem("data", JSON.stringify(this.array));
        })
        .catch( error => console.log('Hubo un error: ' + error),
         
        );
       
      }
    }
  }
}

</script>

<style>

.contenedor h1 {
  margin-bottom: 1em;
}



</style>