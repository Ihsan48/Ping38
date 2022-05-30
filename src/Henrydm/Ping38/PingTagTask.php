<?php

namespace Henrydm\Ping38;

use pocketmine\scheduler\Task;
use Henrydm\Ping38\Ping38;

class PingTagTask extends Task{

        public function __construct(Ping38 $plugin) {
                $this->plugin = $plugin;
        }
	
	public function onRun() : void {
		foreach($this->plugin->getServer()->getOnlinePlayers() as $player){
			$tag=$this->plugin->getConfig()->get("Format");
			$tag=str_replace("{ping}", $player->getPing(), $tag);
			$player->setScoreTag($tag);
		}
	}
}
