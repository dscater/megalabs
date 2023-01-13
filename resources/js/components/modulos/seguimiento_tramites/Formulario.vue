<template>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="form-group col-md-4">
                    <label
                        :class="{
                            'text-danger': errors.maestro_registro_id,
                        }"
                        >Seleccionar Producto*</label
                    >
                    <el-select
                        class="w-100 d-block"
                        :class="{
                            'is-invalid': errors.maestro_registro_id,
                        }"
                        v-model="seguimiento_tramite.maestro_registro_id"
                    >
                        <el-option
                            v-for="item in listMaestroRegistros"
                            :key="item.id"
                            :value="item.id"
                            :label="
                                item.codigo_producto + '-' + item.institucion
                            "
                        ></el-option>
                    </el-select>
                    <span
                        class="error invalid-feedback"
                        v-if="errors.maestro_registro_id"
                        v-text="errors.maestro_registro_id[0]"
                    ></span>
                </div>
                <div class="form-group col-md-4">
                    <label
                        :class="{
                            'text-danger': errors.responsable,
                        }"
                        >Responsable</label
                    >
                    <el-input
                        placeholder="Responsable"
                        :class="{
                            'is-invalid': errors.responsable,
                        }"
                        v-model="seguimiento_tramite.responsable"
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
                            'text-danger': errors.tipo_tramite,
                        }"
                        >Tipo de Trámite</label
                    >
                    <el-input
                        placeholder="Tipo de Trámite"
                        :class="{
                            'is-invalid': errors.tipo_tramite,
                        }"
                        v-model="seguimiento_tramite.tipo_tramite"
                        clearable
                    >
                    </el-input>
                    <span
                        class="error invalid-feedback"
                        v-if="errors.tipo_tramite"
                        v-text="errors.tipo_tramite[0]"
                    ></span>
                </div>
                <div class="form-group col-md-4">
                    <label
                        :class="{
                            'text-danger': errors.fecha_ingreso,
                        }"
                        >Fecha de Ingreso</label
                    >
                    <input
                        type="date"
                        class="form-control"
                        :class="{
                            'is-invalid': errors.fecha_ingreso,
                        }"
                        v-model="seguimiento_tramite.fecha_ingreso"
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
                            'text-danger': errors.codigo_misa,
                        }"
                        >Código MISA (Si corresponde)</label
                    >
                    <el-input
                        placeholder="Código MISA"
                        :class="{
                            'is-invalid': errors.codigo_misa,
                        }"
                        v-model="seguimiento_tramite.codigo_misa"
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
                            'text-danger': errors.hoja_ruta,
                        }"
                        >Hora de Ruta</label
                    >
                    <el-input
                        placeholder="Hora de Ruta"
                        :class="{
                            'is-invalid': errors.hoja_ruta,
                        }"
                        v-model="seguimiento_tramite.hoja_ruta"
                        clearable
                    >
                    </el-input>
                    <span
                        class="error invalid-feedback"
                        v-if="errors.hoja_ruta"
                        v-text="errors.hoja_ruta[0]"
                    ></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h5>Estado MISA-AGEMED(Observaciones)</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.ameged_estado,
                                        }"
                                        >Estado Observaciones</label
                                    >
                                    <el-input
                                        placeholder="Estado Observaciones"
                                        :class="{
                                            'is-invalid': errors.ameged_estado,
                                        }"
                                        v-model="
                                            seguimiento_tramite.ameged_estado
                                        "
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.ameged_estado"
                                        v-text="errors.ameged_estado[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.ameged_fecha,
                                        }"
                                        >Fecha Observación</label
                                    >
                                    <input
                                        type="date"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': errors.ameged_fecha,
                                        }"
                                        v-model="
                                            seguimiento_tramite.ameged_fecha
                                        "
                                    />
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.ameged_fecha"
                                        v-text="errors.ameged_fecha[0]"
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
                            <h5>Estado MISA-MEGALABS(Subsanaciones)</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
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
                                            seguimiento_tramite.megalabs_estado
                                        "
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.megalabs_estado"
                                        v-text="errors.megalabs_estado[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger':
                                                errors.megalabs_fecha,
                                        }"
                                        >Fecha Presentación</label
                                    >
                                    <input
                                        type="date"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': errors.megalabs_fecha,
                                        }"
                                        v-model="
                                            seguimiento_tramite.megalabs_fecha
                                        "
                                    />
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.megalabs_fecha"
                                        v-text="errors.megalabs_fecha[0]"
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
                            <h5>Registros Sanitarios Aprobados</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger':
                                                errors.rs_fecha_aprobacion,
                                        }"
                                        >Fecha de Aprobación</label
                                    >
                                    <input
                                        type="date"
                                        class="form-control"
                                        :class="{
                                            'is-invalid':
                                                errors.rs_fecha_aprobacion,
                                        }"
                                        v-model="
                                            seguimiento_tramite.rs_fecha_aprobacion
                                        "
                                    />
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.rs_fecha_aprobacion"
                                        v-text="errors.rs_fecha_aprobacion[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger':
                                                errors.rs_nro_registro,
                                        }"
                                        >Nro. de Registro Sanitario</label
                                    >
                                    <el-input
                                        placeholder="Nro. de Registro Sanitario"
                                        :class="{
                                            'is-invalid':
                                                errors.rs_nro_registro,
                                        }"
                                        v-model="
                                            seguimiento_tramite.rs_nro_registro
                                        "
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.rs_nro_registro"
                                        v-text="errors.rs_nro_registro[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger':
                                                errors.rs_fecha_recojo,
                                        }"
                                        >Fecha de Recojo</label
                                    >
                                    <input
                                        type="date"
                                        class="form-control"
                                        :class="{
                                            'is-invalid':
                                                errors.rs_fecha_recojo,
                                        }"
                                        v-model="
                                            seguimiento_tramite.rs_fecha_recojo
                                        "
                                    />
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.rs_fecha_recojo"
                                        v-text="errors.rs_fecha_recojo[0]"
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
                            <h5>CPP</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.cpp_estado,
                                        }"
                                        >Estado</label
                                    >
                                    <el-input
                                        placeholder="Estado"
                                        :class="{
                                            'is-invalid': errors.cpp_estado,
                                        }"
                                        v-model="seguimiento_tramite.cpp_estado"
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.cpp_estado"
                                        v-text="errors.cpp_estado[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.cpp_carta,
                                        }"
                                        >Carta de Compromiso</label
                                    >
                                    <el-input
                                        type="textarea"
                                        autosize
                                        placeholder="Carta de Compromiso"
                                        :class="{
                                            'is-invalid': errors.cpp_carta,
                                        }"
                                        v-model="seguimiento_tramite.cpp_carta"
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.cpp_carta"
                                        v-text="errors.cpp_carta[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.cpp_cite,
                                        }"
                                        >Cite</label
                                    >
                                    <el-input
                                        placeholder="Cite"
                                        :class="{
                                            'is-invalid': errors.cpp_cite,
                                        }"
                                        v-model="seguimiento_tramite.cpp_cite"
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.cpp_cite"
                                        v-text="errors.cpp_cite[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.cpp_archivo,
                                        }"
                                        >Cargar archivo</label
                                    >
                                    <input
                                        type="file"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': errors.cpp_archivo,
                                        }"
                                        ref="cpp_archivo"
                                        @change="
                                            cargaArchivo('_cpp_archivo', $event)
                                        "
                                    />
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.cpp_archivo"
                                        v-text="errors.cpp_archivo[0]"
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
                            <h5>Muestra</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger':
                                                errors.muestra_estado,
                                        }"
                                        >Estado</label
                                    >
                                    <el-input
                                        placeholder="Estado"
                                        :class="{
                                            'is-invalid': errors.muestra_estado,
                                        }"
                                        v-model="
                                            seguimiento_tramite.muestra_estado
                                        "
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.muestra_estado"
                                        v-text="errors.muestra_estado[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.muestra_carta,
                                        }"
                                        >Carta de Compromiso</label
                                    >
                                    <el-input
                                        type="textarea"
                                        autosize
                                        placeholder="Carta de Compromiso"
                                        :class="{
                                            'is-invalid': errors.muestra_carta,
                                        }"
                                        v-model="
                                            seguimiento_tramite.muestra_carta
                                        "
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.muestra_carta"
                                        v-text="errors.muestra_carta[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.muestra_cite,
                                        }"
                                        >Cite</label
                                    >
                                    <el-input
                                        placeholder="Cite"
                                        :class="{
                                            'is-invalid': errors.muestra_cite,
                                        }"
                                        v-model="
                                            seguimiento_tramite.muestra_cite
                                        "
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.muestra_cite"
                                        v-text="errors.muestra_cite[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger':
                                                errors.muestra_archivo,
                                        }"
                                        >Cargar archivo</label
                                    >
                                    <input
                                        type="file"
                                        class="form-control"
                                        :class="{
                                            'is-invalid':
                                                errors.muestra_archivo,
                                        }"
                                        ref="muestra_archivo"
                                        @change="
                                            cargaArchivo(
                                                '_muestra_archivo',
                                                $event
                                            )
                                        "
                                    />
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.muestra_archivo"
                                        v-text="errors.muestra_archivo[0]"
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
                            <h5>Desplegados</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger':
                                                errors.desplegado_estado,
                                        }"
                                        >Estado</label
                                    >
                                    <el-input
                                        placeholder="Estado"
                                        :class="{
                                            'is-invalid':
                                                errors.desplegado_estado,
                                        }"
                                        v-model="
                                            seguimiento_tramite.desplegado_estado
                                        "
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.desplegado_estado"
                                        v-text="errors.desplegado_estado[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger':
                                                errors.desplegado_carta,
                                        }"
                                        >Carta de Compromiso</label
                                    >
                                    <el-input
                                        type="textarea"
                                        autosize
                                        placeholder="Carta de Compromiso"
                                        :class="{
                                            'is-invalid':
                                                errors.desplegado_carta,
                                        }"
                                        v-model="
                                            seguimiento_tramite.desplegado_carta
                                        "
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.desplegado_carta"
                                        v-text="errors.desplegado_carta[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger':
                                                errors.desplegado_cite,
                                        }"
                                        >Cite</label
                                    >
                                    <el-input
                                        placeholder="Cite"
                                        :class="{
                                            'is-invalid':
                                                errors.desplegado_cite,
                                        }"
                                        v-model="
                                            seguimiento_tramite.desplegado_cite
                                        "
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.desplegado_cite"
                                        v-text="errors.desplegado_cite[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger':
                                                errors.desplegado_archivo,
                                        }"
                                        >Cargar archivo</label
                                    >
                                    <input
                                        type="file"
                                        class="form-control"
                                        :class="{
                                            'is-invalid':
                                                errors.desplegado_archivo,
                                        }"
                                        ref="desplegado_archivo"
                                        @change="
                                            cargaArchivo(
                                                '_desplegado_archivo',
                                                $event
                                            )
                                        "
                                    />
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.desplegado_archivo"
                                        v-text="errors.desplegado_archivo[0]"
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
                            <h5>GMP</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.gmp_estado,
                                        }"
                                        >Estado</label
                                    >
                                    <el-input
                                        placeholder="Estado"
                                        :class="{
                                            'is-invalid': errors.gmp_estado,
                                        }"
                                        v-model="seguimiento_tramite.gmp_estado"
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.gmp_estado"
                                        v-text="errors.gmp_estado[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.gmp_carta,
                                        }"
                                        >Carta de Compromiso</label
                                    >
                                    <el-input
                                        type="textarea"
                                        autosize
                                        placeholder="Carta de Compromiso"
                                        :class="{
                                            'is-invalid': errors.gmp_carta,
                                        }"
                                        v-model="seguimiento_tramite.gmp_carta"
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.gmp_carta"
                                        v-text="errors.gmp_carta[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.gmp_cite,
                                        }"
                                        >Cite</label
                                    >
                                    <el-input
                                        placeholder="Cite"
                                        :class="{
                                            'is-invalid': errors.gmp_cite,
                                        }"
                                        v-model="seguimiento_tramite.gmp_cite"
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.gmp_cite"
                                        v-text="errors.gmp_cite[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.gmp_archivo,
                                        }"
                                        >Cargar archivo</label
                                    >
                                    <input
                                        type="file"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': errors.gmp_archivo,
                                        }"
                                        ref="gmp_archivo"
                                        @change="
                                            cargaArchivo('_gmp_archivo', $event)
                                        "
                                    />
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.gmp_archivo"
                                        v-text="errors.gmp_archivo[0]"
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
                            <h5>Representación Legal</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.rl_estado,
                                        }"
                                        >Estado</label
                                    >
                                    <el-input
                                        placeholder="Estado"
                                        :class="{
                                            'is-invalid': errors.rl_estado,
                                        }"
                                        v-model="seguimiento_tramite.rl_estado"
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.rl_estado"
                                        v-text="errors.rl_estado[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.rl_carta,
                                        }"
                                        >Carta de Compromiso</label
                                    >
                                    <el-input
                                        type="textarea"
                                        autosize
                                        placeholder="Carta de Compromiso"
                                        :class="{
                                            'is-invalid': errors.rl_carta,
                                        }"
                                        v-model="seguimiento_tramite.rl_carta"
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.rl_carta"
                                        v-text="errors.rl_carta[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.rl_cite,
                                        }"
                                        >Cite</label
                                    >
                                    <el-input
                                        placeholder="Cite"
                                        :class="{
                                            'is-invalid': errors.rl_cite,
                                        }"
                                        v-model="seguimiento_tramite.rl_cite"
                                        clearable
                                    >
                                    </el-input>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.rl_cite"
                                        v-text="errors.rl_cite[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.rl_archivo,
                                        }"
                                        >Cargar archivo</label
                                    >
                                    <input
                                        type="file"
                                        class="form-control"
                                        :class="{
                                            'is-invalid': errors.rl_archivo,
                                        }"
                                        ref="rl_archivo"
                                        @change="
                                            cargaArchivo('_rl_archivo', $event)
                                        "
                                    />
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.rl_archivo"
                                        v-text="errors.rl_archivo[0]"
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
                            <h5>Estado Aprobación</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger':
                                                errors.fecha_aprobacion,
                                        }"
                                        >Fecha de Aprobación</label
                                    >
                                    <input
                                        type="date"
                                        class="form-control"
                                        :class="{
                                            'is-invalid':
                                                errors.fecha_aprobacion,
                                        }"
                                        v-model="
                                            seguimiento_tramite.fecha_aprobacion
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
                                            'text-danger': errors.estado_final,
                                        }"
                                        >Estado Final*</label
                                    >
                                    <el-select
                                        placeholder="Estado Final"
                                        class="w-100"
                                        :class="{
                                            'is-invalid': errors.estado_final,
                                        }"
                                        v-model="
                                            seguimiento_tramite.estado_final
                                        "
                                    >
                                        <el-option
                                            v-for="(item, index) in listEstados"
                                            :key="index"
                                            :label="item"
                                            :value="item"
                                        ></el-option>
                                    </el-select>
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.estado_final"
                                        v-text="errors.estado_final[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger':
                                                errors.archivo_aprobacion,
                                        }"
                                        >Cargar Certificación</label
                                    >
                                    <input
                                        type="file"
                                        class="form-control"
                                        :class="{
                                            'is-invalid':
                                                errors.archivo_aprobacion,
                                        }"
                                        ref="archivo_aprobacion"
                                        @change="
                                            cargaArchivo(
                                                '_archivo_aprobacion',
                                                $event
                                            )
                                        "
                                    />
                                    <span
                                        class="error invalid-feedback"
                                        v-if="errors.archivo_aprobacion"
                                        v-text="errors.archivo_aprobacion[0]"
                                    ></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label
                                        :class="{
                                            'text-danger': errors.observacion,
                                        }"
                                        >Observación</label
                                    >
                                    <el-input
                                        type="textarea"
                                        autosize
                                        placeholder="Observación"
                                        :class="{
                                            'is-invalid': errors.observacion,
                                        }"
                                        v-model="
                                            seguimiento_tramite.observacion
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
                        <span v-text="textoBoton"></span
                    ></el-button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["oSeguimientoTramite", "accion"],
    data() {
        return {
            seguimiento_tramite: this.oSeguimientoTramite,
            enviando: false,
            errors: [],
            listMaestroRegistros: [],
            listEstados: ["APROBADO", "EN PROCESO"],
        };
    },
    watch: {
        oSeguimientoTramite(newVal, oldVal) {
            this.seguimiento_tramite = this.oSeguimientoTramite;
        },
    },
    computed: {
        textoBoton() {
            return this.accion == "nuevo" ? "Registrar" : "Actualizar registro";
        },
    },
    mounted() {
        this.getMaestroRegistros();
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
                let url = "/admin/seguimiento_tramites";

                let formdata = new FormData();

                if (this.accion == "edit") {
                    url =
                        "/admin/seguimiento_tramites/" +
                        this.oSeguimientoTramite.id;
                    formdata.append("_method", "put");
                }

                formdata.append(
                    "maestro_registro_id",
                    this.seguimiento_tramite.maestro_registro_id
                        ? this.seguimiento_tramite.maestro_registro_id
                        : ""
                );
                formdata.append(
                    "responsable",
                    this.seguimiento_tramite.responsable
                        ? this.seguimiento_tramite.responsable
                        : ""
                );
                formdata.append(
                    "tipo_tramite",
                    this.seguimiento_tramite.tipo_tramite
                        ? this.seguimiento_tramite.tipo_tramite
                        : ""
                );
                formdata.append(
                    "fecha_ingreso",
                    this.seguimiento_tramite.fecha_ingreso
                        ? this.seguimiento_tramite.fecha_ingreso
                        : ""
                );
                formdata.append(
                    "codigo_misa",
                    this.seguimiento_tramite.codigo_misa
                        ? this.seguimiento_tramite.codigo_misa
                        : ""
                );
                formdata.append(
                    "hoja_ruta",
                    this.seguimiento_tramite.hoja_ruta
                        ? this.seguimiento_tramite.hoja_ruta
                        : ""
                );
                formdata.append(
                    "ameged_estado",
                    this.seguimiento_tramite.ameged_estado
                        ? this.seguimiento_tramite.ameged_estado
                        : ""
                );
                formdata.append(
                    "ameged_fecha",
                    this.seguimiento_tramite.ameged_fecha
                        ? this.seguimiento_tramite.ameged_fecha
                        : ""
                );
                formdata.append(
                    "megalabs_estado",
                    this.seguimiento_tramite.megalabs_estado
                        ? this.seguimiento_tramite.megalabs_estado
                        : ""
                );
                formdata.append(
                    "megalabs_fecha",
                    this.seguimiento_tramite.megalabs_fecha
                        ? this.seguimiento_tramite.megalabs_fecha
                        : ""
                );
                formdata.append(
                    "rs_fecha_aprobacion",
                    this.seguimiento_tramite.rs_fecha_aprobacion
                        ? this.seguimiento_tramite.rs_fecha_aprobacion
                        : ""
                );
                formdata.append(
                    "rs_nro_registro",
                    this.seguimiento_tramite.rs_nro_registro
                        ? this.seguimiento_tramite.rs_nro_registro
                        : ""
                );
                formdata.append(
                    "rs_fecha_recojo",
                    this.seguimiento_tramite.rs_fecha_recojo
                        ? this.seguimiento_tramite.rs_fecha_recojo
                        : ""
                );
                formdata.append(
                    "cpp_estado",
                    this.seguimiento_tramite.cpp_estado
                        ? this.seguimiento_tramite.cpp_estado
                        : ""
                );
                formdata.append(
                    "cpp_carta",
                    this.seguimiento_tramite.cpp_carta
                        ? this.seguimiento_tramite.cpp_carta
                        : ""
                );
                formdata.append(
                    "cpp_cite",
                    this.seguimiento_tramite.cpp_cite
                        ? this.seguimiento_tramite.cpp_cite
                        : ""
                );
                formdata.append(
                    "muestra_estado",
                    this.seguimiento_tramite.muestra_estado
                        ? this.seguimiento_tramite.muestra_estado
                        : ""
                );
                formdata.append(
                    "muestra_carta",
                    this.seguimiento_tramite.muestra_carta
                        ? this.seguimiento_tramite.muestra_carta
                        : ""
                );
                formdata.append(
                    "muestra_cite",
                    this.seguimiento_tramite.muestra_cite
                        ? this.seguimiento_tramite.muestra_cite
                        : ""
                );

                formdata.append(
                    "desplegado_estado",
                    this.seguimiento_tramite.desplegado_estado
                        ? this.seguimiento_tramite.desplegado_estado
                        : ""
                );
                formdata.append(
                    "desplegado_carta",
                    this.seguimiento_tramite.desplegado_carta
                        ? this.seguimiento_tramite.desplegado_carta
                        : ""
                );
                formdata.append(
                    "desplegado_cite",
                    this.seguimiento_tramite.desplegado_cite
                        ? this.seguimiento_tramite.desplegado_cite
                        : ""
                );
                formdata.append(
                    "gmp_estado",
                    this.seguimiento_tramite.gmp_estado
                        ? this.seguimiento_tramite.gmp_estado
                        : ""
                );
                formdata.append(
                    "gmp_carta",
                    this.seguimiento_tramite.gmp_carta
                        ? this.seguimiento_tramite.gmp_carta
                        : ""
                );
                formdata.append(
                    "gmp_cite",
                    this.seguimiento_tramite.gmp_cite
                        ? this.seguimiento_tramite.gmp_cite
                        : ""
                );

                formdata.append(
                    "rl_estado",
                    this.seguimiento_tramite.rl_estado
                        ? this.seguimiento_tramite.rl_estado
                        : ""
                );
                formdata.append(
                    "rl_carta",
                    this.seguimiento_tramite.rl_carta
                        ? this.seguimiento_tramite.rl_carta
                        : ""
                );
                formdata.append(
                    "rl_cite",
                    this.seguimiento_tramite.rl_cite
                        ? this.seguimiento_tramite.rl_cite
                        : ""
                );

                formdata.append(
                    "fecha_aprobacion",
                    this.seguimiento_tramite.fecha_aprobacion
                        ? this.seguimiento_tramite.fecha_aprobacion
                        : ""
                );
                formdata.append(
                    "estado_final",
                    this.seguimiento_tramite.estado_final
                        ? this.seguimiento_tramite.estado_final
                        : ""
                );
                formdata.append(
                    "observacion",
                    this.seguimiento_tramite.observacion
                        ? this.seguimiento_tramite.observacion
                        : ""
                );

                // ARCHIVOS
                formdata.append(
                    "cpp_archivo",
                    this.seguimiento_tramite._cpp_archivo
                        ? this.seguimiento_tramite._cpp_archivo
                        : ""
                );
                formdata.append(
                    "muestra_archivo",
                    this.seguimiento_tramite._muestra_archivo
                        ? this.seguimiento_tramite._muestra_archivo
                        : ""
                );
                formdata.append(
                    "desplegado_archivo",
                    this.seguimiento_tramite._desplegado_archivo
                        ? this.seguimiento_tramite._desplegado_archivo
                        : ""
                );
                formdata.append(
                    "gmp_archivo",
                    this.seguimiento_tramite._gmp_archivo
                        ? this.seguimiento_tramite._gmp_archivo
                        : ""
                );
                formdata.append(
                    "rl_archivo",
                    this.seguimiento_tramite._rl_archivo
                        ? this.seguimiento_tramite._rl_archivo
                        : ""
                );
                formdata.append(
                    "archivo_aprobacion",
                    this.seguimiento_tramite._archivo_aprobacion
                        ? this.seguimiento_tramite._archivo_aprobacion
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
                            name: "seguimiento_tramites.index",
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
            this.seguimiento_tramite[key] = e.target.files[0];
            console.log(e);
            console.log(this.seguimiento_tramite[key]);
        },
    },
};
</script>
<style></style>
