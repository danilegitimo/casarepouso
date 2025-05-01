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
            <div class="row">

              <div class="col-4">
                <!-- Total de pacientes -->
                <div class="card card-master justify-content-center ps-4" style="border: 0 !important;border-radius: 32px;">
                  <p class="m-0" style="text-transform: uppercase;">Pacientes</p>
                  <p style="font-weight: bold !important;line-height: 1;font-size: 5rem;">{{ $patients->count() }}</p>
                </div>
              </div>

              <div class="col-8">

                <div class="row">
                  <div class="col-4">
                    <div class="card justify-content-center ps-4" style="border: 0 !important;border-radius: 32px;background-color: rgb(25, 111, 225);">
                      <p class="m-0" style="text-transform: uppercase;">Medicações</p>
                      <p style="font-weight: bold !important;line-height: 1;font-size: 5rem;">{{ $medications->count() }}</p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="card justify-content-center ps-4" style="border: 0 !important;border-radius: 32px;background-color: #1cc3cc">
                      <p class="m-0" style="text-transform: uppercase;">Doenças</p>
                      <p style="font-weight: bold !important;line-height: 1;font-size: 5rem;">{{ $diseases->count() }}</p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="card justify-content-center ps-4" style="border: 0 !important;border-radius: 32px;background-color: #541ccc">
                      <p class="m-0" style="text-transform: uppercase;">Atividades</p>
                      <p style="font-weight: bold !important;line-height: 1;font-size: 5rem;">{{ $activities->count()  }}</p>
                    </div>
                  </div>
                </div>

                <div class="row mt-4">
                  <div class="col-4">
                    <div class="card justify-content-center ps-4" style="border: 0 !important;border-radius: 32px;background-color: #ce2fe0">
                      <p class="m-0" style="text-transform: uppercase;">Refeições</p>
                      <p style="font-weight: bold !important;line-height: 1;font-size: 5rem;">{{ $patients->count() * 8 }}</p>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="card justify-content-center ps-4" style="border: 0 !important;border-radius: 32px;background-color: #e09f2f">
                      <p class="m-0" style="text-transform: uppercase;">Visitas</p>
                      <p style="font-weight: bold !important;line-height: 1;font-size: 5rem;">{{ $patients->count() * 12 }}</p>
                    </div>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </main>

      </div>
    </div>
    </script>
  </body>
</html>