import { Component, inject } from '@angular/core';
import { ProductoService } from '../../../core/services/producto.service';
import { Producto } from '../../../core/interfaces/producto.interface';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-lista-productos',
  standalone: true,
  imports: [RouterLink],
  templateUrl: './lista-productos.component.html',
  styleUrl: './lista-productos.component.css'
})
export default class ListaProductosComponent {
  public dataService = inject(ProductoService);
  producto: Producto[] = [];

  constructor() { }

  ngOnInit(): void {
    this.loadListProducto();
  }

  loadListProducto() {
    this.dataService.getAll().subscribe((data: Producto[]) => {
      this.producto = data;
    });
  }

  deleteProducto(idProducto: number) {
    this.dataService.delete(idProducto).subscribe((data: any) => {
      this.loadListProducto();
    });
  }
}
