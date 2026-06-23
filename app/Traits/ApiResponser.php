<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;


trait ApiResponser
{
    /**
     * @OA\Info(
     *     version="1.0.0",
     *     title="Market Leon",
     *     description="Apis",
     *     @OA\Contact(name="Carlos Alberto Orozco Albiter",email="carlos.orozco@proconsi.es")
     * )
     * @OA\Server(
     *     url="http://127.0.0.1:8000/",
     *     description="Servidor Api"
     * )
     */

    private function respuestaExito($datos, $codigo)
    {
        return response()->json($datos, $codigo);
    }

    protected function respuestaError($error, $tipo, $codigo)
    {
        $errores = [];

        if (is_array($error)) {
            foreach ($error as $fila => $mensajes) {
                foreach ($mensajes as $mensaje) {
                    $errores[] = [
                        'code' => '' . $codigo . '',
                        'type' => '' . $tipo . '',
                        'message' => $mensaje,
                    ];
                }
            }
        } else {
            $errores[] = [
                'code' => '' . $codigo . '',
                'type' => '' . $tipo . '',
                'message' => $error,
            ];
        }
        return response()->json(['responseVersion' => config('app.api_latest'), 'locale' => \App::getLocale(), 'infoMessages' => [], 'errors' => $errores], $codigo);
    }


    protected function mostrarDatos($datos, $mensaje = null, $codigo = 200)
    {
        if ($mensaje == null) {
            return $this->respuestaExito(['responseVersion' => config('app.api_latest'), 'locale' => \App::getLocale(), 'data' => $datos], $codigo);
        } else {
            return $this->respuestaExito(['responseVersion' => config('app.api_latest'), 'locale' => \App::getLocale(), 'infoMessages' => [$mensaje], 'data' => $datos], $codigo);
        }
    }

    protected function mostrarTodoSinPaginacion(Collection $coleccion, $mensaje = null, $codigo = 200)
    {

        $coleccion = $this->ordenarDatos($coleccion);
        $coleccion = $this->omitirDatos($coleccion);
        $coleccion = $this->limiteDatos($coleccion);

        if ($mensaje == null) {
            return $this->respuestaExito(['responseVersion' => config('app.api_latest'), 'locale' => \App::getLocale(), 'data' => $coleccion], $codigo);
        } else {
            return $this->respuestaExito(['responseVersion' => config('app.api_latest'), 'locale' => \App::getLocale(), 'infoMessages' => [$mensaje], 'data' => $coleccion], $codigo);
        }
    }

    protected function mostrarTodo(Collection $coleccion, $mensaje = null, $codigo = 200)
    {

        $coleccion = $this->ordenarDatos($coleccion);
        $coleccion = $this->omitirDatos($coleccion);
        $coleccion = $this->limiteDatos($coleccion);
        $coleccion = $this->paginacion($coleccion);

        if ($mensaje == null) {
            return $this->respuestaExito(['responseVersion' => config('app.api_latest'), 'locale' => \App::getLocale(), 'data' => $coleccion], $codigo);
        } else {
            return $this->respuestaExito(['responseVersion' => config('app.api_latest'), 'locale' => \App::getLocale(), 'infoMessages' => [$mensaje], 'data' => $coleccion], $codigo);
        }
    }

    protected function mostrarUno(Model $instancia, $mensaje = null, $codigo = 200)
    {
        if ($mensaje == null) {
            return $this->respuestaExito(['responseVersion' => config('app.api_latest'), 'locale' => \App::getLocale(), 'data' => $instancia], $codigo);
        } else {
            return $this->respuestaExito(['responseVersion' => config('app.api_latest'), 'locale' => \App::getLocale(), 'infoMessages' => [$mensaje], 'data' => $instancia], $codigo);
        }
    }

    protected function mostrarMensaje($mensaje = null, $codigo = 200)
    {
        if ($mensaje == null) {
            return $this->respuestaExito(['responseVersion' => config('app.api_latest'), 'locale' => \App::getLocale()], $codigo);
        } else {
            return $this->respuestaExito(['responseVersion' => config('app.api_latest'), 'locale' => \App::getLocale(), 'infoMessages' => [$mensaje]], $codigo);
        }
    }

    protected function ordenarDatos(Collection $coleccion)
    {
        if (request()->has('sort_by')) {
            $atributo = request()->sort_by;
            $coleccion = $coleccion->sortByDesc->{$atributo};
        }
        return $coleccion;
    }

    protected function omitirDatos(Collection $coleccion)
    {
        if (request()->has('offset')) {
            $atributo = request()->offset;
            $coleccion = $coleccion->skip($atributo);
        }
        return $coleccion;
    }

    protected function limiteDatos(Collection $coleccion)
    {
        if (request()->has('limit')) {
            $atributo = request()->limit;
            $coleccion = $coleccion->take($atributo);
        }
        return $coleccion;
    }


    protected function paginacion(Collection $coleccion)
    {
        $reglas = [
            'per_page' => 'integer|min:1|max:50'
        ];

        Validator::validate(request()->all(), $reglas);

        $pagina = LengthAwarePaginator::resolveCurrentPage();

        $porPagina = 15;
        if (request()->has('per_page')) {
            $porPagina = (int) request()->per_page;
        }

        $resultados = $coleccion->slice(($pagina - 1) * $porPagina, $porPagina)->values();

        $paginado = new LengthAwarePaginator($resultados, $coleccion->count(), $porPagina, $pagina, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        $paginado->appends(request()->all());

        return $paginado;
    }
}
