import { Component, inject, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ProfesorService } from '../../../core/services/profesor.service';
import { ActivatedRoute, Router } from '@angular/router';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-editar-profesor',
  standalone: true,
  imports:[ReactiveFormsModule, FormsModule, CommonModule],
  templateUrl: './editar-profesor.component.html',
  styleUrl: './editar-profesor.component.css'
})
export class EditarProfesorComponent implements OnInit {

  frm_profesor!: FormGroup;
  public dataService = inject(ProfesorService);
  public route = inject(ActivatedRoute);
  public router = inject(Router);
  private fb = inject(FormBuilder);
  id: number = 0;

  constructor() {
    this.frm_profesor = this.fb.group({
      nombre: [''],
      apellido: [''],
      especialidad: [''],
      email: ['']
    });
   } 
  ngOnInit(): void {
    this.id = this.route.snapshot.params['id'];
    this.dataService.getById(this.id).subscribe((data) => {
      console.log(data);
      this.frm_profesor.setValue({
        nombre: data.nombre,
        apellido: data.apellido,
        especialidad: data.especialidad,
        email: data.email
      });
    });
  }

  editarProfesor() {
    console.log(this.id);
    let profesorData = {
      profesor_id: this.id,
      nombre: this.frm_profesor.value.nombre,
      apellido: this.frm_profesor.value.apellido,
      especialidad: this.frm_profesor.value.especialidad,
      email: this.frm_profesor.value.email,
      estado: true
    };

    this.dataService.update(profesorData).subscribe(
      (data: any) => {
        console.log(data);
        this.router.navigateByUrl('profesor/lista-profesores');
      },
      (error: any) => {
        console.log(error);
      }
    );
  }

}
