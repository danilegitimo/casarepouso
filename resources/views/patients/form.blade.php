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
              <h1>Pacientes</h1>
              <p>É importante que o cadastro dos pacientes estejam atualizados para serem consultados pela equipe médica</p>
            </div>
            <div>
              <a href="{{ route('patients.index') }}" class="btn btn-success">Voltar</a>
            </div>
          </header>

          <div>
            <form method="POST" action="{{ isset($patient) ? route('patients.update', $patient->id) : route('patients.store') }} " enctype="multipart/form-data">

              @csrf

              @if ( isset($patient) )
              @method('PUT')
              @endif

              <div class="row mb-2">
                <div class="col-3">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $patient->name ?? '') }}" required />
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
                    <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf" name="cpf" value="{{ old('cpf', $patient->cpf ?? '') }}" required />
                    <label for="cpf" class="form-label">CPF</label>
                    <span class="form-text">Somente os dígitos.</span>
                    <div class="invalid-feedback">
                      @error('cpf')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-3">
                  <div class="form-floating">
                    <select name="responsible_user_id" id="responsible_user_id" class="form-control" required>
                      @foreach ($users as $user)
                      <option value="{{ $user->id }}" {{ old('responsible_user_id', $patient->responsible_user_id ?? '') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                      @endforeach
                    </select>
                    <label for="responsible_user_id" class="form-label">Responsável</label>
                    <div class="invalid-feedback">
                      @error('responsible_user_id')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>

                <div class="col-3">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('rg') is-invalid @enderror" id="rg" name="rg" value="{{ old('rg', $patient->rg ?? '') }}" required />
                    <label for="rg" class="form-label">RG</label>
                    <span class="form-text">Somente os dígitos.</span>
                    <div class="invalid-feedback">
                      @error('rg')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-2">
                <div class="col">
                  <div class="form-floating">
                    <select name="gender" id="gender" class="form-control" required>
                      <option value="female" {{ old('gender', $patient->gender ?? '') == 'female' ? 'selected' : '' }}>Feminino</option>
                      <option value="male" {{ old('gender', $patient->gender ?? '') == 'male' ? 'selected' : '' }}>Masculino</option>
                      <option value="other" {{ old('gender', $patient->gender ?? '') == 'other' ? 'selected' : '' }}>Outros</option>
                    </select>
                    <label for="gender" class="form-label">Sexo</label>
                    <div class="invalid-feedback">
                      @error('gender')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <select name="civil_status" id="civil_status" class="form-control" required>
                      <option value="single" {{ old('civil_status', $patient->civil_status ?? '') == 'single' ? 'selected' : '' }}>Solteiro</option>
                      <option value="married" {{ old('civil_status', $patient->civil_status ?? '') == 'married' ? 'selected' : '' }}>Casado</option>
                      <option value="separate" {{ old('civil_status', $patient->civil_status ?? '') == 'separate' ? 'selected' : '' }}>Divorciado</option>
                      <option value="widowed" {{ old('civil_status', $patient->civil_status ?? '') == 'widowed' ? 'selected' : '' }}>Viúvo</option>
                    </select>
                    <label for="civil_status" class="form-label">Estado Cívil</label>
                    <div class="invalid-feedback">
                      @error('civil_status')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate" name="birthdate" value="{{ old('birthdate', isset($patient) && $patient->birthdate ? $patient->birthdate->format('Y-m-d') : '') }}" required />
                    <label for="birthdate" class="form-label">Data de Nascimento</label>
                    <div class="invalid-feedback">
                      @error('birthdate')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="form-floating">
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $patient->address ?? '') }}" required />
                    <label for="address" class="form-label">Endereço Completo</label>
                    <div class="invalid-feedback">
                      @error('address')
                      {{ $message }}
                      @enderror
                    </div>
                  </div>
                </div>
              </div>

          </div>

          <div class="row mt-4">
            <div class="col-12">
              <label for="activities" class="form-label">Atividades</label>
              <select name="activities[]" size="5" id="activities" class="form-control" multiple>
                @empty (!$activities)
                @foreach ($activities as $activity)
                  <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                @endforeach
                @endempty
              </select>
              <div class="invalid-feedback">
                @error('activities')
                {{ $message }}
                @enderror
              </div>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col-12">
              <label for="diseases" class="form-label">Doenças</label>
              <select name="diseases[]" size="5" id="diseases" class="form-control" multiple>
                @empty (!$diseases)
                @foreach ($diseases as $disease)
                  <option value="{{ $disease->id }}">{{ $disease->name }}</option>
                @endforeach
                @endempty
              </select>
              <div class="invalid-feedback">
                @error('diseases')
                {{ $message }}
                @enderror
              </div>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col-12">
              <label for="medications" class="form-label">Medicações</label>
              <select name="medications[]" size="5" id="medications" class="form-control" multiple>
                @empty (!$medications)
                @foreach ($medications as $medication)
                  <option value="{{ $medication->id }}">{{ $medication->name }}</option>
                @endforeach
                @endempty
              </select>
              <div class="invalid-feedback">
                @error('medications')
                {{ $message }}
                @enderror
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