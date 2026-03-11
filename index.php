<?php

require_once 'characters/characterInterface.php';
require_once 'characters/default.php';
require_once 'characters/guerreiro.php';
require_once 'characters/mago.php';
require_once 'characters/arqueiro.php';
require_once 'characters/feiticeiro.php';
require_once 'battle_system/battle.php';

echo "";

function selectCharacter($playerNumber) {

    echo "\n--- Jogador $playerNumber ---\n";
    echo "Digite seu nome: ";
    $name = trim(fgets(STDIN));

    echo "\n👤 $name, escolha seu personagem:\n";
    echo "  [1] Guerreiro   - HP: 100 | Tanque corpo a corpo\n";
    echo "  [2] Mago      - HP: 80  | Mago de dano alto\n";
    echo "  [3] Arqueiro    - HP: 70  | Arqueiro ágil\n";
    echo "  [4] Feiticeiro  - HP: 90  | Feiticeiro arcano\n";
    echo "\nDigite o número: ";

    $choice = trim(fgets(STDIN));

    $character = null;
    switch ($choice) {
        case '1':
            $character = new Guerreiro();
            break;
        case '2':
            $character = new Mago();
            break;
        case '3':
            $character = new Arqueiro();
            break;
        case '4':
            $character = new Feiticeiro();
            break;
        default:
            echo "Opção inválida, escolha novamente.\n";
            return selectCharacter($playerNumber);
    }

    return ['name' => $name, 'character' => $character];

}

$turnOn = true;

while($turnOn) {

    echo "╔══════════════════════════════╗\n";
    echo "║       ⚔️  RPG BATTLE ⚔️        ║\n";
    echo "╚══════════════════════════════╝\n";

    $player1Info = selectCharacter("1");
    $player2Info = selectCharacter("2");

    $player1 = $player1Info['character'];
    $player2 = $player2Info['character'];
    $name1 = $player1Info['name'];
    $name2 = $player2Info['name'];

    echo "\nIniciando a batalha...\n";

    $battle = new Battle($player1, $player2, $name1, $name2);
    $battle->start();

    echo "\n╔══════════════════════════════╗\n";
    echo "║   Deseja jogar novamente?    ║\n";
    echo "║  [1] Sim                     ║\n";
    echo "║  [2] Não                     ║\n";
    echo "╚══════════════════════════════╝\n";
    echo "Escolha: ";

    $playAgain = trim(fgets(STDIN));

    if ($playAgain != '1') {
        echo "\nObrigado por jogar! Até a próxima!\n";
        $turnOn = false;
    }

}
