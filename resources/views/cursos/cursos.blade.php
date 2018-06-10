<div class="cursos-listados">
@forelse ($cursos_id as $curso)
				<div class="content-box">
				<div class="box-header">
					<h4>{{$curso->oposicione->descripcion}}</h4>
					<span>{{ $curso->precio}}€ mes</span>
				</div>
				<div class="box-description">
					<p>{{ $curso->descripcion }}</p>
				</div>
				<div class="box-bottom">
					<form action="/user/eliminar-curso" method="POST" class="eliminar-curso">
						<input type="hidden" name="id" value="{{$curso->id}}">
						<button class="eliminarCurso">Eliminar</button>
					</form>
				</div>
				</div>										
				@empty
					<p>No se ha creado ningun curso</p>
				@endforelse
</div>