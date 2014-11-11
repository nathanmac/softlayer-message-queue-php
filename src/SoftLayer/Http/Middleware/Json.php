<?php
namespace SoftLayer\Http\Middleware;

use SoftLayer\Http\Request;
use SoftLayer\Http\Response;

class Json implements MiddlewareInterface
{
    public function filterRequest(Request &$request)
    {
        $request->setHeader('Content-Type', 'application/json;charset=utf-8');
        $request->setBody(json_encode($request->getBody()));
    }

    public function filterResponse(Response &$response)
    {
        if(stristr($response->getHeader('Content-Type'), 'application/json') !== false) {
            $response->setBody(json_decode($response->getBody()));
        }
    }
}
