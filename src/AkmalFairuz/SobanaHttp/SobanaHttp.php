<?php

declare(strict_types=1);

namespace AkmalFairuz\SobanaHttp;

use AkmalFairuz\Sobana\Sobana;
use pocketmine\plugin\PluginBase;

class SobanaHttp extends PluginBase{

    public function onEnable(): void{
        $server = Sobana::createServer("0.0.0.0", 8080, HttpSession::class, HttpEncoder::class, HttpDecoder::class);
        $server->start();
    }
}