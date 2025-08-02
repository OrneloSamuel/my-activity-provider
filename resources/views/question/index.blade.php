@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="add">
                <a href="{{route('question.create')}}" class="btn btn-success btn-sm">Adicionar Pergunta</a>     
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">LISTA DE PERGUNTAS</h3>
                    @if(count($questions) > 0)
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <td class="info">Pergunta</td>
                            <td class="info">Capítulo</td>
                            <td class="info action">Acção</td>
                        </tr>

                        @foreach($questions as $question)
                            <tr>
                                <td>{{$question->question}}</td>        
                                <td>{{$question->chapter->name}}</td>
                                <td class="action">
                                    <a href="{{route('question.edit', $question->id)}}" class="btn btn-info btn-sm"><span class="fas fa-edit"></span> Editar</a>
                                    <a href="{{route('question.delete', $question->id)}}" class="btn btn-danger btn-sm"><span class="fas fa-trash"></span> Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                @else
                    Nenhum perguunta cadastrada!
                @endif
                </div>

                {!! $questions->links() !!}
            </div>
        </div>
    </div>

@endsection