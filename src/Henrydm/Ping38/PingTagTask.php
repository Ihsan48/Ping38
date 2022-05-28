<?php

namespace Henrydm\Ping38;

use pocketmine\scheduler\Task;

class PingTagTask extends Task{
	
	public function onRun(int $tick) void {
		foreach(PingTag::getInstance()->getServer()->getOnlinePlayers() as $player){
			$tag=PingTag::getInstance()->getConfig()->get("Format");
			$tag=str_replace("{ping}", $player->getPing(), $tag);
			$player->setScoreTag($tag);
		}
	}
}
