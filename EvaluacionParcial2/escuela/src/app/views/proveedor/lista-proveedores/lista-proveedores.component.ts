import { Component, inject } from '@angular/core';
import { ProveedorService } from '../../../core/services/proveedor.service';
import { Proveedor } from '../../../core/interfaces/proveedor.interface';
import { RouterLink } from '@angular/router';

@Component({
  // selector: 'app-lista-proveedores',
  standalone: true,
  imports: [RouterLink],
  templateUrl: './lista-proveedores.component.html',
  styleUrl: './lista-proveedores.component.css'
})
export default class ListaProveedoresComponent {

  public dataService = inject(ProveedorService);
  proveedores: Proveedor[] = [];

  constructor() { }

  ngOnInit(): void {
    this.loadListProveedor();
  }

  loadListProveedor() {
    this.dataService.getAll().subscribe((data: Proveedor[]) => {
      this.proveedores = data;
    });
  }

  deleteProveedor(idProveedores: number) {
    this.dataService.delete(idProveedores).subscribe((data: any) => {
      this.loadListProveedor();
    });
  }
}
