<?php

require_once 'default.php';
require_once 'dice.php';

class Feiticeiro extends DefaultCharacter {

    private $shieldActive = 0;

    public function __construct() {

        parent::__construct(90, 15, 8, 4, 6, 6, 2);

    }

    public function getSkillNames(): array {

        return ['Raio (5 PM)', 'Escudo Arcano (4 PM)'];

    }

    public function skill1(): int {

        system("clear");
        if($this->pm >= 5) {

            if(Dice::roll(20) >= 12) {
                
                $damage = 25;
                echo "Raio ativado! Acerto total! Dano: " . $damage . "\n";
                $this->pm -= 5;
                return $damage;

            } else {

                $damage = 12;
                echo "Raio ativado! Acerto parcial! Dano: " . $damage . "\n";
                $this->pm -= 5;
                return $damage;

            }

        } else {

            echo "PM insuficiente para usar Raio!\n";
            return 0;

        }

    }

    public function skill2(): int {

        system("clear");
        if($this->pm >= 4) {

            round($this->armorClass += 7);
            echo "Escudo Arcano ativado! Classe de armadura aumentada em 7 pelos próximos 3 turnos!\n";
            $this->shieldActive = 3;
            $this->pm -= 4;
            return 0;

        } else {

            echo "PM insuficiente para usar Escudo Arcano!\n";
            return 0;

        }

    }

    public function onTurnEnd(): void {

        if($this->shieldActive > 0) {

            $this->shieldActive--;
            if($this->shieldActive == 0) {

                round($this->armorClass -= 7);
                echo "O efeito do Escudo Arcano acabou! Classe de armadura voltou ao normal.\n";

            } else {

                echo "Escudo Arcano ainda ativo por {$this->shieldActive} turnos!\n";

            }

        }

    }
}