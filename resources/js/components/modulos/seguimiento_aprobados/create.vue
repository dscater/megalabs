<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            Seguimiento de Trámites Aprobados -
                            <small>Nuevo</small>
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
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.maestro_registro_id,
                                            }"
                                            >Seleccionar Producto*</label
                                        >
                                        <el-select
                                            class="w-100 d-block"
                                            :class="{
                                                'is-invalid':
                                                    errors.maestro_registro_id,
                                            }"
                                            v-model="
                                                oSeguimientoAprobado.maestro_registro_id
                                            "
                                        >
                                            <el-option
                                                v-for="item in listMaestroRegistros"
                                                :key="item.id"
                                                :value="item.id"
                                                :label="
                                                    item.codigo_producto +
                                                    '-' +
                                                    item.institucion
                                                "
                                            ></el-option>
                                        </el-select>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.maestro_registro_id"
                                            v-text="
                                                errors.maestro_registro_id[0]
                                            "
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.fecha_aprobacion,
                                            }"
                                            >Fecha de Aprobación*</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            :class="{
                                                'is-invalid':
                                                    errors.fecha_aprobacion,
                                            }"
                                            v-model="
                                                oSeguimientoAprobado.fecha_aprobacion
                                            "
                                        />
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.fecha_aprobacion"
                                            v-text="errors.fecha_aprobacion[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.estado_final,
                                            }"
                                            >Estado Final</label
                                        >
                                        <el-input
                                            placeholder="Estado Final"
                                            :class="{
                                                'is-invalid':
                                                    errors.estado_final,
                                            }"
                                            v-model="
                                                oSeguimientoAprobado.estado_final
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.estado_final"
                                            v-text="errors.estado_final[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger': errors.archivo,
                                            }"
                                            >Cargar Certificación</label
                                        >
                                        <input
                                            type="file"
                                            class="form-control"
                                            :class="{
                                                'is-invalid': errors.archivo,
                                            }"
                                            ref="archivo"
                                            @change="
                                                cargaArchivo('archivo', $event)
                                            "
                                        />
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.archivo"
                                            v-text="errors.archivo[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.observacion,
                                            }"
                                            >Observación</label
                                        >
                                        <el-input
                                            type="textarea"
                                            autosize
                                            placeholder="Observación"
                                            :class="{
                                                'is-invalid':
                                                    errors.observacion,
                                            }"
                                            v-model="
                                                oSeguimientoAprobado.observacion
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.observacion"
                                            v-text="errors.observacion[0]"
                                        ></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <el-button
                                            class="btn btn-primary bg-primary btn-flat"
                                            :loading="enviando"
                                            @click="enviaRegistro()"
                                            ><i class="fa fa-save"></i>
                                            Registrar</el-button
                                        >
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
    data() {
        return {
            permisos: localStorage.getItem("permisos"),
            loadingWindow: Loading.service({
                fullscreen: this.fullscreenLoading,
            }),
            oSeguimientoAprobado: {
                maestro_registro_id: "",
                fecha_aprobacion: "",
                estado_final: "APROBADO",
                archivo: "",
                observacion: "",
            },
            enviando: false,
            errors: [],
            listMaestroRegistros: [],
        };
    },
    mounted() {
        this.getMaestroRegistros();
        this.loadingWindow.close();
    },
    methods: {
        // obtener la lista de maestro de registros
        getMaestroRegistros() {
            axios.get("/admin/maestro_registros").then((response) => {
                this.listMaestroRegistros = response.data.maestro_registros;
            });
        },
        // ENVIAR FORMULARIO
        enviaRegistro() {
            this.enviando = true;
            try {
                let url = "/admin/seguimiento_aprobados";

                let formdata = new FormData();
                formdata.append(
                    "maestro_registro_id",
                    this.oSeguimientoAprobado.maestro_registro_id
                        ? this.oSeguimientoAprobado.maestro_registro_id
                        : ""
                );
                formdata.append(
                    "fecha_aprobacion",
                    this.oSeguimientoAprobado.fecha_aprobacion
                        ? this.oSeguimientoAprobado.fecha_aprobacion
                        : ""
                );
                formdata.append(
                    "estado_final",
                    this.oSeguimientoAprobado.estado_final
                        ? this.oSeguimientoAprobado.estado_final
                        : ""
                );
                formdata.append(
                    "archivo",
                    this.oSeguimientoAprobado.archivo
                        ? this.oSeguimientoAprobado.archivo
                        : ""
                );
                formdata.append(
                    "observacion",
                    this.oSeguimientoAprobado.observacion
                        ? this.oSeguimientoAprobado.observacion
                        : ""
                );

                axios
                    .post(url, formdata)
                    .then((res) => {
                        this.enviando = false;
                        Swal.fire({
                            icon: "success",
                            title: res.data.msj,
                            showConfirmButton: false,
                            timer: 1500,
                        });
                        this.errors = [];
                        this.$router.push({
                            name: "seguimiento_aprobados.index",
                        });
                    })
                    .catch((error) => {
                        this.enviando = false;
                        if (error.response) {
                            if (error.response.status === 422) {
                                this.errors = error.response.data.errors;
                                Swal.fire({
                                    icon: "error",
                                    title: "Tienes errores en el formulario",
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: error,
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                            }
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: error,
                                showConfirmButton: false,
                                timer: 2000,
                            });
                        }
                    });
            } catch (e) {
                this.enviando = false;
                console.log(e);
            }
        },
        cargaArchivo(key, e) {
            this.oSeguimientoAprobado[key] = e.target.files[0];
            console.log(e);
            console.log(this.oSeguimientoAprobado[key]);
        },
    },
};
</script>

<style></style>
