import { HttpClient } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { Profesor } from '../interfaces/profesor.interface';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ProfesorService {

  private url: string = 'http://localhost:5003/controller/profesores.controller.php?op=';
  private http = inject(HttpClient);

  constructor() { }
  // idProfesor: number;
  // nombre: string;
  // apellido: string;
  // especialidad: string;
  // email: string;
  // estado: string;

  getAll(): Observable<any> {
    return this.http.get<Profesor[]>(this.url + 'profesoresAll');
  }

  getById(id: number): Observable<Profesor> {
    const fromData = new FormData();
    fromData.append('id', id.toString());
    return this.http.post<Profesor>(this.url + 'obtenerProfesorbyId', fromData);
  }

  delete(profesor_id: number): Observable<any> {
    const fromData = new FormData();
    fromData.append('profesor_id', profesor_id.toString());
    return this.http.post(this.url + 'deleteProfesor', fromData);
  }

  create(profesor: Profesor): Observable<any> {
    const fromData = new FormData();
    fromData.append('nombre', profesor.nombre);
    fromData.append('apellido', profesor.apellido);
    fromData.append('especialidad', profesor.especialidad);
    fromData.append('email', profesor.email);
    fromData.append('estado', profesor.estado ? '1' : '0');
    return this.http.post(this.url + 'createProfesor', fromData);
  }

  update(profesor: Profesor): Observable<any> {
    const fromData = new FormData();
    fromData.append('profesor_id', profesor.profesor_id.toString());
    fromData.append('nombre', profesor.nombre);
    fromData.append('apellido', profesor.apellido);
    fromData.append('especialidad', profesor.especialidad);
    fromData.append('email', profesor.email);
    fromData.append('estado', profesor.estado ? '1' : '0');
    return this.http.post(this.url + 'updateProfesor', fromData);
  }

  

 
  
}
