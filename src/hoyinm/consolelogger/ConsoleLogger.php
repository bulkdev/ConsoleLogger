<?php

/*
 *Plugin by ---> H    H   HHHHHH  H    H  HHHHHH  H    H  H     H
 *               H    H   H    H   H  H     HH    HH   H  HH H HH
 *               HHHHHH   H    H    HH      HH    HHH  H  H H H H
 *               H    H   H    H    HH      HH    H  H H  H     H
 *               H    H   HHHHHH    HH    HHHHHH  H   HH  H     H
 * Do not copy the code!
 * (C) CyberCube
 * Website: http://www.cybercube-hk.com
 * Github: http://github.cybercube-hk.com
*/

namespace hoyinm\consolelogger;

use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerCommandPreprocessEvent;
use pocketmine\event\server\ServerCommandEvent;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\event\Listener;
use pocketmine\utils\Config;

class ConsoleLogger extends PluginBase implements Listener{
    public function onEnable(){
	    $this->getServer()->getPluginManager()->registerEvents($this,$this);
		$this->getLogger()->debug("Loading resources...");
        $this->saveDefaultConfig();
		$this->reloadConfig();
		$this->getLogger()->info(TextFormat::GOLD." Plugin Enabled!");
	}
	public function onPlayerCommand(PlayerCommandPreprocessEvent $event){
		$player = $event->getPlayer()->getName();
	        if(substr($message = $event->getMessage(), 0, 1) === "/"){
		    echo "<server> $player issued server command: $message";
		}
	}
	public function onConsoleCommand(ServerCommandEvent $event){
		$cmd = $event->getCommand();
		if($cmd = $event->getCommand()){
	                echo "<server> CONSOLE issued server command: /$cmd \n";
		}
	}
}
