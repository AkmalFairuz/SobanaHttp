<?php

declare(strict_types=1);

namespace AkmalFairuz\SobanaHttp;

use AkmalFairuz\Sobana\encoding\PacketDecoder;
use function array_shift;
use function explode;
use function serialize;
use function implode;

class HttpDecoder extends PacketDecoder{

    protected function decode(string $buffer): string{
        $lines = explode("\r\n", $buffer);
        if(count($lines) < 1) {
            return "";
        }
        $firstLine = explode(" ", $lines[0]);
        $method = $firstLine[0];
        $path = $firstLine[1];
        $protocol = $firstLine[2];
        $headers = [];
        array_shift($lines);
        foreach($lines as $line) {
            array_shift($lines);
            if($line === "") {
                break; // end of http header (multiple \r\n)
            }
            $headers[] = $line;
        }
        $body = implode("\r\n", $lines);

        $request = new HttpRequest();
        $request->body = $body;
        $request->headers = $headers;
        $request->path = $path;
        $request->method = $method;
        $request->protocol = $protocol;
        return serialize($request);
    }
}