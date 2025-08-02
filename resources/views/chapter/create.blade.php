@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-sm-6 form-group">
            <a href="{{route('chapter.index')}}" class="btn btn-info btn-sm back"><span class="fas fa-arrow-left"></span> <strong>VOLTAR</strong></a>
        </div>
    </div>

    @isset($chapter)
        <form action="{{ route('chapter.update', $chapter) }}" method="post" id="form-chapter">
            @method('patch')
            <input type="hidden" name="id" value="{{ old('id', $chapter->id ?? null) }}"/>
    @else
        <form action="{{ route('chapter.store') }}" method="post" id="form-chapter">
    @endisset
            @csrf

        <div class="row gray-row">
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="chapter" class="control-label">Nome</label>
                    <input name="name" class="form-control" placeholder="Digite o nome do capítulo" id="name" required value="{{ old('chapter', $chapter->name ?? null) }}" maxlength="100">
                </div>

                <div class="col-sm-12 form-group">
                    <label for="description" class="control-label">Descrição</label>
                    <input name="description" class="form-control" placeholder="Digite a descrição do capítulo" id="description" value="{{ old('description', $chapter->description ?? null) }}" maxlength="255">
                </div>
            </div>
                
            <div class="row">
                <div class="col-sm-3">
                    <button type="submit" id="save" class="btn btn-success btn-sm save"><span class="glyphicon glyphicon-floppy-save"></span><strong> GUARDAR</strong></button>
                </div>
            </div>
        </div>
    </form>
@endsection