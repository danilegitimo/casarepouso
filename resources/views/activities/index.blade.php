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
              <h1>Atividades</h1>
              <p>As atividades são importantes para saúde física e mental. Além, de entretenimento.</p>
            </div>
            <div>
              <a href="{{ route('activities.create') }}" class="btn btn-success">Cadastrar</a>
            </div>
          </header>

          <div>
            @if ( $activities->isNotEmpty() )
            <table class="default-table">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Descrição</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($activities as $activity)
                <tr>
                  <td>{{ $activity->name }}</td>
                  <td>{{ $activity->description }}</td>
                  <td>
                    <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-success">Editar</a>
                    <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" style="display:inline">
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
            <p>Não há nenhuma atividade. Cadastre uma.</p>
            @endif
          </div>
        </div>
      </main>
    </div>
  </div>
</body>

</html>