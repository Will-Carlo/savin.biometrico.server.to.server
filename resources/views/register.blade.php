@extends('template.body')
@section('content')


    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Registro Personal
                        <!-- <a href="{{route('register_finger')}}" class="btn btn-success btn-sm float-rigth">Registrar</a> -->
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register.send')}}" method="POST">
                            @csrf
                            <div class="form-group">                               
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">                               
                                <label for="">Ci</label>
                                <input type="text" class="form-control" name="ci">
                            </div>
                            <div class="form-group">                               
                                <label for="">Turno</label>
                                <input type="text" class="form-control" name="turno">
                            </div>
                            <a href="{{route('verify')}}" class="btn btn-danger btn-sm float-rigth">Cancelar</a>
                            <button type="submit" class="btn btn-sm btn-primary">Siguiente</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 


@endsection
