import { CommonModule } from '@angular/common';
import { Component, inject } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, FormsModule, ReactiveFormsModule, Validators } from '@angular/forms';
import { ProfesorService } from '../../../core/services/profesor.service';
import { Router } from '@angular/router';
import { Profesor } from '../../../core/interfaces/profesor.interface';

@Component({
  selector: 'app-crear-profesor',
  standalone: true,
  imports: [ReactiveFormsModule, FormsModule, CommonModule],
  templateUrl: './crear-profesor.component.html',
  styleUrl: './crear-profesor.component.css'
})
export class CrearProfesorComponent {

  frm_profesor!: FormGroup;
  public dataService = inject(ProfesorService);
  public router = inject(Router);

  constructor(private fb: FormBuilder) {
    this.frm_profesor = this.fb.group({
      nombre: new FormControl('', [Validators.required]),
      apellido: new FormControl('', [Validators.required]),
      especialidad: new FormControl('', [Validators.required]),
      email: new FormControl('', [Validators.required]),
    });
    
  }

  guardarProfesor() {
    let profesorData : Profesor = {
      profesor_id: 0,
      nombre: this.frm_profesor.value.nombre,
      apellido: this.frm_profesor.value.apellido,
      especialidad: this.frm_profesor.value.especialidad,
      email: this.frm_profesor.value.email,
      estado: true
    };

    this.dataService.create(profesorData).subscribe(
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
