<?php

namespace Jxclsv\Referable\Exceptions;

use Exception;

class ModelNotReferableException extends Exception
{
    public function report()
    {
        logger()->info('Possible Duplicate Transaction.');
    }

    public function render(Request $request)
    {
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Unprocessable Entity.',
            ], 422);
        }
    }
}
