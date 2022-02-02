  <template>
  <v-container v-if="this.array.length > 0">
    <v-row>
      <v-col cols="12" md="4"  v-for="(x,index) in array" :key="index"
      >
        <v-card
            
            :class="[x.ambito=='Ciudad'?'ciudad':'montania']"
        >
          <v-card-text>
            <div>{{x.dia}}</div>
            <p class="text-h4 text--primary">
              {{x.nombre}}
            </p>
            <p>{{x.ambito}}</p>


            <div class="text--primary">
              {{x.distancia}} km<br>
              {{x.duracion}} minutos
            </div>
          </v-card-text>
          <v-card-actions class="px-3 pb-3">
            <v-flex text-xs-left>

              <v-btn
                  text
                  color="error"
                  @click="borrar(x.id)">
                Borrar
              </v-btn>
            </v-flex>
            <v-flex text-xs-right>
              <v-btn
                  text
                  color="primary">
                <v-icon left>
                  mdi-pencil
                </v-icon>
                <router-link :to="'/editar/' + x.id"  class="editar"> Editar </router-link>

              </v-btn>
            </v-flex>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-container>


  <div v-else class="sin-datos">
    <p> No hay recorridos registrados todavia </p>
    <v-btn
        text
        color="primary">
      <v-icon left>
        mdi-plus
      </v-icon>
      <router-link to="../ingresar" class="btn">Ingresar</router-link>
    </v-btn>

  </div>


</template>

<script>
export default {
  name: 'Show-Recorridos',
  props: ['array'],

  methods: {
    borrar(index) {
        this.$emit('borrar-recorrido', index)
    },
   

  },
}

</script>

<style>
@media screen and (max-width: 576px) {
  div.col-md-6.col-lg-4.col-12 {
    padding-left: 0 !important;
  }
}

.ciudad {
  background: #fce9dd !important;
}

.montania {
  background: #ecd4c8 !important;}

.sin-datos {
  text-align: center;
  margin: 3em auto;
}

.sin-datos a:hover {
  color: black;
}

.editar {
  text-decoration: none;
}
a {
  text-decoration: none;
}

</style>