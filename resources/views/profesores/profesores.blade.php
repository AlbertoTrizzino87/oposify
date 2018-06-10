<div class="profesores-listados">
@forelse ($resultadosPreparador as $resultadoPreparador)
					<div class="busqueda-layout">
						<div class="layout-left col-md-2">
							<img src="{{Storage::disk('public')->url($resultadoPreparador->image)}}" alt="">
						</div>
						<div class="layout-center col-md-7">
							<span>{{ $resultadoPreparador->name }} {{ $resultadoPreparador->apellido }} {{ $resultadoPreparador->apellidoDos }}</span><br>
							<span>{{ $resultadoPreparador->email }}</span>
						</div>
						<div class="layout-right col-md-3">
							<form action="/user/anadir-preparador" method="POST">
								{{ csrf_field() }}
								<input type="text" name="idPrepa" id="idPrepa" value="{{ $resultadoPreparador->id }}" hidden>
								<button>Añadir</button>
							</form>
						</div>
					</div>
				@empty
					<span>No se ha añadido ningun preparador</span>	
				@endforelse	
</div>
