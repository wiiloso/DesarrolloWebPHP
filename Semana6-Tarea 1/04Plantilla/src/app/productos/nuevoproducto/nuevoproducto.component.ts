import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormControl, FormGroup, FormsModule, ReactiveFormsModule, Validators } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { IProducto } from 'src/app/Interfaces/iproducto';
import { Iproveedor } from 'src/app/Interfaces/iproveedor';
import { IUnidadMedida } from 'src/app/Interfaces/iunidadmedida';
import { IvaService } from 'src/app/Services/iva.service';
import { ProductoService } from 'src/app/Services/productos.service';
import { ProveedorService } from 'src/app/Services/proveedores.service';
import { UnidadmedidaService } from 'src/app/Services/unidadmedida.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-nuevoproducto',
  standalone: true,
  imports: [ReactiveFormsModule, FormsModule, CommonModule],
  templateUrl: './nuevoproducto.component.html',
  styleUrl: './nuevoproducto.component.scss'
})
export class NuevoproductoComponent implements OnInit {
  listaUnidadMedida: IUnidadMedida[] = [];
  listaProveedores: Iproveedor[] = [];
  listaiva: any[] = [];
  titulo = '';
  frm_Producto: FormGroup;
  idProductos = 0;
  constructor(
    private uniadaServicio: UnidadmedidaService,
    private fb: FormBuilder,
    private proveedoreServicio: ProveedorService,
    private ivaServicio: IvaService,
    private proServicio: ProductoService,
    private navegacion: Router,
    private ruta: ActivatedRoute
  ) {}
  ngOnInit(): void {
    this.uniadaServicio.todos().subscribe((data) => (this.listaUnidadMedida = data));
    this.proveedoreServicio.todos().subscribe((data) => (this.listaProveedores = data));
    this.ivaServicio.todos().subscribe((data) => (this.listaiva = data));

    this.idProductos = parseInt(this.ruta.snapshot.paramMap.get('id'));
    if (this.idProductos > 0) {
      this.proServicio.uno(this.idProductos).subscribe((producto) => {
        console.log(producto);
        this.frm_Producto.controls['Codigo_Barras'].setValue(producto.Codigo_Barras);
        this.frm_Producto.controls['Nombre_Producto'].setValue(producto.Nombre_Producto);
        this.frm_Producto.controls['Graba_IVA'].setValue(producto.Graba_IVA);
        this.frm_Producto.controls['Unidad_Medida_idUnidad_Medida'].setValue(producto.Unidad_Medida_idUnidad_Medida);
        this.frm_Producto.controls['IVA_idIVA'].setValue(producto.IVA_idIVA);
        this.frm_Producto.controls['Cantidad'].setValue(producto.Cantidad);
        this.frm_Producto.controls['Valor_Compra'].setValue(producto.Valor_Compra);
        this.frm_Producto.controls['Valor_Venta'].setValue(producto.Valor_Venta);
        this.frm_Producto.controls['Proveedores_idProveedores'].setValue(producto.Proveedores_idProveedores);
        this.titulo = 'Actualizar Producto';
        });   
    }

    this.crearFormulario();
    /*
1.- Modelo => Solo el procedieminto para realizar un select
2.- Controador => Solo el procedieminto para realizar un select
3.- Servicio => Solo el procedieminto para realizar un select
4.-  realizar el insertar y actualizar

*/
  }

  cargaiva() {
    this.ivaServicio.todos().subscribe((data) => {
      console.log(data);
    });
  }

  crearFormulario() {
    this.frm_Producto = new FormGroup({
      Codigo_Barras: new FormControl('', Validators.required),
      Nombre_Producto: new FormControl('', Validators.required),
      Graba_IVA: new FormControl('', Validators.required),
      Unidad_Medida_idUnidad_Medida: new FormControl('', Validators.required),
      IVA_idIVA: new FormControl('', Validators.required),
      Cantidad: new FormControl('', [Validators.required, Validators.min(1)]),
      Valor_Compra: new FormControl('', [Validators.required, Validators.min(0)]),
      Valor_Venta: new FormControl('', [Validators.required, Validators.min(0)]),
      Proveedores_idProveedores: new FormControl('', Validators.required)
    });
  }


  grabar() {

    let producto: IProducto = {
      idProductos: this.idProductos,
      Codigo_Barras: this.frm_Producto.get('Codigo_Barras').value,
      Nombre_Producto: this.frm_Producto.get('Nombre_Producto').value,
      Graba_IVA: this.frm_Producto.get('Graba_IVA').value,
      Unidad_Medida_idUnidad_Medida: this.frm_Producto.get('Unidad_Medida_idUnidad_Medida').value,
      IVA_idIVA: this.frm_Producto.get('IVA_idIVA').value,
      Cantidad: this.frm_Producto.get('Cantidad').value,
      Valor_Compra: this.frm_Producto.get('Valor_Compra').value,
      Valor_Venta: this.frm_Producto.get('Valor_Venta').value,
      Proveedores_idProveedores: this.frm_Producto.get('Proveedores_idProveedores').value
    };
    console.log(producto);
    Swal.fire({
      title: 'Producto',
      text: 'Esta seguro que desea grabar el producto!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Grabar Producto'
    }).then((result) => {
      if (result.isConfirmed) {
        if (this.idProductos > 0) {
          this.proServicio.actualizar(producto).subscribe((respuesta) => {
            Swal.fire({
              title: 'Producto',
              text: 'Producto Actualizado',
              icon: 'success',
              confirmButtonText: 'Aceptar'
            });
            this.navegacion.navigate(['/productos']);
          });
        } else {
          this.proServicio.insertar(producto).subscribe((respuesta) => {
            Swal.fire({
              title: 'Producto',
              text: 'Producto grabado',
              icon: 'success',
              confirmButtonText: 'Aceptar'
            });
            this.navegacion.navigate(['/productos']);
          });
        } 
      } 
    });
  }
}
