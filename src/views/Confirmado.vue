<template>
  <main class="form-signin">
    <form>
      <h1 class="h3 mb-3 fw-normal">Gracias por solicitar su producto</h1>
      <div v-if="completado" class="alert alert-success" role="alert">
        Avance realizado correctamente
      </div>
      <p>Tu cupo es de: {{cupo}}</p>
      <img src="/img/tarjeta_frente.jpg">
      <img src="/img/tarjeta_posterior.jpg">
      <br><br>
      <button class="w-100 btn btn-lg btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background: #ff6e07; border-color: #ff6e07;width:85%!important" >Solicitar avance</button>
      <br><br>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Avances</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

              <div class="form-floating">
                <input type="number" class="form-control" id="cantidad" placeholder="$ 000" v-model="cantidad" min="1" @change="validar">
                <div v-if="error.cantidad" style="color: red">
                  {{error.cantidad}}
                </div>
                <label for="cantidad">Cantidad $</label>
              </div>
              <div class="form-floating">
                <input type="number" class="form-control" id="cuotas" placeholder="" v-model="cuotas" min="0" max="25">
                <label for="cuotas">Numero de cuotas</label>
                <div v-if="error.cuotas" style="color: red">
                  Ingrese su contraseña.
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal" :disabled='isDisabled' @click="avances" >Aceptar</button>
            </div>
          </div>
        </div>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="button" style="background: #ff6e07; border-color: #ff6e07;width:85%!important" >Recargas</button>
      <br><br>
      <button class="w-100 btn btn-lg btn-primary" type="button" style="background: #ff6e07; border-color: #ff6e07;width:85%!important" >Pagos</button>
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
      error: {},
      cantidad: null,
      cuotas: null,
      isDisabled: true,
      completado: null
    }
  },
  methods: {
    avances(){

      if (Number(this.cupo) < Number(this.cantidad)){
        this.isDisabled = true;
        return this.error.cantidad = 'No puede exceder la cantidad de su cupo'
      }
      this.error.cantidad = null
      this.cupo = this.cupo - this.cantidad
      this.completado = true;
      window.scrollTo( 10, 10 );
      return sessionStorage.setItem("cupo", this.cupo);
    },
    validar(){
      if (Number(this.cupo) < Number(this.cantidad)){
        this.isDisabled = true;
        return this.error.cantidad = 'No puede exceder la cantidad de su cupo'
      }
      this.error.cantidad = null
      return this.isDisabled = false;
    }

  }
}
</script>

<style scoped>

</style>