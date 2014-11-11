<?php
namespace SoftLayer\Http\Middleware;

use SoftLayer\Http\Request;
use SoftLayer\Http\Response;

interface MiddlewareInterface
{
    public function filterRequest(Request &$request);
    public function filterResponse(Response &$response);
}