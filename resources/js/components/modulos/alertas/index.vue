<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Alertas</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <b-col lg="10" class="my-1">
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
                                                <template #cell(fecha)="row">
                                                    {{
                                                        row.item.fecha &&
                                                        row.item.fecha !=
                                                            "0000-00-00"
                                                            ? formatoFecha(
                                                                  row.item.fecha
                                                              )
                                                            : ""
                                                    }}
                                                </template>

                                                <template #cell(archivo)="row">
                                                    <a
                                                        href=""
                                                        v-if="
                                                            row.item.archivo &&
                                                            row.item.archivo !=
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
                                            </b-table>
                                        </b-overlay>
                                        <div class="row">
                                            <b-col
                                                sm="6"
                                                md="2"
                                                class="ml-auto my-1"
                                            >
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
                                                md="2"
                                                class="my-1 mr-auto"
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
                    key: "descripcion",
                    label: "Descripción",
                    sortable: true,
                },
                {
                    key: "fecha",
                    label: "Fecha",
                    sortable: true,
                },
                { key: "fecha_registro", label: "Fecha de registro" },
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
            total_alertas: 0,
        };
    },
    mounted() {
        this.loadingWindow.close();
        this.verificaAlertas();
    },
    methods: {
        verificaAlertas() {
            axios.post("/admin/alertas").then((response) => {
                this.total_alertas = response.data.total_alertas;
                if (this.total_alertas > 0) {
                    toastr.error(
                        `Existen ${this.total_alertas} productos con próximos a vencer y/o vencidos`,
                        "Atención"
                    );
                }
                this.getAlertas();
            });
        },
        // Listar Alertas
        getAlertas() {
            this.showOverlay = true;
            this.muestra_modal = false;
            let url = "/admin/alertas";
            if (this.pagina != 0) {
                url += "?page=" + this.pagina;
            }
            axios
                .get(url, {
                    params: { per_page: this.per_page },
                })
                .then((res) => {
                    this.showOverlay = false;
                    this.listRegistros = res.data.alertas;
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
        eliminaAlerta(id, descripcion) {
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
                        .post("/admin/alertas/" + id, {
                            _method: "DELETE",
                        })
                        .then((res) => {
                            this.getAlertas();
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
        aprobarAlerta(id, descripcion) {
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
                    axios.post("/admin/alertas/aprobar/" + id).then((res) => {
                        this.getAlertas();
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
        anularAlerta(id, descripcion) {
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
                name: "alertas.edit",
                params: { id: id },
            });
        },
        pdf(id) {
            let config = {
                responseType: "blob",
            };
            axios
                .post("/admin/alertas/pdf/" + id, null, config)
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
    },
};
</script>

<style></style>
