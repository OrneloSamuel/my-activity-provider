@extends('layouts.layout')

@section('content')
    <form action="{{route('question.destroy', $question)}}" method="POST">
        @csrf
        @method('delete')
        <input type="hidden" name="_method" value="DELETE">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">EXCLUIR PERGUNTA</h3> 
                    </div>
                
                    <div class="panel-body">
                        Deseja realmente excluir a pergunta "<strong>{{$question->question}}</strong>"?
                    </div>

                    <div class="panel-footer"> 
                        <button type="submit" class="btn btn-danger btn-sm delete"><span class="fas fa-trash"></span> EXCLUIR</button>
                        
                        <a href="{{route('question.index')}}" class="btn btn-info btn-sm back-delete"><span class="fas fa-arrow-left"></span> VOLTAR</a>
                    </div>
                </div>
            </div>   
        </div>             
    </form>
@endsection