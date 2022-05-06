<?php

declare(strict_types=1);

namespace AkmalFairuz\SobanaHttp;

class HttpRequest{

    public string $method;
    public string $path;
    public string $protocol;
    public array $headers = [];
    public string $body = "";
}