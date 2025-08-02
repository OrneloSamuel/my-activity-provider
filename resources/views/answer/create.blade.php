@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-sm-6 form-group">
            <a href="{{route('answer.index')}}" class="btn btn-info btn-sm back"><span class="fas fa-arrow-left"></span> <strong>VOLTAR</strong></a>
        </div>
    </div>

    @isset($answer)
        <form action="{{ route('answer.update', $answer) }}" method="post" id="form-answer">
            @method('patch')
            <input type="hidden" name="id" value="{{ old('id', $answer->id ?? null) }}"/>
    @else
        <form action="{{ route('answer.store') }}" method="post" id="form-answer">
    @endisset
            @csrf

        <div class="row gray-row">
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="answer" class="control-label">Resposta</label>
                    <input name="answer" class="form-control" placeholder="Digite a resposta" id="answer" required value="{{ old('answer', $answer->answer ?? null) }}">
                </div>

                <div class="col-sm-12 form-group">
                    <label for="questionId" class="control-label">Pergunta</label>
                    <select name="questionId" id="questionId" required class="form-control">
                        @foreach ($questions as $question)
                            <option value="{{ $question->id }}"
                                @if(isset($answer) && $answer->questionId == $question->id) selected @endif>
                                {{ $question->question }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-sm-12 form-group">
                    <label for="correct" class="control-label">Correcta</label>
                    <select name="correct" id="correct" required class="form-control">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
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