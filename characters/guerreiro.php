<?php 

require_once 'default.php';
require_once 'dice.php';

class Guerreiro extends DefaultCharacter {

    private $screamActive = 0;

    public function __construct() {

        parent::__construct(100, 8,14, 5, 5, 12, 1);

    }

    public function getSkillNames(): array {

        return ['Grito de Guerra (3 PM)', 'Golpe Devastador (5 PM)'];

    }

    public function skill1(): int {

        system("clear");
        if ($this->pm < 3) {
            echo "PM insuficiente para usar Grito de Guerra!\n";
            return -1;

        }

        $this->pm -= 3;
        $this->damageBonus += 5;
        $this->armorClass += 3;
        $this->screamActive = 3; 

        echo "Grito de Guerra ativado! Dano e armadura aumentados!\n";
        return 1;

    }

    public function skill2(): int {

        system("clear");
        if ($this->pm < 5) {

            echo "PM insuficiente para usar Golpe Devastador!\n";
            return -1;

        }

        $this->pm -= 5;
        $damage = Dice::rollMultiple($this->damageDice, $this->damageDiceCount) + $this->damageBonus + 15;

        echo "⚔️  Golpe Devastador! Dano: {$damage}\n";
        return $damage;

    }

    public function onTurnEnd(): void {

        if($this->screamActive > 0) {

            $this->screamActive--;
            if($this->screamActive == 0) {

                $this->damageBonus -= 5;
                $this->armorClass -= 3;
                echo "Grito de Guerra expirou! Dano e armadura retornaram ao normal.\n";

            } else {

                echo "Grito de Guerra ainda ativo por {$this->screamActive} turnos.\n";
                
            }

        }

    }

}