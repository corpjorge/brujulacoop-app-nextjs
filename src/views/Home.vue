<template>
  <main class="form-signin">
    <form>
      <h1 class="h3 mb-3 fw-normal">Desea solicitar tarjeta virtual</h1>
      <p>Hola: {{nombre}}</p>
      <p>Su cupo es de: {{cupo}}</p>
      <template v-if="cupo != '0'" >
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background: #ff6e07; border-color: #ff6e07;">
          Aceptar condiciones y solicitar producto
        </button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Doy mi consentimiento expreso e irrevocable a BANCO W y/o VIRTUAL  CREDIT
                para consultar y reportar en cualquier tiempo en las centrales de información crediticia y demás entidades que manejen
                base de datos con los mismos fines, sobre mis relaciones comerciales y toda la información relevante para conocer mi desempeño como deudor,
                mi capacidad de pago o para valorar el riesgo futuro de concederme un cupo de crédito rotativo de conformidad con lo establecido en el artículo 6
                de la ley 1581 de 2012. Además, autorizo para que se tome y conserve en los archivos de la empresa mis documentos de identificación.
                Así mismo autorizo para que en caso de presentar mora en el pago de la obligación me realicen la notificación previa señalada en el artículo
                12 de la misma ley. Igualmente autorizo al acreedor para que en caso de presentar mora en el pago de la obligación me efectúe notificación previa
                al reporte negativo y las comunicaciones de cobranza pertinentes, vía telefónica, impresa o electrónica a través de mensajes de datos SMS,
                MMS o correo electrónico, según legislación vigente.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @click="enviar" >Aceptar</button>
              </div>
            </div>
          </div>
        </div>
    </template>
    <template v-else >
      Lo sentimos no tiene cupo para solicitar su tarjeta
    </template>
    </form>
  </main>

</template>

<script>
export default {
  name: "Home",
  data() {
    return{
      nombre: sessionStorage.getItem("nombre"),
      cupo: sessionStorage.getItem("cupo"),
    }
  },
  methods: {
    enviar(){
      return this.$router.push({ name: 'Confirmado' })
    }

  }
}
</script>

<style scoped>

</style>