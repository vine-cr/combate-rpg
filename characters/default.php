<?php 

abstract class DefaultCharacter implements CharacterInterface {

    public $hp;

    public $maxHp;

    public $pm;

    public $maxPm;

    public $armorClass;

    public $damageDiceBonus;

    public $damageBonus;

    public $damageDice;

    public $damageDiceCount;

    public function __construct($hp, $pm, $armorClass, $damageDiceBonus, $damageBonus, $damageDice, $damageDiceCount) {
        $this->hp = $hp;
        $this->maxHp = $hp;
        $this->pm = $pm;
        $this->maxPm = $pm;
        $this->armorClass = $armorClass;
        $this->damageDiceBonus = $damageDiceBonus;
        $this->damageBonus = $damageBonus;
        $this->damageDice = $damageDice;
        $this->damageDiceCount = $damageDiceCount;
    }

    abstract public function onTurnEnd(): void;

}