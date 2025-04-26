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
              <h1>Doenças</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere autem, nisi quis eos repellendus neque unde quia mollitia voluptate nostrum placeat quaerat corrupti veniam labore aliquam. Nisi consequuntur saepe perspiciatis!</p>
            </div>
            <div>
              <a href="{{ route('diseases.index') }}" class="btn btn-success">Voltar</a>
            </div>
          </header>

          <div>
            <form method="POST" action="{{ isset($disease) ? route('diseases.update', $disease->id) : route('diseases.store') }} " enctype="multipart/form-data">

              @csrf

              @if ( isset($disease) )
              @method('PUT')
              @endif

              <div class="row mb-2">
                <div class="col-6">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $medication->name ?? '') }}" required />
                    <label for="name" class="form-label">Nome</label>
                    <div class="invalid-feedback">
                      @error('name')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description', $medication->description ?? '') }}" required />
                    <label for="description" class="form-label">Descrição</label>
                    <div class="invalid-feedback">
                      @error('description')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>

              </div>

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