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

class Dispenser2
{
	
	/** @var Main */
    private $plugin;

    public function __construct(CustomGUI $plugin)
    {
        $this->plugin = $plugin;
        $this->dispenser2c = new Config($this->plugin->getDataFolder()."Dispenser/dispenser2.yml", Config::YAML);
    }
    
    public function openDispenser2(Player $sender){
		if ($this->plugin->getConfig()->get("dispenser2", true)) {
		   $this->dispenser2g = InvMenu::create(InvMenu::TYPE_DISPENSER);
       	$this->dispenser2g->readonly();
	       $this->dispenser2g->setListener([$this, "listenerDispenser2"]);
           $this->dispenser2g->setName($this->dispenser2c->get("name"));
	       $inventory = $this->dispenser2g->getInventory();
	       $inventory->setItem(0, Item::get($this->dispenser2c->get("id1"), $this->dispenser2c->get("meta1"), $this->dispenser2c->get("count1"))->setCustomName($this->dispenser2c->get("itemsname1"))->setLore([$this->dispenser2c->get("desc1")]));
	       $inventory->setItem(1, Item::get($this->dispenser2c->get("id2"), $this->dispenser2c->get("meta2"), $this->dispenser2c->get("count2"))->setCustomName($this->dispenser2c->get("itemsname2"))->setLore([$this->dispenser2c->get("desc2")]));
	       $inventory->setItem(2, Item::get($this->dispenser2c->get("id3"), $this->dispenser2c->get("meta3"), $this->dispenser2c->get("count3"))->setCustomName($this->dispenser2c->get("itemsname3"))->setLore([$this->dispenser2c->get("desc3")]));
	       $inventory->setItem(3, Item::get($this->dispenser2c->get("id4"), $this->dispenser2c->get("meta4"), $this->dispenser2c->get("count4"))->setCustomName($this->dispenser2c->get("itemsname4"))->setLore([$this->dispenser2c->get("desc4")]));
	       $inventory->setItem(4, Item::get($this->dispenser2c->get("id5"), $this->dispenser2c->get("meta5"), $this->dispenser2c->get("count5"))->setCustomName($this->dispenser2c->get("itemsname5"))->setLore([$this->dispenser2c->get("desc5")]));
	       $inventory->setItem(5, Item::get($this->dispenser2c->get("id6"), $this->dispenser2c->get("meta6"), $this->dispenser2c->get("count6"))->setCustomName($this->dispenser2c->get("itemsname6"))->setLore([$this->dispenser2c->get("desc6")]));
           $inventory->setItem(6, Item::get($this->dispenser2c->get("id7"), $this->dispenser2c->get("meta7"), $this->dispenser2c->get("count7"))->setCustomName($this->dispenser2c->get("itemsname7"))->setLore([$this->dispenser2c->get("desc7")]));
           $inventory->setItem(7, Item::get($this->dispenser2c->get("id8"), $this->dispenser2c->get("meta8"), $this->dispenser2c->get("count8"))->setCustomName($this->dispenser2c->get("itemsname8"))->setLore([$this->dispenser2c->get("desc8")]));
           $inventory->setItem(8, Item::get($this->dispenser2c->get("id9"), $this->dispenser2c->get("meta9"), $this->dispenser2c->get("count9"))->setCustomName($this->dispenser2c->get("itemsname9"))->setLore([$this->dispenser2c->get("desc9")]));
	       $this->dispenser2g->send($sender);
	   }else{
		   $sender->sendMessage("§b[§eCustomGUI§b] §4Dispenser2 was set to false");
	   }
	}
	
	public function listenerDispenser2(Player $sender, Item $item){
		$hand = $sender->getInventory()->getItemInHand()->getCustomName();
        $inventory = $this->dispenser2g->getInventory();
        if($item->getId() == $this->dispenser2c->get("id1") && $item->getDamage() == $this->dispenser2c->get("meta1")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenser2c->get("commands1"));
            $sender->sendMessage($this->dispenser2c->get("msg1"));
        }
        if($item->getId() == $this->dispenser2c->get("id2") && $item->getDamage() == $this->dispenser2c->get("meta2")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenser2c->get("commands2"));
            $sender->sendMessage($this->dispenser2c->get("msg2"));
        }
        if($item->getId() == $this->dispenser2c->get("id3") && $item->getDamage() == $this->dispenser2c->get("meta3")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenser2c->get("commands3"));
            $sender->sendMessage($this->dispenser2c->get("msg3"));
        }
        if($item->getId() == $this->dispenser2c->get("id4") && $item->getDamage() == $this->dispenser2c->get("meta4")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenser2c->get("commands4"));
            $sender->sendMessage($this->dispenser2c->get("msg4"));
        }
        if($item->getId() == $this->dispenser2c->get("id5") && $item->getDamage() == $this->dispenser2c->get("meta5")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenser2c->get("commands5"));
            $sender->sendMessage($this->dispenser2c->get("msg5"));
        }
        if($item->getId() == $this->dispenser2c->get("id6") && $item->getDamage() == $this->dispenser2c->get("meta6")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenser2c->get("commands6"));
            $sender->sendMessage($this->dispenser2c->get("msg6"));
        }
        if($item->getId() == $this->dispenser2c->get("id7") && $item->getDamage() == $this->dispenser2c->get("meta7")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenser2c->get("commands7"));
            $sender->sendMessage($this->dispenser2c->get("msg7"));
        }
        if($item->getId() == $this->dispenser2c->get("id8") && $item->getDamage() == $this->dispenser2c->get("meta8")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenser2c->get("commands8"));
            $sender->sendMessage($this->dispenser2c->get("msg8"));
        }
        if($item->getId() == $this->dispenser2c->get("id9") && $item->getDamage() == $this->dispenser2c->get("meta9")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->dispenser2c->get("commands9"));
            $sender->sendMessage($this->dispenser2c->get("msg9"));
        }
    }
}
    
    
