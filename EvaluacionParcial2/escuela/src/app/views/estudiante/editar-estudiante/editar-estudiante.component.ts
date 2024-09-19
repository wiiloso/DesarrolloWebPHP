import { Component, inject, OnInit } from '@angular/core';
import { EstudianteService } from '../../../core/services/estudiante.service';
import { ActivatedRoute, Router } from '@angular/router';
import { FormControl, FormGroup, FormsModule, ReactiveFormsModule, Validators, FormBuilder } from '@angular/forms';
import { CommonModule } from '@angular/common';
import { Estudiante } from '../../../core/interfaces/estudiante.interface';

@Component({
  selector: 'app-editar-estudiante',
  standalone: true,
  imports: [ReactiveFormsModule, FormsModule, CommonModule],
  templateUrl: './editar-estudiante.component.html',
  styleUrl: './editar-estudiante.component.css'
})
export class EditarEstudianteComponent implements OnInit {

  public dataService = inject(EstudianteService);
  public route = inject(ActivatedRoute);
  public router = inject(Router);
  frm_estudiante!: FormGroup;
  private fb = inject(FormBuilder);
  id: number = 0;

  constructor() { } 
  ngOnInit(): void {
    this.id = this.route.snapshot.params['id'];

    this.dataService.getById(this.id).subscribe((data) => {
      console.log(data);
      this.frm_estudiante.setValue({
        nombre: data.nombre,
        apellido: data.apellido,
        fecha_nacimiento: data.fecha_nacimiento,
        grado: data.grado
      });
    
    });

    this.frm_estudiante = this.fb.group({
      nombre: new FormControl('', [Validators.required]),
      apellido: new FormControl('', [Validators.required]),
      fecha_nacimiento: new FormControl('', [Validators.required]),
      grado: new FormControl('', [Validators.required])
    });
    console.log(this.id);
  }

  onSubmit() {
    let estudiantedata: Estudiante = {
      estudiante_id: this.id, // 
      nombre: this.frm_estudiante.value.nombre,
      apellido: this.frm_estudiante.value.apellido,
      fecha_nacimiento: this.frm_estudiante.value.fecha_nacimiento,
      grado: this.frm_estudiante.value.grado,
      estado: true
    };

    console.log(this.frm_estudiante.value);

    this.dataService.update(estudiantedata).subscribe(
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
