<?php

require_once 'default.php';
require_once 'dice.php';

class Arqueiro extends DefaultCharacter {

    public   function __construct() {

        parent::__construct(70, 10, 12, 4, 5, 6, 2);

    }

    public function getSkillNames(): array {

        return ['Tiro de Poder (3 PM)', 'Primeiros Socorros (4 PM)'];

    }

    public function skill1(): int {

        system("clear");
        if($this->pm >= 3) {

            $damage = Dice::rollMultiple($this->damageDice, $this->damageDiceCount) + $this->damageBonus + 10;
            echo "Tiro de Poder ativado! Dano: " . $damage . "\n";
            $this->pm -= 3;
            return $damage;

        } else {

            echo "PM insuficiente para usar Tiro de Poder!\n";
            return 0;

        }

    }

    public function skill2(): int {

        system("clear");
        if($this->pm >= 4) {
            
            $heal = Dice::rollMultiple(4, 2) + 5;
            $this->hp = min($this->maxHp, $this->hp + $heal);
            echo "Primeiros Socorros ativados! Curado por: " . $heal . " HP!\n";
            $this->pm -= 4;
            return $heal;

        } else {

            echo "PM insuficiente para usar Primeiros Socorros!\n";
            return 0;

        }

    }

    public function onTurnEnd(): void{}
}