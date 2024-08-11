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
        path: '',
        redirectTo: '',
        pathMatch: 'full'
    }
];
