import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Iva } from '../Interfaces/Iiva';

@Injectable({
  providedIn: 'root'
})
export class IvaService {

apiurl = 'http://localhost:5003/controllers/iva.controller.php?op=';

  constructor(private http: HttpClient) { }

  todos(): Observable<Iva[]> {
    return this.http.get<Iva[]>(this.apiurl + 'todos');
  }
}
