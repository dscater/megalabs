import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

export default new Router({
    routes: [
        // INICIO
        {
            path: '/',
            name: 'inicio',
            component: require('./components/Inicio.vue').default
        },

        // LOGIN
        {
            path: '/login',
            name: 'login',
            component: require('./Auth.vue').default
        },

        // USUARIOS
        {
            path: '/usuarios/perfil/:id',
            name: 'usuarios.perfil',
            component: require('./components/modulos/usuarios/perfil.vue').default,
            props: true
        },
        {
            path: '/usuarios',
            name: 'usuarios.index',
            component: require('./components/modulos/usuarios/index.vue').default
        },

        // MAESTRO REGISTROS
        {
            path: '/maestro_registros',
            name: 'maestro_registros.index',
            component: require('./components/modulos/maestro_registros/index.vue').default,
        },

        {
            path: '/maestro_registros/create',
            name: 'maestro_registros.create',
            component: require('./components/modulos/maestro_registros/create.vue').default,
        },

        {
            path: '/maestro_registros/edit/:id',
            name: 'maestro_registros.edit',
            props: true,
            component: require('./components/modulos/maestro_registros/edit.vue').default,
        },

        // SEGUIMIENTO TRAMITES
        {
            path: '/seguimiento_tramites',
            name: 'seguimiento_tramites.index',
            component: require('./components/modulos/seguimiento_tramites/index.vue').default,
        },

        {
            path: '/seguimiento_tramites/create',
            name: 'seguimiento_tramites.create',
            component: require('./components/modulos/seguimiento_tramites/create.vue').default,
        },

        {
            path: '/seguimiento_tramites/edit/:id',
            name: 'seguimiento_tramites.edit',
            props: true,
            component: require('./components/modulos/seguimiento_tramites/edit.vue').default,
        },

        // SEGUIMIENTO APROBADOS
        {
            path: '/seguimiento_aprobados',
            name: 'seguimiento_aprobados.index',
            component: require('./components/modulos/seguimiento_aprobados/index.vue').default,
        },

        {
            path: '/seguimiento_aprobados/create',
            name: 'seguimiento_aprobados.create',
            component: require('./components/modulos/seguimiento_aprobados/create.vue').default,
        },

        {
            path: '/seguimiento_aprobados/edit/:id',
            name: 'seguimiento_aprobados.edit',
            props: true,
            component: require('./components/modulos/seguimiento_aprobados/edit.vue').default,
        },

        {
            path: '/seguimiento_aprobados/show/:id',
            name: 'seguimiento_aprobados.show',
            props: true,
            component: require('./components/modulos/seguimiento_aprobados/show.vue').default,
        },

        // SEGUIMIENTO RECTIFICACIONES
        {
            path: '/seguimiento_rectificacions',
            name: 'seguimiento_rectificacions.index',
            component: require('./components/modulos/seguimiento_rectificacions/index.vue').default,
        },

        {
            path: '/seguimiento_rectificacions/create',
            name: 'seguimiento_rectificacions.create',
            component: require('./components/modulos/seguimiento_rectificacions/create.vue').default,
        },

        {
            path: '/seguimiento_rectificacions/edit/:id',
            name: 'seguimiento_rectificacions.edit',
            props: true,
            component: require('./components/modulos/seguimiento_rectificacions/edit.vue').default,
        },

        // NOTAS
        {
            path: '/notas',
            name: 'notas.index',
            component: require('./components/modulos/notas/index.vue').default,
        },

        {
            path: '/notas/create',
            name: 'notas.create',
            component: require('./components/modulos/notas/create.vue').default,
        },

        {
            path: '/notas/edit/:id',
            name: 'notas.edit',
            props: true,
            component: require('./components/modulos/notas/edit.vue').default,
        },

        // NOTIFICACIONES
        {
            path: '/notificacions',
            name: 'notificacions.index',
            component: require('./components/modulos/notificacions/index.vue').default,
        },

        {
            path: '/notificacions/create',
            name: 'notificacions.create',
            component: require('./components/modulos/notificacions/create.vue').default,
        },

        {
            path: '/notificacions/edit/:id',
            name: 'notificacions.edit',
            props: true,
            component: require('./components/modulos/notificacions/edit.vue').default,
        },

        // ALERTAS
        {
            path: '/alertas',
            name: 'alertas.index',
            component: require('./components/modulos/alertas/index.vue').default,
        },


        // CONFIGURACIÓN
        {
            path: '/configuracion',
            name: 'configuracion',
            component: require('./components/modulos/configuracion/index.vue').default,
            props: true
        },

        // REPORTES
        {
            path: '/reportes/usuarios',
            name: 'reportes.usuarios',
            component: require('./components/modulos/reportes/usuarios.vue').default,
            props: true
        },
        {
            path: '/reportes/maestro_registro',
            name: 'reportes.maestro_registro',
            component: require('./components/modulos/reportes/maestro_registro.vue').default,
            props: true
        },

        {
            path: '/reportes/seguimiento_tramites',
            name: 'reportes.seguimiento_tramites',
            component: require('./components/modulos/reportes/seguimiento_tramites.vue').default,
            props: true
        },

        {
            path: '/reportes/seguimiento_aprobados',
            name: 'reportes.seguimiento_aprobados',
            component: require('./components/modulos/reportes/seguimiento_aprobados.vue').default,
            props: true
        },

        {
            path: '/reportes/seguimiento_rectificaciones',
            name: 'reportes.seguimiento_rectificaciones',
            component: require('./components/modulos/reportes/seguimiento_rectificaciones.vue').default,
            props: true
        },

        // PÁGINA NO ENCONTRADA
        {
            path: '*',
            component: require('./components/modulos/errors/404.vue').default
        },
    ],
    mode: 'history',
    linkActiveClass: 'active'
});