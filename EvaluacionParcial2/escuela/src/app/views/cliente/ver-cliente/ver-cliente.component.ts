import { Component, inject } from '@angular/core';
import { ClienteService } from '../../../core/services/cliente.service';
import { ActivatedRoute } from '@angular/router';
import { Cliente } from '../../../core/interfaces/cliente.interface';

@Component({
  selector: 'app-ver-cliente',
  standalone: true,
  imports: [],
  templateUrl: './ver-cliente.component.html',
  styleUrl: './ver-cliente.component.css'
})
export default class VerClienteComponent {
  public dataService = inject(ClienteService);
  public route = inject(ActivatedRoute);
  idClientes:number = 0;
  cliente: Cliente = { } as Cliente;

  ngOnInit(): void {
    this.loadClienteId();
  }

  loadClienteId() {
      this.route.paramMap.subscribe((params) => {
      this.idClientes = parseInt(params.get('id') || '0');
      this.dataService.getById(this.idClientes).subscribe((data: Cliente) => {
      this.cliente = data;
      });
    });                          
  }
}
