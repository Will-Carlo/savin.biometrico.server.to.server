@extends('template.template')
@section('content')





<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="row">
      
      
      <div class="card">
      
      <div class="card-header text-center">
      @if(session('storeName')!==null)
          <h1 class="mx-auto">Sistema de Asistencia: {{ session('storeName') }}</h1>
      @else
          <h1 class="mx-auto">Sistema de Asistencia: no login</h1> 
      @endif
      </div>




    <div class="">
        <a href="{{route('delay')}}" class="btn btn-sm btn-primary">Ver Atrasos</a>
        <a href="{{route('register')}}" class="btn btn-sm btn-primary">Registrar nuevo personal</a>
        <a href="{{route('adm')}}" class="btn btn-sm btn-primary">Reportes</a>

        <a href="{{route('verify')}}" class="btn btn-danger btn-sm float-rigth">Volver</a>
    </div>

      </div>


        </div>

      </div>
</div>



@endsection
