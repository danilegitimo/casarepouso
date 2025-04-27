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
              <h1>Medicações</h1>
              <p>É importante que as medicações estejam atualizadas para estarem disponível para equipe médica</p>
            </div>
            <div>
              <a href="{{ route('medications.index') }}" class="btn btn-success">Voltar</a>
            </div>
          </header>

          <div>
            <form method="POST" action="{{ isset($medication) ? route('medications.update', $medication->id) : route('medications.store') }} " enctype="multipart/form-data">

              @csrf

              @if ( isset($medication) )
              @method('PUT')
              @endif

              <div class="row mb-2">
                <div class="col-3">
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

                <div class="col-3">
                  <div class="form-floating">
                    <input type="number" class="form-control @error('dosage') is-invalid @enderror" id="dosage" name="dosage" value="{{ old('dosage', $medication->dosage ?? '') }}" required />
                    <label for="dosage" class="form-label">Dosagem (mL)</label>
                    <div class="invalid-feedback">
                      @error('dosage')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-3">
                  <div class="form-floating">
                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity', $medication->quantity ?? '') }}" required />
                    <label for="quantity" class="form-label">Quantidade</label>
                    <span class="form-text">Se for comprimido, adicionar a quantidade correta. Se for xarope, adicionar apenas um.</span>
                    <div class="invalid-feedback">
                      @error('quantity')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-3">
                  <div class="form-floating">
                    <input type="number" class="form-control @error('period_hours') is-invalid @enderror" id="period_hours" name="period_hours" value="{{ old('period_hours', $medication->period_hours ?? '') }}" required />
                    <label for="period_hours" class="form-label">Período de Intervalo</label>
                    <span class="form-text">Total de horas de intervalo para doses em diante.</span>
                    <div class="invalid-feedback">
                      @error('period_hours')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-2">
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description', $medication->description ?? '') }}" required style="height:200px"></textarea>
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