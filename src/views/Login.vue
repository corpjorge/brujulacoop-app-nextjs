<template>
  <main class="form-signin">
    <form>
      <img src="/img/logo.jpg" style="width: 50%">
      <h1 class="h3 mb-3 fw-normal">Ingresar</h1>
      <div class="form-floating">
        <input type="number" class="form-control" id="cedula" placeholder="Cedula" v-model="cedula">
        <div v-if="error.cedula" style="color: red">
          {{error.cedula}}
        </div>
        <label for="cedula">Cedula</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" v-model="pass">
        <label for="floatingPassword">Contraseña</label>
        <div v-if="error.pass" style="color: red">
          Ingrese su contraseña.
        </div>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="button" @click="entrar" style="background: #ff6e07; border-color: #ff6e07;" >Entrar</button>

      <p class="mt-5 mb-3 text-muted">&copy;2021</p>

      <router-link to="registrarse">Registrarse</router-link> |

    </form>
  </main>
</template>

<script>
export default {
  name: "login",
  data() {
    return{
      cedula: null,
      pass: null,
      error: {}
    }
  },
  methods: {
    entrar(){
      if(!this.cedula){
        return this.error.cedula = ' Ingrese su cedula'
      }
      this.error.cedula = null

      if(!this.pass){
        return this.error.pass = ' Ingrese su contraseña'
      }
      this.error.pass = null

      if(this.cedula == '1000361984'){
        sessionStorage.setItem("nombre", "JAVIER ESTIVEN DIAZ ROJAS");
        sessionStorage.setItem("cupo", "537000");
        return this.$router.push({ name: 'Home' })
      }
      if(this.cedula == '1022986361'){
        sessionStorage.setItem("nombre", "CRISTIAN ALEXANDER BERNAL NARAHONA");
        sessionStorage.setItem("cupo", "1010008");
        return this.$router.push({ name: 'Home' })
      }
      if(this.cedula == '51932298'){
        sessionStorage.setItem("nombre", "MARTHA JANETH ROJAS GONZALEZ");
        sessionStorage.setItem("cupo", "325758");
        return this.$router.push({ name: 'Home' })
      }
      if(this.cedula == '1018504523'){
        sessionStorage.setItem("nombre", "JULIETH ANGELICA DIAZ ROJAS");
        sessionStorage.setItem("cupo", "798235");
        return this.$router.push({ name: 'Home' })
      }
        if(this.cedula == '79806838'){
        sessionStorage.setItem("nombre", "JOSE JAVIER DIAZ LEON");
        sessionStorage.setItem("cupo", "0");
        return this.$router.push({ name: 'Home' })
      }
      if(this.cedula == '1001300872'){
        sessionStorage.setItem("nombre", "KAREN LISETH DIAZ ROJAS");
        sessionStorage.setItem("cupo", "467642");
        return this.$router.push({ name: 'Home' })
      }
      if(this.cedula == '1030641582'){
        sessionStorage.setItem("nombre", "JEIMY GISELLA DIAZ ROJAS");
        sessionStorage.setItem("cupo", "2150489");
        return this.$router.push({ name: 'Home' })
      }
      if(this.cedula == '19865452'){
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

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}


</style>