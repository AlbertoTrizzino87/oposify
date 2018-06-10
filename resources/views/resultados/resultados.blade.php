<div class="resultados-busqueda">
@foreach ($resultados as $resultado)
						<div class="busqueda-layout">
							 	<div class="layout-left col-md-2">
							 		<img src="{{Storage::disk('public')->url($resultado->user->image)}}" alt="">
								 	@if (empty($resultado->user->apellido))
								 	<span>{{ $resultado->user->name }}</span>
								 	@elseif (empty($resultado->user->apellidoDos))
								 	<span>{{ $resultado->user->name }} {{ $resultado->user->apellido }}</span>
								 	@else 
								 	<span>{{ $resultado->user->name }} {{ $resultado->user->apellido }} <br> {{ $resultado->user->apellidoDos }}</span>
								 	@endif
								</div>
								<div class="layout-center col-md-7">
									<h5>{{ $resultado->oposicione->descripcion }}</h5>
									<p>{{ $resultado->descripcion }}</p>
								</div>
								<div class="layout-right col-md-3">
									<span>{{ $resultado->precio }}€</span>
									<form action="{!! URL::to('paypal') !!}" method="POST" id="payment-form">
										{{ csrf_field() }}
										<input type="text" name="amount" id="amount" value="{{ $resultado->precio }}" hidden>
										<input type="text" name="idPreparador" id="idPreparador" value="{{ $resultado->user_id }}" hidden>
										<input type="text" name="nombreCurso" id="nombreCurso" value="{{ $resultado->oposicione->descripcion }}" hidden>
										<input type="text" name="idCurso" id="idCurso" value="{{ $resultado->id }}" hidden>
										<button>comprar</button>
									</form>
								</div>
						</div>

					@endforeach
</div>

