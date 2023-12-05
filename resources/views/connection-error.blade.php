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

      
      <div class="row">
        <div id="dateSavin" class="text-lg"></div>
        <div id="timeSavin" class="text-lg"></div>


        <div class="">
            <p>Algo salió mal.</p>
        <a href="{{route('verify')}}" class="btn btn-primary btn-sm float-rigth">VOLVER AL INICIO</a>
        
    </div>






      </div>


        </div>

      </div>
</div>



@endsection
