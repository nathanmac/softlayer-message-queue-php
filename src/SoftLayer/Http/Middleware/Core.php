<?php

namespace SoftLayer\Http\Middleware;

use SoftLayer\Http\Request;
use SoftLayer\Http\Response;
use Exception;

class Core implements MiddlewareInterface
{
    public function filterRequest(Request &$request)
    {
        /* ... */
    }

    public function filterResponse(Response &$response)
    {
        $status = $response->getStatus();

        if($status >= 400) {
            $body = $response->getBody();
            $errors = "";
            $exception = "[{$status}]";

            if(property_exists($body, 'message')) {
                $exception .= " - {$body->message}";
            }

            if(property_exists($body, 'errors')) {
                foreach($body->errors as $category => $collection) {
                    $errors .= "{$category}: " . implode(", ", $collection);
                }
            }

            if($errors) $exception .= " - {$errors}";

            throw new Exception($exception);
        }
    }
}
