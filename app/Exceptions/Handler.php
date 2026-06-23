<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\AuthenticationException;
use Throwable;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {

        if ($request->is('api/1.0.0/*') || $request->wantsJson()) {
            return $this->processApiException($request, $exception);
        }

        return parent::render($request, $exception);
    }


    protected function processApiException($request, $exception)
    {
        $errorStatus = method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : 500;
        $errorType = trans('api.estados.500');
        $errors=method_exists($exception, 'errors') ? $exception->errors() : $exception->getMessage();

        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            $errorStatus = 422;
            $errorType=trans('api.estados.422');
        }

        if ($exception instanceof \Illuminate\Auth\AuthenticationException ||
            $exception instanceof \Illuminate\Auth\Access\AuthorizationException ) {
            $errorStatus = 401;
            $errorType=trans('api.estados.401');
            $errors=trans('api.errores.autenticacion.no_autorizado');

        }

        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException  ) {
            $errorStatus = 404;
            $errorType = trans('api.estados.404');
        }

        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException  ) {
            $errorStatus = 404;
            $errorType = trans('api.estados.404');
        }

        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException) {
            $errorStatus = 405;
            $errorType = trans('api.estados.405');
        }

        if ($exception instanceof \Illuminate\Database\QueryException) {
            $codigo = $exception->errorInfo[1];
            if ($codigo == 1451) {
            $errorStatus = 409;
            $errorType = trans('api.estados.409');
            }
        }


        return $this->respuestaError($errors, $errorType, $errorStatus);
    }


}
