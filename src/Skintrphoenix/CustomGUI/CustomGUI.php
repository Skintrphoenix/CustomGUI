<?php

namespace Skintrphoenix\CustomGUI;

use Skintrphoenix\CustomGUI\Commands\Commands;

use Skintrphoenix\CustomGUI\Commands\GUI\Chest\Chest1\Chestc;
use Skintrphoenix\CustomGUI\Commands\GUI\Chest\Chest2\Chest2c;

use Skintrphoenix\CustomGUI\Commands\GUI\Dispenser\Dispenser1\Dispenserc;
use Skintrphoenix\CustomGUI\Commands\GUI\Dispenser\Dispenser2\Dispenser2c;

use Skintrphoenix\CustomGUI\Commands\GUI\DoubleChest\DoubleChest1\DoubleChestc;
use Skintrphoenix\CustomGUI\Commands\GUI\DoubleChest\DoubleChest2\DoubleChest2c;

use Skintrphoenix\CustomGUI\Commands\GUI\Hopper\Hopper1\Hopperc;
use Skintrphoenix\CustomGUI\Commands\GUI\Hopper\Hopper2\Hopper2c;

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

use libs\muqsit\invmenu\InvMenu;
use libs\muqsit\invmenu\InvMenuHandler;

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
	
	  $this->chestc = new Config($this->getDataFolder()."Chest/chest.yml", Config::YAML);
	  $this->chest2c = new Config($this->getDataFolder()."Chest/chest2.yml", Config::YAML);
	
	  $this->dispenserc = new Config($this->getDataFolder()."Dispenser/dispenser.yml", Config::YAML);
	  $this->dispenser2c = new Config($this->getDataFolder()."Dispenser/dispenser2.yml", Config::YAML);
	
	  $this->doublechestc = new Config($this->getDataFolder()."Double_Chest/double-chest.yml", Config::YAML);
	  $this->doublechest2c = new Config($this->getDataFolder()."Double_Chest/double-chest2.yml", Config::YAML);
	
	  $this->hopperc = new Config($this->getDataFolder()."Hopper/hopper.yml", Config::YAML);
	  $this->hopper2c = new Config($this->getDataFolder()."Hopper/hopper2.yml", Config::YAML);
	
	  $this->getServer()->getCommandMap()->register($this->chestc->get("command"), new Chestc($this->chestc->get("command"), $this));
	  $this->getServer()->getCommandMap()->register($this->chest2c->get("command"), new Chest2c($this->chest2c->get("command"), $this));
	
	  $this->getServer()->getCommandMap()->register($this->doublechestc->get("command"), new DoubleChestc($this->doublechestc->get("command"), $this));
	  $this->getServer()->getCommandMap()->register($this->doublechest2c->get("command"), new DoubleChest2c($this->doublechest2c->get("command"), $this));
	
	  $this->getServer()->getCommandMap()->register($this->dispenserc->get("command"), new Dispenserc($this->dispenserc->get("command"), $this));
	  $this->getServer()->getCommandMap()->register($this->dispenser2c->get("command"), new Dispenser2c($this->dispenser2c->get("command"), $this));
	
	  $this->getServer()->getCommandMap()->register($this->hopperc->get("command"), new Hopperc($this->hopperc->get("command"), $this));
	  $this->getServer()->getCommandMap()->register($this->hopper2c->get("command"), new Hopper2c($this->hopper2c->get("command"), $this));
	
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
