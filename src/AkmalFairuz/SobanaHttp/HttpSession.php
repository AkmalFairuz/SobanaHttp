<?php

declare(strict_types=1);

namespace AkmalFairuz\SobanaHttp;

use AkmalFairuz\Sobana\server\ServerSession;
use function serialize;
use function unserialize;

class HttpSession extends ServerSession{

    public function handlePacket(string $packet): void{
        /** @var HttpRequest $req */
        $req = unserialize($packet);
        $res = new HttpResponse();
        $res->body = "<h1>Hello World! <br/>Path: {$req->path}</h1>";
        $this->write(serialize($res));
        $this->close();
    }
}