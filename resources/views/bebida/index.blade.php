@extends('layouts.admin')

@section('content')
<style>
    .listado-busqueda {
  width: 240px;
  float: right;
}
.listado-busqueda input {
  width: calc(100% - 70px);
  display: inline-block;
}
</style>

<!-- cabecera -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Listado Bebidas</h4>

            <div class="page-title-right">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"></h4>
                <form method="GET" class="listado-busqueda">
                    <input type="text" placeholder="Ingrese su búsqueda" name="s" class="form-control input-sm"
                        value="<?php if (!empty($_GET['s'])) echo $_GET['s']; ?>" />
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </form>
                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#agregarModal">
                    <i class="fas fa-plus-circle"></i> Nuevo Registro
                </a>
            </div>
            </div>

        </div>
    </div>
</div>
<!-- cabecera -->

<!-- listado -->
        <div class="card">
            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap table-striped-columns mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">gaseosas</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col" style="width: 150px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- FILAS DE LA TABLA -->
                                @php $contador = 1; @endphp
                                @foreach($gaseosas as $gaseosa)
                                    <tr>
                                        <td>{{ $contador }}</td>
                                        <td>{{ $gaseosa->gaseosas }}</td>
                                        <td>{{ $gaseosa->precio_bebida }}</td>
                                        <td>
                                        <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editarModal{{ $gaseosa->idBebidas }}">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                            <a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarBebidaModal{{ $gaseosa->idBebidas }}">
                                                <i class="fas fa-trash-alt"></i> Eliminar
                                            </a>
                                        </td>
                                    </tr>
                                    @php 
                                        $contador++; 
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- listado -->


<!-- Modal para Crear Nuevo Tema -->
<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="crearModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crearModalLabel">Crear nuevo registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('listadobebidas.store')}}" method="POST" id="reservation-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="gaseosas" class="form-label">Ingrese el Nombre</label>
                                    <input type="text" class="form-control" id="gaseosas" name="gaseosas" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="precio_bebida" class="form-label">Precio</label>
                                    <input type="number" class="form-control" id="precio_bebida" name="precio_bebida" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Modal para Crear Nuevo Tema -->

@foreach ($gaseosas as $gaseosa)
<!-- Modal de Editar -->
<div class="modal fade" id="editarModal{{ $gaseosa->idBebidas }}" tabindex="-1" aria-labelledby="editarBebidaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarBebidaModalLabel">Editar Trago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('listadobebidas.update', $gaseosa->idBebidas) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gaseosas" class="form-label">Ingrese el Nombre</label>
                                <input type="text" class="form-control" id="gaseosas" name="gaseosas" value="{{ $gaseosa->gaseosas}}" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="precio_bebida" class="form-label">Precio</label>
                                <input type="number" class="form-control" id="precio_bebida" name="precio_bebida" value="{{ $gaseosa->precio_bebida}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="eliminarBebidaModal{{ $gaseosa->idBebidas }}" tabindex="-1" aria-labelledby="eliminarBebidaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarBebidaModalLabel">Eliminar Bebida</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de eliminar esta empresa?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form method="POST" action="{{ route('listadobebidas.destroy', $gaseosa->idBebidas) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endforeach
@endsection

