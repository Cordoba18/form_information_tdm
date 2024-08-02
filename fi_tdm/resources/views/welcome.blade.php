
@extends('layouts.app')

@section('title')
FORMULARIO BASE DE DATOS
@endsection


@section('css')

@endsection

@section('js')


@endsection

@section('body')


<div class="container-fluid py-4">

    <div class="row justify-content-center">

        <div class="col-lg-12 col-md-12 justify-content-center align-items-center" style="display: flex;">


            <div class="card m-3" style="width: 25rem;">

                <div class="card-header">
                    <h6 class="card-title text-center">
                        REGISTRO DE USUARIOS
                    </h6>
                </div>
                <div class="card-body">

                    <form action="{{ route('home.save') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name" required placeholder="Ingrese su nombre">
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Teléfono</label>
                            <input type="number" class="form-control" name="phone" required placeholder="Ingrese su teléfono">
                          </div>

                          <div class="mb-3">
                            <label class="form-label">TIENDA</label>
                            <input type="text" disabled class="form-control" value="{{ $shop->name }}">
                            <input type="text" name="id_shop" class="form-control" value="{{ $shop->id }}" hidden>
                          </div>


                          <div class="mb-3">
                            <label class="form-label">Fecha de cumpleaños</label>
                            <input type="date" class="form-control" name="date_brirthay" max="{{ $date_now }}" class="form-control" required>

                          </div>

                          @if (session('message'))
                          <script>
                            Swal.fire({
  icon: "success",
  title: "Muy bien!",
  text: "{{ session('message') }}",

});
                          </script>


@endif

@if (session('message_error'))

              <script>
                Swal.fire({
icon: "error",
title: "opss...",
text: "{{ session('message_error') }}",

});
              </script>

         @endif

                          <button type="submit" class="btn btn-danger">Guardar</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>


@endsection



