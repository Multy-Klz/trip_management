<!doctype html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
<!-- Importação de Bootstrap     -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>Editar Motorista</title>
</head>
<body>
    <section class="container mt-5">
        <!-- Mensagem de Fedback em caso de Sucesso     -->
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                Editar Motorista
            </div>
            <div class="card-body">
                <!-- Ação quando o formulário for submitido     -->
                <form action="{{route('driver.update', $data ->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <!-- Aqui tem a propriedade value (que não tem em create) para mostrar as informações que seram editadas     -->
                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" name="name" class="form-control" value="{{$data -> name}}">
                        @error('name')<p class="alert text-danger py-0 border-none">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label >Data de Nascimento</label>
                        <input type="date" name="birth_date" class="form-control" value="{{$data -> birth_date}}">
                        @error('birth_date')<p class="alert text-danger py-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label >CNH</label>
                        <input type="number" name="cnh_number" class="form-control" value="{{$data -> cnh_number}}">
                        @error('cnh_number')<p class="alert text-danger py-0">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
                        <button type="button" class="btn btn-secondary mt-2" onclick="location.href='{{ route('driver.index') }}'">Voltar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </section>
</body>


    </html>

