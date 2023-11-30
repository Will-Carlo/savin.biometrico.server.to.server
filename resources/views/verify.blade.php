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
    
<h1>Punto zapata</h1>

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Verificación de Personal
                        <!-- <a href="{{route('register')}}" class="btn btn-success btn-sm float-rigth">register</a> -->
                    </div>
                    <div class="car-body">
                    <form action="{{ route('verify.send')}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Verificar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
