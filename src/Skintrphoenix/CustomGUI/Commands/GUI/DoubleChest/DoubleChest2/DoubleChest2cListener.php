<?php

namespace Skintrphoenix\CustomGUI\Commands\GUI\DoubleChest\DoubleChest2;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\Command;
use Skintrphoenix\CustomGUI\CustomGUI;
use pocketmine\plugin\Plugin;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use Skintrphoenix\CustomGUI\Commands\GUI\DoubleChest\DoubleChest2\DoubleChest2c;
use Skintrphoenix\CustomGUI\GUI\DoubleChest\DoubleChest2;

class DoubleChest2cListener{
	
	/** @var CustomGUI */
	private $plugin;
	
	public function __construct(CustomGUI $plugin)
    {
        $this->plugin = $plugin;
        $this->doublechest2c = new Config($this->plugin->getDataFolder()."Double_Chest/double-chest2.yml", Config::YAML);
    }
    
    public function onGetPlayer(): array {
    	return (array) $this->doublechest2c->get("player-accept");
    }
    
    public function onCommand(Player $sender){
        if($this->doublechest2c->get("permission", "op")){
        	$player = $sender->getName();
        	if($sender->isOp()){
                $doublechest2 = new DoubleChest2(CustomGUI::getInstance());
                $doublechest2->openDoubleChest2($sender);
             }elseif (in_array($player, $this->onGetPlayer())) {
                 $doublechest2 = new DoubleChest2(CustomGUI::getInstance());
                $doublechest2->openDoubleChest2($sender);
             }else{
                $sender->sendMessage("§4You don't have permission to run command");
             }
         }else{
         	$doublechest2 = new DoubleChest2(CustomGUI::getInstance());
             $doublechest2->openDoubleChest2($sender);
         }
     }
}

