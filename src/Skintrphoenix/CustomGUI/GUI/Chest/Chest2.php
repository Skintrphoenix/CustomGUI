<?php

namespace Skintrphoenix\CustomGUI\GUI\Chest;

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

class Chest2
{
    /** @var Main */
    private $plugin;

    public function __construct(CustomGUI $plugin)
    {
        $this->plugin = $plugin;
        $this->chest2c = new Config($this->plugin->getDataFolder()."Chest/chest2.yml", Config::YAML);
    }

    public function openChest2(Player $sender){
		if ($this->plugin->getConfig()->get("chest2", true)) {
		   $this->chest2g = InvMenu::create(InvMenu::TYPE_CHEST);
       	$this->chest2g->readonly();
	       $this->chest2g->setListener([$this, "listenerChest2"]);
           $this->chest2g->setName($this->chest2c->get("name"));
	       $inventory = $this->chest2g->getInventory();
	       $inventory->setItem(0, Item::get($this->chest2c->get("id1"), $this->chest2c->get("meta1"), $this->chest2c->get("count1"))->setCustomName($this->chest2c->get("itemsname1"))->setLore([$this->chest2c->get("desc1")]));
	       $inventory->setItem(1, Item::get($this->chest2c->get("id2"), $this->chest2c->get("meta2"), $this->chest2c->get("count2"))->setCustomName($this->chest2c->get("itemsname2"))->setLore([$this->chest2c->get("desc2")]));
	       $inventory->setItem(2, Item::get($this->chest2c->get("id3"), $this->chest2c->get("meta3"), $this->chest2c->get("count3"))->setCustomName($this->chest2c->get("itemsname3"))->setLore([$this->chest2c->get("desc3")]));
	       $inventory->setItem(3, Item::get($this->chest2c->get("id4"), $this->chest2c->get("meta4"), $this->chest2c->get("count4"))->setCustomName($this->chest2c->get("itemsname4"))->setLore([$this->chest2c->get("desc4")]));
	       $inventory->setItem(4, Item::get($this->chest2c->get("id5"), $this->chest2c->get("meta5"), $this->chest2c->get("count5"))->setCustomName($this->chest2c->get("itemsname5"))->setLore([$this->chest2c->get("desc5")]));
	       $inventory->setItem(5, Item::get($this->chest2c->get("id6"), $this->chest2c->get("meta6"), $this->chest2c->get("count6"))->setCustomName($this->chest2c->get("itemsname6"))->setLore([$this->chest2c->get("desc6")]));
           $inventory->setItem(6, Item::get($this->chest2c->get("id7"), $this->chest2c->get("meta7"), $this->chest2c->get("count7"))->setCustomName($this->chest2c->get("itemsname7"))->setLore([$this->chest2c->get("desc7")]));
           $inventory->setItem(7, Item::get($this->chest2c->get("id8"), $this->chest2c->get("meta8"), $this->chest2c->get("count8"))->setCustomName($this->chest2c->get("itemsname8"))->setLore([$this->chest2c->get("desc8")]));
           $inventory->setItem(8, Item::get($this->chest2c->get("id9"), $this->chest2c->get("meta9"), $this->chest2c->get("count9"))->setCustomName($this->chest2c->get("itemsname9"))->setLore([$this->chest2c->get("desc9")]));
           $inventory->setItem(9, Item::get($this->chest2c->get("id10"), $this->chest2c->get("meta10"), $this->chest2c->get("count10"))->setCustomName($this->chest2c->get("itemsname10"))->setLore([$this->chest2c->get("desc10")]));
           $inventory->setItem(10, Item::get($this->chest2c->get("id11"), $this->chest2c->get("meta11"), $this->chest2c->get("count11"))->setCustomName($this->chest2c->get("itemsname11"))->setLore([$this->chest2c->get("desc11")]));
           $inventory->setItem(11, Item::get($this->chest2c->get("id12"), $this->chest2c->get("meta12"), $this->chest2c->get("count12"))->setCustomName($this->chest2c->get("itemsname14"))->setLore([$this->chest2c->get("desc14")]));
           $inventory->setItem(12, Item::get($this->chest2c->get("id13"), $this->chest2c->get("meta13"), $this->chest2c->get("count13"))->setCustomName($this->chest2c->get("itemsname13"))->setLore([$this->chest2c->get("desc13")]));
           $inventory->setItem(13, Item::get($this->chest2c->get("id14"), $this->chest2c->get("meta14"), $this->chest2c->get("count14"))->setCustomName($this->chest2c->get("itemsname14"))->setLore([$this->chest2c->get("desc14")]));
           $inventory->setItem(14, Item::get($this->chest2c->get("id15"), $this->chest2c->get("meta15"), $this->chest2c->get("count15"))->setCustomName($this->chest2c->get("itemsname15"))->setLore([$this->chest2c->get("desc15")]));
           $inventory->setItem(15, Item::get($this->chest2c->get("id16"), $this->chest2c->get("meta16"), $this->chest2c->get("count16"))->setCustomName($this->chest2c->get("itemsname16"))->setLore([$this->chest2c->get("desc16")]));
           $inventory->setItem(16, Item::get($this->chest2c->get("id17"), $this->chest2c->get("meta17"), $this->chest2c->get("count17"))->setCustomName($this->chest2c->get("itemsname17"))->setLore([$this->chest2c->get("desc17")]));
           $inventory->setItem(17, Item::get($this->chest2c->get("id18"), $this->chest2c->get("meta18"), $this->chest2c->get("count18"))->setCustomName($this->chest2c->get("itemsname18"))->setLore([$this->chest2c->get("desc18")]));
           $inventory->setItem(18, Item::get($this->chest2c->get("id19"), $this->chest2c->get("meta19"), $this->chest2c->get("count19"))->setCustomName($this->chest2c->get("itemsname19"))->setLore([$this->chest2c->get("desc19")]));
           $inventory->setItem(19, Item::get($this->chest2c->get("id20"), $this->chest2c->get("meta20"), $this->chest2c->get("count20"))->setCustomName($this->chest2c->get("itemsname20"))->setLore([$this->chest2c->get("desc20")]));
           $inventory->setItem(20, Item::get($this->chest2c->get("id21"), $this->chest2c->get("meta21"), $this->chest2c->get("count21"))->setCustomName($this->chest2c->get("itemsname21"))->setLore([$this->chest2c->get("desc21")]));
           $inventory->setItem(21, Item::get($this->chest2c->get("id22"), $this->chest2c->get("meta22"), $this->chest2c->get("count22"))->setCustomName($this->chest2c->get("itemsname22"))->setLore([$this->chest2c->get("desc22")]));
           $inventory->setItem(22, Item::get($this->chest2c->get("id23"), $this->chest2c->get("meta23"), $this->chest2c->get("count23"))->setCustomName($this->chest2c->get("itemsname23"))->setLore([$this->chest2c->get("desc23")]));
           $inventory->setItem(23, Item::get($this->chest2c->get("id24"), $this->chest2c->get("meta24"), $this->chest2c->get("count24"))->setCustomName($this->chest2c->get("itemsname24"))->setLore([$this->chest2c->get("desc24")]));
           $inventory->setItem(24, Item::get($this->chest2c->get("id25"), $this->chest2c->get("meta25"), $this->chest2c->get("count25"))->setCustomName($this->chest2c->get("itemsname25"))->setLore([$this->chest2c->get("desc25")]));
           $inventory->setItem(25, Item::get($this->chest2c->get("id26"), $this->chest2c->get("meta26"), $this->chest2c->get("count26"))->setCustomName($this->chest2c->get("itemsname26"))->setLore([$this->chest2c->get("desc26")]));
           $inventory->setItem(26, Item::get($this->chest2c->get("id27"), $this->chest2c->get("meta27"), $this->chest2c->get("count27"))->setCustomName($this->chest2c->get("itemsname27"))->setLore([$this->chest2c->get("desc27")]));
	       $this->chest2g->send($sender);
	   }else{
		   $sender->sendMessage("§b[§eCustomGUI§b] §4chest2 was set to false");
	   }
	}
	
	public function listenerChest2(Player $sender, Item $item){
		$hand = $sender->getInventory()->getItemInHand()->getCustomName();
        $inventory = $this->chest2g->getInventory();
        if($item->getId() == $this->chest2c->get("id1") && $item->getDamage() == $this->chest2c->get("meta1")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands1"));
            $sender->sendMessage($this->chest2c->get("msg1"));
        }
        if($item->getId() == $this->chest2c->get("id2") && $item->getDamage() == $this->chest2c->get("meta2")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands2"));
            $sender->sendMessage($this->chest2c->get("msg2"));
        }
        if($item->getId() == $this->chest2c->get("id3") && $item->getDamage() == $this->chest2c->get("meta3")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands3"));
            $sender->sendMessage($this->chest2c->get("msg3"));
        }
        if($item->getId() == $this->chest2c->get("id4") && $item->getDamage() == $this->chest2c->get("meta4")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands4"));
            $sender->sendMessage($this->chest2c->get("msg4"));
        }
        if($item->getId() == $this->chest2c->get("id5") && $item->getDamage() == $this->chest2c->get("meta5")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands5"));
            $sender->sendMessage($this->chest2c->get("msg5"));
        }
        if($item->getId() == $this->chest2c->get("id6") && $item->getDamage() == $this->chest2c->get("meta6")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands6"));
            $sender->sendMessage($this->chest2c->get("msg6"));
        }
        if($item->getId() == $this->chest2c->get("id7") && $item->getDamage() == $this->chest2c->get("meta7")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands7"));
            $sender->sendMessage($this->chest2c->get("msg7"));
        }
        if($item->getId() == $this->chest2c->get("id8") && $item->getDamage() == $this->chest2c->get("meta8")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands8"));
            $sender->sendMessage($this->chest2c->get("msg8"));
        }
        if($item->getId() == $this->chest2c->get("id9") && $item->getDamage() == $this->chest2c->get("meta9")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands9"));
            $sender->sendMessage($this->chest2c->get("msg9"));
        }
        if($item->getId() == $this->chest2c->get("id10") && $item->getDamage() == $this->chest2c->get("meta10")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands10"));
            $sender->sendMessage($this->chest2c->get("msg10"));
        }
        if($item->getId() == $this->chest2c->get("id11") && $item->getDamage() == $this->chest2c->get("meta11")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands11"));
            $sender->sendMessage($this->chest2c->get("msg11"));
        }
        if($item->getId() == $this->chest2c->get("id12") && $item->getDamage() == $this->chest2c->get("meta12")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands12"));
            $sender->sendMessage($this->chest2c->get("msg12"));
        }
        if($item->getId() == $this->chest2c->get("id13") && $item->getDamage() == $this->chest2c->get("meta13")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands13"));
            $sender->sendMessage($this->chest2c->get("msg13"));
        }
        if($item->getId() == $this->chest2c->get("id14") && $item->getDamage() == $this->chest2c->get("meta14")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands14"));
            $sender->sendMessage($this->chest2c->get("msg14"));
        }
        if($item->getId() == $this->chest2c->get("id15") && $item->getDamage() == $this->chest2c->get("meta15")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands15"));
            $sender->sendMessage($this->chest2c->get("msg15"));
        }
        if($item->getId() == $this->chest2c->get("id16") && $item->getDamage() == $this->chest2c->get("meta16")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands16"));
            $sender->sendMessage($this->chest2c->get("msg16"));
        }
        if($item->getId() == $this->chest2c->get("id17") && $item->getDamage() == $this->chest2c->get("meta17")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands17"));
            $sender->sendMessage($this->chest2c->get("msg17"));
        }
        if($item->getId() == $this->chest2c->get("id18") && $item->getDamage() == $this->chest2c->get("meta18")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands18"));
            $sender->sendMessage($this->chest2c->get("msg18"));
        }
        if($item->getId() == $this->chest2c->get("id19") && $item->getDamage() == $this->chest2c->get("meta19")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands19"));
            $sender->sendMessage($this->chest2c->get("msg19"));
        }
        if($item->getId() == $this->chest2c->get("id20") && $item->getDamage() == $this->chest2c->get("meta20")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands20"));
            $sender->sendMessage($this->chest2c->get("msg20"));
        }
        if($item->getId() == $this->chest2c->get("id21") && $item->getDamage() == $this->chest2c->get("meta21")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands21"));
            $sender->sendMessage($this->chest2c->get("msg21"));
        }
        if($item->getId() == $this->chest2c->get("id22") && $item->getDamage() == $this->chest2c->get("meta22")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands22"));
            $sender->sendMessage($this->chest2c->get("msg22"));
        }
        if($item->getId() == $this->chest2c->get("id23") && $item->getDamage() == $this->chest2c->get("meta23")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands23"));
            $sender->sendMessage($this->chest2c->get("msg23"));
        }
        if($item->getId() == $this->chest2c->get("id24") && $item->getDamage() == $this->chest2c->get("meta24")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands24"));
            $sender->sendMessage($this->chest2c->get("msg24"));
        }
        if($item->getId() == $this->chest2c->get("id25") && $item->getDamage() == $this->chest2c->get("meta25")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands25"));
            $sender->sendMessage($this->chest2c->get("msg25"));
        }
        if($item->getId() == $this->chest2c->get("id26") && $item->getDamage() == $this->chest2c->get("meta26")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands26"));
            $sender->sendMessage($this->chest2c->get("msg26"));
        }
        if($item->getId() == $this->chest2c->get("id27") && $item->getDamage() == $this->chest2c->get("meta27")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chest2c->get("commands27"));
            $sender->sendMessage($this->chest2c->get("msg27"));
        }
    }
}