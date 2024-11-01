@extends('layout.app')
@section('title','Criar Noticia')
@section('conteudo')

<div class="row mx-auto">
    <div class="mt-3 mb-3 col 6">
        <h3>Criar Noticia</h3>
        <form action="/admin/cadernos" method="POST" enctype="multipart/form-data">
            <!-- TOKEN -->
            @csrf

            <!-- 'nome'-->
            <div class="form-group mb-2">
                <label for="nome">Nome do Caderno: </label>
                <input type="text" id="nome" name="nome"
                    value="{{old('nome')}}"
                    class="form-control @error('nome') is-invalid @enderror">
                @if($errors->has('nome'))
                <div class="text-danger">{{$errors->first('nome')}}

                </div>
                @endif
            </div>

            
                




                    <button type="submit" class="btn btn-success">Salvar</button>

        </form>



    </div>
</div>

@endsection