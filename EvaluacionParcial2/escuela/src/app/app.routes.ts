import { Routes } from '@angular/router';

export const routes: Routes = [
    {
        path: 'proveedor',
        loadComponent: () => import('./views/proveedor/proveedor.component'),
        children: [
            {
                path: 'lista-proveedores',
                title: 'Lista de Proveedores',
                loadComponent: () => import('./views/proveedor/lista-proveedores/lista-proveedores.component').then(m => m.default),
            },
            {
                path: 'ver-proveedor/:id',
                title: 'Ver Proveedor',
                loadComponent: () => import('./views/proveedor/ver-proveedor/ver-proveedor.component'),
            }
            // ,
            // {
            //     path: '', redirectTo:'lista-proveedores', pathMatch: 'full'
            // }
        ]
    },
    {
        path: 'producto',
        loadComponent: () => import('./views/producto/producto.component'),
        children: [
            {
                path: 'lista-productos',
                title: 'Lista de Productos',
                loadComponent: () => import('./views/producto/lista-productos/lista-productos.component'),
            },
            {
                path: 'ver-producto/:id',
                title: 'Ver Producto',
                loadComponent: () => import('./views/producto/ver-producto/ver-producto.component'),
            }
        ]
    },
    {
        path: 'cliente',
        loadComponent: () => import('./views/cliente/cliente.component'),
        children: [
            {
                path: 'lista-clientes',
                title: 'Lista de Clientes',
                loadComponent: () => import('./views/cliente/lista-clientes/lista-clientes.component'),
            },
            {
                path: 'ver-cliente/:id',
                title: 'Ver Cliente',
                loadComponent: () => import('./views/cliente/ver-cliente/ver-cliente.component'),
            }
        ]
    },
    {
        path: 'estudiante',
        loadComponent: () => import('./views/estudiante/estudiante.component'),
        children: [
            {
                path: 'lista-estudiantes',
                title: 'Lista de Estudiantes',
                loadComponent: () => import('./views/estudiante/lista-estudiante/lista-estudiante.component').then(m => m.ListaEstudianteComponent),
            },
            {
                path: 'crear-estudiante',
                title: 'Crear Estudiante',
                loadComponent: () => import('./views/estudiante/crear-estudiante/crear-estudiante.component').then(m => m.CrearEstudianteComponent),
            },
            {
                path: 'editar-estudiante/:id',
                title: 'Editar Estudiante',
                loadComponent: () => import('./views/estudiante/editar-estudiante/editar-estudiante.component').then(m => m.EditarEstudianteComponent),
            }
        ]
    },
    {
        path: 'profesor',
        loadComponent: () => import('./views/profesor/profesor.component'),
        children: [
            {
                path: 'lista-profesores',
                title: 'Lista de Profesores',
                loadComponent: () => import('./views/profesor/lista-profesor/lista-profesor.component').then(m => m.ListaProfesorComponent),
            },
            {
                path: 'crear-profesor',
                title: 'Crear Profesor',
                loadComponent: () => import('./views/profesor/crear-profesor/crear-profesor.component').then(m => m.CrearProfesorComponent),
            },
            {
                path: 'editar-profesor/:id',
                title: 'Editar Profesor',
                loadComponent: () => import('./views/profesor/editar-profesor/editar-profesor.component').then(m => m.EditarProfesorComponent),
            }
        ]
    },
    {
        path: '',
        redirectTo: '',
        pathMatch: 'full'
    }
];
