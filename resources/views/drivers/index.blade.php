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
            <!-- Mensagem de Fedback em caso de Sucess     -->
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
        <div>
        <!-- Acessa a crição de Motorista no DB     -->
        <button type="button" class="btn btn-primary mb-2" onclick="location.href='{{ route('driver.create') }}'">Adicionar Motorista</button>
        <!-- Volta a tela anterior     -->
        <a href="{{ url('/') }}"><button type="button" class="btn btn-primary mb-2">Voltar</button></a>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">CNH</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Iteração na exibição das informações     -->
                    @foreach($data as $key => $val)
                    <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$val->name}}</td>
                    <td>{{$val->birth_date}}</td>
                    <td>{{$val->cnh_number}}</td>
                    <td>
                        <a href="{{route('driver.edit', $val->id)}}" class="btn btn-secondary">Edit</a>
                        <a href="{{route('driver.destroy', $val->id)}}" class="btn btn-danger">Delete</a>
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

