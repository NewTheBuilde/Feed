<?php

namespace Feed;

use Feed\Commande\Feed;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener {
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info("Plugin de Feed on");
        $this->getServer()->getCommandMap()->register("Feed", new Feed($this));
    }
}