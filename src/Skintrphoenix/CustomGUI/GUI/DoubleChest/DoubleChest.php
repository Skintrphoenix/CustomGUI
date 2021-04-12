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

class DoubleChest
{
	
	/** @var Main */
    private $plugin;

    public function __construct(CustomGUI $plugin)
    {
        $this->plugin = $plugin;
        $this->doublechestc = new Config($this->plugin->getDataFolder()."Double_Chest/double-chest.yml", Config::YAML);
    }
    
    public function openDoubleChest(Player $sender){
    	if ($this->plugin->getConfig()->get("doublechest", true)) {
    	   $this->doublechestg = InvMenu::create(InvMenu::TYPE_DOUBLE_CHEST);
           $this->doublechestg->readonly();
	       $this->doublechestg->setListener([$this, "listenerDoubleChest"]);
           $this->doublechestg->setName($this->doublechestc->get("name"));
	       $inventory = $this->doublechestg->getInventory();
	       $inventory->setItem(0, Item::get($this->doublechestc->get("id1"), $this->doublechestc->get("meta1"), $this->doublechestc->get("count1"))->setCustomName($this->doublechestc->get("itemsname1"))->setLore([$this->doublechestc->get("desc1")]));
	       $inventory->setItem(1, Item::get($this->doublechestc->get("id2"), $this->doublechestc->get("meta2"), $this->doublechestc->get("count2"))->setCustomName($this->doublechestc->get("itemsname2"))->setLore([$this->doublechestc->get("desc2")]));
	       $inventory->setItem(2, Item::get($this->doublechestc->get("id3"), $this->doublechestc->get("meta3"), $this->doublechestc->get("count3"))->setCustomName($this->doublechestc->get("itemsname3"))->setLore([$this->doublechestc->get("desc3")]));
	       $inventory->setItem(3, Item::get($this->doublechestc->get("id4"), $this->doublechestc->get("meta4"), $this->doublechestc->get("count4"))->setCustomName($this->doublechestc->get("itemsname4"))->setLore([$this->doublechestc->get("desc4")]));
	       $inventory->setItem(4, Item::get($this->doublechestc->get("id5"), $this->doublechestc->get("meta5"), $this->doublechestc->get("count5"))->setCustomName($this->doublechestc->get("itemsname5"))->setLore([$this->doublechestc->get("desc5")]));
	       $inventory->setItem(5, Item::get($this->doublechestc->get("id6"), $this->doublechestc->get("meta6"), $this->doublechestc->get("count6"))->setCustomName($this->doublechestc->get("itemsname6"))->setLore([$this->doublechestc->get("desc6")]));
           $inventory->setItem(6, Item::get($this->doublechestc->get("id7"), $this->doublechestc->get("meta7"), $this->doublechestc->get("count7"))->setCustomName($this->doublechestc->get("itemsname7"))->setLore([$this->doublechestc->get("desc7")]));
           $inventory->setItem(7, Item::get($this->doublechestc->get("id8"), $this->doublechestc->get("meta8"), $this->doublechestc->get("count8"))->setCustomName($this->doublechestc->get("itemsname8"))->setLore([$this->doublechestc->get("desc8")]));
           $inventory->setItem(8, Item::get($this->doublechestc->get("id9"), $this->doublechestc->get("meta9"), $this->doublechestc->get("count9"))->setCustomName($this->doublechestc->get("itemsname9"))->setLore([$this->doublechestc->get("desc9")]));
           $inventory->setItem(9, Item::get($this->doublechestc->get("id10"), $this->doublechestc->get("meta10"), $this->doublechestc->get("count10"))->setCustomName($this->doublechestc->get("itemsname10"))->setLore([$this->doublechestc->get("desc10")]));
           $inventory->setItem(10, Item::get($this->doublechestc->get("id11"), $this->doublechestc->get("meta11"), $this->doublechestc->get("count11"))->setCustomName($this->doublechestc->get("itemsname11"))->setLore([$this->doublechestc->get("desc11")]));
           $inventory->setItem(11, Item::get($this->doublechestc->get("id12"), $this->doublechestc->get("meta12"), $this->doublechestc->get("count12"))->setCustomName($this->doublechestc->get("itemsname12"))->setLore([$this->doublechestc->get("desc12")]));
           $inventory->setItem(12, Item::get($this->doublechestc->get("id13"), $this->doublechestc->get("meta13"), $this->doublechestc->get("count13"))->setCustomName($this->doublechestc->get("itemsname13"))->setLore([$this->doublechestc->get("desc13")]));
           $inventory->setItem(13, Item::get($this->doublechestc->get("id14"), $this->doublechestc->get("meta14"), $this->doublechestc->get("count14"))->setCustomName($this->doublechestc->get("itemsname14"))->setLore([$this->doublechestc->get("desc14")]));
           $inventory->setItem(14, Item::get($this->doublechestc->get("id15"), $this->doublechestc->get("meta15"), $this->doublechestc->get("count15"))->setCustomName($this->doublechestc->get("itemsname15"))->setLore([$this->doublechestc->get("desc15")]));
           $inventory->setItem(15, Item::get($this->doublechestc->get("id16"), $this->doublechestc->get("meta16"), $this->doublechestc->get("count16"))->setCustomName($this->doublechestc->get("itemsname16"))->setLore([$this->doublechestc->get("desc16")]));
           $inventory->setItem(16, Item::get($this->doublechestc->get("id17"), $this->doublechestc->get("meta17"), $this->doublechestc->get("count17"))->setCustomName($this->doublechestc->get("itemsname17"))->setLore([$this->doublechestc->get("desc17")]));
           $inventory->setItem(17, Item::get($this->doublechestc->get("id18"), $this->doublechestc->get("meta18"), $this->doublechestc->get("count18"))->setCustomName($this->doublechestc->get("itemsname18"))->setLore([$this->doublechestc->get("desc18")]));
           $inventory->setItem(18, Item::get($this->doublechestc->get("id19"), $this->doublechestc->get("meta19"), $this->doublechestc->get("count19"))->setCustomName($this->doublechestc->get("itemsname19"))->setLore([$this->doublechestc->get("desc19")]));
           $inventory->setItem(19, Item::get($this->doublechestc->get("id20"), $this->doublechestc->get("meta20"), $this->doublechestc->get("count20"))->setCustomName($this->doublechestc->get("itemsname20"))->setLore([$this->doublechestc->get("desc20")]));
           $inventory->setItem(20, Item::get($this->doublechestc->get("id21"), $this->doublechestc->get("meta21"), $this->doublechestc->get("count21"))->setCustomName($this->doublechestc->get("itemsname21"))->setLore([$this->doublechestc->get("desc21")]));
           $inventory->setItem(21, Item::get($this->doublechestc->get("id22"), $this->doublechestc->get("meta22"), $this->doublechestc->get("count22"))->setCustomName($this->doublechestc->get("itemsname22"))->setLore([$this->doublechestc->get("desc22")]));
           $inventory->setItem(22, Item::get($this->doublechestc->get("id23"), $this->doublechestc->get("meta23"), $this->doublechestc->get("count23"))->setCustomName($this->doublechestc->get("itemsname23"))->setLore([$this->doublechestc->get("desc23")]));
           $inventory->setItem(23, Item::get($this->doublechestc->get("id24"), $this->doublechestc->get("meta24"), $this->doublechestc->get("count24"))->setCustomName($this->doublechestc->get("itemsname24"))->setLore([$this->doublechestc->get("desc24")]));
           $inventory->setItem(24, Item::get($this->doublechestc->get("id25"), $this->doublechestc->get("meta25"), $this->doublechestc->get("count25"))->setCustomName($this->doublechestc->get("itemsname25"))->setLore([$this->doublechestc->get("desc25")]));
           $inventory->setItem(25, Item::get($this->doublechestc->get("id26"), $this->doublechestc->get("meta26"), $this->doublechestc->get("count26"))->setCustomName($this->doublechestc->get("itemsname26"))->setLore([$this->doublechestc->get("desc26")]));
           $inventory->setItem(26, Item::get($this->doublechestc->get("id27"), $this->doublechestc->get("meta27"), $this->doublechestc->get("count27"))->setCustomName($this->doublechestc->get("itemsname27"))->setLore([$this->doublechestc->get("desc27")]));
           $inventory->setItem(27, Item::get($this->doublechestc->get("id28"), $this->doublechestc->get("meta28"), $this->doublechestc->get("count28"))->setCustomName($this->doublechestc->get("itemsname28"))->setLore([$this->doublechestc->get("desc28")]));
	       $inventory->setItem(28, Item::get($this->doublechestc->get("id29"), $this->doublechestc->get("meta29"), $this->doublechestc->get("count29"))->setCustomName($this->doublechestc->get("itemsname29"))->setLore([$this->doublechestc->get("desc29")]));
	       $inventory->setItem(29, Item::get($this->doublechestc->get("id30"), $this->doublechestc->get("meta30"), $this->doublechestc->get("count30"))->setCustomName($this->doublechestc->get("itemsname30"))->setLore([$this->doublechestc->get("desc30")]));
	       $inventory->setItem(30, Item::get($this->doublechestc->get("id31"), $this->doublechestc->get("meta31"), $this->doublechestc->get("count31"))->setCustomName($this->doublechestc->get("itemsname31"))->setLore([$this->doublechestc->get("desc31")]));
	       $inventory->setItem(31, Item::get($this->doublechestc->get("id32"), $this->doublechestc->get("meta32"), $this->doublechestc->get("count32"))->setCustomName($this->doublechestc->get("itemsname32"))->setLore([$this->doublechestc->get("desc32")]));
	       $inventory->setItem(32, Item::get($this->doublechestc->get("id33"), $this->doublechestc->get("meta33"), $this->doublechestc->get("count33"))->setCustomName($this->doublechestc->get("itemsname33"))->setLore([$this->doublechestc->get("desc33")]));
           $inventory->setItem(33, Item::get($this->doublechestc->get("id34"), $this->doublechestc->get("meta34"), $this->doublechestc->get("count34"))->setCustomName($this->doublechestc->get("itemsname34"))->setLore([$this->doublechestc->get("desc34")]));
           $inventory->setItem(34, Item::get($this->doublechestc->get("id35"), $this->doublechestc->get("meta35"), $this->doublechestc->get("count35"))->setCustomName($this->doublechestc->get("itemsname35"))->setLore([$this->doublechestc->get("desc35")]));
           $inventory->setItem(35, Item::get($this->doublechestc->get("id36"), $this->doublechestc->get("meta36"), $this->doublechestc->get("count36"))->setCustomName($this->doublechestc->get("itemsname36"))->setLore([$this->doublechestc->get("desc36")]));
           $inventory->setItem(36, Item::get($this->doublechestc->get("id37"), $this->doublechestc->get("meta37"), $this->doublechestc->get("count37"))->setCustomName($this->doublechestc->get("itemsname37"))->setLore([$this->doublechestc->get("desc37")]));
           $inventory->setItem(37, Item::get($this->doublechestc->get("id38"), $this->doublechestc->get("meta38"), $this->doublechestc->get("count38"))->setCustomName($this->doublechestc->get("itemsname38"))->setLore([$this->doublechestc->get("desc38")]));
           $inventory->setItem(38, Item::get($this->doublechestc->get("id39"), $this->doublechestc->get("meta39"), $this->doublechestc->get("count39"))->setCustomName($this->doublechestc->get("itemsname39"))->setLore([$this->doublechestc->get("desc39")]));
           $inventory->setItem(39, Item::get($this->doublechestc->get("id40"), $this->doublechestc->get("meta40"), $this->doublechestc->get("count40"))->setCustomName($this->doublechestc->get("itemsname40"))->setLore([$this->doublechestc->get("desc40")]));
           $inventory->setItem(40, Item::get($this->doublechestc->get("id41"), $this->doublechestc->get("meta41"), $this->doublechestc->get("count41"))->setCustomName($this->doublechestc->get("itemsname41"))->setLore([$this->doublechestc->get("desc41")]));
           $inventory->setItem(41, Item::get($this->doublechestc->get("id42"), $this->doublechestc->get("meta42"), $this->doublechestc->get("count42"))->setCustomName($this->doublechestc->get("itemsname42"))->setLore([$this->doublechestc->get("desc42")]));
           $inventory->setItem(42, Item::get($this->doublechestc->get("id43"), $this->doublechestc->get("meta43"), $this->doublechestc->get("count43"))->setCustomName($this->doublechestc->get("itemsname43"))->setLore([$this->doublechestc->get("desc43")]));
           $inventory->setItem(43, Item::get($this->doublechestc->get("id44"), $this->doublechestc->get("meta44"), $this->doublechestc->get("count44"))->setCustomName($this->doublechestc->get("itemsname44"))->setLore([$this->doublechestc->get("desc44")]));
           $inventory->setItem(44, Item::get($this->doublechestc->get("id45"), $this->doublechestc->get("meta45"), $this->doublechestc->get("count45"))->setCustomName($this->doublechestc->get("itemsname45"))->setLore([$this->doublechestc->get("desc45")]));
           $inventory->setItem(45, Item::get($this->doublechestc->get("id46"), $this->doublechestc->get("meta46"), $this->doublechestc->get("count46"))->setCustomName($this->doublechestc->get("itemsname46"))->setLore([$this->doublechestc->get("desc46")]));
           $inventory->setItem(46, Item::get($this->doublechestc->get("id47"), $this->doublechestc->get("meta47"), $this->doublechestc->get("count47"))->setCustomName($this->doublechestc->get("itemsname47"))->setLore([$this->doublechestc->get("desc47")]));
           $inventory->setItem(47, Item::get($this->doublechestc->get("id48"), $this->doublechestc->get("meta48"), $this->doublechestc->get("count48"))->setCustomName($this->doublechestc->get("itemsname48"))->setLore([$this->doublechestc->get("desc48")]));
           $inventory->setItem(48, Item::get($this->doublechestc->get("id49"), $this->doublechestc->get("meta49"), $this->doublechestc->get("count49"))->setCustomName($this->doublechestc->get("itemsname49"))->setLore([$this->doublechestc->get("desc49")]));
           $inventory->setItem(49, Item::get($this->doublechestc->get("id50"), $this->doublechestc->get("meta50"), $this->doublechestc->get("count50"))->setCustomName($this->doublechestc->get("itemsname50"))->setLore([$this->doublechestc->get("desc50")]));
           $inventory->setItem(50, Item::get($this->doublechestc->get("id51"), $this->doublechestc->get("meta51"), $this->doublechestc->get("count51"))->setCustomName($this->doublechestc->get("itemsname51"))->setLore([$this->doublechestc->get("desc51")]));
           $inventory->setItem(51, Item::get($this->doublechestc->get("id52"), $this->doublechestc->get("meta52"), $this->doublechestc->get("count52"))->setCustomName($this->doublechestc->get("itemsname52"))->setLore([$this->doublechestc->get("desc52")]));
           $inventory->setItem(52, Item::get($this->doublechestc->get("id53"), $this->doublechestc->get("meta53"), $this->doublechestc->get("count53"))->setCustomName($this->doublechestc->get("itemsname53"))->setLore([$this->doublechestc->get("desc53")]));
           $inventory->setItem(53, Item::get($this->doublechestc->get("id54"), $this->doublechestc->get("meta54"), $this->doublechestc->get("count54"))->setCustomName($this->doublechestc->get("itemsname54"))->setLore([$this->doublechestc->get("desc54")]));
	       $this->doublechestg->send($sender);
	    }else{
		    $sender->sendMessage("§b[§eCustomGUI§b] §4Double Chest was set to false");
		}
    }
    
    public function listenerDoubleChest(Player $sender, Item $item){
		$hand = $sender->getInventory()->getItemInHand()->getCustomName();
        $inventory = $this->doublechestg->getInventory();
        if($item->getId() == $this->doublechestc->get("id1") && $item->getDamage() == $this->doublechestc->get("meta1")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands1"));
            $sender->sendMessage($this->doublechestc->get("msg1"));
        }
        if($item->getId() == $this->doublechestc->get("id2") && $item->getDamage() == $this->doublechestc->get("meta2")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands2"));
            $sender->sendMessage($this->doublechestc->get("msg2"));
        }
        if($item->getId() == $this->doublechestc->get("id3") && $item->getDamage() == $this->doublechestc->get("meta3")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands3"));
            $sender->sendMessage($this->doublechestc->get("msg3"));
        }
        if($item->getId() == $this->doublechestc->get("id4") && $item->getDamage() == $this->doublechestc->get("meta4")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands4"));
            $sender->sendMessage($this->doublechestc->get("msg4"));
        }
        if($item->getId() == $this->doublechestc->get("id5") && $item->getDamage() == $this->doublechestc->get("meta5")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands5"));
            $sender->sendMessage($this->doublechestc->get("msg5"));
        }
        if($item->getId() == $this->doublechestc->get("id6") && $item->getDamage() == $this->doublechestc->get("meta6")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands6"));
            $sender->sendMessage($this->doublechestc->get("msg6"));
        }
        if($item->getId() == $this->doublechestc->get("id7") && $item->getDamage() == $this->doublechestc->get("meta7")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands7"));
            $sender->sendMessage($this->doublechestc->get("msg7"));
        }
        if($item->getId() == $this->doublechestc->get("id8") && $item->getDamage() == $this->doublechestc->get("meta8")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands8"));
            $sender->sendMessage($this->doublechestc->get("msg8"));
        }
        if($item->getId() == $this->doublechestc->get("id9") && $item->getDamage() == $this->doublechestc->get("meta9")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands9"));
            $sender->sendMessage($this->doublechestc->get("msg9"));
        }
        if($item->getId() == $this->doublechestc->get("id10") && $item->getDamage() == $this->doublechestc->get("meta10")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands10"));
            $sender->sendMessage($this->doublechestc->get("msg10"));
        }
        if($item->getId() == $this->doublechestc->get("id11") && $item->getDamage() == $this->doublechestc->get("meta11")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands11"));
            $sender->sendMessage($this->doublechestc->get("msg11"));
        }
        if($item->getId() == $this->doublechestc->get("id12") && $item->getDamage() == $this->doublechestc->get("meta12")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands12"));
            $sender->sendMessage($this->doublechestc->get("msg12"));
        }
        if($item->getId() == $this->doublechestc->get("id13") && $item->getDamage() == $this->doublechestc->get("meta13")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands13"));
            $sender->sendMessage($this->doublechestc->get("msg13"));
        }
        if($item->getId() == $this->doublechestc->get("id14") && $item->getDamage() == $this->doublechestc->get("meta14")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands14"));
            $sender->sendMessage($this->doublechestc->get("msg14"));
        }
        if($item->getId() == $this->doublechestc->get("id15") && $item->getDamage() == $this->doublechestc->get("meta15")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands15"));
            $sender->sendMessage($this->doublechestc->get("msg15"));
        }
        if($item->getId() == $this->doublechestc->get("id16") && $item->getDamage() == $this->doublechestc->get("meta16")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands16"));
            $sender->sendMessage($this->doublechestc->get("msg16"));
        }
        if($item->getId() == $this->doublechestc->get("id17") && $item->getDamage() == $this->doublechestc->get("meta17")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands17"));
            $sender->sendMessage($this->doublechestc->get("msg17"));
        }
        if($item->getId() == $this->doublechestc->get("id18") && $item->getDamage() == $this->doublechestc->get("meta18")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands18"));
            $sender->sendMessage($this->doublechestc->get("msg18"));
        }
        if($item->getId() == $this->doublechestc->get("id19") && $item->getDamage() == $this->doublechestc->get("meta19")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands19"));
            $sender->sendMessage($this->doublechestc->get("msg19"));
        }
        if($item->getId() == $this->doublechestc->get("id20") && $item->getDamage() == $this->doublechestc->get("meta20")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands20"));
            $sender->sendMessage($this->doublechestc->get("msg20"));
        }
        if($item->getId() == $this->doublechestc->get("id21") && $item->getDamage() == $this->doublechestc->get("meta21")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands21"));
            $sender->sendMessage($this->doublechestc->get("msg21"));
        }
        if($item->getId() == $this->doublechestc->get("id22") && $item->getDamage() == $this->doublechestc->get("meta22")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands22"));
            $sender->sendMessage($this->doublechestc->get("msg22"));
        }
        if($item->getId() == $this->doublechestc->get("id23") && $item->getDamage() == $this->doublechestc->get("meta23")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands23"));
            $sender->sendMessage($this->doublechestc->get("msg23"));
        }
        if($item->getId() == $this->doublechestc->get("id24") && $item->getDamage() == $this->doublechestc->get("meta24")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands24"));
            $sender->sendMessage($this->doublechestc->get("msg24"));
        }
        if($item->getId() == $this->doublechestc->get("id25") && $item->getDamage() == $this->doublechestc->get("meta25")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands25"));
            $sender->sendMessage($this->doublechestc->get("msg25"));
        }
        if($item->getId() == $this->doublechestc->get("id26") && $item->getDamage() == $this->doublechestc->get("meta26")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands26"));
            $sender->sendMessage($this->doublechestc->get("msg26"));
        }
        if($item->getId() == $this->doublechestc->get("id27") && $item->getDamage() == $this->doublechestc->get("meta27")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands27"));
            $sender->sendMessage($this->doublechestc->get("msg27"));
        }
        if($item->getId() == $this->doublechestc->get("id28") && $item->getDamage() == $this->doublechestc->get("meta28")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands28"));
            $sender->sendMessage($this->doublechestc->get("msg28"));
        }
        if($item->getId() == $this->doublechestc->get("id29") && $item->getDamage() == $this->doublechestc->get("meta29")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands29"));
            $sender->sendMessage($this->doublechestc->get("msg29"));
        }
        if($item->getId() == $this->doublechestc->get("id30") && $item->getDamage() == $this->doublechestc->get("meta30")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands30"));
            $sender->sendMessage($this->doublechestc->get("msg30"));
        }
        if($item->getId() == $this->doublechestc->get("id31") && $item->getDamage() == $this->doublechestc->get("meta31")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands31"));
            $sender->sendMessage($this->doublechestc->get("msg31"));
        }
        if($item->getId() == $this->doublechestc->get("id32") && $item->getDamage() == $this->doublechestc->get("meta32")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands32"));
            $sender->sendMessage($this->doublechestc->get("msg32"));
        }
        if($item->getId() == $this->doublechestc->get("id33") && $item->getDamage() == $this->doublechestc->get("meta33")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands33"));
            $sender->sendMessage($this->doublechestc->get("msg33"));
        }
        if($item->getId() == $this->doublechestc->get("id34") && $item->getDamage() == $this->doublechestc->get("meta34")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands34"));
            $sender->sendMessage($this->doublechestc->get("msg34"));
        }
        if($item->getId() == $this->doublechestc->get("id35") && $item->getDamage() == $this->doublechestc->get("meta35")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands35"));
            $sender->sendMessage($this->doublechestc->get("msg35"));
        }
        if($item->getId() == $this->doublechestc->get("id36") && $item->getDamage() == $this->doublechestc->get("meta36")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands36"));
            $sender->sendMessage($this->doublechestc->get("msg36"));
        }
        if($item->getId() == $this->doublechestc->get("id37") && $item->getDamage() == $this->doublechestc->get("meta37")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands37"));
            $sender->sendMessage($this->doublechestc->get("msg37"));
        }
        if($item->getId() == $this->doublechestc->get("id38") && $item->getDamage() == $this->doublechestc->get("meta38")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands38"));
            $sender->sendMessage($this->doublechestc->get("msg38"));
        }
        if($item->getId() == $this->doublechestc->get("id39") && $item->getDamage() == $this->doublechestc->get("meta39")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands39"));
            $sender->sendMessage($this->doublechestc->get("msg39"));
        }
        if($item->getId() == $this->doublechestc->get("id40") && $item->getDamage() == $this->doublechestc->get("meta40")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands40"));
            $sender->sendMessage($this->doublechestc->get("msg40"));
        }
        if($item->getId() == $this->doublechestc->get("id41") && $item->getDamage() == $this->doublechestc->get("meta41")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands41"));
            $sender->sendMessage($this->doublechestc->get("msg41"));
        }
        if($item->getId() == $this->doublechestc->get("id42") && $item->getDamage() == $this->doublechestc->get("meta42")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands42"));
            $sender->sendMessage($this->doublechestc->get("msg42"));
        }
        if($item->getId() == $this->doublechestc->get("id43") && $item->getDamage() == $this->doublechestc->get("meta43")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands43"));
            $sender->sendMessage($this->doublechestc->get("msg43"));
        }
        if($item->getId() == $this->doublechestc->get("id44") && $item->getDamage() == $this->doublechestc->get("meta44")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands44"));
            $sender->sendMessage($this->doublechestc->get("msg44"));
        }
        if($item->getId() == $this->doublechestc->get("id45") && $item->getDamage() == $this->doublechestc->get("meta45")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands45"));
            $sender->sendMessage($this->doublechestc->get("msg45"));
        }
        if($item->getId() == $this->doublechestc->get("id46") && $item->getDamage() == $this->doublechestc->get("meta46")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands46"));
            $sender->sendMessage($this->doublechestc->get("msg46"));
        }
        if($item->getId() == $this->doublechestc->get("id47") && $item->getDamage() == $this->doublechestc->get("meta47")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands47"));
            $sender->sendMessage($this->doublechestc->get("msg47"));
        }
        if($item->getId() == $this->doublechestc->get("id48") && $item->getDamage() == $this->doublechestc->get("meta48")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands48"));
            $sender->sendMessage($this->doublechestc->get("msg48"));
        }
        if($item->getId() == $this->doublechestc->get("id49") && $item->getDamage() == $this->doublechestc->get("meta49")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands49"));
            $sender->sendMessage($this->doublechestc->get("msg49"));
        }
        if($item->getId() == $this->doublechestc->get("id50") && $item->getDamage() == $this->doublechestc->get("meta50")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands50"));
            $sender->sendMessage($this->doublechestc->get("msg50"));
        }
        if($item->getId() == $this->doublechestc->get("id51") && $item->getDamage() == $this->doublechestc->get("meta51")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands51"));
            $sender->sendMessage($this->doublechestc->get("msg51"));
        }
        if($item->getId() == $this->doublechestc->get("id52") && $item->getDamage() == $this->doublechestc->get("meta52")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands52"));
            $sender->sendMessage($this->doublechestc->get("msg52"));
        }
        if($item->getId() == $this->doublechestc->get("id53") && $item->getDamage() == $this->doublechestc->get("meta53")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands53"));
            $sender->sendMessage($this->doublechestc->get("msg53"));
        }
        if($item->getId() == $this->doublechestc->get("id54") && $item->getDamage() == $this->doublechestc->get("meta54")){
            $this->plugin->getServer()->getCommandMap()->dispatch($sender, $this->doublechestc->get("commands54"));
            $sender->sendMessage($this->doublechestc->get("msg54"));
        }
    }
}
