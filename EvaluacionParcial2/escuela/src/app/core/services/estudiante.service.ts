import { HttpClient, HttpHeaders } from '@angular/common/http';
import { inject, Injectable } from '@angular/core';
import { catchError, Observable, throwError } from 'rxjs';
import { Estudiante } from '../interfaces/estudiante.interface';

@Injectable({
  providedIn: 'root'
})
export class EstudianteService {

  private url: string = 'http://localhost:5003/controller/estudiantes.controller.php?op=';
  private http = inject(HttpClient);

  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json'
    })
  };

  constructor() { }

  getAll(): Observable<any> {
    return this.http.get<Estudiante[]>(this.url + 'estudiantesAll');
  }

  getById(id: number): Observable<Estudiante> {
    console.log(id);
    const fromData = new FormData();
    fromData.append('id', id.toString());
    return this.http.post<Estudiante>(this.url + 'obtenerEstudiantebyId', fromData);
  }

  delete(estudiante_id: number): Observable<any> {
    const fromData = new FormData();
    fromData.append('estudiante_id', estudiante_id.toString());
    return this.http.post(this.url + 'deleteEstudiante', fromData);
  }

  create(estudiante: Estudiante): Observable<string> {
    const fromData = new FormData();
    fromData.append('nombre', estudiante.nombre);
    fromData.append('apellido', estudiante.apellido);
    fromData.append('fecha_nacimiento', estudiante.fecha_nacimiento);
    fromData.append('grado', estudiante.grado);
    fromData.append('estado', estudiante.estado ? '1' : '0');
    return this.http.post<string>(this.url + 'createEstudiante', fromData);
    // return this.http.post(this.url + 'createEstudiante', fromData);
  }

  createEstudiante(estudiante: Estudiante): Observable<Estudiante> {
    console.log(JSON.stringify(estudiante));
    return this.http.post<Estudiante>(this.url + 'createEstudiante', JSON.stringify(estudiante), this.httpOptions)
      .pipe(
        catchError(this.errorHandler)
      );
  }

  update(estudiante: Estudiante): Observable<any> {
    const fromData = new FormData();
    fromData.append('estudiante_id', estudiante.estudiante_id?.toString() || '');
    fromData.append('nombre', estudiante.nombre);
    fromData.append('apellido', estudiante.apellido);
    fromData.append('fecha_nacimiento', estudiante.fecha_nacimiento);
    fromData.append('grado', estudiante.grado);
    fromData.append('estado', estudiante.estado ? '1' : '0');
    return this.http.post(this.url + 'updateEstudiante', fromData);
  }

  errorHandler(error: any) {
    let errorMessage = '';

    if (error.error instanceof ErrorEvent) {
      errorMessage = error.error.message;
      console.log("errortt");
    } else {
      errorMessage = `Error Code: ${error.status}\nMessage: ${error.message}`;
      console.log("errortt");
    }
    return throwError(errorMessage);
  }
}
