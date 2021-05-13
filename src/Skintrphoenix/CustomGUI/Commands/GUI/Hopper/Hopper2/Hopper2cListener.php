<?php

namespace Skintrphoenix\CustomGUI\Commands\GUI\Hopper\Hopper2;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\Command;
use Skintrphoenix\CustomGUI\CustomGUI;
use pocketmine\plugin\Plugin;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;
use Skintrphoenix\CustomGUI\Commands\GUI\Hopper\Hopper2\Hopper2c;
use Skintrphoenix\CustomGUI\GUI\Hopper\Hopper2;

class Hopper2cListener{
	
	/** @var CustomGUI */
	private $plugin;
	
	public function __construct(CustomGUI $plugin)
    {
        $this->plugin = $plugin;
        $this->hopper2c = new Config($this->plugin->getDataFolder()."Hopper/hopper2.yml", Config::YAML);
    }
    
    public function onGetPlayer(): array {
    	return (array) $this->hopper2c->get("player-accept");
    }
    
    public function onCommand(Player $sender){
        if($this->hopper2c->get("permission", "op")){
        	$player = $sender->getName();
        	if($sender->isOp()){
                $hopper2 = new Hopper2(CustomGUI::getInstance());
                $hopper2->openHopper2($sender);
             }elseif (in_array($player, $this->onGetPlayer())) {
                 $hopper2 = new Hopper2(CustomGUI::getInstance());
                $hopper2->openHopper2($sender);
             }else{
                $sender->sendMessage("§4You don't have permission to run command");
             }
         }else{
         	$hopper2 = new Hopper2(CustomGUI::getInstance());
             $hopper2->openHopper2($sender);
         }
     }
}

