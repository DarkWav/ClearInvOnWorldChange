<?php

namespace DarkWav\ClearInvOnWorldChange;

use pocketmine\plugin\PluginBase;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Plugin;
use pocketmine\permission\Permission;
use pocketmine\event\entity\EntityLevelChangeEvent;
use pocketmine\event\Listener;
use pocketmine\level\Level;
use DarkWav\ClearInvOnWorldChange\ClearInvOnWorldChange;
use pocketmine\inventory\PlayerInventory;

class EventListener implements Listener
{
  public $Main;
  public $Logger;
  
  public function __construct(ClearInvOnWorldChange $Main)
  {
    $this->Main   = $Main;
    $this->Logger = $Main->getServer()->getLogger();
    $this->Server = $Main->getServer();
  }
  public function EntityLevelChangeEvent (EntityLevelChangeEvent $event)
  {
    $Config = $this->Main->getConfig();
    $entity = $event->getEntity();
    if($entity instanceof Player)
    {
      foreach($this->Main->getConfig()->get("AffectedWorlds") as $worldname)
      {
        if ($event->getOrigin()->getName() == $worldname)
        {
          //$entity->getInventory()->clearAll; //RIP this will need some Observer workaround as it does not work with entities.....
        }
      }
    }
  }
}