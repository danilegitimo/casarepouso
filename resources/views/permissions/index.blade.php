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
          <header class="content-header mb-4" style="display: flex; justify-content: space-between; align-items: center;">
            <div style="width: 100%;">
              <h1>Permissões</h1>
              <p>Você não pode editar/excluir ou criar permissões novas. Elas são fixas e determinam ações específicas no sistema.</p>
            </div>
          </header>

          <div>
            @if ( $permissions->isNotEmpty() )
            <table class="default-table">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Descrição</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($permissions as $permission)
                <tr>
                  <td>{{ $permission->name }}</td>
                  <td>{{ $permission->description }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
            <p>As permissões estão desativadas, por favor, converse com o administrador.</p>
            @endif
          </div>
        </div>
      </main>
    </div>
  </div>
</body>

</html>