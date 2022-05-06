<?php

declare(strict_types=1);

namespace AkmalFairuz\SobanaHttp;

class HttpResponse{

    public string $protocol = "HTTP/1.1";
    public int $statusCode = 200;
    public string $statusText = "OK";
    public array $headers = [];
    public string $body;
}