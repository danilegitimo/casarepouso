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
              <h1>Pacientes</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere autem, nisi quis eos repellendus neque unde quia mollitia voluptate nostrum placeat quaerat corrupti veniam labore aliquam. Nisi consequuntur saepe perspiciatis!</p>
            </div>
            <div>
              <a href="{{ route('patients.create') }}" class="btn btn-success">Cadastrar</a>
            </div>
          </header>

          <div>
            @if ( $patients->isNotEmpty() )
            <table class="default-table">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Responsável</th>
                  <th>CPF</th>
                  <th>Data de Nascimento</th>
                  <th>Sexo</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($patients as $patient)
                <tr>
                  <td>{{ $patient->name }}</td>
                  <td><a href="{{ route('users.show', $patient->responsible_user_id) }}">{{ $patient->responsible ? $patient->responsible->name : '' }}</a></td>
                  <td>{{ $patient->cpf }}</td>
                  <td>{{ $patient->birthdate->format('d/m/Y') }}</td>
                  <td>
                    {{ $patient->gender == "female" ? "Feminino" : "" }}
                    {{ $patient->gender == "male" ? "Masculino" : "" }}
                    {{ $patient->gender == "other" ? "Outros" : "" }}
                  </td>
                  <td>
                    <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-success">Editar</a>
                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" style="display:inline">
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
            <p>Poxa :/ Não pacientes para mostrar, por favor, cadastre um para começar.</p>
            @endif
          </div>

        </div>
      </main>
    </div>
  </div>
</body>

</html>