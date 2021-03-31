<?php

namespace CustomGUI;

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
	
	



