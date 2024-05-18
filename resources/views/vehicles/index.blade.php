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
             <!-- Mensagem de FEedback em caso de Sucesso     -->
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
        <div>
        <button type="button" class="btn btn-primary mb-2" onclick="location.href='{{ route('vehicle.create') }}'">Adicionar Veículo</button>
         <!-- Volta a tela anterior     -->
        <a href="{{ url('/') }}"><button type="button" class="btn btn-primary mb-2">Voltar</button></a>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Ano</th>
                    <th scope="col">Data de Aquisição</th>
                    <th scope="col">KMs rodados no momento da aquisição</th>
                    <th scope="col">Renavam</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!--   Iteração na exibição das informações     -->
                    @foreach($data as $key => $val)
                    <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$val->model}}</td>
                    <td>{{$val->year}}</td>
                    <td>{{$val->date_of_aquisition}}</td>
                    <td>{{$val->km_on_aquisition}}</td>
                    <td>{{$val->renavam}}</td>
                    <td>
                        <a href="{{route('vehicle.edit', $val->id)}}" class="btn btn-secondary">Edit</a>
                        <a href="{{route('vehicle.destroy', $val->id)}}" class="btn btn-danger">Delete</a>
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

