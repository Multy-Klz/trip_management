<!doctype html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<!-- Importação de Bootstrap     -->     
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>Novo Motorista</title>
</head>
<body>
    <section class="container mt-5">
        <!-- Mensagem de Fedback em caso de Sucesso     -->
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                User Create
            </div>
            <div class="card-body">
                <!-- Ação quando o formulário for submitido     -->
                <form action="{{route('trip.update', $trip ->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                         <!-- Aqui tem a propriedade value (que não tem em create) para mostrar as informações que seram editadas     -->
                        <label >Motorista</label>
                        <!-- Itera e exibe todos os motoristas para o usuário selecionar     -->
                        <select name="driver_id" class="form-control">
                            @foreach($drivers as $driver)
                                <option value="{{ $driver->id }}" {{ old('driver_id') == $driver->id ? 'selected' : '' }}>{{ $driver->name }}</option>
                            @endforeach
                        </select>
                        @error('driver_id')<p class="alert text-danger py-0 border-none">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label >Carro</label>
                        <!-- Itera e exibe todos os veiculos para o usuário selecionar     -->
                        <select name="vehicle_id" class="form-control">
                            @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}" {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }}>{{ $vehicle->model }}</option>
                            @endforeach
                        </select>
                        @error('vehicle_id')<p class="alert text-danger py-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label >Km no Inicio da Viagem</label>
                        <input type="number" name="initial_km" class="form-control" value="{{$trip -> initial_km}}">
                        @error('initial_km')<p class="alert text-danger py-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label >Km no Fim da Viagem</label>
                        <input type="number" name="final_km" class="form-control" value="{{$trip -> final_km}}">
                        @error('final_km')<p class="alert text-danger py-0">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
                        <!-- Volta para a listagem de viagens     -->
                        <button type="button" class="btn btn-secondary mt-2" onclick="location.href='{{ route('trip.index') }}'">Voltar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </section>
</body>

<script>
document.querySelector('form').addEventListener('submit', function(event) {
    // Prevent the form from being submitted
    event.preventDefault();

    // Get the form data
    var formData = new FormData(event.target);

    // Log the form data to the console
    for (var pair of formData.entries()) {
        console.log(pair[0]+ ', ' + pair[1]); 
    }

    // Continue with form submission
    event.target.submit();
});
</script>
    </html>

