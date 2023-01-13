<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            Seguimiento de Trámites Aprobados -
                            <small>Ver</small>
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 p-2">
                        <router-link
                            :to="{ name: 'seguimiento_aprobados.index' }"
                            class="btn btn-primary btn-block btn-flat"
                            ><i class="fa fa-arrow-left"></i>
                            Volver</router-link
                        >
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <tbody style="overflow: auto">
                                                <tr>
                                                    <td
                                                        class="bg-dark font-weight-bold text-white"
                                                        width="120px"
                                                    >
                                                        Código Producto
                                                    </td>
                                                    <td
                                                        class="bg-dark font-weight-bold"
                                                    >
                                                        {{
                                                            oSeguimientoTramite
                                                                .maestro_registro
                                                                .codigo_producto
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Responsable
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.responsable
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Tipo de trámite
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.tipo_tramite
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Fecha de ingreso
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.fecha_ingreso &&
                                                            oSeguimientoTramite.fecha_ingreso !=
                                                                "0000-00-00"
                                                                ? formatoFecha(
                                                                      oSeguimientoTramite.fecha_ingreso
                                                                  )
                                                                : ""
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Código MISA
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.codigo_misa
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Hoja de ruta
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.hoja_ruta
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        colspan="2"
                                                        class="text-center text-md font-weight-bold bg-primary"
                                                    >
                                                        Estado
                                                        MISA-AGEMED(Observaciones)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Estado observaciones
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.ameged_estado
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Fecha observación
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.ameged_fecha &&
                                                            oSeguimientoTramite.ameged_fecha !=
                                                                "0000-00-00"
                                                                ? formatoFecha(
                                                                      oSeguimientoTramite.ameged_fecha
                                                                  )
                                                                : ""
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        colspan="2"
                                                        class="text-center text-md font-weight-bold bg-primary"
                                                    >
                                                        Estado
                                                        MISA-MEGALABS(Subsanaciones)
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Estado
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.megalabs_estado
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Fecha presentación
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.megalabs_fecha &&
                                                            oSeguimientoTramite.megalabs_fecha !=
                                                                "0000-00-00"
                                                                ? formatoFecha(
                                                                      oSeguimientoTramite.megalabs_fecha
                                                                  )
                                                                : ""
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        colspan="2"
                                                        class="text-center text-md font-weight-bold bg-primary"
                                                    >
                                                        Registros Sanitarios
                                                        Aprobados
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Fecha de aprobación
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.rs_fecha_aprobacion &&
                                                            oSeguimientoTramite.rs_fecha_aprobacion !=
                                                                "0000-00-00"
                                                                ? formatoFecha(
                                                                      oSeguimientoTramite.rs_fecha_aprobacion
                                                                  )
                                                                : ""
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Nro. de registro
                                                        sanitario
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.rs_nro_registro
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Fecha de recojo
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.rs_fecha_recojo &&
                                                            oSeguimientoTramite.rs_fecha_recojo !=
                                                                "0000-00-00"
                                                                ? formatoFecha(
                                                                      oSeguimientoTramite.rs_fecha_recojo
                                                                  )
                                                                : ""
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        colspan="2"
                                                        class="text-center text-md font-weight-bold bg-primary"
                                                    >
                                                        CPP
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Estado
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.cpp_estado
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Carta de compromiso
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.cpp_carta
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Cite
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.cpp_cite
                                                        }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td
                                                        colspan="2"
                                                        class="text-center text-md font-weight-bold bg-primary"
                                                    >
                                                        Muestra
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Estado
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.muestra_estado
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Carta de compromiso
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.muestra_carta
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Cite
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.muestra_cite
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        colspan="2"
                                                        class="text-center text-md font-weight-bold bg-primary"
                                                    >
                                                        Desplegados
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Estado
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.desplegado_estado
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Carta de compromiso
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.desplegado_carta
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Cite
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.desplegado_cite
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        colspan="2"
                                                        class="text-center text-md font-weight-bold bg-primary"
                                                    >
                                                        GMP
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Estado
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.gmp_estado
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Carta de compromiso
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.gmp_carta
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Cite
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.gmp_cite
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        colspan="2"
                                                        class="text-center text-md font-weight-bold bg-primary"
                                                    >
                                                        Representación legal
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Estado
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.rl_estado
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Carta de compromiso
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.rl_carta
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Cite
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.rl_cite
                                                        }}
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td
                                                        colspan="2"
                                                        class="text-center text-md font-weight-bold bg-primary"
                                                    >
                                                        Estado Aprobación
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Fecha de Aprobación
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.fecha_aprobacion &&
                                                            oSeguimientoTramite.fecha_aprobacion !=
                                                                "0000-00-00"
                                                                ? formatoFecha(
                                                                      oSeguimientoTramite.fecha_aprobacion
                                                                  )
                                                                : ""
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Estado Final
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.estado_final
                                                        }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        class="gray font-weight-bold"
                                                    >
                                                        Observación
                                                    </td>
                                                    <td>
                                                        {{
                                                            oSeguimientoTramite.observacion
                                                        }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
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
        formatoFecha(date) {
            return this.$moment(String(date)).format("DD/MM/YYYY");
        },
    },
};
</script>

<style></style>
