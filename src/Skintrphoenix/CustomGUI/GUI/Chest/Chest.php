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

class Chest
{
    /** @var Main */
    private $plugin;

    public function __construct(CustomGUI $plugin)
    {
        $this->plugin = $plugin;
        $this->chestc = new Config($this->plugin->getDataFolder()."Chest/chest.yml", Config::YAML);
    }

    public function openChest(Player $sender){
		if ($this->plugin->getConfig()->get("chest", true)) {
		   $this->chestg = InvMenu::create(InvMenu::TYPE_CHEST);
       	$this->chestg->readonly();
	       $this->chestg->setListener([$this, "listenerChest"]);
           $this->chestg->setName($this->chestc->get("name"));
	       $inventory = $this->chestg->getInventory();
	       $inventory->setItem(0, Item::get($this->chestc->get("id1"), $this->chestc->get("meta1"), $this->chestc->get("count1"))->setCustomName($this->chestc->get("itemsname1"))->setLore([$this->chestc->get("desc1")]));
	       $inventory->setItem(1, Item::get($this->chestc->get("id2"), $this->chestc->get("meta2"), $this->chestc->get("count2"))->setCustomName($this->chestc->get("itemsname2"))->setLore([$this->chestc->get("desc2")]));
	       $inventory->setItem(2, Item::get($this->chestc->get("id3"), $this->chestc->get("meta3"), $this->chestc->get("count3"))->setCustomName($this->chestc->get("itemsname3"))->setLore([$this->chestc->get("desc3")]));
	       $inventory->setItem(3, Item::get($this->chestc->get("id4"), $this->chestc->get("meta4"), $this->chestc->get("count4"))->setCustomName($this->chestc->get("itemsname4"))->setLore([$this->chestc->get("desc4")]));
	       $inventory->setItem(4, Item::get($this->chestc->get("id5"), $this->chestc->get("meta5"), $this->chestc->get("count5"))->setCustomName($this->chestc->get("itemsname5"))->setLore([$this->chestc->get("desc5")]));
	       $inventory->setItem(5, Item::get($this->chestc->get("id6"), $this->chestc->get("meta6"), $this->chestc->get("count6"))->setCustomName($this->chestc->get("itemsname6"))->setLore([$this->chestc->get("desc6")]));
           $inventory->setItem(6, Item::get($this->chestc->get("id7"), $this->chestc->get("meta7"), $this->chestc->get("count7"))->setCustomName($this->chestc->get("itemsname7"))->setLore([$this->chestc->get("desc7")]));
           $inventory->setItem(7, Item::get($this->chestc->get("id8"), $this->chestc->get("meta8"), $this->chestc->get("count8"))->setCustomName($this->chestc->get("itemsname8"))->setLore([$this->chestc->get("desc8")]));
           $inventory->setItem(8, Item::get($this->chestc->get("id9"), $this->chestc->get("meta9"), $this->chestc->get("count9"))->setCustomName($this->chestc->get("itemsname9"))->setLore([$this->chestc->get("desc9")]));
           $inventory->setItem(9, Item::get($this->chestc->get("id10"), $this->chestc->get("meta10"), $this->chestc->get("count10"))->setCustomName($this->chestc->get("itemsname10"))->setLore([$this->chestc->get("desc10")]));
           $inventory->setItem(10, Item::get($this->chestc->get("id11"), $this->chestc->get("meta11"), $this->chestc->get("count11"))->setCustomName($this->chestc->get("itemsname11"))->setLore([$this->chestc->get("desc11")]));
           $inventory->setItem(11, Item::get($this->chestc->get("id12"), $this->chestc->get("meta12"), $this->chestc->get("count12"))->setCustomName($this->chestc->get("itemsname12"))->setLore([$this->chestc->get("desc12")]));
           $inventory->setItem(12, Item::get($this->chestc->get("id13"), $this->chestc->get("meta13"), $this->chestc->get("count13"))->setCustomName($this->chestc->get("itemsname13"))->setLore([$this->chestc->get("desc13")]));
           $inventory->setItem(13, Item::get($this->chestc->get("id14"), $this->chestc->get("meta14"), $this->chestc->get("count14"))->setCustomName($this->chestc->get("itemsname14"))->setLore([$this->chestc->get("desc14")]));
           $inventory->setItem(14, Item::get($this->chestc->get("id15"), $this->chestc->get("meta15"), $this->chestc->get("count15"))->setCustomName($this->chestc->get("itemsname15"))->setLore([$this->chestc->get("desc15")]));
           $inventory->setItem(15, Item::get($this->chestc->get("id16"), $this->chestc->get("meta16"), $this->chestc->get("count16"))->setCustomName($this->chestc->get("itemsname16"))->setLore([$this->chestc->get("desc16")]));
           $inventory->setItem(16, Item::get($this->chestc->get("id17"), $this->chestc->get("meta17"), $this->chestc->get("count17"))->setCustomName($this->chestc->get("itemsname17"))->setLore([$this->chestc->get("desc17")]));
           $inventory->setItem(17, Item::get($this->chestc->get("id18"), $this->chestc->get("meta18"), $this->chestc->get("count18"))->setCustomName($this->chestc->get("itemsname18"))->setLore([$this->chestc->get("desc18")]));
           $inventory->setItem(18, Item::get($this->chestc->get("id19"), $this->chestc->get("meta19"), $this->chestc->get("count19"))->setCustomName($this->chestc->get("itemsname19"))->setLore([$this->chestc->get("desc19")]));
           $inventory->setItem(19, Item::get($this->chestc->get("id20"), $this->chestc->get("meta20"), $this->chestc->get("count20"))->setCustomName($this->chestc->get("itemsname20"))->setLore([$this->chestc->get("desc20")]));
           $inventory->setItem(20, Item::get($this->chestc->get("id21"), $this->chestc->get("meta21"), $this->chestc->get("count21"))->setCustomName($this->chestc->get("itemsname21"))->setLore([$this->chestc->get("desc21")]));
           $inventory->setItem(21, Item::get($this->chestc->get("id22"), $this->chestc->get("meta22"), $this->chestc->get("count22"))->setCustomName($this->chestc->get("itemsname22"))->setLore([$this->chestc->get("desc22")]));
           $inventory->setItem(22, Item::get($this->chestc->get("id23"), $this->chestc->get("meta23"), $this->chestc->get("count23"))->setCustomName($this->chestc->get("itemsname23"))->setLore([$this->chestc->get("desc23")]));
           $inventory->setItem(23, Item::get($this->chestc->get("id24"), $this->chestc->get("meta24"), $this->chestc->get("count24"))->setCustomName($this->chestc->get("itemsname24"))->setLore([$this->chestc->get("desc24")]));
           $inventory->setItem(24, Item::get($this->chestc->get("id25"), $this->chestc->get("meta25"), $this->chestc->get("count25"))->setCustomName($this->chestc->get("itemsname25"))->setLore([$this->chestc->get("desc25")]));
           $inventory->setItem(25, Item::get($this->chestc->get("id26"), $this->chestc->get("meta26"), $this->chestc->get("count26"))->setCustomName($this->chestc->get("itemsname26"))->setLore([$this->chestc->get("desc26")]));
           $inventory->setItem(26, Item::get($this->chestc->get("id27"), $this->chestc->get("meta27"), $this->chestc->get("count27"))->setCustomName($this->chestc->get("itemsname27"))->setLore([$this->chestc->get("desc27")]));
	       $this->chestg->send($sender);
	   }else{
		   $sender->sendMessage("§b[§eCustomGUI§b] §4chest was set to false");
	   }
	}
	
	public function listenerChest(Player $sender, Item $item){
		$hand = $sender->getInventory()->getItemInHand()->getCustomName();
        $inventory = $this->chestg->getInventory();
        if($item->getId() == $this->chestc->get("id1") && $item->getDamage() == $this->chestc->get("meta1")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands1"));
            $sender->sendMessage($this->chestc->get("msg1"));
        }
        if($item->getId() == $this->chestc->get("id2") && $item->getDamage() == $this->chestc->get("meta2")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands2"));
            $sender->sendMessage($this->chestc->get("msg2"));
        }
        if($item->getId() == $this->chestc->get("id3") && $item->getDamage() == $this->chestc->get("meta3")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands3"));
            $sender->sendMessage($this->chestc->get("msg3"));
        }
        if($item->getId() == $this->chestc->get("id4") && $item->getDamage() == $this->chestc->get("meta4")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands4"));
            $sender->sendMessage($this->chestc->get("msg4"));
        }
        if($item->getId() == $this->chestc->get("id5") && $item->getDamage() == $this->chestc->get("meta5")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands5"));
            $sender->sendMessage($this->chestc->get("msg5"));
        }
        if($item->getId() == $this->chestc->get("id6") && $item->getDamage() == $this->chestc->get("meta6")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands6"));
            $sender->sendMessage($this->chestc->get("msg6"));
        }
        if($item->getId() == $this->chestc->get("id7") && $item->getDamage() == $this->chestc->get("meta7")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands7"));
            $sender->sendMessage($this->chestc->get("msg7"));
        }
        if($item->getId() == $this->chestc->get("id8") && $item->getDamage() == $this->chestc->get("meta8")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands8"));
            $sender->sendMessage($this->chestc->get("msg8"));
        }
        if($item->getId() == $this->chestc->get("id9") && $item->getDamage() == $this->chestc->get("meta9")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands9"));
            $sender->sendMessage($this->chestc->get("msg9"));
        }
        if($item->getId() == $this->chestc->get("id10") && $item->getDamage() == $this->chestc->get("meta10")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands10"));
            $sender->sendMessage($this->chestc->get("msg10"));
        }
        if($item->getId() == $this->chestc->get("id11") && $item->getDamage() == $this->chestc->get("meta11")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands11"));
            $sender->sendMessage($this->chestc->get("msg11"));
        }
        if($item->getId() == $this->chestc->get("id12") && $item->getDamage() == $this->chestc->get("meta12")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands12"));
            $sender->sendMessage($this->chestc->get("msg12"));
        }
        if($item->getId() == $this->chestc->get("id13") && $item->getDamage() == $this->chestc->get("meta13")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands13"));
            $sender->sendMessage($this->chestc->get("msg13"));
        }
        if($item->getId() == $this->chestc->get("id14") && $item->getDamage() == $this->chestc->get("meta14")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands14"));
            $sender->sendMessage($this->chestc->get("msg14"));
        }
        if($item->getId() == $this->chestc->get("id15") && $item->getDamage() == $this->chestc->get("meta15")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands15"));
            $sender->sendMessage($this->chestc->get("msg15"));
        }
        if($item->getId() == $this->chestc->get("id16") && $item->getDamage() == $this->chestc->get("meta16")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands16"));
            $sender->sendMessage($this->chestc->get("msg16"));
        }
        if($item->getId() == $this->chestc->get("id17") && $item->getDamage() == $this->chestc->get("meta17")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands17"));
            $sender->sendMessage($this->chestc->get("msg17"));
        }
        if($item->getId() == $this->chestc->get("id18") && $item->getDamage() == $this->chestc->get("meta18")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands18"));
            $sender->sendMessage($this->chestc->get("msg18"));
        }
        if($item->getId() == $this->chestc->get("id19") && $item->getDamage() == $this->chestc->get("meta19")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands19"));
            $sender->sendMessage($this->chestc->get("msg19"));
        }
        if($item->getId() == $this->chestc->get("id20") && $item->getDamage() == $this->chestc->get("meta20")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands20"));
            $sender->sendMessage($this->chestc->get("msg20"));
        }
        if($item->getId() == $this->chestc->get("id21") && $item->getDamage() == $this->chestc->get("meta21")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands21"));
            $sender->sendMessage($this->chestc->get("msg21"));
        }
        if($item->getId() == $this->chestc->get("id22") && $item->getDamage() == $this->chestc->get("meta22")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands22"));
            $sender->sendMessage($this->chestc->get("msg22"));
        }
        if($item->getId() == $this->chestc->get("id23") && $item->getDamage() == $this->chestc->get("meta23")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands23"));
            $sender->sendMessage($this->chestc->get("msg23"));
        }
        if($item->getId() == $this->chestc->get("id24") && $item->getDamage() == $this->chestc->get("meta24")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands24"));
            $sender->sendMessage($this->chestc->get("msg24"));
        }
        if($item->getId() == $this->chestc->get("id25") && $item->getDamage() == $this->chestc->get("meta25")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands25"));
            $sender->sendMessage($this->chestc->get("msg25"));
        }
        if($item->getId() == $this->chestc->get("id26") && $item->getDamage() == $this->chestc->get("meta26")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands26"));
            $sender->sendMessage($this->chestc->get("msg26"));
        }
        if($item->getId() == $this->chestc->get("id27") && $item->getDamage() == $this->chestc->get("meta27")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->chestc->get("commands27"));
            $sender->sendMessage($this->chestc->get("msg27"));
        }
    }
}
