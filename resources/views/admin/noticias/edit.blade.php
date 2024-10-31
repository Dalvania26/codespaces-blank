@extends('layout.app')
@section('title','Criar Noticia')
@section('conteudo')

<div class="row mx-auto">
    <div class="mt-3 mb-3 col 6">
        <h3>Criar Noticia</h3>
        <!-- form ilustrativo -->
        <form action="/admin/noticias/{{$noticia->id}}/edit" method="POST" enctype="multipart/form-data">
            <!-- TOKEN -->
            @csrf
            <!-- Ajustar o metodo -->
            @method('PUT')

            <!-- 'data'-->
            <div class="form-group mb-1">
                <label for="data">Data da Noticia: </label>
                <input type="date" id="data" name="data" value="{{old('data',$noticia->data)}}" class="form-control @error('data') is-invalid @enderror">
                @if($errors->has('data'))
                <div class="text-danger">{{$errors->first('data')}}

                </div>
                @endif
            </div>

            <!--  'titulo' -->
            <div class="form-group mb-1">
                <label for="titulo">Titulo da Noticia: </label>
                <input type="text" id="titulo" name="titulo" value="{{old('titulo',$noticia->titulo)}}" class="form-control @error('titulo') is-invalid @enderror">
                @if($errors->has('titulo'))
                <div class="text-danger">{{$errors->first('titulo')}}

                </div>
                @endif
            </div>
            <!--  'subtitulo' -->
            <div class="form-group mb-1">
                <label for="subtitulo">subtitulo da Noticia: </label>
                <input type="text" id="subtitulo" name="subtitulo" value="{{old('subtitulo',$noticia->subtitulo)}}" class="form-control @error('subtitulo') is-invalid @enderror">
                @if($errors->has('subtitulo'))
                <div class="text-danger">{{$errors->first('subtitulo')}}

                </div>
                @endif
            </div>
            <!--  'texto' -->
            <div class="form-group mb-2">
                <label for="texto">Digite o texto da noticia:</label>
                <textarea id="texto" name="texto" class="form-control @error('texto') is-invalid @enderror">{{old('texto',$noticia->texto)}}
                </textarea>
                @if($errors->has('texto'))
                <div class="text-danger">
                    {{$errors->first('texto')}}
                </div>
                @endif
            </div>

            <!-- 'id_autor'-->
            <div class="form-group mb-2">
                <label for="id_autor">Escolha um autor:</label>

                <select name="id_autor" id="id_autor" class="form-select @error('id_autor') is-invalid @enderror">
                    <option selected disabled>Selecione um autor</option>
                    @foreach($autores as $autor)
                    <option value="{{$autor->id}}"
                    {{old('id_autor', $noticia->id_autor) == $autor->id ? 'selected' : ""}}
                    >{{$autor->nome}}
                </option>
                    @endforeach

                </select>

                @if($errors->has('id_autor'))
                <div class="text-danger">
                    {{$errors->first('id_autor')}}
                </div>
                @endif

                <!-- 'id_caderno' -->

                <div class="form-group mb-2">
                <label for="id_caderno">Escolha um caderno:</label>

                <select name="id_caderno" id="id_caderno" class="form-select @error('id_caderno') is-invalid @enderror">
                    <option selected disabled>Selecione um caderno</option>
                    @foreach($cadernos as $caderno)
                    <option value="{{$caderno->id}}"
                    {{old('id_caderno', $noticia->id_caderno) == $caderno->id ? 'selected' : ""}}
                    >{{$caderno->nome}}
                </option>
                    @endforeach

                </select>

                @if($errors->has('id_caderno'))
                <div class="text-danger">
                    {{$errors->first('id_caderno')}}
                </div>
                @endif




                <button type="submit" class="btn btn-success">Salvar</button>

        </form>



    </div>
</div>

@endsection