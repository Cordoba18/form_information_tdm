@extends('layouts.app')

@section('title')
    VALIDACIÓN
@endsection


@section('css')
@endsection

@section('body')
    <div class="container-fluid py-4">

        <div class="row justify-content-center">

            <div class="col-lg-12 col-md-12 justify-content-center align-items-center" style="display: flex;">


                <div class="card m-3" style="width: 25rem;">

                    <div class="card-header">
                        <h6 class="card-title text-center">
                            ERROR - NO SE ENCONTRO UNA TIENDA
                        </h6>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('home') }}" method="GET">
                            <div class="mb-3">

                                <select class="form-select" aria-label="Default select example" name="co">
                                    <option selected>Seleccione una tienda</option>
                                    @foreach ($shops as $s)
                                    <option value="{{ $s->centro_operacion }}">{{ $s->name }}</option>

                                    @endforeach

                                  </select>
                                  <input type="text" name="cia" value="1" hidden>
                            </div>
                            <button class="btn btn-danger">IR</button>
                        </form>
                    </div>
                </div>


            </div>


        </div>
    </div>
@endsection


@section('js')
@endsection
