<?php

namespace Skintrphoenix\CustomGUI\GUI\Hopper;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\Command;
use Skintrphoenix\CustomGUI\CustomGUI;
use pocketmine\plugin\Plugin;
use Skintrphoenix\CustomGUI\Commands\Commands;
use pocketmine\Player;
use pocketmine\Server;
use muqsit\invmenu\InvMenu;
use muqsit\invmenu\InvMenuHandler;
use pocketmine\utils\Config;
use pocketmine\item\Item;
use pocketmine\inventory\transaction\action\SlotChangeAction;

class Hopper2
{
	
	/** @var Main */
    private $plugin;

    public function __construct(CustomGUI $plugin)
    {
        $this->plugin = $plugin;
        $this->hopper2c = new Config($this->plugin->getDataFolder()."Hopper/hopper2.yml", Config::YAML);
    }
    
    public function openHopper2(Player $sender){
		if ($this->plugin->getConfig()->get("hopper2", true)) {
		   $this->hopper2g = InvMenu::create(InvMenu::TYPE_HOPPER);
       	$this->hopper2g->readonly();
	       $this->hopper2g->setListener([$this, "listenerHopper2"]);
           $this->hopper2g->setName($this->hopper2c->get("name"));
	       $inventory = $this->hopper2g->getInventory();
	       $inventory->setItem(0, Item::get($this->hopper2c->get("id1"), $this->hopper2c->get("meta1"), $this->hopper2c->get("count1"))->setCustomName($this->hopper2c->get("itemsname1"))->setLore([$this->hopper2c->get("desc1")]));
	       $inventory->setItem(1, Item::get($this->hopper2c->get("id2"), $this->hopper2c->get("meta2"), $this->hopper2c->get("count2"))->setCustomName($this->hopper2c->get("itemsname2"))->setLore([$this->hopper2c->get("desc2")]));
	       $inventory->setItem(2, Item::get($this->hopper2c->get("id3"), $this->hopper2c->get("meta3"), $this->hopper2c->get("count3"))->setCustomName($this->hopper2c->get("itemsname3"))->setLore([$this->hopper2c->get("desc3")]));
	       $inventory->setItem(3, Item::get($this->hopper2c->get("id4"), $this->hopper2c->get("meta4"), $this->hopper2c->get("count4"))->setCustomName($this->hopper2c->get("itemsname4"))->setLore([$this->hopper2c->get("desc4")]));
	       $inventory->setItem(4, Item::get($this->hopper2c->get("id5"), $this->hopper2c->get("meta5"), $this->hopper2c->get("count5"))->setCustomName($this->hopper2c->get("itemsname5"))->setLore([$this->hopper2c->get("desc5")]));
	       $this->hopper2g->send($sender);
	   }else{
		   $sender->sendMessage("§b[§eCustomGUI§b] §4Hopper2 was set to false");
	   }
	}
	
	public function listenerHopper2(Player $sender, Item $item){
		$hand = $sender->getInventory()->getItemInHand()->getCustomName();
        $inventory = $this->hopper2g->getInventory();
        if($item->getId() == $this->hopper2c->get("id1") && $item->getDamage() == $this->hopper2c->get("meta1")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->hopper2c->get("commands1"));
            $sender->sendMessage($this->hopper2c->get("msg1"));
        }
        if($item->getId() == $this->hopper2c->get("id2") && $item->getDamage() == $this->hopper2c->get("meta2")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->hopper2c->get("commands2"));
            $sender->sendMessage($this->hopper2c->get("msg2"));
        }
        if($item->getId() == $this->hopper2c->get("id3") && $item->getDamage() == $this->hopper2c->get("meta3")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->hopper2c->get("commands3"));
            $sender->sendMessage($this->hopper2c->get("msg3"));
        }
        if($item->getId() == $this->hopper2c->get("id4") && $item->getDamage() == $this->hopper2c->get("meta4")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->hopper2c->get("commands4"));
            $sender->sendMessage($this->hopper2c->get("msg4"));
        }
        if($item->getId() == $this->hopper2c->get("id5") && $item->getDamage() == $this->hopper2c->get("meta5")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->hopper2c->get("commands5"));
            $sender->sendMessage($this->hopper2c->get("msg5"));
        }
    }
}
    
    