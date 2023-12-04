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


<form action="{{ route('delay.send')}}" method="POST">
    @csrf
    <div class="form-group d-flex align-items-center">
        
      <button type="submit" class="btn border-0"><img src="{{ asset('gifs/finger.gif') }}" alt="Click para escanear" width="140" height="140"></button>

    </div>
</form>

              @isset($dataSend)
                <p class="px-5">Personal: {{ $dataSend['employee'] }}</p>
                <p class="px-5">Atrasos: {{ $dataSend['delayTotal'] }}</p>
              @else
                <p class="px-5">Personal: </p>
                <p class="px-5">Atrasos: </p>
              @endisset

        <a href="{{route('verify')}}" class="btn btn-danger btn-sm float-rigth">Salir</a>

      </div>


        </div>

      </div>
</div>



@endsection
