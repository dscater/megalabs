<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            Seguimiento de Trámites de Rectificación -
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
                            :to="{ name: 'seguimiento_rectificacions.index' }"
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
                                                oSeguimientoRectificacion.maestro_registro_id
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
                                                    errors.responsable,
                                            }"
                                            >Responsable</label
                                        >
                                        <el-input
                                            placeholder="Responsable"
                                            :class="{
                                                'is-invalid':
                                                    errors.responsable,
                                            }"
                                            v-model="
                                                oSeguimientoRectificacion.responsable
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.responsable"
                                            v-text="errors.responsable[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.tipo_tramite,
                                            }"
                                            >Tipo de Trámite*</label
                                        >
                                        <el-select
                                            class="w-100 d-block"
                                            :class="{
                                                'is-invalid':
                                                    errors.tipo_tramite,
                                            }"
                                            v-model="
                                                oSeguimientoRectificacion.tipo_tramite
                                            "
                                        >
                                            <el-option
                                                v-for="(item, index) in [
                                                    'RECTIFICACIÓN',
                                                    'NOTIFICACIÓN',
                                                ]"
                                                :key="index"
                                                :value="item"
                                                :label="item"
                                            ></el-option>
                                        </el-select>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.tipo_tramite"
                                            v-text="errors.tipo_tramite[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.fecha_ingreso,
                                            }"
                                            >Fecha de Ingreso</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            :class="{
                                                'is-invalid':
                                                    errors.fecha_ingreso,
                                            }"
                                            v-model="
                                                oSeguimientoRectificacion.fecha_ingreso
                                            "
                                        />
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.fecha_ingreso"
                                            v-text="errors.fecha_ingreso[0]"
                                        ></span>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.codigo_misa,
                                            }"
                                            >Código MISA (Si corresponde)</label
                                        >
                                        <el-input
                                            placeholder="Tipo de Trámite"
                                            :class="{
                                                'is-invalid':
                                                    errors.codigo_misa,
                                            }"
                                            v-model="
                                                oSeguimientoRectificacion.codigo_misa
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.codigo_misa"
                                            v-text="errors.codigo_misa[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger': errors.hora_ruta,
                                            }"
                                            >Hora de Ruta</label
                                        >
                                        <el-input
                                            placeholder="Hora de Ruta"
                                            :class="{
                                                'is-invalid': errors.hora_ruta,
                                            }"
                                            v-model="
                                                oSeguimientoRectificacion.hora_ruta
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.hora_ruta"
                                            v-text="errors.hora_ruta[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.motivo_rectificacion,
                                            }"
                                            >Motivo de Rectificación -
                                            Notificación</label
                                        >
                                        <el-input
                                            placeholder="Motivo de Rectificación - Notificación"
                                            :class="{
                                                'is-invalid':
                                                    errors.motivo_rectificacion,
                                            }"
                                            v-model="
                                                oSeguimientoRectificacion.motivo_rectificacion
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.motivo_rectificacion"
                                            v-text="
                                                errors.motivo_rectificacion[0]
                                            "
                                        ></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-primary">
                                                <h5>Estado MISA-AGEMED</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div
                                                        class="form-group col-md-4"
                                                    >
                                                        <label
                                                            :class="{
                                                                'text-danger':
                                                                    errors.agemed_estado,
                                                            }"
                                                            >Estado/Observación</label
                                                        >
                                                        <el-input
                                                            placeholder="Estado Observaciones"
                                                            :class="{
                                                                'is-invalid':
                                                                    errors.agemed_estado,
                                                            }"
                                                            v-model="
                                                                oSeguimientoRectificacion.agemed_estado
                                                            "
                                                            clearable
                                                        >
                                                        </el-input>
                                                        <span
                                                            class="error invalid-feedback"
                                                            v-if="
                                                                errors.agemed_estado
                                                            "
                                                            v-text="
                                                                errors
                                                                    .agemed_estado[0]
                                                            "
                                                        ></span>
                                                    </div>
                                                    <div
                                                        class="form-group col-md-4"
                                                    >
                                                        <label
                                                            :class="{
                                                                'text-danger':
                                                                    errors.agemed_fecha,
                                                            }"
                                                            >Fecha
                                                            Observación</label
                                                        >
                                                        <input
                                                            type="date"
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid':
                                                                    errors.agemed_fecha,
                                                            }"
                                                            v-model="
                                                                oSeguimientoRectificacion.agemed_fecha
                                                            "
                                                        />
                                                        <span
                                                            class="error invalid-feedback"
                                                            v-if="
                                                                errors.agemed_fecha
                                                            "
                                                            v-text="
                                                                errors
                                                                    .agemed_fecha[0]
                                                            "
                                                        ></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-primary">
                                                <h5>
                                                    Estado
                                                    MISA-MEGALABS(Subsanaciones)
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div
                                                        class="form-group col-md-4"
                                                    >
                                                        <label
                                                            :class="{
                                                                'text-danger':
                                                                    errors.megalabs_estado,
                                                            }"
                                                            >Estado</label
                                                        >
                                                        <el-input
                                                            placeholder="Estado"
                                                            :class="{
                                                                'is-invalid':
                                                                    errors.megalabs_estado,
                                                            }"
                                                            v-model="
                                                                oSeguimientoRectificacion.megalabs_estado
                                                            "
                                                            clearable
                                                        >
                                                        </el-input>
                                                        <span
                                                            class="error invalid-feedback"
                                                            v-if="
                                                                errors.megalabs_estado
                                                            "
                                                            v-text="
                                                                errors
                                                                    .megalabs_estado[0]
                                                            "
                                                        ></span>
                                                    </div>
                                                    <div
                                                        class="form-group col-md-4"
                                                    >
                                                        <label
                                                            :class="{
                                                                'text-danger':
                                                                    errors.megalabs_fecha,
                                                            }"
                                                            >Fecha
                                                            Presentación</label
                                                        >
                                                        <input
                                                            type="date"
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid':
                                                                    errors.megalabs_fecha,
                                                            }"
                                                            v-model="
                                                                oSeguimientoRectificacion.megalabs_fecha
                                                            "
                                                        />
                                                        <span
                                                            class="error invalid-feedback"
                                                            v-if="
                                                                errors.megalabs_fecha
                                                            "
                                                            v-text="
                                                                errors
                                                                    .megalabs_fecha[0]
                                                            "
                                                        ></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-primary">
                                                <h5>
                                                    Registros Sanitarios
                                                    Aprobados
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div
                                                        class="form-group col-md-4"
                                                    >
                                                        <label
                                                            :class="{
                                                                'text-danger':
                                                                    errors.rs_fecha,
                                                            }"
                                                            >Fecha de
                                                            Aprobación</label
                                                        >
                                                        <input
                                                            type="date"
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid':
                                                                    errors.rs_fecha,
                                                            }"
                                                            v-model="
                                                                oSeguimientoRectificacion.rs_fecha
                                                            "
                                                        />
                                                        <span
                                                            class="error invalid-feedback"
                                                            v-if="
                                                                errors.rs_fecha
                                                            "
                                                            v-text="
                                                                errors
                                                                    .rs_fecha[0]
                                                            "
                                                        ></span>
                                                    </div>
                                                    <div
                                                        class="form-group col-md-4"
                                                    >
                                                        <label
                                                            :class="{
                                                                'text-danger':
                                                                    errors.rs_nro_registro,
                                                            }"
                                                            >Nro. de Registro
                                                            Sanitario</label
                                                        >
                                                        <el-input
                                                            placeholder="Nro. de Registro Sanitario"
                                                            :class="{
                                                                'is-invalid':
                                                                    errors.rs_nro_registro,
                                                            }"
                                                            v-model="
                                                                oSeguimientoRectificacion.rs_nro_registro
                                                            "
                                                            clearable
                                                        >
                                                        </el-input>
                                                        <span
                                                            class="error invalid-feedback"
                                                            v-if="
                                                                errors.rs_nro_registro
                                                            "
                                                            v-text="
                                                                errors
                                                                    .rs_nro_registro[0]
                                                            "
                                                        ></span>
                                                    </div>
                                                    <div
                                                        class="form-group col-md-4"
                                                    >
                                                        <label
                                                            :class="{
                                                                'text-danger':
                                                                    errors.rs_fecha_recojo,
                                                            }"
                                                            >Fecha de
                                                            Recojo</label
                                                        >
                                                        <input
                                                            type="date"
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid':
                                                                    errors.rs_fecha_recojo,
                                                            }"
                                                            v-model="
                                                                oSeguimientoRectificacion.rs_fecha_recojo
                                                            "
                                                        />
                                                        <span
                                                            class="error invalid-feedback"
                                                            v-if="
                                                                errors.rs_fecha_recojo
                                                            "
                                                            v-text="
                                                                errors
                                                                    .rs_fecha_recojo[0]
                                                            "
                                                        ></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
            oSeguimientoRectificacion: {
                maestro_registro_id: "",
                responsable: "",
                tipo_tramite: "",
                fecha_ingreso: "",
                codigo_misa: "",
                hoja_ruta: "",
                motivo_rectificacion: "",
                agemed_estado: "",
                agemed_observacion: "",
                agemed_fecha: "",
                megalabs_estado: "",
                megalabs_fecha: "",
                rs_fecha: "",
                rs_nro_registro: "",
                rs_fecha_recojo: "",
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
                let url = "/admin/seguimiento_rectificacions";

                let formdata = new FormData();
                formdata.append("maestro_registro_id",this.oSeguimientoRectificacion.maestro_registro_id? this.oSeguimientoRectificacion.maestro_registro_id: "");
                formdata.append("responsable",this.oSeguimientoRectificacion.responsable? this.oSeguimientoRectificacion.responsable: "");
                formdata.append("tipo_tramite",this.oSeguimientoRectificacion.tipo_tramite? this.oSeguimientoRectificacion.tipo_tramite: "");
                formdata.append("fecha_ingreso",this.oSeguimientoRectificacion.fecha_ingreso? this.oSeguimientoRectificacion.fecha_ingreso: "");
                formdata.append("codigo_misa",this.oSeguimientoRectificacion.codigo_misa? this.oSeguimientoRectificacion.codigo_misa: "");
                formdata.append("hoja_ruta",this.oSeguimientoRectificacion.hoja_ruta? this.oSeguimientoRectificacion.hoja_ruta: "");
                formdata.append("motivo_rectificacion",this.oSeguimientoRectificacion.motivo_rectificacion? this.oSeguimientoRectificacion.motivo_rectificacion: "");
                formdata.append("agemed_estado",this.oSeguimientoRectificacion.agemed_estado? this.oSeguimientoRectificacion.agemed_estado: "");
                formdata.append("agemed_observacion",this.oSeguimientoRectificacion.agemed_observacion? this.oSeguimientoRectificacion.agemed_observacion: "");
                formdata.append("agemed_fecha",this.oSeguimientoRectificacion.agemed_fecha? this.oSeguimientoRectificacion.agemed_fecha: "");
                formdata.append("megalabs_estado",this.oSeguimientoRectificacion.megalabs_estado? this.oSeguimientoRectificacion.megalabs_estado: "");
                formdata.append("megalabs_fecha",this.oSeguimientoRectificacion.megalabs_fecha? this.oSeguimientoRectificacion.megalabs_fecha: "");
                formdata.append("rs_fecha",this.oSeguimientoRectificacion.rs_fecha? this.oSeguimientoRectificacion.rs_fecha: "");
                formdata.append("rs_nro_registro",this.oSeguimientoRectificacion.rs_nro_registro? this.oSeguimientoRectificacion.rs_nro_registro: "");
                formdata.append("rs_fecha_recojo",this.oSeguimientoRectificacion.rs_fecha_recojo? this.oSeguimientoRectificacion.rs_fecha_recojo: "");

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
                            name: "seguimiento_rectificacions.index",
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
            this.oSeguimientoRectificacion[key] = e.target.files[0];
            console.log(e);
            console.log(this.oSeguimientoRectificacion[key]);
        },
    },
};
</script>

<style></style>
