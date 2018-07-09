<?php

namespace DarkWav\ClearInvOnWorldChange;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\Plugin;
use pocketmine\plugin\PluginLoader;
use pocketmine\event\Listener;
use pocketmine\level\Level;
use DarkWav\ClearInvOnWorldChange\EventListener;

class ClearInvOnWorldChange extends PluginBase
{
  public $Config;
  
  public function onEnable()
  {
    @mkdir($this->getDataFolder());
    $this->saveDefaultConfig();
    $Config = $this->getConfig();
    $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
    $this->getServer()->getLogger()->info(TextFormat::GREEN . "ClearInvOnWorldChange enabled!");
  }
}