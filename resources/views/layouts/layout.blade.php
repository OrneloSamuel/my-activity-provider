@include('layouts.header')

<main>
    @if(!isset($title) || $title != 'Teste de Aptidão Sobre a Matéria - Configuração')
        @include('layouts.lateral-menu')
    @endif

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-primary title">
                    <div class="panel-heading">
                        <h1 class="text-uppercase">{{$title ?? 'Activity Provider - Configuração'}}</h1>
                    </div>
                </div>
            </div>
        </div>  

        @include('layouts.alerts')

        @yield('content')
    </div>
</main>

@include('layouts.footer')