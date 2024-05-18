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
        <div class="card">
            <div class="card-header">
                User Create
            </div>
            <div class="card-body">
                 <!-- Ação quando o formulário for submitido     -->
                <form action="{{route('driver.update', $data ->id)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                         <!-- Aqui tem a propriedade value (que não tem no create) para mostrar as informações que seram editadas     -->
                        <label >Modelo do Veículo</label>
                        <input type="text" name="model" class="form-control" value="{{$data -> model}}">
                        @error('model')<p class="alert text-danger py-0 border-none">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label >Ano de fabricação</label>
                        <input type="number" name="year" class="form-control" min="1886" max="{{ date('Y') }}" value="{{$data -> year}}">
                        @error('year')<p class="alert text-danger py-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label >Data de aquisição</label>
                        <input type="date" name="date_of_aquisition" class="form-control" value="{{$data -> date_of_aquisition}}">
                        @error('date_of_aquisition')<p class="alert text-danger py-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label >Km no momento da aquisição</label>
                        <input type="number" name="km_on_aquisition" class="form-control" value="{{$data -> km_on_aquisition}}">
                        @error('km_on_aquisition')<p class="alert text-danger py-0">{{ $message }}</p> @enderror
                    </div>
                    <div class="form-group">
                        <label >Renavam</label>
                        <input type="number" name="renavam" class="form-control" value="{{$data -> renavam}}">
                        @error('renavam')<p class="alert text-danger py-0">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
                        <button type="button" class="btn btn-secondary mt-2" onclick="location.href='{{ route('vehicle.index') }}'">Voltar</button>
                    </div>
                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </section>
</body>


    </html>

