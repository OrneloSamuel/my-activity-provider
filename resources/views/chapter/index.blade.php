@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="add">
                <a href="{{route('chapter.create')}}" class="btn btn-success btn-sm">Adicionar Capítulo</a>     
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">LISTA DE PERGUNTAS</h3>
                    @if(count($chapters) > 0)
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <tr>
                            <td class="info">Nome</td>
                            <td class="info">Descrição</td>
                            <td class="info action">Acção</td>
                        </tr>

                        @foreach($chapters as $chapter)
                            <tr>
                                <td>{{$chapter->name}}</td>        
                                <td>{{$chapter->description}}</td>        
                                <td class="action">
                                    <a href="{{route('chapter.edit', $chapter->id)}}" class="btn btn-info btn-sm"><span class="fas fa-edit"></span> Editar</a>
                                    <a href="{{route('chapter.delete', $chapter->id)}}" class="btn btn-danger btn-sm"><span class="fas fa-trash"></span> Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                @else
                    Nenhum perguunta cadastrada!
                @endif
                </div>

                {!! $chapters->links() !!}
            </div>
        </div>
    </div>

@endsection