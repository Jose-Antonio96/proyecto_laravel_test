<x-layouts.app 
		title="Viajes" 
		meta-description="Página de viajes meta description"
		>

        <p>{{$travels}}</p>
		@foreach ($travels as $travel)
			{{$travel->name}}
		@endforeach
		
        <h2 class="text-3xl font-bold dark:text-white"><a href="{{route ('account') }}">Regresar</a></h2>
</x-layouts.app>
