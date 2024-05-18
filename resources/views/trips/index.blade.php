<!doctype html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
<!-- Importação de Bootstrap     -->   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>Lista de Viagens</title>
</head>
    <body>
        <section class="container mt-5">
            <!-- Mensagem de Fedback em caso de Sucesso     -->
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
        <div>
        <button type="button" class="btn btn-primary mb-2" onclick="location.href='{{ route('trip.create') }}'">Adicionar Viagem</button>
         <!-- Volta a tela anterior     -->
        <a href="{{ url('/') }}"><button type="button" class="btn btn-primary mb-2">Voltar</button></a>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Motorista</th>
                    <th scope="col">Veículo</th>
                    <th scope="col">Km Inicial</th>
                    <th scope="col">Km Final</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                     <!-- Mostra as informações das viagens     -->
                    @foreach($trips as $key => $val)
                    <tr>
                    <th scope="row">{{++$key}}</th>
                     <!-- Ao definir para passar as informações para a tela de index, posso acessar e      -->
                      <!-- mostrar o nome do motorista e o modelo do veiculo     -->
                    <th>{{ $val->driver->name }}</th>
                    <th>{{ $val->vehicle->model }}</th>
                    <td>{{$val->initial_km}}</td>
                    <td>{{$val->final_km}}</td>
                    <td>
                        <a href="{{route('trip.edit', $val->id)}}" class="btn btn-secondary">Edit</a>
                        <a href="{{route('trip.destroy', $val->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                    </tr>
                    <tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </section>
    </body>


</html>

