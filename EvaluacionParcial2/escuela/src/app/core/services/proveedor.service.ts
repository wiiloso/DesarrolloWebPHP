import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Proveedor } from '../interfaces/proveedor.interface';

@Injectable({
  providedIn: 'root'
})
export class ProveedorService {

  private url: string = 'http://localhost:5003/controller/proveedores.controller.php?op=';
  constructor(private http: HttpClient) { }

      getAll(): Observable<any> {
        return this.http.get<Proveedor[]>(this.url+ 'ProveedoresAll');
      }

      getById(id: number): Observable<Proveedor> {
        console.log(id);
        const fromData = new FormData();
        fromData.append('id', id.toString());       
        return this.http.post<Proveedor>(this.url+ 'obtenerProveedorbyId', fromData);
      }

      delete(idProveedores: number): Observable<any> {
        const fromData = new FormData();
        fromData.append('idProveedores', idProveedores.toString());
        return this.http.post(this.url+ 'deleteProveedor', fromData);
      }
}
