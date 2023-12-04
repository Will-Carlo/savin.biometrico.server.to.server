@extends('template.template')
@section('content')


    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Registro Personal
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register.schedule')}}" method="GET">
                            @csrf
                            <div class="form-group">                               
                                <label for="">Paterno</label>
                                <input type="text" class="form-control" name="paterno">
                            </div>
                            <div class="form-group">                               
                                <label for="">Materno</label>
                                <input type="text" class="form-control" name="materno">
                            </div>
                            <div class="form-group">                               
                                <label for="">Nombres</label>
                                <input type="text" class="form-control" name="nombres">
                            </div>
                            <div class="form-group">                               
                                <label for="">Ci</label>
                                <input type="text" class="form-control" name="numero_documento">
                            </div>
                            <div class="form-group">                               
                                <label for="">Sigla IDK</label>
                                <input type="text" class="form-control" name="sigla">
                            </div>

                            <div class="form-group">                               
                                <label for="">Área</label>
                                <select name="id_area" id="id_area" class="form-control">
                                   <!-- Añadir foreach para las áreas -->
                                    <option value="">Sistemas</option>
                                    <option value="">Caja</option>
                                    <option value="">Reporte</option>
                                </select>
                            </div>

                            <div class="form-group">                               
                                <label for="">Fecha nacimiento</label>
                                <input type="date" class="form-control" name="fecha_nacimiento">
                            </div>

                            <div class="form-group">                               
                                <label for="">Género</label>
                                <select name="ind_genero" id="ind_genero" class="form-control">
                                   <!-- Añadir foreach para las áreas -->
                                    <option value="">Masculino</option>
                                    <option value="">Femenino</option>
                                </select>
                            </div>

                            <div class="form-group">                               
                                <label for="">email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group">                               
                                <label for="">numero_celular</label>
                                <input type="number" class="form-control" name="numero_celular">
                            </div>
                            <div class="form-group">                               
                                <label for="">direccion</label>
                                <input type="text" class="form-control" name="direccion">
                            </div>

                            <div class="form-group">                               
                                <label for="">ruta archivo</label>
                                <input type="text" class="form-control" name="ruta_archivo">
                            </div>

                            <div class="form-group">                               
                                <label for="">Ciudad</label>
                                <select name="id_ciudad" id="id_ciudad" class="form-control">
                                   <!-- Añadir foreach para las áreas -->
                                    <option value="">La Paz</option>
                                    <option value="">Cochababa</option>
                                    <option value="">Sta. Cruz</option>
                                    <option value="">Tarija</option>
                                    <option value="">Pando</option>
                                    <option value="">Beni</option>
                                </select>
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
    


            