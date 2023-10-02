@extends('layouts.admin')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <h3 class="card-title text-center">Registro de tragos en el local</h3><br><br>
                    @if(session('success'))
                    
                    @endif

                    <form action="{{ route('lstalcoholismo.store') }}" method="POST" id="reservation-form">
                        @csrf
                        <div class="row">
                           
                            <div class="col-md-6">
                                
                                <div class="mb-3">
                                    <label for="trago" class="form-label">Ingrese el trago</label>
                                    <input type="text" class="form-control" id="trago" name="trago" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="precio_trago" class="form-label">precio_trago</label>
                                    <input type="text" class="form-control" id="precio_trago" name="precio_trago" required>
                                </div>
                            </div>

                            
                        
                           
                            
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-info">
                                <i class="fas fa-paper-plane"></i> Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Agregar un evento cuando el documento esté listo
    document.addEventListener("DOMContentLoaded", function() {
        // Seleccionar el elemento del alert
        var successAlert = document.getElementById("success-alert");

        // Verificar si el elemento del alert existe
        if (successAlert) {
            // Establecer un temporizador para ocultar el alert después de 2 segundos
            setTimeout(function() {
                successAlert.style.display = "none";
            }, 2000); // 2000 milisegundos = 2 segundos
        }
    });
</script>
@endsection
