@extends('template.template')
@section('content')

    {{ $data['nombres'] }}

    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Registro Personal
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register.send')}}" method="GET">
                            @csrf
                            <div class="form-group">                               
                                <label for="">Turno</label>
                                <input type="text" class="form-control" name="turno">
                            </div>
                            <a href="{{route('register')}}" class="btn btn-danger btn-sm float-rigth">Volver</a>
                            <button type="submit" class="btn btn-sm btn-primary">Siguiente</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 


    
@endsection
    


            