<?php

namespace Skintrphoenix\CustomGUI\Commands\GUI\Chest\Chest1;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\Command;
use Skintrphoenix\CustomGUI\CustomGUI;
use pocketmine\plugin\Plugin;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use Skintrphoenix\CustomGUI\Commands\GUI\Chest\Chest1\Chestc;
use Skintrphoenix\CustomGUI\GUI\Chest\Chest;

class ChestcListener{
	
	/** @var CustomGUI */
	private $plugin;
	
	public function __construct(CustomGUI $plugin)
    {
        $this->plugin = $plugin;
        $this->chestc = new Config($this->plugin->getDataFolder()."Chest/chest.yml", Config::YAML);
    }
    
    public function onGetPlayer(): array {
    	return (array) $this->chestc->get("player-accept");
    }
    
    public function onCommand(Player $sender){
        if($this->chestc->get("permission", "op")){
        	$player = $sender->getName();
        	if($sender->isOp()){
                $chest = new Chest(CustomGUI::getInstance());
                $chest->openChest($sender);
             }elseif (in_array($player, $this->onGetPlayer())) {
                 $chest = new Chest(CustomGUI::getInstance());
                $chest->openChest($sender);
             }else{
                $sender->sendMessage("§4You don't have permission to run command");
             }
         }else{
         	$chest = new Chest(CustomGUI::getInstance());
             $chest->openChest($sender);
         }
     }
}

