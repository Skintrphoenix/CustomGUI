<?php



namespace Skintrphoenix\CustomGUI\Commands;

use Skintrphoenix\CustomGUI\CustomGUI;
use Skintrphoenix\CustomGUI\GUI\Chest\Chest;
use Skintrphoenix\CustomGUI\GUI\Chest\Chest2;
use Skintrphoenix\CustomGUI\GUI\Dispenser\Dispenser;
use Skintrphoenix\CustomGUI\GUI\Dispenser\Dispenser2;
use Skintrphoenix\CustomGUI\GUI\Hopper\Hopper2;
use Skintrphoenix\CustomGUI\GUI\Hopper\Hopper;
use Skintrphoenix\CustomGUI\GUI\DoubleChest\DoubleChest;
use Skintrphoenix\CustomGUI\GUI\DoubleChest\DoubleChest2;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class Commands extends PluginCommand
{
	public $sender;
    private $player = null;
    
    public function __construct(string $name, Plugin $owner)
    {
        parent::__construct($name, $owner);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(!$sender instanceof Player) {
            $sender->sendMessage("Please use command in-game");
            return true;
        }
        if($sender instanceof Player){
                    if(!isset($args[0])){
                    	$sender->sendMessage("");
                        return true;
                    }
                    $arg = array_shift($args);
                    switch($arg){
                    	case "chest":
                            $chest = new Chest(CustomGUI::getInstance());
                            $chest->openChest($sender);
                        break;
                        case "chest2":
                            $chest2 = new Chest2(CustomGUI::getInstance());
                            $chest2->openChest2($sender);
                        break;
                        
                        case "doublechest":
                            $doublechest = new DoubleChest(CustomGUI::getInstance());
                            $doublechest->openDoubleChest($sender);
                        break;
                        case "doublechest2":
                            $doublechest2 = new DoubleChest2(CustomGUI::getInstance());
                            $doublechest2->openDoubleChest2($sender);
                        break;
                        
                        case "hopper":
                            $hopper = new Hopper(CustomGUI::getInstance());
                            $hopper->openHopper($sender);
                        break;
                        case "hopper2":
                            $hopper2 = new Hopper2(CustomGUI::getInstance());
                            $hopper2->openHopper2($sender);
                        break;
                        
                        case "dispenser":
                            $dispenser = new Dispenser(CustomGUI::getInstance());
                            $dispenser->openDispenser($sender);
                        break;
                        case "dispenser2":
                            $dispenser2 = new Dispenser2(CustomGUI::getInstance());
                            $dispenser2->openDispenser2($sender);
                        break;
                    }
                }
            return true;
        }

}
