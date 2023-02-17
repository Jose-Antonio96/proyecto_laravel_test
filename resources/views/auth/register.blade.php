<x-layouts.app 
		title="Página de registro" 
		meta-description="Página de registro meta description"
		>
		
	Esta es la página de registro de Traveliens
    <form action="{{route('register')}}" method="POST">
		@csrf
		<label class="flex flex-col">
		Nombre
		<input name="name" type="text" value="{{old('name')}}">
    @error('name')
        <br>
        <small>*{{$message}}</small>
    @enderror

</label><br>
		<label class="flex flex-col">
		Email
		<input name="email" type="email" value="{{old('email')}}">
	@error('email')
		<br>
		<small>*{{$message}}</small>
	@enderror
</label><br>
		
		<label class="flex flex-col">
		Contraseña
		<input name="password" type="password" value="{{old('password')}}">
	@error('email')
		<br>
		<small>*{{$message}}</small>
	@enderror

</label><br>
		<label class="flex flex-col">
		Confirmar contraseña
		<input name="password_confirmation" type="password" value="{{old('password_confirmation')}}">
	@error('email')
		<br>
		<small>*{{$message}}</small>
	@enderror

</label><br>
		<button type="submit">Registrar</button>
		<br>
	</form><br>
    <a href="{{route ('login') }}">Login</a>
	
</x-layouts.app>
