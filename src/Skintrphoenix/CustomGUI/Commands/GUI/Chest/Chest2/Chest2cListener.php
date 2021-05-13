<?php

namespace Skintrphoenix\CustomGUI\Commands\GUI\Chest\Chest2;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\Command;
use Skintrphoenix\CustomGUI\CustomGUI;
use pocketmine\plugin\Plugin;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use Skintrphoenix\CustomGUI\Commands\GUI\Chest\Chest2\Chest2c;
use Skintrphoenix\CustomGUI\GUI\Chest\Chest2;

class Chest2cListener{
	
	/** @var CustomGUI */
	private $plugin;
	
	public function __construct(CustomGUI $plugin)
    {
        $this->plugin = $plugin;
        $this->chest2c = new Config($this->plugin->getDataFolder()."Chest/chest2.yml", Config::YAML);
    }
    
    public function onGetPlayer(): array {
    	return (array) $this->chest2c->get("player-accept");
    }
    
    public function onCommand(Player $sender){
        if($this->chest2c->get("permission", "op")){
        	$player = $sender->getName();
        	if($sender->isOp()){
                $chest = new Chest2(CustomGUI::getInstance());
                $chest->openChest2($sender);
             }elseif (in_array($player, $this->onGetPlayer())) {
                 $chest = new Chest2(CustomGUI::getInstance());
                $chest->openChest2($sender);
             }else{
                $sender->sendMessage("§4You don't have permission to run command");
             }
         }else{
         	$chest = new Chest2(CustomGUI::getInstance());
             $chest->openChest2($sender);
         }
     }
}

