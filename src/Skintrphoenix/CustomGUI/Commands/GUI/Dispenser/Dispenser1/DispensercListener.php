<?php

namespace Skintrphoenix\CustomGUI\Commands\GUI\Dispenser\Dispenser1;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\Command;
use Skintrphoenix\CustomGUI\CustomGUI;
use pocketmine\plugin\Plugin;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use Skintrphoenix\CustomGUI\Commands\GUI\Dispenser\Dispenser1\Dispenserc;
use Skintrphoenix\CustomGUI\GUI\Dispenser\Dispenser;

class DispensercListener{
	
	/** @var CustomGUI */
	private $plugin;
	
	public function __construct(CustomGUI $plugin)
    {
        $this->plugin = $plugin;
        $this->dispenserc = new Config($this->plugin->getDataFolder()."Dispenser/dispenser.yml", Config::YAML);
    }
    
    public function onGetPlayer(): array {
    	return (array) $this->dispenserc->get("player-accept");
    }
    
    public function onCommand(Player $sender){
        if($this->dispenserc->get("permission", "op")){
        	$player = $sender->getName();
        	if($sender->isOp()){
                $dispenser = new Dispenser(CustomGUI::getInstance());
                $dispenser->openDispenser($sender);
             }elseif (in_array($player, $this->onGetPlayer())) {
                 $dispenser = new Dispenser(CustomGUI::getInstance());
                $dispenser->openDispenser($sender);
             }else{
                $sender->sendMessage("§4You don't have permission to run command");
             }
         }else{
         	$dispenser = new Dispenser(CustomGUI::getInstance());
             $dispenser->openDispenser($sender);
         }
     }
}

