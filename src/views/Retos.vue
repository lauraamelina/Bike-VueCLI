<template>
  <div>
    <h1>Retos</h1>
    <lista-retos
        :retos="this.retos">
    </lista-retos>

   


  </div>


</template>

<script>

import ListaRetos from '../components/Lista-Retos.vue';

export default {
  name: "Retos",
  components: {
    ListaRetos,
  },

  data: function() {
    return {
      retos: [
        {nombre: 'Registrar un recorrido ', dificultad: 'baja',  },
        {nombre: 'Registra una misma actividad durante 2 dias seguidos ', dificultad: 'baja', },
        {nombre: 'Hacer más de 100 km en una semana '  , dificultad: 'baja', },
        {nombre: 'Hacer 70 km en 2 horas ', dificultad: 'media', },
        {nombre: 'Registra 20 recorridos ', dificultad: 'alta', },
        {nombre: 'Registra 3 recorridos en montaña ', dificultad: 'alta', },
        {nombre: 'Registra 4 recorridos a lo largo de una semana ', dificultad: 'alta', },
      ],
      
      

    }
  },

}

</script>

<style>
div {
  text-align: center;
}

</style>