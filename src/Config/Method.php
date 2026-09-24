<?php

namespace Onetoweb\Mondu\Config;

enum Method: string
{
    case GET = 'GET';
    case POST = 'POST';
    case DELETE = 'DELETE';
    case PUT = 'PUT';
}
