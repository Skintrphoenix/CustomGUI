<?php



namespace Skintrphoenix\CustomGUI\Commands\GUI\DoubleChest\DoubleChest1;

use Skintrphoenix\CustomGUI\CustomGUI;
use Skintrphoenix\CustomGUI\Commands\GUI\DoubleChest\DoubleChest1\DoubleChestcListener;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\Player;
use pocketmine\plugin\Plugin;

class DoubleChestc extends PluginCommand
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
        	$doublechestclistener = new DoubleChestcListener(CustomGUI::getInstance());
            $doublechestclistener->onCommand($sender);
        }
        return true;
    }

}
