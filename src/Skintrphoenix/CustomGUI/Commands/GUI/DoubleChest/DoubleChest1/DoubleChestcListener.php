<?php

namespace Skintrphoenix\CustomGUI\Commands\GUI\DoubleChest\DoubleChest1;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\Command;
use Skintrphoenix\CustomGUI\CustomGUI;
use pocketmine\plugin\Plugin;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use Skintrphoenix\CustomGUI\Commands\GUI\DoubleChest\DoubleChest1\DoubleChestc;
use Skintrphoenix\CustomGUI\GUI\DoubleChest\DoubleChest;

class DoubleChestcListener{
	
	/** @var CustomGUI */
	private $plugin;
	
	public function __construct(CustomGUI $plugin)
    {
        $this->plugin = $plugin;
        $this->doublechestc = new Config($this->plugin->getDataFolder()."Double_Chest/double-chest.yml", Config::YAML);
    }
    
    public function onGetPlayer(): array {
    	return (array) $this->doublechestc->get("player-accept");
    }
    
    public function onCommand(Player $sender){
        if($this->doublechestc->get("permission", "op")){
        	$player = $sender->getName();
        	if($sender->isOp()){
                $doublechest = new DoubleChest(CustomGUI::getInstance());
                $doublechest->openDoubleChest($sender);
             }elseif (in_array($player, $this->onGetPlayer())) {
                 $doublechest = new DoubleChest(CustomGUI::getInstance());
                $doublechest->openDoubleChest($sender);
             }else{
                $sender->sendMessage("§4You don't have permission to run command");
             }
         }else{
         	$doublechest = new DoubleChest(CustomGUI::getInstance());
             $doublechest->openDoubleChest($sender);
         }
     }
}

