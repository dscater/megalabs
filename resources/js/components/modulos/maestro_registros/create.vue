<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Maestro de Registros - <small>Nuevo</small></h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 p-2">
                        <router-link
                            :to="{ name: 'maestro_registros.index' }"
                            class="btn btn-primary btn-block btn-flat"
                            ><i class="fa fa-arrow-left"></i>
                            Volver</router-link
                        >
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <Formulario
                                    :oMaestroRegistro="oMaestroRegistro"
                                    :accion="accion"
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
import Formulario from "./Formulario";
export default {
    components: {
        Formulario,
    },
    data() {
        return {
            permisos: localStorage.getItem("permisos"),
            loadingWindow: Loading.service({
                fullscreen: this.fullscreenLoading,
            }),
            oMaestroRegistro: {
                institucion: "",
                codigo_producto: "",
                descripcion_figura_rs: "",
                descripcion_sac: "",
                comercializado: "",
                numero_rs: "",
                fecha_emision_rs: "",
                fecha_vencimiento_rs: "",
                estado_sanitario: "",
                actualizacion: "",
                condicion_sanitario: "",
                propiedad_lc: "",
                prioridad: "",
                responsable: "",
                fecha_revision_ab: "",
                fecha_tentativa_agemed: "",
                fecha_respuesta_agemed: "",
                primera_fecha_ro: "",
                segunda_fecha_ro: "",
                fecha_tentativa_p: "",
                fecha_estimada_o_rs2: "",
                comentarios_registro: "",
                comentarios_planificacion: "",
                gdp: "",
                presentacion_comercial: "",
                presentacion_rs: "",
                origen_rs: "",
                fabricante: "",
                para: "",
                bajo_licencia: "",
                fecha_rectificacion: "",
                principio_activo: "",
                concentracion: "",
                forma_farmaceutica_rs: "",
                forma_farmaceutica_amornizada: "",
                formula_cc: "",
                venta_ventanilla: "",
                condicion_venta: "",
                contacto_tecnico: "",
                vida_util: "",
                atq: "",
                condicion_almacenamiento: "",
                linea_estucheria: "",
                fecha_inicio_comercializacion: "",
                producto_licitacion: "",
                registro_sanitario: null,
            },

            accion: "nuevo",
        };
    },
    mounted() {
        this.loadingWindow.close();
    },
    methods: {},
};
</script>

<style></style>
