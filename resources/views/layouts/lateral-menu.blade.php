<nav class="lateral-menu">
	<div class="nav navbar-nav lazy-img profile-picture">
		<img src="" data-url="{{url('assets/img/no-picture.png')}}" class="center-block" alt="Foto de perfil">
	</div>
  
	<nav class="scroll mCustomScrollbar">
		<div class="panel panel-primary visible-xs">
            <div id="colGroup1" role="tab" class="panel-heading">
                <p class="panel-title">
                    <a href="{{url('/')}}" aria-controls="" aria-expanded="false" data-toggle="collapse">
						<span class="fa fa-laptop"></span> INÍCIO
					</a>
				</p>
            </div>
		</div>

		<div class="panel panel-primary">
			<div id="colGroup2" role="tab" class="panel-heading">
				<p class="panel-title">
					<a href="#settings-area" aria-controls="settings-area" aria-expanded="true" data-toggle="collapse">
						<span class="fas fa-cogs"></span> CONFIGURAÇÕES
					</a>
				</p>
			</div>
			
			<div role="tabpanel" class="panel-collapse" id="settings-area" aria-expanded="true">
				<ul class="nav navbar-nav ">
					<li>
						<a href="{{route('chapter.index')}}">Capítulos</a>
					</li>
				
					<li>
						<a href="{{route('question.index')}}">Perguntas</a>
					</li>
					<li>
						<a href="{{route('answer.index')}}">Respostas</a>
				</ul>
			</div>
		</div>	
	</nav>
</nav>