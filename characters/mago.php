<?php

require_once 'default.php';
require_once 'dice.php';

class Mago extends DefaultCharacter {

    private $shieldActive = 0;
    public function __construct() {

        parent::__construct(80, 12, 10, 3, 5, 4, 1);

    }

    public function getSkillNames(): array {

        return ['Bola de Fogo (4 PM)', 'Escudo de Gelo (3 PM)'];

    }

    public function skill1(): int {

        system("clear");
        if($this->pm >= 4) {

            if(dice::roll(20) >= 10) {
                
                $damage = 30;
                echo "Bola de Fogo ativada! Acerto total! Dano: " . $damage . "\n";
                $this->pm -= 4;
                return $damage;

            } else {

                $damage = 15;
                echo "Bola de Fogo ativada! Acerto parcial! Dano: " . $damage . "\n";
                $this->pm -= 4;
                return $damage;

            }

        } else {

            echo "PM insuficiente para usar Bola de Fogo!\n";
            return 0;

        }

    }

    public function skill2(): int {

        system("clear");
        if($this->pm >= 3) {

            round($this->armorClass += 5);
            echo "Escudo de Gelo ativado! Classe de armadura aumentada em 5 pelos próximos 2 turnos!\n";
            $this->shieldActive = 2;
            $this->pm -= 3;
            return 0;

        } else {

            echo "PM insuficiente para usar Escudo de Gelo!\n";
            $this->pm -= 3;
            return 0;

        }

    }

    public function onTurnEnd(): void {

        if ($this->shieldActive > 0) {

            $this->shieldActive--;
            if ($this->shieldActive == 0) {

                round($this->armorClass -= 5);
                echo "O efeito do Escudo de Gelo acabou! Classe de armadura retornou ao normal.\n";

            } else{

                echo "Escudo de Gelo ativo por mais " . $this->shieldActive . " turnos.\n";

            }
        }
    }
}