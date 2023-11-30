@extends('template.body')
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
      <div class="col-md-12">
        
      
      
      <div class="card">
      
      
      <div class="card-header">
            <h1>Sistema de Asistencia: PUNTO ZAPATA</h1>
      </div>
      
      
      <div class="row">
          <form action="{{ route('verify.send')}}" method="POST">
              @csrf
              <div id="timeSavin" class="col"></div>
              <div class="col">
                <button type="submit" class="btn border-0">
                  <img src="{{ asset('gifs/finger.gif') }}" alt="" class="rounded float-right" width="150" height="150" >
                </button>
              </div>
              <div class="col-sm">
                <a href="">opciones</a>
              </div>
              <h6>Último Marcado</h6>
              @isset($employee)
                <p>Personal: {{ $employee -> name }}</p>
                <p>Horas: </p>
              @else
                <p>Personal: </p>
                <p>Hora: </p>
              @endisset
          </form>
      </div>


        </div>

      </div>
  </div>
</div>



@endsection
