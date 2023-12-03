@extends('template.template')
@section('content')

  <div class="card">
    <div class="card-body">
      @if(session('shipping-report'))
      <div class="alert alert-success">
        {{session('shipping-report')}} 
      </div>
      @endif
    </div>
  </div>
    
  
  <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="row">
      
      
      <div class="card">
      
      <div class="card-header text-center">
      @auth
          <h1 class="mx-auto">Sistema de Asistencia: {{ $nameStore }}</h1>
      @else
          <h1 class="mx-auto">Sistema de Asistencia: no login</h1> 
      @endauth
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
