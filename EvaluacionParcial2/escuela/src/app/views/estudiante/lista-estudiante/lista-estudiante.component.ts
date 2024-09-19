import { Component, inject } from '@angular/core';
import { EstudianteService } from '../../../core/services/estudiante.service';
import { Estudiante } from '../../../core/interfaces/estudiante.interface';
import { RouterLink, RouterModule } from '@angular/router';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

@Component({
  // selector: 'app-lista-estudiante',
  standalone: true,
  imports: [RouterLink, ReactiveFormsModule, FormsModule, CommonModule],
  templateUrl: './lista-estudiante.component.html',
  styleUrl: './lista-estudiante.component.css'
})
export class ListaEstudianteComponent {
  public dataService = inject(EstudianteService);
  estudiante: Estudiante[] = [];

  constructor() { }

  ngOnInit(): void {
    this.loadListEstudiante();
  }

  loadListEstudiante() {
    this.dataService.getAll().subscribe((data: Estudiante[]) => {
      this.estudiante = data;
    });
  }

  deleteEstudiante(idEstudiante: number) {
    this.dataService.delete(idEstudiante).subscribe((data: any) => {
      this.loadListEstudiante();
    });
  }
}
