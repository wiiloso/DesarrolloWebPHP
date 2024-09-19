import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Cliente } from '../interfaces/cliente.interface';

@Injectable({
  providedIn: 'root'
})
export class ClienteService {
  private http = inject(HttpClient);
  private url: string = 'http://localhost:5003/controller/clientes.controller.php?op=';
  constructor() { }

  getAll(): Observable<any> {
    return this.http.get<Cliente[]>(this.url + 'clientesAll');
  }

  getById(id: number): Observable<Cliente> {
    const fromData = new FormData();
    fromData.append('id', id.toString());
    return this.http.post<Cliente>(this.url + 'obtenerClientebyId', fromData);
  }

  delete(idClientes: number): Observable<any> {
    const fromData = new FormData();
    fromData.append('idClientes', idClientes.toString());
    return this.http.post(this.url + 'deleteCliente', fromData);
  }
}
