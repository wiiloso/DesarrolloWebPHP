import { Component, inject } from '@angular/core';
import { Proveedor } from '../../../core/interfaces/proveedor.interface';
import { ProveedorService } from '../../../core/services/proveedor.service';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-ver-proveedor',
  standalone: true,
  imports: [],
  templateUrl: './ver-proveedor.component.html',
  styleUrl: './ver-proveedor.component.css'
})
export default class VerProveedorComponent {
  
  public dataService = inject(ProveedorService);
  public route = inject(ActivatedRoute);
  idProveedores:number = 0;
  proveedor: Proveedor = { } as Proveedor;
  
  constructor() { }

    ngOnInit(): void {
      this.loadProveedorId();
    }

    loadProveedorId() {
        this.route.paramMap.subscribe((params) => {
        this.idProveedores = parseInt(params.get('id') || '0');
        this.dataService.getById(this.idProveedores).subscribe((data: Proveedor) => {
        this.proveedor = data;
        });
      });                          
    }
};