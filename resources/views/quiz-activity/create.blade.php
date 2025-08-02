@extends('layouts.layout')

@section('content')
    <div class="row gray-row">
        <div class="mb-3">
            <label for="resume" class="form-label">Resumo da Descrição Técnica</label>
            <input class="form-control" id="resume" placeholder="Digite a breve descrição da atividade">
            </div>
            <div class="mb-3">
            <label for="instruction" class="form-label">URL para Instruções Detalhadas</label>
            <input class="form-control" id="instruction" 
                placeholder="Coloque aqui o URL para as instruções detalhadas acerca da atividade">
            </div>
            <div class="mb-3">
            <label for="matter" class="form-label">URL para Matéria</label>
            <input class="form-control" id="matter" placeholder="Coloque aqui o URL para a matéria ">
        </div>
    </div>
@endsection