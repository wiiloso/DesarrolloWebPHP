import { Component, inject } from '@angular/core';
import { ProductoService } from '../../../core/services/producto.service';
import { ActivatedRoute } from '@angular/router';
import { Producto } from '../../../core/interfaces/producto.interface';

@Component({
  selector: 'app-ver-producto',
  standalone: true,
  imports: [],
  templateUrl: './ver-producto.component.html',
  styleUrl: './ver-producto.component.css'
})
export default class VerProductoComponent {
  public dataService = inject(ProductoService);
  public route = inject(ActivatedRoute);
  idProductos:number = 0;
  producto: Producto = { } as Producto;

      ngOnInit(): void {
        this.loadProductoId();
      }
  
      loadProductoId() {
          this.route.paramMap.subscribe((params) => {
          this.idProductos = parseInt(params.get('id') || '0');
          this.dataService.getById(this.idProductos).subscribe((data: Producto) => {
          this.producto = data;
          });
        });                          
  }
}
