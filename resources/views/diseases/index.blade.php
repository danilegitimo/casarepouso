<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Casa de Repouso</title>

  @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @endif

  @routes
</head>

<body>

  @include("components/system/menu/mobile")

  <div class="container-fluid">
    <div class="row">

      @include("components/system/menu/desktop")

      <main class="col-md-10 ms-sm-auto content p-5">
        <div class="container-fluid">

          @if ( session('error') )
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if ( session('success') )
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          <header class="content-header mb-4" style="display: flex; justify-content: space-between; align-items: center;">
            <div style="width: 100%;">
              <h1>Doenças</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere autem, nisi quis eos repellendus neque unde quia mollitia voluptate nostrum placeat quaerat corrupti veniam labore aliquam. Nisi consequuntur saepe perspiciatis!</p>
            </div>
            <div>
              <a href="{{ route('diseases.create') }}" class="btn btn-success">Cadastrar</a>
            </div>
          </header>

          <div>
            @if ( $diseases->isNotEmpty() )
            <table class="default-table">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($diseases as $disease)
                <tr>
                  <td>{{ $disease->name }}</td>
                  <td>{{ $disease->description }}</td>
                  <td>
                    <a href="{{ route('diseases.edit', $disease->id) }}" class="btn btn-success">Editar</a>
                    <form action="{{ route('diseases.destroy', $disease->id) }}" method="POST" style="display:inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
            <p>Poxa :/ Não há doenças para mostrar, por favor, cadastre uma para começar.</p>
            @endif
          </div>

        </div>
      </main>
    </div>
  </div>
</body>

</html>