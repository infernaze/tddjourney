<?php

namespace App\Exceptions;

use Exception;


class UnauthorizedHttpException extends Exception
{
    /**
     * @param string     $message   The internal exception message
     * @param \Exception $previous  The previous exception
     * @param int        $code      The internal exception code
     * @param array      $headers
     */
    public function __construct(string $message = null, \Exception $previous = null, ?int $code = 0, array $headers = [])
    {
        parent::__construct(401, $message, $previous, $headers, $code);
    }
}
