<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Seguimiento de Trámites Aprobados</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!-- <div class="card-header">
                                <div class="row">
                                    <div class="col-md-3">
                                        <router-link
                                            :to="{
                                                name: 'seguimiento_aprobados.create',
                                            }"
                                            v-if="
                                                permisos.includes(
                                                    'seguimiento_aprobados.create'
                                                )
                                            "
                                            class="btn btn-outline-primary bg-primary btn-flat btn-block"
                                        >
                                            <i class="fa fa-plus"></i>
                                            Nuevo
                                        </router-link>
                                    </div>
                                </div>
                            </div> -->
                            <div class="card-body">
                                <div class="row">
                                    <b-col lg="6" class="my-1">
                                        <div class="row">
                                            <b-col sm="6" md="3" class="text-md"
                                                >Total:
                                                {{ totalRows }} registros</b-col
                                            >
                                            <b-col sm="6" md="3">
                                                <b-form-select
                                                    align="right"
                                                    id="per-page-select"
                                                    v-model="perPage"
                                                    :options="pageOptions"
                                                    size="sm"
                                                ></b-form-select>
                                            </b-col>
                                            <b-col
                                                sm="6"
                                                md="6"
                                                class="mr-auto"
                                                v-if="perPage"
                                            >
                                                <b-pagination
                                                    v-model="currentPage"
                                                    :total-rows="totalRows"
                                                    :per-page="perPage"
                                                    align="left"
                                                ></b-pagination>
                                            </b-col>
                                        </div>
                                    </b-col>
                                    <b-col lg="6" class="my-1">
                                        <b-form-group
                                            label="Buscar"
                                            label-for="filter-input"
                                            label-cols-sm="3"
                                            label-align-sm="right"
                                            label-size="sm"
                                            class="mb-0"
                                        >
                                            <b-input-group size="sm">
                                                <b-form-input
                                                    id="filter-input"
                                                    v-model="filter"
                                                    type="search"
                                                    placeholder="Buscar"
                                                ></b-form-input>

                                                <b-input-group-append>
                                                    <b-button
                                                        class="bg-primary"
                                                        variant="primary"
                                                        :disabled="!filter"
                                                        @click="filter = ''"
                                                        >Borrar</b-button
                                                    >
                                                </b-input-group-append>
                                            </b-input-group>
                                        </b-form-group>
                                    </b-col>
                                    <div class="col-md-12">
                                        <b-overlay
                                            :show="showOverlay"
                                            rounded="sm"
                                        >
                                            <b-table
                                                :fields="fields"
                                                :items="listRegistros"
                                                show-empty
                                                stacked="md"
                                                responsive
                                                :current-page="currentPage"
                                                :per-page="perPage"
                                                @filtered="onFiltered"
                                                empty-text="Sin resultados"
                                                empty-filtered-text="Sin resultados"
                                                :filter="filter"
                                                :tbody-tr-class="rowClass"
                                            >
                                                <template
                                                    #cell(maestro_registro)="row"
                                                >
                                                    {{
                                                        row.item
                                                            .maestro_registro
                                                            .codigo_producto
                                                    }}
                                                    -
                                                    {{
                                                        row.item
                                                            .maestro_registro
                                                            .institucion
                                                    }}
                                                </template>
                                                <template
                                                    #cell(fecha_aprobacion)="row"
                                                >
                                                    {{
                                                        row.item
                                                            .fecha_aprobacion &&
                                                        row.item
                                                            .fecha_aprobacion !=
                                                            "0000-00-00"
                                                            ? formatoFecha(
                                                                  row.item
                                                                      .fecha_aprobacion
                                                              )
                                                            : ""
                                                    }}
                                                </template>

                                                <template
                                                    #cell(archivo_aprobacion)="row"
                                                >
                                                    <a
                                                        href="#"
                                                        @click.prevent="
                                                            descargarArchivo(
                                                                row.item.id
                                                            )
                                                        "
                                                        v-if="
                                                            row.item
                                                                .archivo_aprobacion &&
                                                            row.item
                                                                .archivo_aprobacion !=
                                                                ''
                                                        "
                                                        >Descargar</a
                                                    >
                                                    <span v-else></span>
                                                </template>

                                                <template
                                                    #cell(fecha_registro)="row"
                                                >
                                                    {{
                                                        formatoFecha(
                                                            row.item
                                                                .fecha_registro
                                                        )
                                                    }}
                                                </template>

                                                <template #cell(accion)="row">
                                                    <div
                                                        class="row justify-content-between"
                                                    >
                                                        <b-button
                                                            size="sm"
                                                            pill
                                                            variant="outline-success"
                                                            class="btn-flat btn-block"
                                                            title="Ver registro"
                                                            @click="
                                                                show(
                                                                    row.item.id
                                                                )
                                                            "
                                                        >
                                                            <i
                                                                class="fa fa-eye"
                                                            ></i>
                                                        </b-button>
                                                        <!-- <b-button
                                                            size="sm"
                                                            pill
                                                            variant="outline-warning"
                                                            class="btn-flat btn-block"
                                                            title="Editar registro"
                                                            @click="
                                                                editar(
                                                                    row.item.id
                                                                )
                                                            "
                                                        >
                                                            <i
                                                                class="fa fa-edit"
                                                            ></i>
                                                        </b-button>
                                                        <b-button
                                                            size="sm"
                                                            pill
                                                            variant="outline-danger"
                                                            class="btn-flat btn-block"
                                                            title="Eliminar registro"
                                                            @click="
                                                                eliminaSeguimientoAprobado(
                                                                    row.item.id,
                                                                    row.item
                                                                        .maestro_registro
                                                                        .codigo_producto +
                                                                        ' - ' +
                                                                        row.item
                                                                            .maestro_registro
                                                                            .institucion
                                                                )
                                                            "
                                                        >
                                                            <i
                                                                class="fa fa-trash"
                                                            ></i>
                                                        </b-button> -->
                                                    </div>
                                                </template>
                                            </b-table>
                                        </b-overlay>
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
            user: JSON.parse(localStorage.getItem("user")),
            search: "",
            listRegistros: [],
            showOverlay: false,
            fields: [
                {
                    key: "maestro_registro",
                    label: "Producto",
                    sortable: true,
                },
                {
                    key: "fecha_aprobacion",
                    label: "Fecha de Aprobación",
                    sortable: true,
                },
                {
                    key: "estado_final",
                    label: "Estado Final",
                    sortable: true,
                },
                {
                    key: "archivo_aprobacion",
                    label: "Certificación",
                    sortable: true,
                },
                {
                    key: "observacion",
                    label: "Observación",
                    sortable: true,
                },
                { key: "fecha_registro", label: "Fecha de registro" },
                { key: "accion", label: "Acción" },
            ],
            loading: true,
            fullscreenLoading: true,
            loadingWindow: Loading.service({
                fullscreen: this.fullscreenLoading,
            }),
            currentPage: 1,
            perPage: 10,
            pageOptions: [
                { value: 5, text: "Mostrar 5 Registros" },
                { value: 10, text: "Mostrar 10 Registros" },
                { value: 25, text: "Mostrar 25 Registros" },
                { value: 50, text: "Mostrar 50 Registros" },
                { value: 100, text: "Mostrar 100 Registros" },
                { value: this.totalRows, text: "Mostrar Todo" },
            ],
            totalRows: 10,
            filter: null,
        };
    },
    mounted() {
        this.loadingWindow.close();
        this.getSeguimientoAprobados();
    },
    methods: {
        // Listar SeguimientoAprobados
        getSeguimientoAprobados() {
            this.showOverlay = true;
            this.muestra_modal = false;
            let url = "/admin/seguimiento_aprobados";
            if (this.pagina != 0) {
                url += "?page=" + this.pagina;
            }
            axios
                .get(url, {
                    params: { per_page: this.per_page },
                })
                .then((res) => {
                    this.showOverlay = false;
                    this.listRegistros = res.data.seguimiento_aprobados;
                    this.totalRows = res.data.total;
                });
        },
        rowClass(item, type) {
            if (!item || type !== "row") return;
            if (item.estado_sanitario === "VIGENTE") return "table-success";
            if (item.estado_sanitario === "VENCIDO") return "table-danger";
            if (item.estado_sanitario === "SIN REGISTRO")
                return "bg-gray-light";
        },
        eliminaSeguimientoAprobado(id, descripcion) {
            Swal.fire({
                title: "¿Quierés eliminar este registro?",
                html: `<strong>${descripcion}</strong>`,
                showCancelButton: true,
                confirmButtonColor: "#149971",
                confirmButtonText: "Si, eliminar",
                cancelButtonText: "No, cancelar",
                denyButtonText: `No, cancelar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    axios
                        .post("/admin/seguimiento_aprobados/" + id, {
                            _method: "DELETE",
                        })
                        .then((res) => {
                            this.getSeguimientoAprobados();
                            this.filter = "";
                            Swal.fire({
                                icon: "success",
                                title: res.data.msj,
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        });
                }
            });
        },
        aprobarSeguimientoAprobado(id, descripcion) {
            Swal.fire({
                title: "¿Quierés aprobar este registro?",
                html: `<strong>${descripcion}</strong>`,
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                confirmButtonText: "Si, aprobar",
                cancelButtonText: "No, cancelar",
                denyButtonText: `No, cancelar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    axios
                        .post("/admin/seguimiento_aprobados/aprobar/" + id)
                        .then((res) => {
                            this.getSeguimientoAprobados();
                            this.filter = "";
                            Swal.fire({
                                icon: "success",
                                title: res.data.msj,
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        });
                }
            });
        },
        anularSeguimientoAprobado(id, descripcion) {
            Swal.fire({
                title: "¿Quierés anular este registro?",
                html: `<strong>${descripcion}</strong>`,
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                confirmButtonText: "Si, anular",
                cancelButtonText: "No, cancelar",
                denyButtonText: `No, cancelar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                }
            });
        },
        editar(id) {
            this.$router.push({
                name: "seguimiento_aprobados.edit",
                params: { id: id },
            });
        },
        show(id) {
            this.$router.push({
                name: "seguimiento_aprobados.show",
                params: { id: id },
            });
        },
        pdf(id) {
            let config = {
                responseType: "blob",
            };
            axios
                .post("/admin/seguimiento_aprobados/pdf/" + id, null, config)
                .then((res) => {
                    this.errors = [];
                    this.enviando = false;
                    let pdfBlob = new Blob([res.data], {
                        type: "application/pdf",
                    });
                    let urlReporte = URL.createObjectURL(pdfBlob);
                    window.open(urlReporte);
                })
                .catch(async (error) => {
                    console.log(error);
                });
        },
        onFiltered(filteredItems) {
            // Trigger pagination to update the number of buttons/pages due to filtering
            this.totalRows = filteredItems.length;
            this.currentPage = 1;
        },
        formatoFecha(date) {
            return this.$moment(String(date)).format("DD/MM/YYYY");
        },
        descargarArchivo(id) {
            let config = {
                responseType: "blob",
            };
            axios
                .post(
                    "/admin/seguimiento_tramites/archivo/" + id,
                    { archivo: "archivo_aprobacion" },
                    config
                )
                .then((res) => {
                    console.log(res);
                    let nom = res.headers["content-disposition"].split("=");
                    var fileURL = window.URL.createObjectURL(
                        new Blob([res.data])
                    );
                    var fileLink = document.createElement("a");

                    fileLink.href = fileURL;
                    fileLink.setAttribute("download", nom[1]);
                    document.body.appendChild(fileLink);

                    fileLink.click();
                })
                .catch(async (error) => {
                    console.log(error);
                    let responseObj = await error.response.data.text();
                    responseObj = JSON.parse(responseObj);
                    this.enviando = false;
                    if (error.response) {
                    }
                });
        },
    },
};
</script>

<style></style>
