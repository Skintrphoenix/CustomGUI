<?php

namespace Skintrphoenix\CustomGUI\Commands\GUI\Dispenser\Dispenser2;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\Command;
use Skintrphoenix\CustomGUI\CustomGUI;
use pocketmine\plugin\Plugin;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use Skintrphoenix\CustomGUI\Commands\GUI\Dispenser\Dispenser2\Dispenser2c;
use Skintrphoenix\CustomGUI\GUI\Dispenser\Dispenser2;

class Dispenser2cListener{
	
	/** @var CustomGUI */
	private $plugin;
	
	public function __construct(CustomGUI $plugin)
    {
        $this->plugin = $plugin;
        $this->dispenser2c = new Config($this->plugin->getDataFolder()."Dispenser/dispenser2.yml", Config::YAML);
    }
    
    public function onGetPlayer(): array {
    	return (array) $this->dispenser2c->get("player-accept");
    }
    
    public function onCommand(Player $sender){
        if($this->dispenser2c->get("permission", "op")){
        	$player = $sender->getName();
        	if($sender->isOp()){
                $dispenser2 = new Dispenser2(CustomGUI::getInstance());
                $dispenser2->openDispenser2($sender);
             }elseif (in_array($player, $this->onGetPlayer())) {
                 $dispenser2 = new Dispenser2(CustomGUI::getInstance());
                $dispenser2->openDispenser2($sender);
             }else{
                $sender->sendMessage("§4You don't have permission to run command");
             }
         }else{
         	$dispenser2 = new Dispenser2(CustomGUI::getInstance());
             $dispenser2->openDispenser2($sender);
         }
     }
}

