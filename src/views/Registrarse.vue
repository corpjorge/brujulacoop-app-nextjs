<template>
  <main class="form-signin">
    <form>
      <h1 class="h3 mb-3 fw-normal">Registrarse</h1>
      <div class="form">
        <label for="cedula">Cedula</label>
        <input type="number" class="form-control" id="cedula" placeholder="Cedula" v-model="datos.cedula" @change="validar" style="margin-bottom: 9px;">
        <div v-if="error.cedula" style="color: red">
          {{error.cedula}}
        </div>
      </div>
      <div class="form">
        <label for="floatingPassword">Contraseña</label>
        <input type="password" class="form-control" id="floatingPassword" placeholder="password" v-model="datos.pass" style="margin-bottom: 9px;">
        <div v-if="error.pass" style="color: red">
          {{error.pass}}
        </div>
      </div>
      <div class="form">
        <label for="fecha">Fecha de Expedicion</label>
        <input type="date" class="form-control" id="fecha" placeholder="" v-model="datos.fecha" style="margin-bottom: 9px;">
        <div v-if="error.fecha" style="color: red">
          {{error.fecha}}
        </div>
      </div>
      <div class="form">
        <label for="correo">Correo</label>
        <input type="email" class="form-control" id="correo" placeholder="Correo electronico" v-model="datos.correo" style="margin-bottom: 9px;">
        <div v-if="error.correo" style="color: red">
          {{error.correo}}
        </div>
      </div>
      <div class="form">
        <label for="nombreRf">Nombre referencia personal 1</label>
        <input type="text" class="form-control" id="nombreRf" placeholder="Nombre" v-model="datos.nombreRf" style="margin-bottom: 9px;">
        <div v-if="error.nombreRf" style="color: red">
          {{error.nombreRf}}
        </div>
      </div>

      <div class="form">
        <label for="numRf">Numero de celular</label>
        <input type="text" class="form-control" id="numRf" placeholder="celular" v-model="datos.numRf">
        <div v-if="error.numRf" style="color: red">
          {{error.numRf}}
        </div>
      </div>

      <div class="form">
        <label for="nombreRf2">Nombre referencia personal 2</label>
        <input type="text" class="form-control" id="nombreRf2" placeholder="Nombre" v-model="datos.nombreRf2" style="margin-bottom: 9px;">
        <div v-if="error.nombreRf2" style="color: red">
          {{error.nombreRf2}}
        </div>
      </div>

      <div class="form">
        <label for="numRf2">Numero de celular</label>
        <input type="text" class="form-control" id="numRf2" placeholder="celular" v-model="datos.numRf2">
        <div v-if="error.numRf2" style="color: red">
          {{error.numRf2}}
        </div>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="button" @click="entrar" >Registrarse</button>


    </form>
  </main>

</template>

<script>
export default {
  name: "Registrarse",
  data() {
    return{
      datos: {},
      error: {}
    }
  },
  methods:{
    entrar(){

      if(!this.datos.cedula){
        return this.error.cedula = ' Ingrese su cedula'
      }
      this.error.cedula = null

      if(!this.datos.pass){
        return this.error.pass = ' Ingrese su contraseña'
      }
      this.error.pass = null

      if(this.datos.cedula === '1000361984'){
        if (this.datos.fecha !== '2018-06-16'){
          return this.error.fecha = 'No es su fecha de expedición'
        }
        sessionStorage.setItem("nombre", "JAVIER ESTIVEN DIAZ ROJAS");
        sessionStorage.setItem("cupo", "537000");
        return this.$router.push({ name: 'Home' })
      }
      if(this.datos.cedula === '1022986361'){
        if (this.datos.fecha !== '2014-02-03'){
          return this.error.fecha = 'No es su fecha de expedición'
        }
        sessionStorage.setItem("nombre", "CRISTIAN ALEXANDER BERNAL NARAHONA");
        sessionStorage.setItem("cupo", "1010008");
        return this.$router.push({ name: 'Home' })
      }
      if(this.datos.cedula === '51932298'){
        if (this.datos.fecha !== '2009-12-19'){
          return this.error.fecha = 'No es su fecha de expedición'
        }
        sessionStorage.setItem("nombre", "MARTHA JANETH ROJAS GONZALEZ");
        sessionStorage.setItem("cupo", "325758");
        return this.$router.push({ name: 'Home' })
      }
      if(this.datos.cedula === '1018504523'){
        if (this.datos.fecha !== '1996-07-06'){
          return this.error.fecha = 'No es su fecha de expedición'
        }
        sessionStorage.setItem("nombre", "JULIETH ANGELICA DIAZ ROJAS");
        sessionStorage.setItem("cupo", "798235");
        return this.$router.push({ name: 'Home' })
      }
      if(this.datos.cedula === '79806838'){
        if (this.datos.fecha !== '1989-09-29'){
          return this.error.fecha = 'No es su fecha de expedición'
        }
        sessionStorage.setItem("nombre", "JOSE JAVIER DIAZ LEON");
        sessionStorage.setItem("cupo", "0");
        return this.$router.push({ name: 'Home' })
      }
      if(this.datos.cedula === '1001300872'){
        if (this.datos.fecha !== '2017-05-13'){
          return this.error.fecha = 'No es su fecha de expedición'
        }
        sessionStorage.setItem("nombre", "KAREN LISETH DIAZ ROJAS");
        sessionStorage.setItem("cupo", "467642");
        return this.$router.push({ name: 'Home' })
      }
      if(this.datos.cedula === '1030641582'){
        if (this.datos.fecha !== '1999-01-13'){
          return this.error.fecha = 'No es su fecha de expedición'
        }
        sessionStorage.setItem("nombre", "JEIMY GISELLA DIAZ ROJAS");
        sessionStorage.setItem("cupo", "2150489");
        return this.$router.push({ name: 'Home' })
      }
      if(this.datos.cedula === '19865452'){
        if (this.datos.fecha !== '1999-10-23'){
          return this.error.fecha = 'No es su fecha de expedición'
        }
        sessionStorage.setItem("nombre", "DIEGO ANDRES BERNAL BARAHONA");
        sessionStorage.setItem("cupo", "0");
        return this.$router.push({ name: 'Home' })
      }
      this.error.cedula = null
      return this.error.cedula = 'Cedula no existe'


    }
  }
}
</script>

<style scoped>
html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="text"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}


</style>