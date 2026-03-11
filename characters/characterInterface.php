<?php

interface CharacterInterface {
    public function skill1(): int; // retorna o dano/efeito
    public function skill2(): int;
    public function getSkillNames(): array;

}