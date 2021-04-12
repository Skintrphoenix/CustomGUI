<?php

namespace Skintrphoenix\CustomGUI\GUI\DoubleChest;

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

class DoubleChest2
{
	
	/** @var Main */
    private $plugin;

    public function __construct(CustomGUI $plugin)
    {
        $this->plugin = $plugin;
        $this->doublechest2c = new Config($this->plugin->getDataFolder()."Double_Chest/double-chest2.yml", Config::YAML);
    }
    
    public function openDoubleChest2(Player $sender){
    	if ($this->plugin->getConfig()->get("doublechest2", true)) {
    	   $this->doublechest2g = InvMenu::create(InvMenu::TYPE_DOUBLE_CHEST);
           $this->doublechest2g->readonly();
	       $this->doublechest2g->setListener([$this, "listenerDoubleChest2"]);
           $this->doublechest2g->setName($this->doublechest2c->get("name"));
	       $inventory = $this->doublechest2g->getInventory();
	       $inventory->setItem(0, Item::get($this->doublechest2c->get("id1"), $this->doublechest2c->get("meta1"), $this->doublechest2c->get("count1"))->setCustomName($this->doublechest2c->get("itemsname1"))->setLore([$this->doublechest2c->get("desc1")]));
	       $inventory->setItem(1, Item::get($this->doublechest2c->get("id2"), $this->doublechest2c->get("meta2"), $this->doublechest2c->get("count2"))->setCustomName($this->doublechest2c->get("itemsname2"))->setLore([$this->doublechest2c->get("desc2")]));
	       $inventory->setItem(2, Item::get($this->doublechest2c->get("id3"), $this->doublechest2c->get("meta3"), $this->doublechest2c->get("count3"))->setCustomName($this->doublechest2c->get("itemsname3"))->setLore([$this->doublechest2c->get("desc3")]));
	       $inventory->setItem(3, Item::get($this->doublechest2c->get("id4"), $this->doublechest2c->get("meta4"), $this->doublechest2c->get("count4"))->setCustomName($this->doublechest2c->get("itemsname4"))->setLore([$this->doublechest2c->get("desc4")]));
	       $inventory->setItem(4, Item::get($this->doublechest2c->get("id5"), $this->doublechest2c->get("meta5"), $this->doublechest2c->get("count5"))->setCustomName($this->doublechest2c->get("itemsname5"))->setLore([$this->doublechest2c->get("desc5")]));
	       $inventory->setItem(5, Item::get($this->doublechest2c->get("id6"), $this->doublechest2c->get("meta6"), $this->doublechest2c->get("count6"))->setCustomName($this->doublechest2c->get("itemsname6"))->setLore([$this->doublechest2c->get("desc6")]));
           $inventory->setItem(6, Item::get($this->doublechest2c->get("id7"), $this->doublechest2c->get("meta7"), $this->doublechest2c->get("count7"))->setCustomName($this->doublechest2c->get("itemsname7"))->setLore([$this->doublechest2c->get("desc7")]));
           $inventory->setItem(7, Item::get($this->doublechest2c->get("id8"), $this->doublechest2c->get("meta8"), $this->doublechest2c->get("count8"))->setCustomName($this->doublechest2c->get("itemsname8"))->setLore([$this->doublechest2c->get("desc8")]));
           $inventory->setItem(8, Item::get($this->doublechest2c->get("id9"), $this->doublechest2c->get("meta9"), $this->doublechest2c->get("count9"))->setCustomName($this->doublechest2c->get("itemsname9"))->setLore([$this->doublechest2c->get("desc9")]));
           $inventory->setItem(9, Item::get($this->doublechest2c->get("id10"), $this->doublechest2c->get("meta10"), $this->doublechest2c->get("count10"))->setCustomName($this->doublechest2c->get("itemsname10"))->setLore([$this->doublechest2c->get("desc10")]));
           $inventory->setItem(10, Item::get($this->doublechest2c->get("id11"), $this->doublechest2c->get("meta11"), $this->doublechest2c->get("count11"))->setCustomName($this->doublechest2c->get("itemsname11"))->setLore([$this->doublechest2c->get("desc11")]));
           $inventory->setItem(11, Item::get($this->doublechest2c->get("id12"), $this->doublechest2c->get("meta12"), $this->doublechest2c->get("count12"))->setCustomName($this->doublechest2c->get("itemsname12"))->setLore([$this->doublechest2c->get("desc12")]));
           $inventory->setItem(12, Item::get($this->doublechest2c->get("id13"), $this->doublechest2c->get("meta13"), $this->doublechest2c->get("count13"))->setCustomName($this->doublechest2c->get("itemsname13"))->setLore([$this->doublechest2c->get("desc13")]));
           $inventory->setItem(13, Item::get($this->doublechest2c->get("id14"), $this->doublechest2c->get("meta14"), $this->doublechest2c->get("count14"))->setCustomName($this->doublechest2c->get("itemsname14"))->setLore([$this->doublechest2c->get("desc14")]));
           $inventory->setItem(14, Item::get($this->doublechest2c->get("id15"), $this->doublechest2c->get("meta15"), $this->doublechest2c->get("count15"))->setCustomName($this->doublechest2c->get("itemsname15"))->setLore([$this->doublechest2c->get("desc15")]));
           $inventory->setItem(15, Item::get($this->doublechest2c->get("id16"), $this->doublechest2c->get("meta16"), $this->doublechest2c->get("count16"))->setCustomName($this->doublechest2c->get("itemsname16"))->setLore([$this->doublechest2c->get("desc16")]));
           $inventory->setItem(16, Item::get($this->doublechest2c->get("id17"), $this->doublechest2c->get("meta17"), $this->doublechest2c->get("count17"))->setCustomName($this->doublechest2c->get("itemsname17"))->setLore([$this->doublechest2c->get("desc17")]));
           $inventory->setItem(17, Item::get($this->doublechest2c->get("id18"), $this->doublechest2c->get("meta18"), $this->doublechest2c->get("count18"))->setCustomName($this->doublechest2c->get("itemsname18"))->setLore([$this->doublechest2c->get("desc18")]));
           $inventory->setItem(18, Item::get($this->doublechest2c->get("id19"), $this->doublechest2c->get("meta19"), $this->doublechest2c->get("count19"))->setCustomName($this->doublechest2c->get("itemsname19"))->setLore([$this->doublechest2c->get("desc19")]));
           $inventory->setItem(19, Item::get($this->doublechest2c->get("id20"), $this->doublechest2c->get("meta20"), $this->doublechest2c->get("count20"))->setCustomName($this->doublechest2c->get("itemsname20"))->setLore([$this->doublechest2c->get("desc20")]));
           $inventory->setItem(20, Item::get($this->doublechest2c->get("id21"), $this->doublechest2c->get("meta21"), $this->doublechest2c->get("count21"))->setCustomName($this->doublechest2c->get("itemsname21"))->setLore([$this->doublechest2c->get("desc21")]));
           $inventory->setItem(21, Item::get($this->doublechest2c->get("id22"), $this->doublechest2c->get("meta22"), $this->doublechest2c->get("count22"))->setCustomName($this->doublechest2c->get("itemsname22"))->setLore([$this->doublechest2c->get("desc22")]));
           $inventory->setItem(22, Item::get($this->doublechest2c->get("id23"), $this->doublechest2c->get("meta23"), $this->doublechest2c->get("count23"))->setCustomName($this->doublechest2c->get("itemsname23"))->setLore([$this->doublechest2c->get("desc23")]));
           $inventory->setItem(23, Item::get($this->doublechest2c->get("id24"), $this->doublechest2c->get("meta24"), $this->doublechest2c->get("count24"))->setCustomName($this->doublechest2c->get("itemsname24"))->setLore([$this->doublechest2c->get("desc24")]));
           $inventory->setItem(24, Item::get($this->doublechest2c->get("id25"), $this->doublechest2c->get("meta25"), $this->doublechest2c->get("count25"))->setCustomName($this->doublechest2c->get("itemsname25"))->setLore([$this->doublechest2c->get("desc25")]));
           $inventory->setItem(25, Item::get($this->doublechest2c->get("id26"), $this->doublechest2c->get("meta26"), $this->doublechest2c->get("count26"))->setCustomName($this->doublechest2c->get("itemsname26"))->setLore([$this->doublechest2c->get("desc26")]));
           $inventory->setItem(26, Item::get($this->doublechest2c->get("id27"), $this->doublechest2c->get("meta27"), $this->doublechest2c->get("count27"))->setCustomName($this->doublechest2c->get("itemsname27"))->setLore([$this->doublechest2c->get("desc27")]));
           $inventory->setItem(27, Item::get($this->doublechest2c->get("id28"), $this->doublechest2c->get("meta28"), $this->doublechest2c->get("count28"))->setCustomName($this->doublechest2c->get("itemsname28"))->setLore([$this->doublechest2c->get("desc28")]));
	       $inventory->setItem(28, Item::get($this->doublechest2c->get("id29"), $this->doublechest2c->get("meta29"), $this->doublechest2c->get("count29"))->setCustomName($this->doublechest2c->get("itemsname29"))->setLore([$this->doublechest2c->get("desc29")]));
	       $inventory->setItem(29, Item::get($this->doublechest2c->get("id30"), $this->doublechest2c->get("meta30"), $this->doublechest2c->get("count30"))->setCustomName($this->doublechest2c->get("itemsname30"))->setLore([$this->doublechest2c->get("desc30")]));
	       $inventory->setItem(30, Item::get($this->doublechest2c->get("id31"), $this->doublechest2c->get("meta31"), $this->doublechest2c->get("count31"))->setCustomName($this->doublechest2c->get("itemsname31"))->setLore([$this->doublechest2c->get("desc31")]));
	       $inventory->setItem(31, Item::get($this->doublechest2c->get("id32"), $this->doublechest2c->get("meta32"), $this->doublechest2c->get("count32"))->setCustomName($this->doublechest2c->get("itemsname32"))->setLore([$this->doublechest2c->get("desc32")]));
	       $inventory->setItem(32, Item::get($this->doublechest2c->get("id33"), $this->doublechest2c->get("meta33"), $this->doublechest2c->get("count33"))->setCustomName($this->doublechest2c->get("itemsname33"))->setLore([$this->doublechest2c->get("desc33")]));
           $inventory->setItem(33, Item::get($this->doublechest2c->get("id34"), $this->doublechest2c->get("meta34"), $this->doublechest2c->get("count34"))->setCustomName($this->doublechest2c->get("itemsname34"))->setLore([$this->doublechest2c->get("desc34")]));
           $inventory->setItem(34, Item::get($this->doublechest2c->get("id35"), $this->doublechest2c->get("meta35"), $this->doublechest2c->get("count35"))->setCustomName($this->doublechest2c->get("itemsname35"))->setLore([$this->doublechest2c->get("desc35")]));
           $inventory->setItem(35, Item::get($this->doublechest2c->get("id36"), $this->doublechest2c->get("meta36"), $this->doublechest2c->get("count36"))->setCustomName($this->doublechest2c->get("itemsname36"))->setLore([$this->doublechest2c->get("desc36")]));
           $inventory->setItem(36, Item::get($this->doublechest2c->get("id37"), $this->doublechest2c->get("meta37"), $this->doublechest2c->get("count37"))->setCustomName($this->doublechest2c->get("itemsname37"))->setLore([$this->doublechest2c->get("desc37")]));
           $inventory->setItem(37, Item::get($this->doublechest2c->get("id38"), $this->doublechest2c->get("meta38"), $this->doublechest2c->get("count38"))->setCustomName($this->doublechest2c->get("itemsname38"))->setLore([$this->doublechest2c->get("desc38")]));
           $inventory->setItem(38, Item::get($this->doublechest2c->get("id39"), $this->doublechest2c->get("meta39"), $this->doublechest2c->get("count39"))->setCustomName($this->doublechest2c->get("itemsname39"))->setLore([$this->doublechest2c->get("desc39")]));
           $inventory->setItem(39, Item::get($this->doublechest2c->get("id40"), $this->doublechest2c->get("meta40"), $this->doublechest2c->get("count40"))->setCustomName($this->doublechest2c->get("itemsname40"))->setLore([$this->doublechest2c->get("desc40")]));
           $inventory->setItem(40, Item::get($this->doublechest2c->get("id41"), $this->doublechest2c->get("meta41"), $this->doublechest2c->get("count41"))->setCustomName($this->doublechest2c->get("itemsname41"))->setLore([$this->doublechest2c->get("desc41")]));
           $inventory->setItem(41, Item::get($this->doublechest2c->get("id42"), $this->doublechest2c->get("meta42"), $this->doublechest2c->get("count42"))->setCustomName($this->doublechest2c->get("itemsname42"))->setLore([$this->doublechest2c->get("desc42")]));
           $inventory->setItem(42, Item::get($this->doublechest2c->get("id43"), $this->doublechest2c->get("meta43"), $this->doublechest2c->get("count43"))->setCustomName($this->doublechest2c->get("itemsname43"))->setLore([$this->doublechest2c->get("desc43")]));
           $inventory->setItem(43, Item::get($this->doublechest2c->get("id44"), $this->doublechest2c->get("meta44"), $this->doublechest2c->get("count44"))->setCustomName($this->doublechest2c->get("itemsname44"))->setLore([$this->doublechest2c->get("desc44")]));
           $inventory->setItem(44, Item::get($this->doublechest2c->get("id45"), $this->doublechest2c->get("meta45"), $this->doublechest2c->get("count45"))->setCustomName($this->doublechest2c->get("itemsname45"))->setLore([$this->doublechest2c->get("desc45")]));
           $inventory->setItem(45, Item::get($this->doublechest2c->get("id46"), $this->doublechest2c->get("meta46"), $this->doublechest2c->get("count46"))->setCustomName($this->doublechest2c->get("itemsname46"))->setLore([$this->doublechest2c->get("desc46")]));
           $inventory->setItem(46, Item::get($this->doublechest2c->get("id47"), $this->doublechest2c->get("meta47"), $this->doublechest2c->get("count47"))->setCustomName($this->doublechest2c->get("itemsname47"))->setLore([$this->doublechest2c->get("desc47")]));
           $inventory->setItem(47, Item::get($this->doublechest2c->get("id48"), $this->doublechest2c->get("meta48"), $this->doublechest2c->get("count48"))->setCustomName($this->doublechest2c->get("itemsname48"))->setLore([$this->doublechest2c->get("desc48")]));
           $inventory->setItem(48, Item::get($this->doublechest2c->get("id49"), $this->doublechest2c->get("meta49"), $this->doublechest2c->get("count49"))->setCustomName($this->doublechest2c->get("itemsname49"))->setLore([$this->doublechest2c->get("desc49")]));
           $inventory->setItem(49, Item::get($this->doublechest2c->get("id50"), $this->doublechest2c->get("meta50"), $this->doublechest2c->get("count50"))->setCustomName($this->doublechest2c->get("itemsname50"))->setLore([$this->doublechest2c->get("desc50")]));
           $inventory->setItem(50, Item::get($this->doublechest2c->get("id51"), $this->doublechest2c->get("meta51"), $this->doublechest2c->get("count51"))->setCustomName($this->doublechest2c->get("itemsname51"))->setLore([$this->doublechest2c->get("desc51")]));
           $inventory->setItem(51, Item::get($this->doublechest2c->get("id52"), $this->doublechest2c->get("meta52"), $this->doublechest2c->get("count52"))->setCustomName($this->doublechest2c->get("itemsname52"))->setLore([$this->doublechest2c->get("desc52")]));
           $inventory->setItem(52, Item::get($this->doublechest2c->get("id53"), $this->doublechest2c->get("meta53"), $this->doublechest2c->get("count53"))->setCustomName($this->doublechest2c->get("itemsname53"))->setLore([$this->doublechest2c->get("desc53")]));
           $inventory->setItem(53, Item::get($this->doublechest2c->get("id54"), $this->doublechest2c->get("meta54"), $this->doublechest2c->get("count54"))->setCustomName($this->doublechest2c->get("itemsname54"))->setLore([$this->doublechest2c->get("desc54")]));
	       $this->doublechest2g->send($sender);
	    }else{
		    $sender->sendMessage("§b[§eCustomGUI§b] §4Double Chest 2 was set to false");
		}
    }
    
    public function listenerDoubleChest2(Player $sender, Item $item){
		$hand = $sender->getInventory()->getItemInHand()->getCustomName();
        $inventory = $this->doublechest2g->getInventory();
        if($item->getId() == $this->doublechest2c->get("id1") && $item->getDamage() == $this->doublechest2c->get("meta1")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands1"));
            $sender->sendMessage($this->doublechest2c->get("msg1"));
        }
        if($item->getId() == $this->doublechest2c->get("id2") && $item->getDamage() == $this->doublechest2c->get("meta2")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands2"));
            $sender->sendMessage($this->doublechest2c->get("msg2"));
        }
        if($item->getId() == $this->doublechest2c->get("id3") && $item->getDamage() == $this->doublechest2c->get("meta3")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands3"));
            $sender->sendMessage($this->doublechest2c->get("msg3"));
        }
        if($item->getId() == $this->doublechest2c->get("id4") && $item->getDamage() == $this->doublechest2c->get("meta4")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands4"));
            $sender->sendMessage($this->doublechest2c->get("msg4"));
        }
        if($item->getId() == $this->doublechest2c->get("id5") && $item->getDamage() == $this->doublechest2c->get("meta5")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands5"));
            $sender->sendMessage($this->doublechest2c->get("msg5"));
        }
        if($item->getId() == $this->doublechest2c->get("id6") && $item->getDamage() == $this->doublechest2c->get("meta6")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands6"));
            $sender->sendMessage($this->doublechest2c->get("msg6"));
        }
        if($item->getId() == $this->doublechest2c->get("id7") && $item->getDamage() == $this->doublechest2c->get("meta7")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands7"));
            $sender->sendMessage($this->doublechest2c->get("msg7"));
        }
        if($item->getId() == $this->doublechest2c->get("id8") && $item->getDamage() == $this->doublechest2c->get("meta8")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands8"));
            $sender->sendMessage($this->doublechest2c->get("msg8"));
        }
        if($item->getId() == $this->doublechest2c->get("id9") && $item->getDamage() == $this->doublechest2c->get("meta9")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands9"));
            $sender->sendMessage($this->doublechest2c->get("msg9"));
        }
        if($item->getId() == $this->doublechest2c->get("id10") && $item->getDamage() == $this->doublechest2c->get("meta10")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands10"));
            $sender->sendMessage($this->doublechest2c->get("msg10"));
        }
        if($item->getId() == $this->doublechest2c->get("id11") && $item->getDamage() == $this->doublechest2c->get("meta11")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands11"));
            $sender->sendMessage($this->doublechest2c->get("msg11"));
        }
        if($item->getId() == $this->doublechest2c->get("id12") && $item->getDamage() == $this->doublechest2c->get("meta12")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands12"));
            $sender->sendMessage($this->doublechest2c->get("msg12"));
        }
        if($item->getId() == $this->doublechest2c->get("id13") && $item->getDamage() == $this->doublechest2c->get("meta13")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands13"));
            $sender->sendMessage($this->doublechest2c->get("msg13"));
        }
        if($item->getId() == $this->doublechest2c->get("id14") && $item->getDamage() == $this->doublechest2c->get("meta14")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands14"));
            $sender->sendMessage($this->doublechest2c->get("msg14"));
        }
        if($item->getId() == $this->doublechest2c->get("id15") && $item->getDamage() == $this->doublechest2c->get("meta15")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands15"));
            $sender->sendMessage($this->doublechest2c->get("msg15"));
        }
        if($item->getId() == $this->doublechest2c->get("id16") && $item->getDamage() == $this->doublechest2c->get("meta16")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands16"));
            $sender->sendMessage($this->doublechest2c->get("msg16"));
        }
        if($item->getId() == $this->doublechest2c->get("id17") && $item->getDamage() == $this->doublechest2c->get("meta17")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands17"));
            $sender->sendMessage($this->doublechest2c->get("msg17"));
        }
        if($item->getId() == $this->doublechest2c->get("id18") && $item->getDamage() == $this->doublechest2c->get("meta18")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands18"));
            $sender->sendMessage($this->doublechest2c->get("msg18"));
        }
        if($item->getId() == $this->doublechest2c->get("id19") && $item->getDamage() == $this->doublechest2c->get("meta19")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands19"));
            $sender->sendMessage($this->doublechest2c->get("msg19"));
        }
        if($item->getId() == $this->doublechest2c->get("id20") && $item->getDamage() == $this->doublechest2c->get("meta20")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands20"));
            $sender->sendMessage($this->doublechest2c->get("msg20"));
        }
        if($item->getId() == $this->doublechest2c->get("id21") && $item->getDamage() == $this->doublechest2c->get("meta21")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands21"));
            $sender->sendMessage($this->doublechest2c->get("msg21"));
        }
        if($item->getId() == $this->doublechest2c->get("id22") && $item->getDamage() == $this->doublechest2c->get("meta22")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands22"));
            $sender->sendMessage($this->doublechest2c->get("msg22"));
        }
        if($item->getId() == $this->doublechest2c->get("id23") && $item->getDamage() == $this->doublechest2c->get("meta23")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands23"));
            $sender->sendMessage($this->doublechest2c->get("msg23"));
        }
        if($item->getId() == $this->doublechest2c->get("id24") && $item->getDamage() == $this->doublechest2c->get("meta24")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands24"));
            $sender->sendMessage($this->doublechest2c->get("msg24"));
        }
        if($item->getId() == $this->doublechest2c->get("id25") && $item->getDamage() == $this->doublechest2c->get("meta25")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands25"));
            $sender->sendMessage($this->doublechest2c->get("msg25"));
        }
        if($item->getId() == $this->doublechest2c->get("id26") && $item->getDamage() == $this->doublechest2c->get("meta26")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands26"));
            $sender->sendMessage($this->doublechest2c->get("msg26"));
        }
        if($item->getId() == $this->doublechest2c->get("id27") && $item->getDamage() == $this->doublechest2c->get("meta27")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands27"));
            $sender->sendMessage($this->doublechest2c->get("msg27"));
        }
        if($item->getId() == $this->doublechest2c->get("id28") && $item->getDamage() == $this->doublechest2c->get("meta28")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands28"));
            $sender->sendMessage($this->doublechest2c->get("msg28"));
        }
        if($item->getId() == $this->doublechest2c->get("id29") && $item->getDamage() == $this->doublechest2c->get("meta29")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands29"));
            $sender->sendMessage($this->doublechest2c->get("msg29"));
        }
        if($item->getId() == $this->doublechest2c->get("id30") && $item->getDamage() == $this->doublechest2c->get("meta30")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands30"));
            $sender->sendMessage($this->doublechest2c->get("msg30"));
        }
        if($item->getId() == $this->doublechest2c->get("id31") && $item->getDamage() == $this->doublechest2c->get("meta31")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands31"));
            $sender->sendMessage($this->doublechest2c->get("msg31"));
        }
        if($item->getId() == $this->doublechest2c->get("id32") && $item->getDamage() == $this->doublechest2c->get("meta32")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands32"));
            $sender->sendMessage($this->doublechest2c->get("msg32"));
        }
        if($item->getId() == $this->doublechest2c->get("id33") && $item->getDamage() == $this->doublechest2c->get("meta33")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands33"));
            $sender->sendMessage($this->doublechest2c->get("msg33"));
        }
        if($item->getId() == $this->doublechest2c->get("id34") && $item->getDamage() == $this->doublechest2c->get("meta34")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands34"));
            $sender->sendMessage($this->doublechest2c->get("msg34"));
        }
        if($item->getId() == $this->doublechest2c->get("id35") && $item->getDamage() == $this->doublechest2c->get("meta35")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands35"));
            $sender->sendMessage($this->doublechest2c->get("msg35"));
        }
        if($item->getId() == $this->doublechest2c->get("id36") && $item->getDamage() == $this->doublechest2c->get("meta36")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands36"));
            $sender->sendMessage($this->doublechest2c->get("msg36"));
        }
        if($item->getId() == $this->doublechest2c->get("id37") && $item->getDamage() == $this->doublechest2c->get("meta37")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands37"));
            $sender->sendMessage($this->doublechest2c->get("msg37"));
        }
        if($item->getId() == $this->doublechest2c->get("id38") && $item->getDamage() == $this->doublechest2c->get("meta38")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands38"));
            $sender->sendMessage($this->doublechest2c->get("msg38"));
        }
        if($item->getId() == $this->doublechest2c->get("id39") && $item->getDamage() == $this->doublechest2c->get("meta39")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands39"));
            $sender->sendMessage($this->doublechest2c->get("msg39"));
        }
        if($item->getId() == $this->doublechest2c->get("id40") && $item->getDamage() == $this->doublechest2c->get("meta40")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands40"));
            $sender->sendMessage($this->doublechest2c->get("msg40"));
        }
        if($item->getId() == $this->doublechest2c->get("id41") && $item->getDamage() == $this->doublechest2c->get("meta41")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands41"));
            $sender->sendMessage($this->doublechest2c->get("msg41"));
        }
        if($item->getId() == $this->doublechest2c->get("id42") && $item->getDamage() == $this->doublechest2c->get("meta42")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands42"));
            $sender->sendMessage($this->doublechest2c->get("msg42"));
        }
        if($item->getId() == $this->doublechest2c->get("id43") && $item->getDamage() == $this->doublechest2c->get("meta43")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands43"));
            $sender->sendMessage($this->doublechest2c->get("msg43"));
        }
        if($item->getId() == $this->doublechest2c->get("id44") && $item->getDamage() == $this->doublechest2c->get("meta44")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands44"));
            $sender->sendMessage($this->doublechest2c->get("msg44"));
        }
        if($item->getId() == $this->doublechest2c->get("id45") && $item->getDamage() == $this->doublechest2c->get("meta45")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands45"));
            $sender->sendMessage($this->doublechest2c->get("msg45"));
        }
        if($item->getId() == $this->doublechest2c->get("id46") && $item->getDamage() == $this->doublechest2c->get("meta46")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands46"));
            $sender->sendMessage($this->doublechest2c->get("msg46"));
        }
        if($item->getId() == $this->doublechest2c->get("id47") && $item->getDamage() == $this->doublechest2c->get("meta47")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands47"));
            $sender->sendMessage($this->doublechest2c->get("msg47"));
        }
        if($item->getId() == $this->doublechest2c->get("id48") && $item->getDamage() == $this->doublechest2c->get("meta48")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands48"));
            $sender->sendMessage($this->doublechest2c->get("msg48"));
        }
        if($item->getId() == $this->doublechest2c->get("id49") && $item->getDamage() == $this->doublechest2c->get("meta49")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands49"));
            $sender->sendMessage($this->doublechest2c->get("msg49"));
        }
        if($item->getId() == $this->doublechest2c->get("id50") && $item->getDamage() == $this->doublechest2c->get("meta50")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands50"));
            $sender->sendMessage($this->doublechest2c->get("msg50"));
        }
        if($item->getId() == $this->doublechest2c->get("id51") && $item->getDamage() == $this->doublechest2c->get("meta51")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands51"));
            $sender->sendMessage($this->doublechest2c->get("msg51"));
        }
        if($item->getId() == $this->doublechest2c->get("id52") && $item->getDamage() == $this->doublechest2c->get("meta52")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands52"));
            $sender->sendMessage($this->doublechest2c->get("msg52"));
        }
        if($item->getId() == $this->doublechest2c->get("id53") && $item->getDamage() == $this->doublechest2c->get("meta53")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands53"));
            $sender->sendMessage($this->doublechest2c->get("msg53"));
        }
        if($item->getId() == $this->doublechest2c->get("id54") && $item->getDamage() == $this->doublechest2c->get("meta54")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechest2c->get("commands54"));
            $sender->sendMessage($this->doublechest2c->get("msg54"));
        }
    }
}
