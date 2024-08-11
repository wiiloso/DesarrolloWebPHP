import { Component, inject } from '@angular/core';
import { ClienteService } from '../../../core/services/cliente.service';
import { Cliente } from '../../../core/interfaces/cliente.interface';
import { RouterLink } from '@angular/router';

@Component({
  selector: 'app-lista-clientes',
  standalone: true,
  imports: [RouterLink],
  templateUrl: './lista-clientes.component.html',
  styleUrl: './lista-clientes.component.css'
})
export default class ListaClientesComponent {

  public dataService = inject(ClienteService);
  cliente: Cliente[] = [];

  constructor() { }

  ngOnInit(): void {
    this.loadListaCliente();
  }

  loadListaCliente() {
    this.dataService.getAll().subscribe((data: Cliente[]) => {
      this.cliente = data;
    });
  }

  deleteCliente(idClientes: number) {
    this.dataService.delete(idClientes).subscribe((data: any) => {
      this.loadListaCliente();
    });
  }
}
