<template>
  <v-container>
   
      <v-list two-line>
      <v-list-item-group
        v-model="selected"
        active-class="orange--text"
        multiple
      >
        <template v-for="(item, index) in retos">
          <v-list-item :key="item.nombre" @click="toggle(index)">
            <template v-slot:default="{ active }">
              <v-list-item-content>
                <v-list-item-title v-text="item.nombre"></v-list-item-title>

                <v-list-item-subtitle
                  class="text--primary"
                  v-text="item.headline"
                ></v-list-item-subtitle>

                <v-list-item-subtitle> Dificultad: {{item.dificultad}} </v-list-item-subtitle>
              </v-list-item-content>

              <v-list-item-action>

                <v-icon
                  v-if="!active"
                  color="grey lighten-1"
                >
                  mdi-star-outline
                </v-icon>

                <v-icon
                  v-else
                  color="yellow darken-3"
                >
                  mdi-star
                </v-icon>
              </v-list-item-action>
            </template>
          </v-list-item>

          <v-divider
            v-if="index < retos.length - 1"
            :key="index"
          ></v-divider>
        </template>
      </v-list-item-group>
    </v-list>

  </v-container>
</template>



<script>

export default {
  name: 'Lista-Retos',
  props: ['retos'],
  data: function() {
    return {
      selected: [],
      cumplidos: [],
    }
  },
  
  mounted() {
    if (!localStorage.retos) {
        localStorage.setItem("retos", JSON.stringify(this.selected));
    } else {
      this.selected = JSON.parse(localStorage.getItem("retos"));
      this.cumplidos = JSON.parse(localStorage.getItem("retos"));
    }
    
},

methods: {

  toggle(index) {
    if (this.cumplidos.indexOf(index) === -1) {
      this.cumplidos.push(index);
      //console.log('Se agrego el index ' + index + '  -  Cumplidos: ' +  this.cumplidos);
    } else if (this.cumplidos.indexOf(index) > -1) {
      this.cumplidos = this.cumplidos.filter(function(item) {
      return item !== index
      });
      //console.log('Se quito el index ' + index + '  -  Cumplidos: ' +  this.cumplidos);  
    
    }

  },

  actualizarLocalStorage() {
    this.cumplidos = localStorage.setItem("retos", JSON.stringify(this.cumplidos));

  }
},

beforeDestroy() {
  this.actualizarLocalStorage();

}




}

</script>

