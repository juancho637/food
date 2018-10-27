<?php

namespace App\Exceptions;

use App\Traits\ApiResponse;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
//use Illuminate\Http\Concerns\InteractsWithContentTypes;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponse;

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
     * @param  \Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ValidationException)
        {
            if ($request->expectsJson()) {
                $errors = $exception->validator->errors()->getMessages();

                return $this->errorResponse($errors, 422);
            }
        }

        if ($exception instanceof AuthenticationException)
        {
            if ($request->expectsJson()) {
                return $this->errorResponse('No autenticado', 401);
            }
        }

        if ($exception instanceof ModelNotFoundException)
        {
            if ($request->expectsJson()) {
                $model = strtolower(class_basename($exception->getModel()));

                return $this->errorResponse('No existe ninguna instancia de '.$model.' con el id específicado', 404);
            }
        }

        if ($exception instanceof AuthorizationException)
        {
            if ($request->expectsJson()) {
                return $this->errorResponse('No posee permisos para ejecutar esta acción', 403);
            }
        }

        if ($exception instanceof NotFoundHttpException)
        {
            if ($request->expectsJson()) {
                return $this->errorResponse('No se encontro la url específicada', 404);
            }
        }

        if ($exception instanceof MethodNotAllowedHttpException)
        {
            if ($request->expectsJson()) {
                return $this->errorResponse('El método específicado en la petición no es válido', 405);
            }
        }

        if ($exception instanceof QueryException)
        {
            if ($request->expectsJson()) {
                if ($exception->errorInfo[1] == 1451){
                    return $this->errorResponse("No puedes eliminar este recurso, porque este está relacionado con otro", 409);
                }
            }
        }

        if ($exception instanceof HttpException)
        {
            if ($request->expectsJson()) {
                return $this->errorResponse($exception->getMessage(), $exception->getStatusCode());
            }
        }

        if (config('app.debug')){
            return parent::render($request, $exception);
        }

        if ($request->expectsJson()) {
            return $this->errorResponse('Error interno del servidor', 500);
        }

        //return parent::render($request, $exception);
    }
}
