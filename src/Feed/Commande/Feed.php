<?php

namespace Feed\Commande;

use Feed\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class Feed extends Command {
    private $main;

    public function __construct(Main $main) {
        parent::__construct("feed", "Vous nourrie");
        $this->main = $main;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {

        if ($sender instanceof Player) {
            if ($sender->hasPermission("feed.use")) {
                if ($sender->getFood() == 20) {
                    $sender->sendMessage("§cVotre vie est complette");
                } else {
                    $sender->setFood(20);
                    $sender->setSaturation(20);
                    $sender->sendMessage("§aVous avez êtes nourrit !");
                }
            } else {
                $sender->sendMessage("§cVous n'avez pas la permission de vous feed");
            }
        } else {
            $this->main->getLogger()->info("Utilisé cette commande en jeu");
        }
    }
}
