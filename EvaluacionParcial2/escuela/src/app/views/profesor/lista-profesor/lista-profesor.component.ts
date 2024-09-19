import { Component, inject } from '@angular/core';
import { ProfesorService } from '../../../core/services/profesor.service';
import { Profesor } from '../../../core/interfaces/profesor.interface';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-lista-profesor',
  standalone: true,
  imports: [RouterLink],
  templateUrl: './lista-profesor.component.html',
  styleUrl: './lista-profesor.component.css'
})
export class ListaProfesorComponent {
  public dataService = inject(ProfesorService);
  profesor: Profesor[] = [];
  constructor() { }

  ngOnInit(): void {
    this.loadListProfesor();
  }

  loadListProfesor() {
    this.dataService.getAll().subscribe((data: Profesor[]) => {
      this.profesor = data;
    });
  }

  deleteProfesor(idProfesor: number) {
    this.dataService.delete(idProfesor).subscribe((data: any) => {
      this.loadListProfesor();
    });
  }
}
