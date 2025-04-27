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
              <h1>Responsáveis</h1>
              <p>É importante que o cadastro dos responsáveis estejam atualizados para que a equipe médica possa entrar em contato em casos de urgências</p>
            </div>
            <div>
              <a href="{{ route('responsibles.create') }}" class="btn btn-success">Cadastrar</a>
            </div>
          </header>

          <div>
            @if ( $users->isNotEmpty() )
            <table class="default-table">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Endereço</th>
                  <th>Telefone</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->address ?? '*Não cadastrado' }}</td>
                  <td>{{ $user->telephone ?? '*Não cadastrado' }}</td>
                  <td>
                    <a href="{{ route('responsibles.edit', $user->id) }}" class="btn btn-success">Editar</a>
                    <form action="{{ route('responsibles.destroy', $user->id) }}" method="POST" style="display:inline">
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
            <p>Não há responsáveis para mostrar. Cadastre um.</p>
            @endif
          </div>
        </div>
      </main>
    </div>
  </div>
</body>

</html>