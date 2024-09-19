import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Producto } from '../interfaces/producto.interface';

@Injectable({
  providedIn: 'root'
})
export class ProductoService {

  private url: string = 'http://localhost:5003/controller/productos.controller.php?op=';
  private http = inject(HttpClient);

  constructor() { }

  getAll(): Observable<any> {
    return this.http.get<Producto[]>(this.url + 'ProductosAll');
  }

  getById(id: number): Observable<Producto> {
    console.log(id);
    const fromData = new FormData();
    fromData.append('id', id.toString());
    return this.http.post<Producto>(this.url + 'obtenerProductobyId', fromData);
  }

  delete(idProductos: number): Observable<any> {
    const fromData = new FormData();
    fromData.append('idProductos', idProductos.toString());
    return this.http.post(this.url + 'eliminarProducto', fromData);
  }
}
