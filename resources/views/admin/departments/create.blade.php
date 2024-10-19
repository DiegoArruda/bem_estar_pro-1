@extends('admin.layouts.default')

@section('title', 'BemEstar Pro - Cadastro de Departamento')

@section('content')

    <h1 class="text-center">@if(isset($department))Editar @else Cadastrar @endif</h1> <hr>


    <div class="col-8 m-auto">
    <form name="formCad" id="formCad" method="POST" action="{{url('departments')}}">
          @csrf
          <input class="form-control" type="text" name="name" id="name" placeholder="Nome do departamento">
          <input class="btn btn-primary" type="submit" value="@if(isset($department))Editar @else Cadastrar @endif">
       </form>
</div>
@endsection