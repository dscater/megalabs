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
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.institucion,
                                            }"
                                            >Institución*</label
                                        >
                                        <el-select
                                            class="w-100 d-block"
                                            :class="{
                                                'is-invalid':
                                                    errors.institucion,
                                            }"
                                            v-model="
                                                oMaestroRegistro.institucion
                                            "
                                        >
                                            <el-option
                                                v-for="(
                                                    item, index
                                                ) in listInstituciones"
                                                :key="index"
                                                :value="item"
                                                :label="item"
                                            ></el-option>
                                        </el-select>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.institucion"
                                            v-text="errors.institucion[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.codigo_producto,
                                            }"
                                            >Código Producto</label
                                        >
                                        <el-input
                                            placeholder="Código Producto"
                                            :class="{
                                                'is-invalid':
                                                    errors.codigo_producto,
                                            }"
                                            v-model="
                                                oMaestroRegistro.codigo_producto
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.codigo_producto"
                                            v-text="errors.codigo_producto[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.descripcion_figura_rs,
                                            }"
                                            >Descripción de Figura en el
                                            RS*</label
                                        >
                                        <el-input
                                            placeholder="Descripción de Figura en el RS"
                                            :class="{
                                                'is-invalid':
                                                    errors.descripcion_figura_rs,
                                            }"
                                            v-model="
                                                oMaestroRegistro.descripcion_figura_rs
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.descripcion_figura_rs"
                                            v-text="
                                                errors.descripcion_figura_rs[0]
                                            "
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.descripcion_sac,
                                            }"
                                            >Descripción SAC</label
                                        >
                                        <el-input
                                            placeholder="Descripción SAC"
                                            :class="{
                                                'is-invalid':
                                                    errors.descripcion_sac,
                                            }"
                                            v-model="
                                                oMaestroRegistro.descripcion_sac
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.descripcion_sac"
                                            v-text="errors.descripcion_sac[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.comercializado,
                                            }"
                                            >Comercializado</label
                                        >
                                        <el-input
                                            placeholder="Comercializado"
                                            :class="{
                                                'is-invalid':
                                                    errors.comercializado,
                                            }"
                                            v-model="
                                                oMaestroRegistro.comercializado
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.comercializado"
                                            v-text="errors.comercializado[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger': errors.numero_rs,
                                            }"
                                            >Número de RS o NSO/Senasag</label
                                        >
                                        <el-input
                                            placeholder="Número de RS o NSO/Senasag"
                                            :class="{
                                                'is-invalid': errors.numero_rs,
                                            }"
                                            v-model="oMaestroRegistro.numero_rs"
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.numero_rs"
                                            v-text="errors.numero_rs[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.fecha_emision_rs,
                                            }"
                                            >Fecha de Emisión RS</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            :class="{
                                                'is-invalid':
                                                    errors.fecha_emision_rs,
                                            }"
                                            v-model="
                                                oMaestroRegistro.fecha_emision_rs
                                            "
                                        />
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.fecha_emision_rs"
                                            v-text="errors.fecha_emision_rs[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.fecha_vencimiento_rs,
                                            }"
                                            >Fecha Vencimiento del RS</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            :class="{
                                                'is-invalid':
                                                    errors.fecha_vencimiento_rs,
                                            }"
                                            v-model="
                                                oMaestroRegistro.fecha_vencimiento_rs
                                            "
                                        />
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.fecha_vencimiento_rs"
                                            v-text="
                                                errors.fecha_vencimiento_rs[0]
                                            "
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.estado_sanitario,
                                            }"
                                            >Estado del Registro
                                            Sanitario</label
                                        >
                                        <el-select
                                            class="w-100 d-block"
                                            :class="{
                                                'is-invalid':
                                                    errors.estado_sanitario,
                                            }"
                                            v-model="
                                                oMaestroRegistro.estado_sanitario
                                            "
                                        >
                                            <el-option
                                                v-for="(
                                                    item, index
                                                ) in listEstadoSanitarios"
                                                :key="index"
                                                :value="item"
                                                :label="item"
                                            ></el-option>
                                        </el-select>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.estado_sanitario"
                                            v-text="errors.estado_sanitario[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.actualizacion,
                                            }"
                                            >Actualización</label
                                        >
                                        <el-select
                                            class="w-100 d-block"
                                            :class="{
                                                'is-invalid':
                                                    errors.actualizacion,
                                            }"
                                            v-model="
                                                oMaestroRegistro.actualizacion
                                            "
                                        >
                                            <el-option
                                                v-for="(
                                                    item, index
                                                ) in listActualizacion"
                                                :key="index"
                                                :value="item"
                                                :label="item"
                                            ></el-option>
                                        </el-select>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.actualizacion"
                                            v-text="errors.actualizacion[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.condicion_sanitario,
                                            }"
                                            >Condición del Registro
                                            Sanitario</label
                                        >
                                        <el-input
                                            placeholder="Condición del Registro Sanitario"
                                            :class="{
                                                'is-invalid':
                                                    errors.condicion_sanitario,
                                            }"
                                            v-model="
                                                oMaestroRegistro.condicion_sanitario
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.condicion_sanitario"
                                            v-text="
                                                errors.condicion_sanitario[0]
                                            "
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.propiedad_lc,
                                            }"
                                            >Propiedad según lanzamiento y
                                            comercialización</label
                                        >
                                        <el-input
                                            placeholder="Propiedad según lanzamiento y comercialización"
                                            :class="{
                                                'is-invalid':
                                                    errors.propiedad_lc,
                                            }"
                                            v-model="
                                                oMaestroRegistro.propiedad_lc
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.propiedad_lc"
                                            v-text="errors.propiedad_lc[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger': errors.prioridad,
                                            }"
                                            >Prioridad</label
                                        >
                                        <el-select
                                            class="w-100 d-block"
                                            :class="{
                                                'is-invalid': errors.prioridad,
                                            }"
                                            v-model="oMaestroRegistro.prioridad"
                                        >
                                            <el-option
                                                v-for="(item, index) in [
                                                    'BAJA',
                                                    'ALTA',
                                                ]"
                                                :key="index"
                                                :value="item"
                                                :label="item"
                                            ></el-option>
                                        </el-select>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.prioridad"
                                            v-text="errors.prioridad[0]"
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
                                                oMaestroRegistro.responsable
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
                                                    errors.fecha_revision_ab,
                                            }"
                                            >Fecha de Revisión por Analistas
                                            Bolivia</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            :class="{
                                                'is-invalid':
                                                    errors.fecha_revision_ab,
                                            }"
                                            v-model="
                                                oMaestroRegistro.fecha_revision_ab
                                            "
                                        />
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.fecha_revision_ab"
                                            v-text="errors.fecha_revision_ab[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.fecha_tentativa_agemed,
                                            }"
                                            >Fecha Tentativa de Presentación
                                            AGEMED</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            :class="{
                                                'is-invalid':
                                                    errors.fecha_tentativa_agemed,
                                            }"
                                            v-model="
                                                oMaestroRegistro.fecha_tentativa_agemed
                                            "
                                        />
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.fecha_tentativa_agemed"
                                            v-text="
                                                errors.fecha_tentativa_agemed[0]
                                            "
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.fecha_respuesta_agemed,
                                            }"
                                            >Fecha Tentativa de Respuesta
                                            AGEMED</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            :class="{
                                                'is-invalid':
                                                    errors.fecha_respuesta_agemed,
                                            }"
                                            v-model="
                                                oMaestroRegistro.fecha_respuesta_agemed
                                            "
                                        />
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.fecha_respuesta_agemed"
                                            v-text="
                                                errors.fecha_respuesta_agemed[0]
                                            "
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.primera_fecha_ro,
                                            }"
                                            >Primera Fecha de Resolución
                                            Observado</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            :class="{
                                                'is-invalid':
                                                    errors.primera_fecha_ro,
                                            }"
                                            v-model="
                                                oMaestroRegistro.primera_fecha_ro
                                            "
                                        />
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.primera_fecha_ro"
                                            v-text="errors.primera_fecha_ro[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.segunda_fecha_ro,
                                            }"
                                            >Segunda Fecha de Resolución
                                            Observado</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            :class="{
                                                'is-invalid':
                                                    errors.segunda_fecha_ro,
                                            }"
                                            v-model="
                                                oMaestroRegistro.segunda_fecha_ro
                                            "
                                        />
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.segunda_fecha_ro"
                                            v-text="errors.segunda_fecha_ro[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.fecha_tentativa_p,
                                            }"
                                            >Fecha Tentativa de Propuesta</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            :class="{
                                                'is-invalid':
                                                    errors.fecha_tentativa_p,
                                            }"
                                            v-model="
                                                oMaestroRegistro.fecha_tentativa_p
                                            "
                                        />
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.fecha_tentativa_p"
                                            v-text="errors.fecha_tentativa_p[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.fecha_estimada_o_rs2,
                                            }"
                                            >Fecha Estimada de Observación
                                            RS2</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            :class="{
                                                'is-invalid':
                                                    errors.fecha_estimada_o_rs2,
                                            }"
                                            v-model="
                                                oMaestroRegistro.fecha_estimada_o_rs2
                                            "
                                        />
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.fecha_estimada_o_rs2"
                                            v-text="
                                                errors.fecha_estimada_o_rs2[0]
                                            "
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.comentarios_registro,
                                            }"
                                            >Comentarios Para Registro</label
                                        >
                                        <el-input
                                            placeholder="Comentarios Para Registro"
                                            :class="{
                                                'is-invalid':
                                                    errors.comentarios_registro,
                                            }"
                                            v-model="
                                                oMaestroRegistro.comentarios_registro
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.comentarios_registro"
                                            v-text="
                                                errors.comentarios_registro[0]
                                            "
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.comentarios_planificacion,
                                            }"
                                            >Comentarios Planificación</label
                                        >
                                        <el-input
                                            placeholder="Comentarios Planificación"
                                            :class="{
                                                'is-invalid':
                                                    errors.comentarios_planificacion,
                                            }"
                                            v-model="
                                                oMaestroRegistro.comentarios_planificacion
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="
                                                errors.comentarios_planificacion
                                            "
                                            v-text="
                                                errors
                                                    .comentarios_planificacion[0]
                                            "
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger': errors.gdp,
                                            }"
                                            >GDP</label
                                        >
                                        <el-input
                                            placeholder="GDP"
                                            :class="{
                                                'is-invalid': errors.gdp,
                                            }"
                                            v-model="oMaestroRegistro.gdp"
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.gdp"
                                            v-text="errors.gdp[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.presentacion_comercial,
                                            }"
                                            >Presentación Comercial</label
                                        >
                                        <el-input
                                            placeholder="Presentación Comercial"
                                            :class="{
                                                'is-invalid':
                                                    errors.presentacion_comercial,
                                            }"
                                            v-model="
                                                oMaestroRegistro.presentacion_comercial
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.presentacion_comercial"
                                            v-text="
                                                errors.presentacion_comercial[0]
                                            "
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.presentacion_rs,
                                            }"
                                            >Presentación del RS</label
                                        >
                                        <el-input
                                            placeholder="Presentación del RS"
                                            :class="{
                                                'is-invalid':
                                                    errors.presentacion_rs,
                                            }"
                                            v-model="
                                                oMaestroRegistro.presentacion_rs
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.presentacion_rs"
                                            v-text="errors.presentacion_rs[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger': errors.origen_rs,
                                            }"
                                            >Origen del RS</label
                                        >
                                        <el-input
                                            placeholder="Origen del RS"
                                            :class="{
                                                'is-invalid': errors.origen_rs,
                                            }"
                                            v-model="oMaestroRegistro.origen_rs"
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.origen_rs"
                                            v-text="errors.origen_rs[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.fabricante,
                                            }"
                                            >Fabricante</label
                                        >
                                        <el-input
                                            placeholder="Fabricante"
                                            :class="{
                                                'is-invalid': errors.fabricante,
                                            }"
                                            v-model="
                                                oMaestroRegistro.fabricante
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.fabricante"
                                            v-text="errors.fabricante[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger': errors.para,
                                            }"
                                            >Para</label
                                        >
                                        <el-input
                                            placeholder="Para"
                                            :class="{
                                                'is-invalid': errors.para,
                                            }"
                                            v-model="oMaestroRegistro.para"
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.para"
                                            v-text="errors.para[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.bajo_licencia,
                                            }"
                                            >Bajo Licencia</label
                                        >
                                        <el-input
                                            placeholder="Bajo Licencia"
                                            :class="{
                                                'is-invalid':
                                                    errors.bajo_licencia,
                                            }"
                                            v-model="
                                                oMaestroRegistro.bajo_licencia
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.bajo_licencia"
                                            v-text="errors.bajo_licencia[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.fecha_rectificacion,
                                            }"
                                            >Fecha de Rectificación</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            :class="{
                                                'is-invalid':
                                                    errors.fecha_rectificacion,
                                            }"
                                            v-model="
                                                oMaestroRegistro.fecha_rectificacion
                                            "
                                        />
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.fecha_rectificacion"
                                            v-text="
                                                errors.fecha_rectificacion[0]
                                            "
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.principio_activo,
                                            }"
                                            >Principio Activo</label
                                        >
                                        <el-input
                                            placeholder="Principio Activo"
                                            :class="{
                                                'is-invalid':
                                                    errors.principio_activo,
                                            }"
                                            v-model="
                                                oMaestroRegistro.principio_activo
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.principio_activo"
                                            v-text="errors.principio_activo[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.concentracion,
                                            }"
                                            >Concentración</label
                                        >
                                        <el-input
                                            placeholder="Concentración"
                                            :class="{
                                                'is-invalid':
                                                    errors.concentracion,
                                            }"
                                            v-model="
                                                oMaestroRegistro.concentracion
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.concentracion"
                                            v-text="errors.concentracion[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.forma_farmaceutica_rs,
                                            }"
                                            >Forma Farmacéutica/Cosmética Según
                                            RS</label
                                        >
                                        <el-input
                                            placeholder="Forma Farmacéutica/Cosmética Según RS"
                                            :class="{
                                                'is-invalid':
                                                    errors.forma_farmaceutica_rs,
                                            }"
                                            v-model="
                                                oMaestroRegistro.forma_farmaceutica_rs
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.forma_farmaceutica_rs"
                                            v-text="
                                                errors.forma_farmaceutica_rs[0]
                                            "
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.forma_farmaceutica_amornizada,
                                            }"
                                            >Forma Farmacéutica
                                            Armonizada</label
                                        >
                                        <el-input
                                            placeholder="Forma Farmacéutica Armonizada"
                                            :class="{
                                                'is-invalid':
                                                    errors.forma_farmaceutica_amornizada,
                                            }"
                                            v-model="
                                                oMaestroRegistro.forma_farmaceutica_amornizada
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="
                                                errors.forma_farmaceutica_amornizada
                                            "
                                            v-text="
                                                errors
                                                    .forma_farmaceutica_amornizada[0]
                                            "
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.formula_cc,
                                            }"
                                            >Formula Cualitativa
                                            Cuantitativa</label
                                        >
                                        <el-input
                                            placeholder="Formula Cualitativa Cuantitativa"
                                            :class="{
                                                'is-invalid': errors.formula_cc,
                                            }"
                                            v-model="
                                                oMaestroRegistro.formula_cc
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.formula_cc"
                                            v-text="errors.formula_cc[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.venta_ventanilla,
                                            }"
                                            >Venta por Ventanilla</label
                                        >
                                        <el-input
                                            placeholder="Venta por Ventanilla"
                                            :class="{
                                                'is-invalid':
                                                    errors.venta_ventanilla,
                                            }"
                                            v-model="
                                                oMaestroRegistro.venta_ventanilla
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.venta_ventanilla"
                                            v-text="errors.venta_ventanilla[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.condicion_venta,
                                            }"
                                            >Condición de Venta</label
                                        >
                                        <el-input
                                            placeholder="Condición de Venta"
                                            :class="{
                                                'is-invalid':
                                                    errors.condicion_venta,
                                            }"
                                            v-model="
                                                oMaestroRegistro.condicion_venta
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.condicion_venta"
                                            v-text="errors.condicion_venta[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.contacto_tecnico,
                                            }"
                                            >Contacto Técnico</label
                                        >
                                        <el-input
                                            placeholder="Contacto Técnico"
                                            :class="{
                                                'is-invalid':
                                                    errors.contacto_tecnico,
                                            }"
                                            v-model="
                                                oMaestroRegistro.contacto_tecnico
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.contacto_tecnico"
                                            v-text="errors.contacto_tecnico[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger': errors.vida_util,
                                            }"
                                            >Vida Útil Meses</label
                                        >
                                        <el-input
                                            placeholder="Vida Útil Meses"
                                            :class="{
                                                'is-invalid': errors.vida_util,
                                            }"
                                            v-model="oMaestroRegistro.vida_util"
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.vida_util"
                                            v-text="errors.vida_util[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger': errors.atq,
                                            }"
                                            >ATQ</label
                                        >
                                        <el-input
                                            placeholder="ATQ"
                                            :class="{
                                                'is-invalid': errors.atq,
                                            }"
                                            v-model="oMaestroRegistro.atq"
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.atq"
                                            v-text="errors.atq[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.condicion_almacenamiento,
                                            }"
                                            >Condición de Almacenamiento</label
                                        >
                                        <el-input
                                            placeholder="Condición de Almacenamiento"
                                            :class="{
                                                'is-invalid':
                                                    errors.condicion_almacenamiento,
                                            }"
                                            v-model="
                                                oMaestroRegistro.condicion_almacenamiento
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="
                                                errors.condicion_almacenamiento
                                            "
                                            v-text="
                                                errors
                                                    .condicion_almacenamiento[0]
                                            "
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.linea_estucheria,
                                            }"
                                            >Línea de Estuchería</label
                                        >
                                        <el-input
                                            placeholder="Línea de Estuchería"
                                            :class="{
                                                'is-invalid':
                                                    errors.linea_estucheria,
                                            }"
                                            v-model="
                                                oMaestroRegistro.linea_estucheria
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.linea_estucheria"
                                            v-text="errors.linea_estucheria[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.fecha_inicio_comercializacion,
                                            }"
                                            >Fecha Inicio de
                                            Comercialización</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            :class="{
                                                'is-invalid':
                                                    errors.fecha_inicio_comercializacion,
                                            }"
                                            v-model="
                                                oMaestroRegistro.fecha_inicio_comercializacion
                                            "
                                        />
                                        <span
                                            class="error invalid-feedback"
                                            v-if="
                                                errors.fecha_inicio_comercializacion
                                            "
                                            v-text="
                                                errors
                                                    .fecha_inicio_comercializacion[0]
                                            "
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.producto_licitacion,
                                            }"
                                            >Producto Licitación</label
                                        >
                                        <el-input
                                            placeholder="Producto Licitación"
                                            :class="{
                                                'is-invalid':
                                                    errors.producto_licitacion,
                                            }"
                                            v-model="
                                                oMaestroRegistro.producto_licitacion
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.producto_licitacion"
                                            v-text="
                                                errors.producto_licitacion[0]
                                            "
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
            },
            enviando: false,
            errors: [],
            listInstituciones: ["AGEMED", "SENASAC", "CANCILLERIA"],
            listEstadoSanitarios: ["VIGENTE", "VENCIDO", "SIN REGISTRO"],
            listActualizacion: ["SOMETIDO", "VIGENTE"],
        };
    },
    mounted() {
        this.loadingWindow.close();
    },
    methods: {
        // ENVIAR FORMULARIO
        enviaRegistro() {
            this.enviando = true;
            try {
                let url = "/admin/maestro_registros";

                let formdata = new FormData();
                formdata.append("institucion",this.oMaestroRegistro.institucion ? this.oMaestroRegistro.institucion : "");
                formdata.append("codigo_producto",this.oMaestroRegistro.codigo_producto ? this.oMaestroRegistro.codigo_producto : "");
                formdata.append("descripcion_figura_rs",this.oMaestroRegistro.descripcion_figura_rs ? this.oMaestroRegistro.descripcion_figura_rs : "");
                formdata.append("descripcion_sac",this.oMaestroRegistro.descripcion_sac ? this.oMaestroRegistro.descripcion_sac : "");
                formdata.append("comercializado",this.oMaestroRegistro.comercializado ? this.oMaestroRegistro.comercializado : "");
                formdata.append("numero_rs",this.oMaestroRegistro.numero_rs ? this.oMaestroRegistro.numero_rs : "");
                formdata.append("fecha_emision_rs",this.oMaestroRegistro.fecha_emision_rs ? this.oMaestroRegistro.fecha_emision_rs : null);
                formdata.append("fecha_vencimiento_rs",this.oMaestroRegistro.fecha_vencimiento_rs ? this.oMaestroRegistro.fecha_vencimiento_rs : null);
                formdata.append("estado_sanitario",this.oMaestroRegistro.estado_sanitario ? this.oMaestroRegistro.estado_sanitario : "");
                formdata.append("actualizacion",this.oMaestroRegistro.actualizacion ? this.oMaestroRegistro.actualizacion : "");
                formdata.append("condicion_sanitario",this.oMaestroRegistro.condicion_sanitario ? this.oMaestroRegistro.condicion_sanitario : "");
                formdata.append("propiedad_lc",this.oMaestroRegistro.propiedad_lc ? this.oMaestroRegistro.propiedad_lc : "");
                formdata.append("prioridad",this.oMaestroRegistro.prioridad ? this.oMaestroRegistro.prioridad : "");
                formdata.append("responsable",this.oMaestroRegistro.responsable ? this.oMaestroRegistro.responsable : "");
                formdata.append("fecha_revision_ab",this.oMaestroRegistro.fecha_revision_ab ? this.oMaestroRegistro.fecha_revision_ab : null);
                formdata.append("fecha_tentativa_agemed",this.oMaestroRegistro.fecha_tentativa_agemed ? this.oMaestroRegistro.fecha_tentativa_agemed : null);
                formdata.append("fecha_respuesta_agemed",this.oMaestroRegistro.fecha_respuesta_agemed ? this.oMaestroRegistro.fecha_respuesta_agemed : null);
                formdata.append("primera_fecha_ro",this.oMaestroRegistro.primera_fecha_ro ? this.oMaestroRegistro.primera_fecha_ro : "");
                formdata.append("segunda_fecha_ro",this.oMaestroRegistro.segunda_fecha_ro ? this.oMaestroRegistro.segunda_fecha_ro : "");
                formdata.append("fecha_tentativa_p",this.oMaestroRegistro.fecha_tentativa_p ? this.oMaestroRegistro.fecha_tentativa_p : null);
                formdata.append("fecha_estimada_o_rs2",this.oMaestroRegistro.fecha_estimada_o_rs2 ? this.oMaestroRegistro.fecha_estimada_o_rs2 : null);
                formdata.append("comentarios_registro",this.oMaestroRegistro.comentarios_registro ? this.oMaestroRegistro.comentarios_registro : "");
                formdata.append("comentarios_planificacion",this.oMaestroRegistro.comentarios_planificacion ? this.oMaestroRegistro.comentarios_planificacion : "");
                formdata.append("gdp",this.oMaestroRegistro.gdp ? this.oMaestroRegistro.gdp : "");
                formdata.append("presentacion_comercial",this.oMaestroRegistro.presentacion_comercial ? this.oMaestroRegistro.presentacion_comercial : "");
                formdata.append("presentacion_rs",this.oMaestroRegistro.presentacion_rs ? this.oMaestroRegistro.presentacion_rs : "");
                formdata.append("origen_rs",this.oMaestroRegistro.origen_rs ? this.oMaestroRegistro.origen_rs : "");
                formdata.append("fabricante",this.oMaestroRegistro.fabricante ? this.oMaestroRegistro.fabricante : "");
                formdata.append("para",this.oMaestroRegistro.para ? this.oMaestroRegistro.para : "");
                formdata.append("bajo_licencia",this.oMaestroRegistro.bajo_licencia ? this.oMaestroRegistro.bajo_licencia : "");
                formdata.append("fecha_rectificacion",this.oMaestroRegistro.fecha_rectificacion ? this.oMaestroRegistro.fecha_rectificacion : null);
                formdata.append("principio_activo",this.oMaestroRegistro.principio_activo ? this.oMaestroRegistro.principio_activo : "");
                formdata.append("concentracion",this.oMaestroRegistro.concentracion ? this.oMaestroRegistro.concentracion : "");
                formdata.append("forma_farmaceutica_rs",this.oMaestroRegistro.forma_farmaceutica_rs ? this.oMaestroRegistro.forma_farmaceutica_rs : "");
                formdata.append("forma_farmaceutica_amornizada",this.oMaestroRegistro.forma_farmaceutica_amornizada ? this.oMaestroRegistro.forma_farmaceutica_amornizada : "");
                formdata.append("formula_cc",this.oMaestroRegistro.formula_cc ? this.oMaestroRegistro.formula_cc : "");
                formdata.append("venta_ventanilla",this.oMaestroRegistro.venta_ventanilla ? this.oMaestroRegistro.venta_ventanilla : "");
                formdata.append("condicion_venta",this.oMaestroRegistro.condicion_venta ? this.oMaestroRegistro.condicion_venta : "");
                formdata.append("contacto_tecnico",this.oMaestroRegistro.contacto_tecnico ? this.oMaestroRegistro.contacto_tecnico : "");
                formdata.append("vida_util",this.oMaestroRegistro.vida_util ? this.oMaestroRegistro.vida_util : "");
                formdata.append("atq",this.oMaestroRegistro.atq ? this.oMaestroRegistro.atq : "");
                formdata.append("condicion_almacenamiento",this.oMaestroRegistro.condicion_almacenamiento ? this.oMaestroRegistro.condicion_almacenamiento : "");
                formdata.append("linea_estucheria",this.oMaestroRegistro.linea_estucheria ? this.oMaestroRegistro.linea_estucheria : "");
                formdata.append("fecha_inicio_comercializacion",this.oMaestroRegistro.fecha_inicio_comercializacion ? this.oMaestroRegistro.fecha_inicio_comercializacion : null);
                formdata.append("producto_licitacion",this.oMaestroRegistro.producto_licitacion ? this.oMaestroRegistro.producto_licitacion : "");

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
                        this.$router.push({ name: "maestro_registros.index" });
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
        cargaArchivo(e) {
            this.oMaestroRegistro.archivo = e.target.files[0];
            console.log(e);
            console.log(this.oMaestroRegistro.archivo);
        },
    },
};
</script>

<style></style>
