<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            Notas -
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
                            :to="{ name: 'notas.index' }"
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
                                            v-model="oNota.maestro_registro_id"
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
                                                    errors.referencia,
                                            }"
                                            >Referencia*</label
                                        >
                                        <el-input
                                            placeholder="Observación"
                                            :class="{
                                                'is-invalid': errors.referencia,
                                            }"
                                            v-model="oNota.referencia"
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.referencia"
                                            v-text="errors.referencia[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.descripcion,
                                            }"
                                            >Descripción*</label
                                        >
                                        <el-input
                                            type="textarea"
                                            autosize
                                            placeholder="Observación"
                                            :class="{
                                                'is-invalid':
                                                    errors.descripcion,
                                            }"
                                            v-model="oNota.descripcion"
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.descripcion"
                                            v-text="errors.descripcion[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger': errors.archivo,
                                            }"
                                            >Cargar Archivo</label
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
                                                'text-danger': errors.fecha,
                                            }"
                                            >Fecha*</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            :class="{
                                                'is-invalid': errors.fecha,
                                            }"
                                            v-model="oNota.fecha"
                                        />
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.fecha"
                                            v-text="errors.fecha[0]"
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
            oNota: {
                maestro_registro_id: "",
                referencia: "",
                descripcion: "",
                archivo: "",
                fecha: "",
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
                let url = "/admin/notas";

                let formdata = new FormData();
                formdata.append("maestro_registro_id",this.oNota.maestro_registro_id? this.oNota.maestro_registro_id: "");
                formdata.append("referencia",this.oNota.referencia? this.oNota.referencia: "");
                formdata.append("descripcion",this.oNota.descripcion? this.oNota.descripcion: "");
                formdata.append("archivo",this.oNota.archivo? this.oNota.archivo: "");
                formdata.append("fecha",this.oNota.fecha? this.oNota.fecha: "");

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
                            name: "notas.index",
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
            this.oNota[key] = e.target.files[0];
            console.log(e);
            console.log(this.oNota[key]);
        },
    },
};
</script>

<style></style>
