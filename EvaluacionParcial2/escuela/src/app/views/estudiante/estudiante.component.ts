import { Component } from '@angular/core';
import { ReactiveFormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';

@Component({
  selector: 'app-estudiante',
  standalone: true,
  imports: [RouterModule, ReactiveFormsModule],
  templateUrl: './estudiante.component.html',
  styleUrl: './estudiante.component.css'
})
export default class EstudianteComponent {

}
