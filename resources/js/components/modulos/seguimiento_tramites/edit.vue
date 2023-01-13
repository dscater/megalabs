<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Seguimiento de Trámites - <small>Editar</small></h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 p-2">
                        <router-link
                            :to="{ name: 'seguimiento_tramites.index' }"
                            class="btn btn-primary btn-block btn-flat"
                            ><i class="fa fa-arrow-left"></i>
                            Volver</router-link
                        >
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <Formulario
                                    :oSeguimientoTramite="oSeguimientoTramite"
                                    :accion="'edit'"
                                ></Formulario>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import Formulario from "./Formulario.vue";
export default {
    components: {
        Formulario,
    },
    props: ["id"],
    data() {
        return {
            permisos: localStorage.getItem("permisos"),
            loadingWindow: Loading.service({
                fullscreen: this.fullscreenLoading,
            }),
            oSeguimientoTramite: {
                maestro_registro_id: "",
                responsable: "",
                tipo_tramite: "",
                fecha_ingreso: "",
                codigo_misa: "",
                hoja_ruta: "",
                ameged_estado: "",
                ameged_fecha: "",
                megalabs_estado: "",
                megalabs_fecha: "",
                rs_fecha_aprobacion: "",
                rs_nro_registro: "",
                rs_fecha_recojo: "",
                cpp_estado: "",
                cpp_carta: "",
                cpp_cite: "",
                _cpp_archivo: "",
                muestra_estado: "",
                muestra_carta: "",
                muestra_cite: "",
                _muestra_archivo: "",
                desplegado_estado: "",
                desplegado_carta: "",
                desplegado_cite: "",
                _desplegado_archivo: "",
                gmp_estado: "",
                gmp_carta: "",
                gmp_cite: "",
                _gmp_archivo: "",
                rl_estado: "",
                rl_carta: "",
                rl_cite: "",
                _rl_archivo: "",

                fecha_aprobacion: "",
                estado_final: "",
                archivo_aprobacion: "",
                _archivo_aprobacion: "",
                observacion: "",
            },
        };
    },
    mounted() {
        this.getSeguimientoTramite();
        this.loadingWindow.close();
    },
    methods: {
        getSeguimientoTramite() {
            axios
                .get("/admin/seguimiento_tramites/" + this.id)
                .then((response) => {
                    this.oSeguimientoTramite = response.data;
                });
        },
    },
};
</script>

<style></style>
