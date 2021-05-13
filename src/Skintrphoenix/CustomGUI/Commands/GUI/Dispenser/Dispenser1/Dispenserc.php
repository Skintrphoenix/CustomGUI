<?php



namespace Skintrphoenix\CustomGUI\Commands\GUI\Dispenser\Dispenser1;

use Skintrphoenix\CustomGUI\CustomGUI;
use Skintrphoenix\CustomGUI\Commands\GUI\Dispenser\Dispenser1\DispensercListener;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class Dispenserc extends PluginCommand
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
        	$dispenserclistener = new DispensercListener(CustomGUI::getInstance());
            $dispenserclistener->onCommand($sender);
        }
        return true;
    }

}
