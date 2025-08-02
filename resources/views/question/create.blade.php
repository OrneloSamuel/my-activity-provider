@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-sm-6 form-group">
            <a href="{{route('question.index')}}" class="btn btn-info btn-sm back"><span class="fas fa-arrow-left"></span> <strong>VOLTAR</strong></a>
        </div>
    </div>

    @isset($question)
        <form action="{{ route('question.update', $question) }}" method="post" id="form-question">
            @method('patch')
            <input type="hidden" name="id" value="{{ old('id', $question->id ?? null) }}"/>
    @else
        <form action="{{ route('question.store') }}" method="post" id="form-question">
    @endisset
            @csrf

        <div class="row gray-row">
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="question" class="control-label">Resposta</label>
                    <input name="question" class="form-control" placeholder="Digite a resposta" id="question" required value="{{ old('question', $question->question ?? null) }}">
                </div>

                <div class="col-sm-12 form-group">
                    <label for="chapterId" class="control-label">Pergunta</label>
                    <select name="chapterId" id="chapterId" required class="form-control">
                        @foreach ($chapters as $chapter)
                            <option value="{{ $chapter->id }}"
                                @if(isset($question) && $question->chapterId == $chapter->id) selected @endif>
                                {{ $chapter->name }}
                            </option>
                        @endforeach
                    </select>
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