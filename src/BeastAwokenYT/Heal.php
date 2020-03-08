<?php

namespace BeastAwokenYT;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\plugin\Plugin;
use pocketmine\level\particle\HappyVillagerParticle;
use pocketmine\level\sound\ClickSound;
use pocketmine\math\Vector3;
use pocketmine\plugin\PluginBase;

class Heal extends PluginBase {

    public function onEnable(){
        $this->getLogger()->info("§7By §aBeastAwokenYT");
    }

    public function onDisable(){
        $this->getLogger()->info("§7By §cBeasAwokenYT");
    }

    public function onCommand(CommandSender $sender, Command $kmt, string $label, array $args): bool {
        switch($kmt->getName()){
            case "heal":
                if($sender instanceof Player){
                    if($sender->hasPermission("heal.kmt")){
                        $sender->setHealth(20);
                        $sender->getLevel()->addParticle(new HappyVillagerParticle($sender));
                        $sender->getLevel()->addSound(new ClickSound($sender));
                        $sender->sendPopup("§b§lYou were §cSuccessfully §bHealed");
                    }
                }
                break;
        }
        return true;
    }
}