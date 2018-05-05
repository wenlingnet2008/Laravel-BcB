<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
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
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        //如果不是 ajax request，则交由laravel处理
        if(!$request->expectsJson()) return parent::render($request, $exception);


        switch(true) {
            case $exception instanceof ModelNotFoundException:
                return response()->json([
                    'message' => 'Record Not Found',
                ], Response::HTTP_NOT_FOUND);
                break;
            case $exception instanceof NotFoundHttpException:
                return response()->json([
                    'message' => 'Page Not Found',
                ], Response::HTTP_NOT_FOUND);
                break;
            case $exception instanceof MethodNotAllowedHttpException:
                return response()->json([
                    'message' => 'Method Not Allowed',
                ], Response::HTTP_BAD_REQUEST);
                break;
            default:
                return parent::render($request, $exception);
        }
    }
}
