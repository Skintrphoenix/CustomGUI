<?php

namespace Skintrphoenix\CustomGUI\Commands\GUI\Hopper\Hopper1;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\Command;
use Skintrphoenix\CustomGUI\CustomGUI;
use pocketmine\plugin\Plugin;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use Skintrphoenix\CustomGUI\Commands\GUI\Hopper\Hopper1\Hopperc;
use Skintrphoenix\CustomGUI\GUI\Hopper\Hopper;

class HoppercListener{
	
	/** @var CustomGUI */
	private $plugin;
	
	public function __construct(CustomGUI $plugin)
    {
        $this->plugin = $plugin;
        $this->hopperc = new Config($this->plugin->getDataFolder()."Hopper/hopper.yml", Config::YAML);
    }
    
    public function onGetPlayer(): array {
    	return (array) $this->hopperc->get("player-accept");
    }
    
    public function onCommand(Player $sender){
        if($this->hopperc->get("permission", "op")){
        	$player = $sender->getName();
        	if($sender->isOp()){
                $hopper = new Hopper(CustomGUI::getInstance());
                $hopper->openHopper($sender);
             }elseif (in_array($player, $this->onGetPlayer())) {
                 $hopper = new Hopper(CustomGUI::getInstance());
                $hopper->openHopper($sender);
             }else{
                $sender->sendMessage("§4You don't have permission to run command");
             }
         }else{
         	$hopper = new Hopper(CustomGUI::getInstance());
             $hopper->openHopper($sender);
         }
     }
}

