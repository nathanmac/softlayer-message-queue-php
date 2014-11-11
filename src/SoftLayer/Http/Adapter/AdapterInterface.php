<?php

namespace SoftLayer\Http\Adapter;

use SoftLayer\Http\Request;
use SoftLayer\Http\Response;

interface AdapterInterface
{
    public function call(Request &$request, Response &$response);
}