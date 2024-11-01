@extends('layout.app')
@section('title','Criar Caderno')
@section('conteudo')

<div class="row mx-auto">
    <div class="mt-3 mb-3 col 6">
        <h3>Criar Caderno</h3>
        <!-- form ilustrativo -->
        <form action="/admin/cadernos/{{$caderno->id}}/edit" method="POST" enctype="multipart/form-data">
            <!-- TOKEN -->
            @csrf
            <!-- Ajustar o metodo -->
            @method('PUT')

            <!-- 'nome'-->
            <div class="form-group mb-1">
                <label for="noem">Nome</label>
                <input type="text" id="nome" name="nome" value="{{old('nome',$caderno->nome)}}" class="form-control @error('nome') is-invalid @enderror">
                @if($errors->has('nome'))
                <div class="text-danger">{{$errors->first('nome')}}

                </div>
                @endif
           

             

                <button type="submit" class="btn btn-success">Salvar</button>

        </form>



    </div>
</div>

@endsection