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

class Hopper
{
	
	/** @var Main */
    private $plugin;

    public function __construct(CustomGUI $plugin)
    {
        $this->plugin = $plugin;
        $this->hopperc = new Config($this->plugin->getDataFolder()."Hopper/hopper.yml", Config::YAML);
    }
    
    public function openHopper(Player $sender){
		if ($this->plugin->getConfig()->get("hopper", true)) {
		   $this->hopperg = InvMenu::create(InvMenu::TYPE_HOPPER);
       	$this->hopperg->readonly();
	       $this->hopperg->setListener([$this, "listenerHopper"]);
           $this->hopperg->setName($this->hopperc->get("name"));
	       $inventory = $this->hopperg->getInventory();
	       $inventory->setItem(0, Item::get($this->hopperc->get("id1"), $this->hopperc->get("meta1"), $this->hopperc->get("count1"))->setCustomName($this->hopperc->get("itemsname1"))->setLore([$this->hopperc->get("desc1")]));
	       $inventory->setItem(1, Item::get($this->hopperc->get("id2"), $this->hopperc->get("meta2"), $this->hopperc->get("count2"))->setCustomName($this->hopperc->get("itemsname2"))->setLore([$this->hopperc->get("desc2")]));
	       $inventory->setItem(2, Item::get($this->hopperc->get("id3"), $this->hopperc->get("meta3"), $this->hopperc->get("count3"))->setCustomName($this->hopperc->get("itemsname3"))->setLore([$this->hopperc->get("desc3")]));
	       $inventory->setItem(3, Item::get($this->hopperc->get("id4"), $this->hopperc->get("meta4"), $this->hopperc->get("count4"))->setCustomName($this->hopperc->get("itemsname4"))->setLore([$this->hopperc->get("desc4")]));
	       $inventory->setItem(4, Item::get($this->hopperc->get("id5"), $this->hopperc->get("meta5"), $this->hopperc->get("count5"))->setCustomName($this->hopperc->get("itemsname5"))->setLore([$this->hopperc->get("desc5")]));
	       $this->hopperg->send($sender);
	   }else{
		   $sender->sendMessage("§b[§eCustomGUI§b] §4Hopper was set to false");
	   }
	}
	
	public function listenerHopper(Player $sender, Item $item){
		$hand = $sender->getInventory()->getItemInHand()->getCustomName();
        $inventory = $this->hopperg->getInventory();
        if($item->getId() == $this->hopperc->get("id1") && $item->getDamage() == $this->hopperc->get("meta1")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->hopperc->get("commands1"));
            $sender->sendMessage($this->hopperc->get("msg1"));
        }
        if($item->getId() == $this->hopperc->get("id2") && $item->getDamage() == $this->hopperc->get("meta2")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->hopperc->get("commands2"));
            $sender->sendMessage($this->hopperc->get("msg2"));
        }
        if($item->getId() == $this->hopperc->get("id3") && $item->getDamage() == $this->hopperc->get("meta3")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->hopperc->get("commands3"));
            $sender->sendMessage($this->hopperc->get("msg3"));
        }
        if($item->getId() == $this->hopperc->get("id4") && $item->getDamage() == $this->hopperc->get("meta4")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->hopperc->get("commands4"));
            $sender->sendMessage($this->hopperc->get("msg4"));
        }
        if($item->getId() == $this->hopperc->get("id5") && $item->getDamage() == $this->hopperc->get("meta5")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->hopperc->get("commands5"));
            $sender->sendMessage($this->hopperc->get("msg5"));
        }
    }
}
    
    
