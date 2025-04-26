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
              <h1>Responsável</h1>
              <p>Você está vendo as informações do responsável pelo paciente.</p>
            </div>
            <div>
              <a href="{{ route('responsibles.index') }}" class="btn btn-success">Voltar</a>
            </div>
          </header>

          <div>
            <div class="row">
              <div class="col-3">
                <div class="form-floating">
                  <input id="name" type="text" class="form-control" value="{{ $user->name }}" disabled>
                  <label for="name" class="form-label">Nome</label>
                </div>
              </div>
              <div class="col-3">
                <div class="form-floating">
                  <input id="email" type="text" class="form-control" value="{{ $user->email }}" disabled>
                  <label for="email" class="form-label">Email</label>
                </div>
              </div>
              <div class="col-3">
                <div class="form-floating">
                  <input id="telephone" type="text" class="form-control" value="{{ $user->telephone }}" disabled>
                  <label for="telephone" class="form-label">Telefone</label>
                </div>
              </div>
              <div class="col-3">
                <div class="form-floating">
                  <input id="address" type="text" class="form-control" value="{{ $user->address }}" disabled>
                  <label for="address" class="form-label">Endereço</label>
                </div>
              </div>
            </div>
          </div>

        </div>
      </main>
    </div>
  </div>
</body>

</html>