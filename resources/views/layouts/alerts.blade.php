<div class="row">
    <div class="col-sm-12">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                @foreach($errors->all() as $error)
                    {{$error}} <br>
                @endforeach
            </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-sm-12" id="alert-success">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{session('success')}}
                @if(session('receipt'))
                    <br><a style="color: #3c763d" target="_blank" href="{{session('receipt')}}"><strong>Imprimir Recibo</strong></a>
                @endif
                @if(session('receipt-a4'))
                    <br><strong>Imprimir Recibo</strong> 
                    <a style="color: #3c763d" target="_blank" href="{{session('receipt-a4')}}"> <strong>A4</strong></a>
                    /
                    <a style="color: #3c763d" target="_blank" href="{{session('receipt-a5')}}"><strong>A5</strong></a>
                    /
                    <a style="color: #3c763d" target="_blank" href="{{session('receipt-termic')}}"><strong>Térmica</strong></a>
                @endif
                @if(session('registration'))
                    @can('Confirmar Matrícula')      
                        <br>
                        <a style="color: #3c763d" href="{{session('registration')}}"><strong>Matricular</strong></a>
                        /
                        <a style="color: #3c763d" href="{{session('registration-advanced')}}"><strong>Confirmar Matrícula</strong></a>
                    @else
                        <br>
                        <a style="color: #3c763d" href="{{session('registration')}}"><strong>Matricular</strong></a>
                    @endcan
                @endif
            </div>
        @endif
        
    </div>
</div>

<div class="row">
    <div class="col-sm-12" id="alert-error">
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{session('error')}}
            </div>
        @endif
    </div>
</div>