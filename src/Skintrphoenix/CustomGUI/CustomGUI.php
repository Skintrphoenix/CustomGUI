<?php

namespace Skintrphoenix\CustomGUI;

use Skintrphoenix\CustomGUI\Commands\Commands;
use pocketmine\event\Listener;
use pocketmine\level\Level;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\scheduler\Task;
use pocketmine\item\Item;
use pocketmine\utils\TextFormat;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\Config;

use muqsit\invmenu\InvMenu;
use muqsit\invmenu\InvMenuHandler;

class CustomGUI extends PluginBase implements Listener
{
	
	public static $instance;

  public function onEnable(){
      $this->getServer()->getPluginManager()->registerEvents($this, $this);
      $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §aPlugin Enabled");
      $this->getServer()->getCommandMap()->register("gui", new Commands("gui", $this));
	  $this->saveResource("config.yml");
	  $this->saveResource("Chest/chest.yml");
	  $this->saveResource("Double_Chest/double-chest.yml");
	  $this->saveResource("Hopper/hopper.yml");
	  $this->saveResource("Dispenser/dispenser.yml");
	  $this->saveResource("Chest/chest2.yml");
	  $this->saveResource("Double_Chest/double-chest2.yml");
	  $this->saveResource("Hopper/hopper2.yml");
	  $this->saveResource("Dispenser/dispenser2.yml");
	  $this->config = new Config($this->getDataFolder()."config.yml", Config::YAML);
	
	  if($this->getConfig()->get("chest", true)) {
		 $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §eChest §aEnabled");
	  }else{
		 $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §eChest §4Disabled");
	  }
	
	  if($this->getConfig()->get("chest2", true)) {
		 $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §eChest2 §aEnabled");
	  }else{
		 $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §eChest2 §4Disabled");
	  }
	
	  if($this->getConfig()->get("dispenser", true)) {
		 $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §eDispenser §aEnabled");
	  }else{
		 $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §eDispenser §4Disabled");
	  }
	
	  if($this->getConfig()->get("dispenser2", true)) {
		 $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §eDispenser2 §aEnabled");
	  }else{
		 $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §eDispenser2 §4Disabled");
	  }
	
	  if($this->getConfig()->get("hopper", true)) {
		 $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §eHopper §aEnabled");
	  }else{
		 $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §eHopper §4Disabled");
	  }
	
	  if($this->getConfig()->get("hopper2", true)) {
		 $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §eHopper2 §aEnabled");
	  }else{
		 $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §eHopper2 §4Disabled");
	  }
	
	  if($this->getConfig()->get("doublechest", true)) {
		 $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §eDouble Chest §aEnabled");
	  }else{
		 $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §eDouble Chest §4Disabled");
	  }
	
	  if($this->getConfig()->get("doublechest2", true)) {
		 $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §eDouble Chest2 §aEnabled");
	  }else{
		 $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §eDouble Chest2 §4Disabled");
	  }
	  self::$instance = $this;
	  if(!InvMenuHandler::isRegistered()){
	     InvMenuHandler::register($this);
	  }
   }
   
   public function onDisable(){
       $this->getServer()->getLogger()->Info("§b[§eCustomGUI§b] §4Plugin Disabled");
   }
       
   public static function getInstance() : CustomGUI {
        return self::$instance;
   }
    
}