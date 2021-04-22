<template>
  <main class="form-signin">
    <form>
      <h1 class="h3 mb-3 fw-normal">Gracias por solicitar su producto</h1>
      <p>Ya pude utilizar tu tarjea virtual</p>
      <img src="/img/tarjeta_frente.jpg">
      <img src="/img/tarjeta_posterior.jpg">
    </form>
  </main>
</template>

<script>
export default {
  name: "Confirmado",
  data() {
    return{
      nombre: sessionStorage.getItem("nombre"),
      cupo: sessionStorage.getItem("cupo"),
    }
  },
  methods: {
    cerrar(){
      
    }

  }
}
</script>

<style scoped>

</style>