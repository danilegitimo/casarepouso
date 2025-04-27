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
              <h1>Responsável</h1>
              <p>É importante que o cadastro dos responsáveis estejam atualizados para que a equipe médica possa entrar em contato em casos de urgências</p>
            </div>
            <div>
              <a href="{{ route('responsibles.index') }}" class="btn btn-success">Voltar</a>
            </div>
          </header>

          <div>
            <form method="POST" action="{{ isset($user) ? route('responsibles.update', 1) : route('responsibles.store') }} " enctype="multipart/form-data">

              @csrf

              @if ( isset($user) )
              @method('PUT')
              @endif

              <div class="row mb-2">
                <div class="col-3">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name ?? '') }}" required />
                    <label for="name" class="form-label">Nome completo</label>
                    <div class="invalid-feedback">
                      @error('name')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-3">
                  <div class="form-floating">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password', $user->password ?? '') }}" required />
                    <label for="password" class="form-label">Senha</label>
                    <div class="invalid-feedback">
                      @error('password')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-3">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" required />
                    <label for="email" class="form-label">Email</label>
                    <div class="invalid-feedback">
                      @error('email')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-3">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" value="{{ old('cpf', $user->cpf ?? '') }}" required />
                    <label for="cpf" class="form-label">CPF</label>
                    <div class="invalid-feedback">
                      @error('cpf')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-4">
                <div class="col-3">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('rg') is-invalid @enderror" id="rg" name="rg" value="{{ old('rg', $user->rg ?? '') }}" required />
                    <label for="rg" class="form-label">RG</label>
                    <div class="invalid-feedback">
                      @error('rg')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-3">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone', $user->telephone ?? '') }}" required />
                    <label for="telephone" class="form-label">Telefone</label>
                    <div class="invalid-feedback">
                      @error('telephone')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-3">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $user->address ?? '') }}" required />
                    <label for="address" class="form-label">Endereço</label>
                    <div class="invalid-feedback">
                      @error('address')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-3">
                  <div class="form-floating">
                    <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" value="{{ old('birthdate', $user->birthdate ?? '') }}" required />
                    <label for="birthdate" class="form-label">Data de Nascimento</label>
                    <div class="invalid-feedback">
                      @error('birthdate')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>
              </div>

              @if ( isset($user->patients) ? $user->patients->isNotEmpty() : false )
                <div class="row mb-4">

                </div>
              @endif

              <div class="row mt-4 d-flex justify-content-end">
                <div class="col-2">
                  <button type="submit" class="container-fluid p-2 btn btn-success">Salvar</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </main>
    </div>
  </div>
</body>

</html>