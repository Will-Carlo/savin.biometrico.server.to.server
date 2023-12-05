@extends('template.template')
@section('content')

{{ session('dataUserRegister')['nombres'] }}

    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Registro Horario
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register.send')}}" method="GET">
                            @csrf
                          


                            <div class="form-group">                               
                                <label for="">Turno</label>
                                <select name="id_area" id="id_area" class="form-control">
                                   <!-- Añadir foreach para las áreas -->
                                    <option value="1">Completo</option>
                                    <option value="2">Medio Tiempo mañana</option>
                                    <option value="3">Medio Tiempo Tarde</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Horario en la semana</label> <br>

                                <label for="">Horario en la semana</label> 
                                <input type="checkbox" name="monday" id="monday">
                                <input type="checkbox" name="Tuesday" id="Tuesday">
                                <input type="checkbox" name="Wednesday" id="Wednesday">
                                <input type="checkbox" name="Wednesday" id="Wednesday">
                                <input type="checkbox" name="Wednesday" id="Wednesday">
                                <input type="checkbox" name="Wednesday" id="Wednesday">
                                <input type="checkbox" name="Wednesday" id="Wednesday">
                                 <br>
                                <input type="checkbox" name="monday" id="monday">
                                <input type="checkbox" name="Tuesday" id="Tuesday">
                                <input type="checkbox" name="Wednesday" id="Wednesday">
                                <input type="checkbox" name="Wednesday" id="Wednesday">
                                <input type="checkbox" name="Wednesday" id="Wednesday">
                                <input type="checkbox" name="Wednesday" id="Wednesday">
                                <input type="checkbox" name="Wednesday" id="Wednesday">

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
    


            