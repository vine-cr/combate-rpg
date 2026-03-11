<?php

require_once 'characters/default.php';
require_once 'index.php';
class Battle {

    private $character1;
    private $character2;
    private string $name1;
    private string $name2;
    private $turn = 1;

    public function __construct($character1, $character2, $name1, $name2) {

        $this->character1 = $character1;
        $this->character2 = $character2;
        $this->name1 = $name1;
        $this->name2 = $name2;

    }

    public function start() {

        echo "\n  BATALHA INICIADA!\n";
        echo "════════════════════════════════\n";

        while ($this->character1->hp > 0 && $this->character2->hp >0) {

            echo "\nTurno " . $this->turn . ":\n";
            echo "════════════════════════════════\n";
    
            if ($this->character1->hp > 0) {
                $this->playerTurn($this->character1, $this->character2, $this->name1, $this->name2);
                $this->character1->onTurnEnd();
            }

            if ($this->character2->hp > 0) {
                $this->playerTurn($this->character2, $this->character1, $this->name2, $this->name1);
                $this->character2->onTurnEnd();
            }

            $this->turn++;

        }

        $this->declareWinner();

    }

    private function playerTurn($attacker, $defender, $atkName, $defName) {

        $skillNames = $attacker->getSkillNames();

        $actionValid = false;

        while (!$actionValid) {

            $this->showStatus();

            echo "\nTurno de $atkName: \n";
            echo "[1] - Ataque normal\n";
            echo "[2] - " . $skillNames[0] . "\n";
            echo "[3] - " . $skillNames[1] . "\n";
            echo "Escolha uma ação: ";

            $choice = trim(fgets(STDIN));

            switch ($choice) {

                case '1':
                    $this->normalAttack($attacker, $defender, $atkName, $defName);
                    $actionValid = true;
                    break;

                case '2':
                    $damage = $attacker->skill1();
                    if($damage != -1) {

                        if($damage > 0) $defender->hp -= $damage;
                        $actionValid = true;
                    
                    }
                    break;

                case '3':
                    $damage = $attacker->skill2();
                    if($damage != -1) {

                        if($damage > 0) $defender->hp -= $damage;
                        $actionValid = true;

                    }
                    break;

                default:
                    echo "Opção inválida! Escolha 1, 2 ou 3.\n";
                    break;

            }

        }

    }

    public function normalAttack($attacker, $defender, $atkName, $defName) {

        system("clear");
        $roll = Dice::roll(20);
        
        if($roll == 20) {
        
            $damage = Dice::rollMultiple($attacker->damageDice, ($attacker->damageDiceCount * 2)) + $attacker->damageBonus;
            echo "$atkName acerta um CRÍTICO! Dano: " . $damage . "\n";
            $defender->hp -= $damage;

        } elseif ($roll >= $defender->armorClass) {

            $damage = Dice::rollMultiple($attacker->damageDice, $attacker->damageDiceCount) + $attacker->damageBonus;
            echo "$atkName acerta um ataque normal! Dano: " . $damage . "\n";
            $defender->hp -= $damage;

        } else {

            echo "$atkName erra o ataque normal!\n";

        }

    }

    public static function healthBar(int $hp, int $maxHp, int $length = 20): string {
        
        $hp = max(0, $hp);
        $filled = (int) round(($hp / $maxHp) * $length);
        $empty  = max(0, $length - $filled);

        $bar   = str_repeat('█', $filled) . str_repeat('░', $empty);
        $color = match(true) {
            ($hp / $maxHp) > 0.5 => "\033[32m", 
            ($hp / $maxHp) > 0.25 => "\033[33m",
            default               => "\033[31m",
            };
            
            return "{$color}[{$bar}]\033[0m {$hp}/{$maxHp}";

    }

    public static function pmBar(int $pm, int $maxPm, int $length = 20): string {

        $pm = max(0, $pm);
        $filled = (int) round(($pm / $maxPm) * $length);
        $empty  = max(0, $length - $filled);

        $bar = str_repeat('█', $filled) . str_repeat('░', $empty);

        return "\033[34m[{$bar}]\033[0m {$pm}/{$maxPm}"; 

    }

    public function showStatus() {

        echo "\nStatus:\n";
        echo "{$this->name1}: " . get_class($this->character1) . " - HP: " . self::healthBar($this->character1->hp, $this->character1->maxHp) . " | PM: " . self::pmBar($this->character1->pm, $this->character1->maxPm) . "\n\n";

        echo "{$this->name2}: " . get_class($this->character2) . " - HP: " . self::healthBar($this->character2->hp, $this->character2->maxHp) . " | PM: " . self::pmBar($this->character2->pm, $this->character2->maxPm) . "\n";

    }

    public function declareWinner() {

        if ($this->character1->hp > 0) {
            echo "\n🏆 {$this->name1} venceu a batalha!\n";
        } else {
            echo "\n🏆 {$this->name2} venceu a batalha!\n";
        }

    }
}