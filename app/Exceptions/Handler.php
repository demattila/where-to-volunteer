<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileUnacceptableForCollection;
use Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\UnknownType;

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
        if($exception instanceof FileUnacceptableForCollection){
            return redirect()->back()->withErrors('Only jpeg file type is accepted!');
        }
        if($exception instanceof UnknownType){
            return redirect()->back()->withErrors('Choose an image first!');
        }
        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into a response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated(
        $request,
        AuthenticationException $exception
    )
    {
        if (in_array('web_organization', $exception->guards())) {
            return $request->expectsJson()
                ? response()->json([
                    'message' => $exception->getMessage()
                ], 401)
                : redirect()->guest(route('organization.login'));
        }

        return $request->expectsJson()
            ? response()->json([
                'message' => $exception->getMessage()
            ], 401)
            : redirect()->guest(route('login'));
    }
}
