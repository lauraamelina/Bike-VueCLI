<template>
  <div class="formulario">

    <h1> Ingresar recorridos </h1>
    <v-form @submit.prevent="guardar">

      <v-text-field
          v-model="data.nombre"
          label="Nombre"
          type="text"
      ></v-text-field>
      <v-text-field
          v-model="data.distancia"
          label="Distancia en km"
          type="number"
          min="1"
      ></v-text-field>
      <v-text-field
          v-model="data.duracion"
          label="Duración en minutos"
          type="number"
          min="1"
      ></v-text-field>

      <v-select
          v-model="data.ambito"
          :items="data.select"
          label="Ámbito"
          data-vv-name="ambito"
          required

      ></v-select>
      <v-text-field
          v-model="data.dia"
          label="Día"
          type="date"
      ></v-text-field>

      <v-btn
          class="ml-auto mt-4"
          type="submit"
          color="primary"
      >
        Ingresar
      </v-btn>

    </v-form>





    <div v-if="envio === true">
      <div v-if="cantErrores" class="errores">
        <ul>
          <li v-for="error in errores" :key="error"> {{error}} </li>
        </ul>
      </div>

      <div v-else class="envioOk">

        <p> Recorrido registrado </p>

      </div>


    </div>



  </div>
</template>

<script>
export default {
  name: "Ingresar",
  data: function () {
    return {
      data: {
        distancia: null,
        duracion: null,
        select: [{ text: 'Selecione uno', value: null }, 'Ciudad', 'Montaña'],
        ambito: null,
        nombre: "",
        dia: null,
      },
      
      errores: [],
      envio: false,
      array: [],
    }
  },
  computed: {
    cantErrores: function () {
      return this.errores.length;
    }
  },
  methods: {
    guardar: function () {
      this.envio = true;
      this.errores = [];
      if (!this.data.nombre) {
        this.errores.push('El nombre del recorrido es obligatorio')
      }
      if (!this.data.distancia) {
        this.errores.push('La distancia es obligatoria')
      }
      if (!this.data.distancia > 1) {
        this.errores.push('La distancia debe ser mayor a 0')
      }
      if (!this.data.duracion) {
        this.errores.push('La duración es obligatoria')
      }
      if (!this.data.duracion > 1) {
        this.errores.push('La duración debe ser mayor a 0')
      }
      if (this.data.ambito == null) {
        this.errores.push('Debe ingresar un ámbito')
      }
      if (this.data.dia == null) {
        this.errores.push('Debe ingresar una fecha válida')
      }


      if (this.errores.length == 0) {

        var formData = new FormData();

        let nuevoObjeto = {
          nombre: this.data.nombre,
          distancia: this.data.distancia,
          duracion: this.data.duracion,
          ambito: this.data.ambito,
          dia: this.data.dia,
        }



        for (let item in nuevoObjeto){
        formData.append(item, nuevoObjeto[item]);
        }

        fetch('https://apivelobike.000webhostapp.com/api/guardar.php', {
          method: 'POST',
          body: formData,
        })
        .then(response=> response.json())
        .then(response=> {
          this.array = response;
          console.log(this.errores);

           localStorage.setItem("data", JSON.stringify(this.array));
        });

         this.data.nombre = ''
         this.data.distancia = ''
         this.data.duracion = ''
         this.data.ambito = ''
         this.data.dia = ''
      
      }
       
    },
  }
}
</script>

<style>
.formulario {
  width: 80%;
  margin: 2em auto;
}
ul {
  padding-left: 0 !important;
}
.errores {
  color: white;
  width: 100%;
  margin: 1em auto;
  text-align: center;
}
.errores li {
  color: white;
  font-weight: bold;
  border: none;
  padding: 10px;
  margin: .5em auto;
  border-radius: 5px;
  background: #8d1414;
}
.errores li:hover {
  background-color: #e2221f8e;
}
.envioOk {
  border: solid 1px rgb(62, 190, 62);
  background: #18911e;
  width: 100%;
  color: white;
  font-weight: bold;
  text-align: center;
  margin: 1em auto;
  border-radius: 5px;
}
.envioOk p {
  margin: .5em auto;
}
</style>