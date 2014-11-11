<?php
namespace SoftLayer\Messaging;

class Endpoint
{
    public static function endpointByType($type)
    {
        switch(strtolower($type)) {
            case 'http': return new \SoftLayer\Messaging\Endpoint\Http(); break;
            case 'queue': return new \SoftLayer\Messaging\Endpoint\Queue(); break;
        }
    }
}
