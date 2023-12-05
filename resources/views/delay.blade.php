@extends('template.template')
@section('content')

      
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="row">
      
      
      <div class="card">
      
      <div class="card-header text-center">
      @if(session('storeName')!==null)
          <h1 class="mx-auto">Ver atrasos acumulados: {{ session('storeName') }}</h1>
      @else
          <h1 class="mx-auto">Ver atrasos acumulados: no login</h1> 
      @endif
      </div>

      
      <div class="row">
        <div id="dateSavin" class="text-lg"></div>
        <div id="timeSavin" class="text-lg"></div>





<form action="{{ route('delay.send')}}" method="POST">
    @csrf
    <div class="form-group d-flex align-items-center">
        
      <button type="submit" class="btn btn-light ">Leer Huella</button>

        <!-- <div class="flex-grow-1">
            <input type="text" class="form-control" name="" placeholder="">
        </div> -->
    </div>
</form>






              @isset($dataSend)
                <p class="px-5">Personal: {{ $dataSend['employee'] }}</p>
                <p class="px-5">Atrasos en min. Total: {{ $dataSend['delayTotal'] }}</p>
              @else
                <p class="px-5">Personal: </p>
                <p class="px-5">Atrasos en min. Total: </p>
              @endisset

        <a href="{{route('verify')}}" class="btn btn-danger btn-sm float-rigth">Salir</a>

      </div>


        </div>

      </div>
</div>



@endsection
