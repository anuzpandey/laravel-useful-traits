<?php

declare(strict_types=1);

namespace AnuzPandey\LaravelUsefulTraits\Concerns;

use Illuminate\Http\Response;

trait SetErrorView
{
    protected function showErrorPage($errorCode = 404, $message = null): Response
    {
        $data['message'] = $message;

        return response()->view('errors.'.$errorCode, $data, $errorCode);
    }
}
