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
                <h1 class="mx-auto">Sistema de Asistencia: PUNTO ZAPATA</h1>
            </div>
      
      
      <div class="row">
        <div id="dateSavin" class="text-lg"></div>
        <div id="timeSavin" class="text-lg"></div>





<form action="{{ route('verify.send')}}" method="POST">
    @csrf
    <div class="form-group d-flex align-items-center">
        
      <button type="submit" class="btn btn-sm mr-3 flex-shrink-0">Leer Huella</button>

        <div class="flex-grow-1">
            <input type="text" class="form-control" name="" placeholder="">
        </div>
    </div>
</form>






    <div class="">
        <a href="#" class="">opciones</a>
    </div>


<br><br><br>
          <h6><strong>Último Marcado</strong></h6>
              @isset($employee)
                <p class="px-5">Personal: {{ $employee -> name }}</p>
                <p class="px-5">Hora: {{ $employee -> horaIngreso }}</p>
              @else
                <p class="px-5">Personal: </p>
                <p class="px-5">Hora: </p>
              @endisset
      </div>


        </div>

      </div>
</div>



@endsection
