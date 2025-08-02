@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="add">
                <a href="{{route('answer.create')}}" class="btn btn-success btn-sm">Adicionar Resposta</a>     
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">LISTA DE RESPOSTAS</h3>
                    @if(count($answers) > 0)
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <td class="info">Resposta</td>
                            <td class="info">Pergunta</td>
                            <td class="info">Correcta</td>
                            <td class="info action">Acção</td>
                        </tr>

                        @foreach($answers as $answer)
                            <tr>
                                <td>{{$answer->answer}}</td>        
                                <td>{{$answer->question->question}}</td>
                                <td>@if($answer->correct) Sim @else Não @endif</td>
                                <td class="action">
                                    <a href="{{route('answer.edit', $answer->id)}}" class="btn btn-info btn-sm"><span class="fas fa-edit"></span> Editar</a>
                                    <a href="{{route('answer.delete', $answer->id)}}" class="btn btn-danger btn-sm"><span class="fas fa-trash"></span> Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                @else
                    Nenhuma resposta cadastrada!
                @endif
                </div>

                {!! $answers->links() !!}
            </div>
        </div>
    </div>

@endsection