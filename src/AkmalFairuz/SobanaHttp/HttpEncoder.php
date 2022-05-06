<?php

declare(strict_types=1);

namespace AkmalFairuz\SobanaHttp;

use AkmalFairuz\Sobana\encoding\PacketEncoder;
use function unserialize;
use function implode;
use function strlen;

class HttpEncoder extends PacketEncoder{

    protected function encode(string $buffer): string{
        /** @var HttpResponse $res */
        $res = unserialize($buffer);
        $res->headers[] = "Content-Length: " . strlen($res->body);
        $res->headers[] = "Connection: close";
        return implode("\r\n", [
            "$res->protocol $res->statusCode $res->statusText",
            implode("\r\n", $res->headers),
            "",
            $res->body
        ]);
    }
}