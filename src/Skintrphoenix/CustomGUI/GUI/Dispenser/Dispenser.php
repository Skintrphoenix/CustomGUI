<?php

namespace Skintrphoenix\CustomGUI\GUI\Dispenser;

use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\command\Command;
use Skintrphoenix\CustomGUI\CustomGUI;
use pocketmine\plugin\Plugin;
use Skintrphoenix\CustomGUI\Commands\Commands;
use pocketmine\Player;
use pocketmine\Server;
use libs\muqsit\invmenu\InvMenu;
use libs\muqsit\invmenu\InvMenuHandler;
use pocketmine\utils\Config;
use pocketmine\item\Item;
use pocketmine\inventory\transaction\action\SlotChangeAction;

class Dispenser
{
	
	/** @var Main */
    private $plugin;

    public function __construct(CustomGUI $plugin)
    {
        $this->plugin = $plugin;
        $this->dispenserc = new Config($this->plugin->getDataFolder()."Dispenser/dispenser.yml", Config::YAML);
    }
    
    public function openDispenser(Player $sender){
		if ($this->plugin->getConfig()->get("dispenser", true)) {
		   $this->dispenserg = InvMenu::create(InvMenu::TYPE_DISPENSER);
       	$this->dispenserg->readonly();
	       $this->dispenserg->setListener([$this, "listenerDispenser"]);
           $this->dispenserg->setName($this->dispenserc->get("name"));
	       $inventory = $this->dispenserg->getInventory();
	       $inventory->setItem(0, Item::get($this->dispenserc->get("id1"), $this->dispenserc->get("meta1"), $this->dispenserc->get("count1"))->setCustomName($this->dispenserc->get("itemsname1"))->setLore([$this->dispenserc->get("desc1")]));
	       $inventory->setItem(1, Item::get($this->dispenserc->get("id2"), $this->dispenserc->get("meta2"), $this->dispenserc->get("count2"))->setCustomName($this->dispenserc->get("itemsname2"))->setLore([$this->dispenserc->get("desc2")]));
	       $inventory->setItem(2, Item::get($this->dispenserc->get("id3"), $this->dispenserc->get("meta3"), $this->dispenserc->get("count3"))->setCustomName($this->dispenserc->get("itemsname3"))->setLore([$this->dispenserc->get("desc3")]));
	       $inventory->setItem(3, Item::get($this->dispenserc->get("id4"), $this->dispenserc->get("meta4"), $this->dispenserc->get("count4"))->setCustomName($this->dispenserc->get("itemsname4"))->setLore([$this->dispenserc->get("desc4")]));
	       $inventory->setItem(4, Item::get($this->dispenserc->get("id5"), $this->dispenserc->get("meta5"), $this->dispenserc->get("count5"))->setCustomName($this->dispenserc->get("itemsname5"))->setLore([$this->dispenserc->get("desc5")]));
	       $inventory->setItem(5, Item::get($this->dispenserc->get("id6"), $this->dispenserc->get("meta6"), $this->dispenserc->get("count6"))->setCustomName($this->dispenserc->get("itemsname6"))->setLore([$this->dispenserc->get("desc6")]));
           $inventory->setItem(6, Item::get($this->dispenserc->get("id7"), $this->dispenserc->get("meta7"), $this->dispenserc->get("count7"))->setCustomName($this->dispenserc->get("itemsname7"))->setLore([$this->dispenserc->get("desc7")]));
           $inventory->setItem(7, Item::get($this->dispenserc->get("id8"), $this->dispenserc->get("meta8"), $this->dispenserc->get("count8"))->setCustomName($this->dispenserc->get("itemsname8"))->setLore([$this->dispenserc->get("desc8")]));
           $inventory->setItem(8, Item::get($this->dispenserc->get("id9"), $this->dispenserc->get("meta9"), $this->dispenserc->get("count9"))->setCustomName($this->dispenserc->get("itemsname9"))->setLore([$this->dispenserc->get("desc9")]));
	       $this->dispenserg->send($sender);
	   }else{
		   $sender->sendMessage("§b[§eCustomGUI§b] §4Dispenser was set to false");
	   }
	}
	
	public function listenerDispenser(Player $sender, Item $item){
		$hand = $sender->getInventory()->getItemInHand()->getCustomName();
        $inventory = $this->dispenserg->getInventory();
        if($item->getId() == $this->dispenserc->get("id1") && $item->getDamage() == $this->dispenserc->get("meta1")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenserc->get("commands1"));
            $sender->sendMessage($this->dispenserc->get("msg1"));
        }
        if($item->getId() == $this->dispenserc->get("id2") && $item->getDamage() == $this->dispenserc->get("meta2")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenserc->get("commands2"));
            $sender->sendMessage($this->dispenserc->get("msg2"));
        }
        if($item->getId() == $this->dispenserc->get("id3") && $item->getDamage() == $this->dispenserc->get("meta3")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenserc->get("commands3"));
            $sender->sendMessage($this->dispenserc->get("msg3"));
        }
        if($item->getId() == $this->dispenserc->get("id4") && $item->getDamage() == $this->dispenserc->get("meta4")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenserc->get("commands4"));
            $sender->sendMessage($this->dispenserc->get("msg4"));
        }
        if($item->getId() == $this->dispenserc->get("id5") && $item->getDamage() == $this->dispenserc->get("meta5")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenserc->get("commands5"));
            $sender->sendMessage($this->dispenserc->get("msg5"));
        }
        if($item->getId() == $this->dispenserc->get("id6") && $item->getDamage() == $this->dispenserc->get("meta6")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenserc->get("commands6"));
            $sender->sendMessage($this->dispenserc->get("msg6"));
        }
        if($item->getId() == $this->dispenserc->get("id7") && $item->getDamage() == $this->dispenserc->get("meta7")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenserc->get("commands7"));
            $sender->sendMessage($this->dispenserc->get("msg7"));
        }
        if($item->getId() == $this->dispenserc->get("id8") && $item->getDamage() == $this->dispenserc->get("meta8")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenserc->get("commands8"));
            $sender->sendMessage($this->dispenserc->get("msg8"));
        }
        if($item->getId() == $this->dispenserc->get("id9") && $item->getDamage() == $this->dispenserc->get("meta9")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenserc->get("commands9"));
            $sender->sendMessage($this->dispenserc->get("msg9"));
        }
    }
}
    
    
