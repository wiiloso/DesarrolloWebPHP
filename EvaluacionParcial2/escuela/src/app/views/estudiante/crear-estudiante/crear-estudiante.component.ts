import { CommonModule } from '@angular/common';
import { Component, inject } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, FormsModule, ReactiveFormsModule, Validators } from '@angular/forms';
import { EstudianteService } from '../../../core/services/estudiante.service';
import { Estudiante } from '../../../core/interfaces/estudiante.interface';
import { Router } from '@angular/router';

@Component({
  selector: 'app-crear-estudiante',
  standalone: true,
  imports: [ReactiveFormsModule, FormsModule, CommonModule],
  templateUrl: './crear-estudiante.component.html',
  styleUrl: './crear-estudiante.component.css'
})
export class CrearEstudianteComponent {

  frm_estudiante!: FormGroup;
  public dataService = inject(EstudianteService);
  public router = inject(Router);


  constructor(private fb: FormBuilder) {
    this.frm_estudiante = this.fb.group({
      nombre: new FormControl('', [Validators.required]),
      apellido: new FormControl('', [Validators.required]),
      fecha_nacimiento: new FormControl('', [Validators.required]),
      grado: new FormControl('', [Validators.required]),
      estado: '1'
    });
  }

  ngOnInit(): void {
  }

  onSubmit() {

    let estudiantedata: Estudiante = {
      estudiante_id: 0, // or any default value
      nombre: this.frm_estudiante.value.nombre,
      apellido: this.frm_estudiante.value.apellido,
      // fecha_nacimiento: "2024-08-12 19:49:30",
      fecha_nacimiento: this.frm_estudiante.value.fecha_nacimiento,
      grado: this.frm_estudiante.value.grado,
      estado: true
    };


    // console.log(this.frm_estudiante.value);

    this.dataService.create(estudiantedata).subscribe(
      (data: any) => {
        console.log(data);
        this.router.navigateByUrl('estudiante/lista-estudiantes');
      },
      (error: any) => {
        console.log(error);
      }
    );
  }
}
