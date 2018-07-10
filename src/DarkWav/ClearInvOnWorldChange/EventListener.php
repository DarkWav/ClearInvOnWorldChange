<?php

namespace DarkWav\ClearInvOnWorldChange;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\Player;
use pocketmine\Plugin;
use pocketmine\event\entity\EntityLevelChangeEvent;
use pocketmine\event\Listener;
use pocketmine\level\Level;
use DarkWav\ClearInvOnWorldChange\ClearInvOnWorldChange;

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
      $player = $entity->getPlayer();
      foreach($this->Main->getConfig()->get("AffectedWorlds") as $worldname)
      {
        if ($event->getOrigin()->getName() == $worldname)
        {
          $player->getInventory()->clearAll();
          $player->getArmorInventory()->clearAll();
        }
      }
    }
  }
}