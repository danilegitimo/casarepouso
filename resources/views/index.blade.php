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

            <header class="content-header" style="display: flex; justify-content: space-between; align-items: center;">
              <div style="width: 100%;">
                <h1>Título</h1>
                <p>Descrição</p>
              </div>
              <div>
                <a href="#" class="btn btn-success">Ação</a>
              </div>
            </header>

            @if ( isset($variable) && $variable->isNotEmpty() )
              <div class="mt-2 table-container">
                <table class="table">
                  <thead>
                    <tr>
                      <td></td>
                      <td>Ações</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($variable as $variable)
                    <tr>
                      <td></td>
                      <td>
                        <a href="#" class="btn btn-danger">Editar</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            @else
              <div>
                <p>Empty.</p>
              </div>
            @endif
          </div>
        </main>

      </div>
    </div>
    </script>
  </body>
</html>