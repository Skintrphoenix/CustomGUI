<?php

namespace Skintrphoenix\CustomGUI;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\inventory\transaction\action\SlotChangeAction;
use pocketmine\item\Item;
use muqsit\invmenu\InvMenu;
use muqsit\invmenu\InvMenuHandler;

class Main extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->saveResource("chest.yml");
		$this->saveResource("double-chest.yml");
		$this->saveResource("hopper.yml");
        $this->chest = new Config($this->getDataFolder()."chest.yml", Config::YAML);
        $this->chest2 = new Config($this->getDataFolder()."double-chest.yml", Config::YAML);
        $this->hopper = new Config($this->getDataFolder()."hopper.yml", Config::YAML);
        $this->chestg = InvMenu::create(InvMenu::TYPE_CHEST);
		$this->chest2g = InvMenu::create(InvMenu::TYPE_DOUBLE_CHEST);
		$this->hopperg = InvMenu::create(InvMenu::TYPE_HOPPER);
		if(!InvMenuHandler::isRegistered()){
			InvMenuHandler::register($this);
		}
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
        switch($cmd->getName()){                    
            case "gui":
                if($sender instanceof Player){
                    if(!isset($args[0])){
                    	$sender->sendMessage("/gui [chest, chest2, hopper]");
                        return true;
                    }
                    $arg = array_shift($args);
                    switch($arg){
                    	case "chest":
                            $this->openChest($sender);
                        break;
                        case "chest2":
                            $this->openDoubleChest($sender);
                        break;
                        case "hopper":
                            $this->openHopper($sender);
                        break;
                    }
                }
            break;
        }
        return true;
    }
    
    public function openChest($sender){
    	$this->chestg->readonly();
	    $this->chestg->setListener([$this, "listenerChest"]);
        $this->chestg->setName($this->chest->get("name"));
	    $inventory = $this->chestg->getInventory();
	    $inventory->setItem(0, Item::get($this->chest->get("id1"), $this->chest->get("meta1"), $this->chest->get("count1"))->setCustomName($this->chest->get("itemsname1"))->setLore([$this->chest->get("desc1")]));
	    $inventory->setItem(1, Item::get($this->chest->get("id2"), $this->chest->get("meta2"), $this->chest->get("count2"))->setCustomName($this->chest->get("itemsname2"))->setLore([$this->chest->get("desc2")]));
	    $inventory->setItem(2, Item::get($this->chest->get("id3"), $this->chest->get("meta3"), $this->chest->get("count3"))->setCustomName($this->chest->get("itemsname3"))->setLore([$this->chest->get("desc3")]));
	    $inventory->setItem(3, Item::get($this->chest->get("id4"), $this->chest->get("meta4"), $this->chest->get("count4"))->setCustomName($this->chest->get("itemsname4"))->setLore([$this->chest->get("desc4")]));
	    $inventory->setItem(4, Item::get($this->chest->get("id5"), $this->chest->get("meta5"), $this->chest->get("count5"))->setCustomName($this->chest->get("itemsname5"))->setLore([$this->chest->get("desc5")]));
	    $inventory->setItem(5, Item::get($this->chest->get("id6"), $this->chest->get("meta6"), $this->chest->get("count6"))->setCustomName($this->chest->get("itemsname6"))->setLore([$this->chest->get("desc6")]));
        $inventory->setItem(6, Item::get($this->chest->get("id7"), $this->chest->get("meta7"), $this->chest->get("count7"))->setCustomName($this->chest->get("itemsname7"))->setLore([$this->chest->get("desc7")]));
        $inventory->setItem(7, Item::get($this->chest->get("id8"), $this->chest->get("meta8"), $this->chest->get("count8"))->setCustomName($this->chest->get("itemsname8"))->setLore([$this->chest->get("desc8")]));
        $inventory->setItem(8, Item::get($this->chest->get("id9"), $this->chest->get("meta9"), $this->chest->get("count9"))->setCustomName($this->chest->get("itemsname9"))->setLore([$this->chest->get("desc9")]));
        $inventory->setItem(9, Item::get($this->chest->get("id10"), $this->chest->get("meta10"), $this->chest->get("count10"))->setCustomName($this->chest->get("itemsname10"))->setLore([$this->chest->get("desc10")]));
        $inventory->setItem(10, Item::get($this->chest->get("id11"), $this->chest->get("meta11"), $this->chest->get("count11"))->setCustomName($this->chest->get("itemsname11"))->setLore([$this->chest->get("desc11")]));
        $inventory->setItem(11, Item::get($this->chest->get("id12"), $this->chest->get("meta12"), $this->chest->get("count12"))->setCustomName($this->chest->get("itemsname14"))->setLore([$this->chest->get("desc14")]));
        $inventory->setItem(12, Item::get($this->chest->get("id13"), $this->chest->get("meta13"), $this->chest->get("count13"))->setCustomName($this->chest->get("itemsname13"))->setLore([$this->chest->get("desc13")]));
        $inventory->setItem(13, Item::get($this->chest->get("id14"), $this->chest->get("meta14"), $this->chest->get("count14"))->setCustomName($this->chest->get("itemsname14"))->setLore([$this->chest->get("desc14")]));
        $inventory->setItem(14, Item::get($this->chest->get("id15"), $this->chest->get("meta15"), $this->chest->get("count15"))->setCustomName($this->chest->get("itemsname15"))->setLore([$this->chest->get("desc15")]));
        $inventory->setItem(15, Item::get($this->chest->get("id16"), $this->chest->get("meta16"), $this->chest->get("count16"))->setCustomName($this->chest->get("itemsname16"))->setLore([$this->chest->get("desc16")]));
        $inventory->setItem(16, Item::get($this->chest->get("id17"), $this->chest->get("meta17"), $this->chest->get("count17"))->setCustomName($this->chest->get("itemsname17"))->setLore([$this->chest->get("desc17")]));
        $inventory->setItem(17, Item::get($this->chest->get("id18"), $this->chest->get("meta18"), $this->chest->get("count18"))->setCustomName($this->chest->get("itemsname18"))->setLore([$this->chest->get("desc18")]));
        $inventory->setItem(18, Item::get($this->chest->get("id19"), $this->chest->get("meta19"), $this->chest->get("count19"))->setCustomName($this->chest->get("itemsname19"))->setLore([$this->chest->get("desc19")]));
        $inventory->setItem(19, Item::get($this->chest->get("id20"), $this->chest->get("meta20"), $this->chest->get("count20"))->setCustomName($this->chest->get("itemsname20"))->setLore([$this->chest->get("desc20")]));
        $inventory->setItem(20, Item::get($this->chest->get("id21"), $this->chest->get("meta21"), $this->chest->get("count21"))->setCustomName($this->chest->get("itemsname21"))->setLore([$this->chest->get("desc21")]));
        $inventory->setItem(21, Item::get($this->chest->get("id22"), $this->chest->get("meta22"), $this->chest->get("count22"))->setCustomName($this->chest->get("itemsname22"))->setLore([$this->chest->get("desc22")]));
        $inventory->setItem(22, Item::get($this->chest->get("id23"), $this->chest->get("meta23"), $this->chest->get("count23"))->setCustomName($this->chest->get("itemsname23"))->setLore([$this->chest->get("desc23")]));
        $inventory->setItem(23, Item::get($this->chest->get("id24"), $this->chest->get("meta24"), $this->chest->get("count24"))->setCustomName($this->chest->get("itemsname24"))->setLore([$this->chest->get("desc24")]));
        $inventory->setItem(24, Item::get($this->chest->get("id25"), $this->chest->get("meta25"), $this->chest->get("count25"))->setCustomName($this->chest->get("itemsname25"))->setLore([$this->chest->get("desc25")]));
        $inventory->setItem(25, Item::get($this->chest->get("id26"), $this->chest->get("meta26"), $this->chest->get("count26"))->setCustomName($this->chest->get("itemsname26"))->setLore([$this->chest->get("desc26")]));
        $inventory->setItem(26, Item::get($this->chest->get("id27"), $this->chest->get("meta27"), $this->chest->get("count27"))->setCustomName($this->chest->get("itemsname27"))->setLore([$this->chest->get("desc27")]));
	    $this->chestg->send($sender);
	}
	
	public function listenerChest(Player $sender, Item $item){
		$hand = $sender->getInventory()->getItemInHand()->getCustomName();
        $inventory = $this->chestg->getInventory();
        if($item->getId() == $this->chest->get("id1") && $item->getDamage() == $this->chest->get("meta1")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands1"));
            $sender->sendMessage($this->chest->get("msg1"));
        }
        if($item->getId() == $this->chest->get("id2") && $item->getDamage() == $this->chest->get("meta2")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands2"));
            $sender->sendMessage($this->chest->get("msg2"));
        }
        if($item->getId() == $this->chest->get("id3") && $item->getDamage() == $this->chest->get("meta3")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands3"));
            $sender->sendMessage($this->chest->get("msg3"));
        }
        if($item->getId() == $this->chest->get("id4") && $item->getDamage() == $this->chest->get("meta4")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands4"));
            $sender->sendMessage($this->chest->get("msg4"));
        }
        if($item->getId() == $this->chest->get("id5") && $item->getDamage() == $this->chest->get("meta5")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands5"));
            $sender->sendMessage($this->chest->get("msg5"));
        }
        if($item->getId() == $this->chest->get("id6") && $item->getDamage() == $this->chest->get("meta6")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands6"));
            $sender->sendMessage($this->chest->get("msg6"));
        }
        if($item->getId() == $this->chest->get("id7") && $item->getDamage() == $this->chest->get("meta7")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands7"));
            $sender->sendMessage($this->chest->get("msg7"));
        }
        if($item->getId() == $this->chest->get("id8") && $item->getDamage() == $this->chest->get("meta8")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands8"));
            $sender->sendMessage($this->chest->get("msg8"));
        }
        if($item->getId() == $this->chest->get("id9") && $item->getDamage() == $this->chest->get("meta9")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands9"));
            $sender->sendMessage($this->chest->get("msg9"));
        }
        if($item->getId() == $this->chest->get("id10") && $item->getDamage() == $this->chest->get("meta10")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands10"));
            $sender->sendMessage($this->chest->get("msg10"));
        }
        if($item->getId() == $this->chest->get("id11") && $item->getDamage() == $this->chest->get("meta11")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands11"));
            $sender->sendMessage($this->chest->get("msg11"));
        }
        if($item->getId() == $this->chest->get("id12") && $item->getDamage() == $this->chest->get("meta12")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands12"));
            $sender->sendMessage($this->chest->get("msg12"));
        }
        if($item->getId() == $this->chest->get("id13") && $item->getDamage() == $this->chest->get("meta13")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands13"));
            $sender->sendMessage($this->chest->get("msg13"));
        }
        if($item->getId() == $this->chest->get("id14") && $item->getDamage() == $this->chest->get("meta14")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands14"));
            $sender->sendMessage($this->chest->get("msg14"));
        }
        if($item->getId() == $this->chest->get("id15") && $item->getDamage() == $this->chest->get("meta15")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands15"));
            $sender->sendMessage($this->chest->get("msg15"));
        }
        if($item->getId() == $this->chest->get("id16") && $item->getDamage() == $this->chest->get("meta16")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands16"));
            $sender->sendMessage($this->chest->get("msg16"));
        }
        if($item->getId() == $this->chest->get("id17") && $item->getDamage() == $this->chest->get("meta17")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands17"));
            $sender->sendMessage($this->chest->get("msg17"));
        }
        if($item->getId() == $this->chest->get("id18") && $item->getDamage() == $this->chest->get("meta18")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands18"));
            $sender->sendMessage($this->chest->get("msg18"));
        }
        if($item->getId() == $this->chest->get("id19") && $item->getDamage() == $this->chest->get("meta19")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands19"));
            $sender->sendMessage($this->chest->get("msg19"));
        }
        if($item->getId() == $this->chest->get("id20") && $item->getDamage() == $this->chest->get("meta20")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands20"));
            $sender->sendMessage($this->chest->get("msg20"));
        }
        if($item->getId() == $this->chest->get("id21") && $item->getDamage() == $this->chest->get("meta21")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands21"));
            $sender->sendMessage($this->chest->get("msg21"));
        }
        if($item->getId() == $this->chest->get("id22") && $item->getDamage() == $this->chest->get("meta22")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands22"));
            $sender->sendMessage($this->chest->get("msg22"));
        }
        if($item->getId() == $this->chest->get("id23") && $item->getDamage() == $this->chest->get("meta23")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands23"));
            $sender->sendMessage($this->chest->get("msg23"));
        }
        if($item->getId() == $this->chest->get("id24") && $item->getDamage() == $this->chest->get("meta24")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands24"));
            $sender->sendMessage($this->chest->get("msg24"));
        }
        if($item->getId() == $this->chest->get("id25") && $item->getDamage() == $this->chest->get("meta25")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands25"));
            $sender->sendMessage($this->chest->get("msg25"));
        }
        if($item->getId() == $this->chest->get("id26") && $item->getDamage() == $this->chest->get("meta26")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands26"));
            $sender->sendMessage($this->chest->get("msg26"));
        }
        if($item->getId() == $this->chest->get("id27") && $item->getDamage() == $this->chest->get("meta27")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest->get("commands27"));
            $sender->sendMessage($this->chest->get("msg27"));
        }
    }
    
    public function openDoubleChest($sender){
    	$this->chest2g->readonly();
	    $this->chest2g->setListener([$this, "listenerChest2"]);
        $this->chest2g->setName($this->chest2->get("name"));
	    $inventory = $this->chest2g->getInventory();
	    $inventory->setItem(0, Item::get($this->chest2->get("id1"), $this->chest2->get("meta1"), $this->chest2->get("count1"))->setCustomName($this->chest2->get("itemsname1"))->setLore([$this->chest2->get("desc1")]));
	    $inventory->setItem(1, Item::get($this->chest2->get("id2"), $this->chest2->get("meta2"), $this->chest2->get("count2"))->setCustomName($this->chest2->get("itemsname2"))->setLore([$this->chest2->get("desc2")]));
	    $inventory->setItem(2, Item::get($this->chest2->get("id3"), $this->chest2->get("meta3"), $this->chest2->get("count3"))->setCustomName($this->chest2->get("itemsname3"))->setLore([$this->chest2->get("desc3")]));
	    $inventory->setItem(3, Item::get($this->chest2->get("id4"), $this->chest2->get("meta4"), $this->chest2->get("count4"))->setCustomName($this->chest2->get("itemsname4"))->setLore([$this->chest2->get("desc4")]));
	    $inventory->setItem(4, Item::get($this->chest2->get("id5"), $this->chest2->get("meta5"), $this->chest2->get("count5"))->setCustomName($this->chest2->get("itemsname5"))->setLore([$this->chest2->get("desc5")]));
	    $inventory->setItem(5, Item::get($this->chest2->get("id6"), $this->chest2->get("meta6"), $this->chest2->get("count6"))->setCustomName($this->chest2->get("itemsname6"))->setLore([$this->chest2->get("desc6")]));
        $inventory->setItem(6, Item::get($this->chest2->get("id7"), $this->chest2->get("meta7"), $this->chest2->get("count7"))->setCustomName($this->chest2->get("itemsname7"))->setLore([$this->chest2->get("desc7")]));
        $inventory->setItem(7, Item::get($this->chest2->get("id8"), $this->chest2->get("meta8"), $this->chest2->get("count8"))->setCustomName($this->chest2->get("itemsname8"))->setLore([$this->chest2->get("desc8")]));
        $inventory->setItem(8, Item::get($this->chest2->get("id9"), $this->chest2->get("meta9"), $this->chest2->get("count9"))->setCustomName($this->chest2->get("itemsname9"))->setLore([$this->chest2->get("desc9")]));
        $inventory->setItem(9, Item::get($this->chest2->get("id10"), $this->chest2->get("meta10"), $this->chest2->get("count10"))->setCustomName($this->chest2->get("itemsname10"))->setLore([$this->chest2->get("desc10")]));
        $inventory->setItem(10, Item::get($this->chest2->get("id11"), $this->chest2->get("meta11"), $this->chest2->get("count11"))->setCustomName($this->chest2->get("itemsname11"))->setLore([$this->chest2->get("desc11")]));
        $inventory->setItem(11, Item::get($this->chest2->get("id12"), $this->chest2->get("meta12"), $this->chest2->get("count12"))->setCustomName($this->chest2->get("itemsname14"))->setLore([$this->chest2->get("desc14")]));
        $inventory->setItem(12, Item::get($this->chest2->get("id13"), $this->chest2->get("meta13"), $this->chest2->get("count13"))->setCustomName($this->chest2->get("itemsname13"))->setLore([$this->chest2->get("desc13")]));
        $inventory->setItem(13, Item::get($this->chest2->get("id14"), $this->chest2->get("meta14"), $this->chest2->get("count14"))->setCustomName($this->chest2->get("itemsname14"))->setLore([$this->chest2->get("desc14")]));
        $inventory->setItem(14, Item::get($this->chest2->get("id15"), $this->chest2->get("meta15"), $this->chest2->get("count15"))->setCustomName($this->chest2->get("itemsname15"))->setLore([$this->chest2->get("desc15")]));
        $inventory->setItem(15, Item::get($this->chest2->get("id16"), $this->chest2->get("meta16"), $this->chest2->get("count16"))->setCustomName($this->chest2->get("itemsname16"))->setLore([$this->chest2->get("desc16")]));
        $inventory->setItem(16, Item::get($this->chest2->get("id17"), $this->chest2->get("meta17"), $this->chest2->get("count17"))->setCustomName($this->chest2->get("itemsname17"))->setLore([$this->chest2->get("desc17")]));
        $inventory->setItem(17, Item::get($this->chest2->get("id18"), $this->chest2->get("meta18"), $this->chest2->get("count18"))->setCustomName($this->chest2->get("itemsname18"))->setLore([$this->chest2->get("desc18")]));
        $inventory->setItem(18, Item::get($this->chest2->get("id19"), $this->chest2->get("meta19"), $this->chest2->get("count19"))->setCustomName($this->chest2->get("itemsname19"))->setLore([$this->chest2->get("desc19")]));
        $inventory->setItem(19, Item::get($this->chest2->get("id20"), $this->chest2->get("meta20"), $this->chest2->get("count20"))->setCustomName($this->chest2->get("itemsname20"))->setLore([$this->chest2->get("desc20")]));
        $inventory->setItem(20, Item::get($this->chest2->get("id21"), $this->chest2->get("meta21"), $this->chest2->get("count21"))->setCustomName($this->chest2->get("itemsname21"))->setLore([$this->chest2->get("desc21")]));
        $inventory->setItem(21, Item::get($this->chest2->get("id22"), $this->chest2->get("meta22"), $this->chest2->get("count22"))->setCustomName($this->chest2->get("itemsname22"))->setLore([$this->chest2->get("desc22")]));
        $inventory->setItem(22, Item::get($this->chest2->get("id23"), $this->chest2->get("meta23"), $this->chest2->get("count23"))->setCustomName($this->chest2->get("itemsname23"))->setLore([$this->chest2->get("desc23")]));
        $inventory->setItem(23, Item::get($this->chest2->get("id24"), $this->chest2->get("meta24"), $this->chest2->get("count24"))->setCustomName($this->chest2->get("itemsname24"))->setLore([$this->chest2->get("desc24")]));
        $inventory->setItem(24, Item::get($this->chest2->get("id25"), $this->chest2->get("meta25"), $this->chest2->get("count25"))->setCustomName($this->chest2->get("itemsname25"))->setLore([$this->chest2->get("desc25")]));
        $inventory->setItem(25, Item::get($this->chest2->get("id26"), $this->chest2->get("meta26"), $this->chest2->get("count26"))->setCustomName($this->chest2->get("itemsname26"))->setLore([$this->chest2->get("desc26")]));
        $inventory->setItem(26, Item::get($this->chest2->get("id27"), $this->chest2->get("meta27"), $this->chest2->get("count27"))->setCustomName($this->chest2->get("itemsname27"))->setLore([$this->chest2->get("desc27")]));
        $inventory->setItem(27, Item::get($this->chest2->get("id28"), $this->chest2->get("meta28"), $this->chest2->get("count28"))->setCustomName($this->chest2->get("itemsname28"))->setLore([$this->chest2->get("desc28")]));
	    $inventory->setItem(28, Item::get($this->chest2->get("id29"), $this->chest2->get("meta29"), $this->chest2->get("count29"))->setCustomName($this->chest2->get("itemsname29"))->setLore([$this->chest2->get("desc29")]));
	    $inventory->setItem(29, Item::get($this->chest2->get("id30"), $this->chest2->get("meta30"), $this->chest2->get("count30"))->setCustomName($this->chest2->get("itemsname30"))->setLore([$this->chest2->get("desc30")]));
	    $inventory->setItem(30, Item::get($this->chest2->get("id31"), $this->chest2->get("meta31"), $this->chest2->get("count31"))->setCustomName($this->chest2->get("itemsname31"))->setLore([$this->chest2->get("desc31")]));
	    $inventory->setItem(31, Item::get($this->chest2->get("id32"), $this->chest2->get("meta32"), $this->chest2->get("count32"))->setCustomName($this->chest2->get("itemsname32"))->setLore([$this->chest2->get("desc32")]));
	    $inventory->setItem(32, Item::get($this->chest2->get("id33"), $this->chest2->get("meta33"), $this->chest2->get("count33"))->setCustomName($this->chest2->get("itemsname33"))->setLore([$this->chest2->get("desc33")]));
        $inventory->setItem(33, Item::get($this->chest2->get("id34"), $this->chest2->get("meta34"), $this->chest2->get("count34"))->setCustomName($this->chest2->get("itemsname34"))->setLore([$this->chest2->get("desc34")]));
        $inventory->setItem(34, Item::get($this->chest2->get("id35"), $this->chest2->get("meta35"), $this->chest2->get("count35"))->setCustomName($this->chest2->get("itemsname35"))->setLore([$this->chest2->get("desc35")]));
        $inventory->setItem(35, Item::get($this->chest2->get("id36"), $this->chest2->get("meta36"), $this->chest2->get("count36"))->setCustomName($this->chest2->get("itemsname36"))->setLore([$this->chest2->get("desc36")]));
        $inventory->setItem(36, Item::get($this->chest2->get("id37"), $this->chest2->get("meta37"), $this->chest2->get("count37"))->setCustomName($this->chest2->get("itemsname37"))->setLore([$this->chest2->get("desc37")]));
        $inventory->setItem(37, Item::get($this->chest2->get("id38"), $this->chest2->get("meta38"), $this->chest2->get("count38"))->setCustomName($this->chest2->get("itemsname38"))->setLore([$this->chest2->get("desc38")]));
        $inventory->setItem(38, Item::get($this->chest2->get("id39"), $this->chest2->get("meta39"), $this->chest2->get("count39"))->setCustomName($this->chest2->get("itemsname39"))->setLore([$this->chest2->get("desc39")]));
        $inventory->setItem(39, Item::get($this->chest2->get("id40"), $this->chest2->get("meta40"), $this->chest2->get("count40"))->setCustomName($this->chest2->get("itemsname40"))->setLore([$this->chest2->get("desc40")]));
        $inventory->setItem(40, Item::get($this->chest2->get("id41"), $this->chest2->get("meta41"), $this->chest2->get("count41"))->setCustomName($this->chest2->get("itemsname41"))->setLore([$this->chest2->get("desc41")]));
        $inventory->setItem(41, Item::get($this->chest2->get("id42"), $this->chest2->get("meta42"), $this->chest2->get("count42"))->setCustomName($this->chest2->get("itemsname42"))->setLore([$this->chest2->get("desc42")]));
        $inventory->setItem(42, Item::get($this->chest2->get("id43"), $this->chest2->get("meta43"), $this->chest2->get("count43"))->setCustomName($this->chest2->get("itemsname43"))->setLore([$this->chest2->get("desc43")]));
        $inventory->setItem(43, Item::get($this->chest2->get("id44"), $this->chest2->get("meta44"), $this->chest2->get("count44"))->setCustomName($this->chest2->get("itemsname44"))->setLore([$this->chest2->get("desc44")]));
        $inventory->setItem(44, Item::get($this->chest2->get("id45"), $this->chest2->get("meta45"), $this->chest2->get("count45"))->setCustomName($this->chest2->get("itemsname45"))->setLore([$this->chest2->get("desc45")]));
        $inventory->setItem(45, Item::get($this->chest2->get("id46"), $this->chest2->get("meta46"), $this->chest2->get("count46"))->setCustomName($this->chest2->get("itemsname46"))->setLore([$this->chest2->get("desc46")]));
        $inventory->setItem(46, Item::get($this->chest2->get("id47"), $this->chest2->get("meta47"), $this->chest2->get("count47"))->setCustomName($this->chest2->get("itemsname47"))->setLore([$this->chest2->get("desc47")]));
        $inventory->setItem(47, Item::get($this->chest2->get("id48"), $this->chest2->get("meta48"), $this->chest2->get("count48"))->setCustomName($this->chest2->get("itemsname48"))->setLore([$this->chest2->get("desc48")]));
        $inventory->setItem(48, Item::get($this->chest2->get("id49"), $this->chest2->get("meta49"), $this->chest2->get("count49"))->setCustomName($this->chest2->get("itemsname49"))->setLore([$this->chest2->get("desc49")]));
        $inventory->setItem(49, Item::get($this->chest2->get("id50"), $this->chest2->get("meta50"), $this->chest2->get("count50"))->setCustomName($this->chest2->get("itemsname50"))->setLore([$this->chest2->get("desc50")]));
        $inventory->setItem(50, Item::get($this->chest2->get("id51"), $this->chest2->get("meta51"), $this->chest2->get("count51"))->setCustomName($this->chest2->get("itemsname51"))->setLore([$this->chest2->get("desc51")]));
        $inventory->setItem(51, Item::get($this->chest2->get("id52"), $this->chest2->get("meta52"), $this->chest2->get("count52"))->setCustomName($this->chest2->get("itemsname52"))->setLore([$this->chest2->get("desc52")]));
        $inventory->setItem(52, Item::get($this->chest2->get("id53"), $this->chest2->get("meta53"), $this->chest2->get("count53"))->setCustomName($this->chest2->get("itemsname53"))->setLore([$this->chest2->get("desc53")]));
        $inventory->setItem(53, Item::get($this->chest2->get("id54"), $this->chest2->get("meta54"), $this->chest2->get("count54"))->setCustomName($this->chest2->get("itemsname54"))->setLore([$this->chest2->get("desc54")]));
	    $this->chest2g->send($sender);
    }
    
    public function listenerChest2(Player $sender, Item $item){
		$hand = $sender->getInventory()->getItemInHand()->getCustomName();
        $inventory = $this->chest2g->getInventory();
        if($item->getId() == $this->chest2->get("id1") && $item->getDamage() == $this->chest2->get("meta1")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands1"));
            $sender->sendMessage($this->chest2->get("msg1"));
        }
        if($item->getId() == $this->chest2->get("id2") && $item->getDamage() == $this->chest2->get("meta2")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands2"));
            $sender->sendMessage($this->chest2->get("msg2"));
        }
        if($item->getId() == $this->chest2->get("id3") && $item->getDamage() == $this->chest2->get("meta3")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands3"));
            $sender->sendMessage($this->chest2->get("msg3"));
        }
        if($item->getId() == $this->chest2->get("id4") && $item->getDamage() == $this->chest2->get("meta4")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands4"));
            $sender->sendMessage($this->chest2->get("msg4"));
        }
        if($item->getId() == $this->chest2->get("id5") && $item->getDamage() == $this->chest2->get("meta5")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands5"));
            $sender->sendMessage($this->chest2->get("msg5"));
        }
        if($item->getId() == $this->chest2->get("id6") && $item->getDamage() == $this->chest2->get("meta6")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands6"));
            $sender->sendMessage($this->chest2->get("msg6"));
        }
        if($item->getId() == $this->chest2->get("id7") && $item->getDamage() == $this->chest2->get("meta7")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands7"));
            $sender->sendMessage($this->chest2->get("msg7"));
        }
        if($item->getId() == $this->chest2->get("id8") && $item->getDamage() == $this->chest2->get("meta8")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands8"));
            $sender->sendMessage($this->chest2->get("msg8"));
        }
        if($item->getId() == $this->chest2->get("id9") && $item->getDamage() == $this->chest2->get("meta9")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands9"));
            $sender->sendMessage($this->chest2->get("msg9"));
        }
        if($item->getId() == $this->chest2->get("id10") && $item->getDamage() == $this->chest2->get("meta10")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands10"));
            $sender->sendMessage($this->chest2->get("msg10"));
        }
        if($item->getId() == $this->chest2->get("id11") && $item->getDamage() == $this->chest2->get("meta11")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands11"));
            $sender->sendMessage($this->chest2->get("msg11"));
        }
        if($item->getId() == $this->chest2->get("id12") && $item->getDamage() == $this->chest2->get("meta12")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands12"));
            $sender->sendMessage($this->chest2->get("msg12"));
        }
        if($item->getId() == $this->chest2->get("id13") && $item->getDamage() == $this->chest2->get("meta13")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands13"));
            $sender->sendMessage($this->chest2->get("msg13"));
        }
        if($item->getId() == $this->chest2->get("id14") && $item->getDamage() == $this->chest2->get("meta14")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands14"));
            $sender->sendMessage($this->chest2->get("msg14"));
        }
        if($item->getId() == $this->chest2->get("id15") && $item->getDamage() == $this->chest2->get("meta15")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands15"));
            $sender->sendMessage($this->chest2->get("msg15"));
        }
        if($item->getId() == $this->chest2->get("id16") && $item->getDamage() == $this->chest2->get("meta16")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands16"));
            $sender->sendMessage($this->chest2->get("msg16"));
        }
        if($item->getId() == $this->chest2->get("id17") && $item->getDamage() == $this->chest2->get("meta17")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands17"));
            $sender->sendMessage($this->chest2->get("msg17"));
        }
        if($item->getId() == $this->chest2->get("id18") && $item->getDamage() == $this->chest2->get("meta18")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands18"));
            $sender->sendMessage($this->chest2->get("msg18"));
        }
        if($item->getId() == $this->chest2->get("id19") && $item->getDamage() == $this->chest2->get("meta19")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands19"));
            $sender->sendMessage($this->chest2->get("msg19"));
        }
        if($item->getId() == $this->chest2->get("id20") && $item->getDamage() == $this->chest2->get("meta20")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands20"));
            $sender->sendMessage($this->chest2->get("msg20"));
        }
        if($item->getId() == $this->chest2->get("id21") && $item->getDamage() == $this->chest2->get("meta21")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands21"));
            $sender->sendMessage($this->chest2->get("msg21"));
        }
        if($item->getId() == $this->chest2->get("id22") && $item->getDamage() == $this->chest2->get("meta22")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands22"));
            $sender->sendMessage($this->chest2->get("msg22"));
        }
        if($item->getId() == $this->chest2->get("id23") && $item->getDamage() == $this->chest2->get("meta23")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands23"));
            $sender->sendMessage($this->chest2->get("msg23"));
        }
        if($item->getId() == $this->chest2->get("id24") && $item->getDamage() == $this->chest2->get("meta24")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands24"));
            $sender->sendMessage($this->chest2->get("msg24"));
        }
        if($item->getId() == $this->chest2->get("id25") && $item->getDamage() == $this->chest2->get("meta25")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands25"));
            $sender->sendMessage($this->chest2->get("msg25"));
        }
        if($item->getId() == $this->chest2->get("id26") && $item->getDamage() == $this->chest2->get("meta26")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands26"));
            $sender->sendMessage($this->chest2->get("msg26"));
        }
        if($item->getId() == $this->chest2->get("id27") && $item->getDamage() == $this->chest2->get("meta27")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands27"));
            $sender->sendMessage($this->chest2->get("msg27"));
        }
        if($item->getId() == $this->chest2->get("id28") && $item->getDamage() == $this->chest2->get("meta28")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands28"));
            $sender->sendMessage($this->chest2->get("msg28"));
        }
        if($item->getId() == $this->chest2->get("id29") && $item->getDamage() == $this->chest2->get("meta29")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands29"));
            $sender->sendMessage($this->chest2->get("msg29"));
        }
        if($item->getId() == $this->chest2->get("id30") && $item->getDamage() == $this->chest2->get("meta30")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands30"));
            $sender->sendMessage($this->chest2->get("msg30"));
        }
        if($item->getId() == $this->chest2->get("id31") && $item->getDamage() == $this->chest2->get("meta31")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands31"));
            $sender->sendMessage($this->chest2->get("msg31"));
        }
        if($item->getId() == $this->chest2->get("id32") && $item->getDamage() == $this->chest2->get("meta32")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands32"));
            $sender->sendMessage($this->chest2->get("msg32"));
        }
        if($item->getId() == $this->chest2->get("id33") && $item->getDamage() == $this->chest2->get("meta33")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands33"));
            $sender->sendMessage($this->chest2->get("msg33"));
        }
        if($item->getId() == $this->chest2->get("id34") && $item->getDamage() == $this->chest2->get("meta34")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands34"));
            $sender->sendMessage($this->chest2->get("msg34"));
        }
        if($item->getId() == $this->chest2->get("id35") && $item->getDamage() == $this->chest2->get("meta35")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands35"));
            $sender->sendMessage($this->chest2->get("msg35"));
        }
        if($item->getId() == $this->chest2->get("id36") && $item->getDamage() == $this->chest2->get("meta36")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands36"));
            $sender->sendMessage($this->chest2->get("msg36"));
        }
        if($item->getId() == $this->chest2->get("id37") && $item->getDamage() == $this->chest2->get("meta37")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands37"));
            $sender->sendMessage($this->chest2->get("msg37"));
        }
        if($item->getId() == $this->chest2->get("id38") && $item->getDamage() == $this->chest2->get("meta38")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands38"));
            $sender->sendMessage($this->chest2->get("msg38"));
        }
        if($item->getId() == $this->chest2->get("id39") && $item->getDamage() == $this->chest2->get("meta39")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands39"));
            $sender->sendMessage($this->chest2->get("msg39"));
        }
        if($item->getId() == $this->chest2->get("id40") && $item->getDamage() == $this->chest2->get("meta40")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands40"));
            $sender->sendMessage($this->chest2->get("msg40"));
        }
        if($item->getId() == $this->chest2->get("id41") && $item->getDamage() == $this->chest2->get("meta41")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands41"));
            $sender->sendMessage($this->chest2->get("msg41"));
        }
        if($item->getId() == $this->chest2->get("id42") && $item->getDamage() == $this->chest2->get("meta42")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands42"));
            $sender->sendMessage($this->chest2->get("msg42"));
        }
        if($item->getId() == $this->chest2->get("id43") && $item->getDamage() == $this->chest2->get("meta43")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands43"));
            $sender->sendMessage($this->chest2->get("msg43"));
        }
        if($item->getId() == $this->chest2->get("id44") && $item->getDamage() == $this->chest2->get("meta44")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands44"));
            $sender->sendMessage($this->chest2->get("msg44"));
        }
        if($item->getId() == $this->chest2->get("id45") && $item->getDamage() == $this->chest2->get("meta45")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands45"));
            $sender->sendMessage($this->chest2->get("msg45"));
        }
        if($item->getId() == $this->chest2->get("id46") && $item->getDamage() == $this->chest2->get("meta46")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands46"));
            $sender->sendMessage($this->chest2->get("msg46"));
        }
        if($item->getId() == $this->chest2->get("id47") && $item->getDamage() == $this->chest2->get("meta47")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands47"));
            $sender->sendMessage($this->chest2->get("msg47"));
        }
        if($item->getId() == $this->chest2->get("id48") && $item->getDamage() == $this->chest2->get("meta48")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands48"));
            $sender->sendMessage($this->chest2->get("msg48"));
        }
        if($item->getId() == $this->chest2->get("id49") && $item->getDamage() == $this->chest2->get("meta49")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands49"));
            $sender->sendMessage($this->chest2->get("msg49"));
        }
        if($item->getId() == $this->chest2->get("id50") && $item->getDamage() == $this->chest2->get("meta50")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands50"));
            $sender->sendMessage($this->chest2->get("msg50"));
        }
        if($item->getId() == $this->chest2->get("id51") && $item->getDamage() == $this->chest2->get("meta51")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands51"));
            $sender->sendMessage($this->chest2->get("msg51"));
        }
        if($item->getId() == $this->chest2->get("id52") && $item->getDamage() == $this->chest2->get("meta52")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands52"));
            $sender->sendMessage($this->chest2->get("msg52"));
        }
        if($item->getId() == $this->chest2->get("id53") && $item->getDamage() == $this->chest2->get("meta53")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands53"));
            $sender->sendMessage($this->chest2->get("msg53"));
        }
        if($item->getId() == $this->chest2->get("id54") && $item->getDamage() == $this->chest2->get("meta54")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->chest2->get("commands54"));
            $sender->sendMessage($this->chest2->get("msg54"));
        }
    }
    
    public function openHopper($sender){
    	$this->hopperg->readonly();
	    $this->hopperg->setListener([$this, "listenerHopper"]);
        $this->hopperg->setName($this->hopper->get("name"));
        $inventory = $this->hopperg->getInventory();
        $inventory->setItem(0, Item::get($this->hopper->get("id1"), $this->hopper->get("meta1"), $this->hopper->get("count1"))->setCustomName($this->hopper->get("itemsname1"))->setLore([$this->hopper->get("desc1")]));
	    $inventory->setItem(1, Item::get($this->hopper->get("id2"), $this->hopper->get("meta2"), $this->hopper->get("count2"))->setCustomName($this->hopper->get("itemsname2"))->setLore([$this->hopper->get("desc2")]));
	    $inventory->setItem(2, Item::get($this->hopper->get("id3"), $this->hopper->get("meta3"), $this->hopper->get("count3"))->setCustomName($this->hopper->get("itemsname3"))->setLore([$this->hopper->get("desc3")]));
	    $inventory->setItem(3, Item::get($this->hopper->get("id4"), $this->hopper->get("meta4"), $this->hopper->get("count4"))->setCustomName($this->hopper->get("itemsname4"))->setLore([$this->hopper->get("desc4")]));
	    $inventory->setItem(4, Item::get($this->hopper->get("id5"), $this->hopper->get("meta5"), $this->hopper->get("count5"))->setCustomName($this->hopper->get("itemsname5"))->setLore([$this->hopper->get("desc5")]));
	    $this->hopperg->send($sender);
    }
    
    public function listenerHopper(Player $sender, Item $item){
    	$hand = $sender->getInventory()->getItemInHand()->getCustomName();
        $inventory = $this->hopperg->getInventory();
        if($item->getId() == $this->hopper->get("id1") && $item->getDamage() == $this->hopper->get("meta1")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->hopper->get("commands1"));
            $sender->sendMessage($this->hopper->get("msg1"));
        }
        if($item->getId() == $this->hopper->get("id2") && $item->getDamage() == $this->hopper->get("meta2")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->hopper->get("commands2"));
            $sender->sendMessage($this->hopper->get("msg2"));
        }
        if($item->getId() == $this->hopper->get("id3") && $item->getDamage() == $this->hopper->get("meta3")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->hopper->get("commands3"));
            $sender->sendMessage($this->hopper->get("msg3"));
        }
        if($item->getId() == $this->hopper->get("id4") && $item->getDamage() == $this->hopper->get("meta4")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->hopper->get("commands4"));
            $sender->sendMessage($this->hopper->get("msg4"));
        }
        if($item->getId() == $this->hopper->get("id5") && $item->getDamage() == $this->hopper->get("meta5")){
            $this->getServer()->getCommandMap()->dispatch($sender, $this->hopper->get("commands5"));
            $sender->sendMessage($this->hopper->get("msg5"));
        }
    }
}
    
   
