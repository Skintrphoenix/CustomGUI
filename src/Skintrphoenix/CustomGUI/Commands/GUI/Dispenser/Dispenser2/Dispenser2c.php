<?php



namespace Skintrphoenix\CustomGUI\Commands\GUI\Dispenser\Dispenser2;

use Skintrphoenix\CustomGUI\CustomGUI;
use Skintrphoenix\CustomGUI\Commands\GUI\Dispenser\Dispenser2\Dispenser2cListener;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class Dispenser2c extends PluginCommand
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
        	$dispenser2clistener = new Dispenser2cListener(CustomGUI::getInstance());
            $dispenser2clistener->onCommand($sender);
        }
        return true;
    }

}
