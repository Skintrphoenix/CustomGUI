<?php



namespace Skintrphoenix\CustomGUI\Commands\GUI\DoubleChest\DoubleChest2;

use Skintrphoenix\CustomGUI\CustomGUI;
use Skintrphoenix\CustomGUI\Commands\GUI\DoubleChest\DoubleChest2\DoubleChest2cListener;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class DoubleChest2c extends PluginCommand
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
        	$doublechest2clistener = new DoubleChest2cListener(CustomGUI::getInstance());
            $doublechest2clistener->onCommand($sender);
        }
        return true;
    }

}
