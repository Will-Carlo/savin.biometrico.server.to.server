<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    /* Estilos adicionales si es necesario */
    body, html {
      height: 100%;
    }
  </style>
</head>
<body>
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
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>