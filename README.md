# ⚔️ RPG Battle Terminal

Um jogo de RPG de batalha por turnos rodando no terminal, desenvolvido em PHP, com sistema de dados baseado em D&D.

---

## 📋 Sumário

- [Sobre](#-sobre)
- [Funcionalidades](#-funcionalidades)
- [Personagens](#-personagens)
- [Instalação](#-instalação)
- [Como Jogar](#-como-jogar)
- [Estrutura do Projeto](#-estrutura-do-projeto)
- [Sistema de Combate](#-sistema-de-combate)
- [Tecnologias](#-tecnologias)

---

## 📖 Sobre

RPG Battle Terminal é um jogo de batalha por turnos para **2 jogadores** no mesmo terminal. Cada jogador escolhe um personagem com atributos e habilidades únicas e batalham até um dos dois ser derrotado.

---

## ✨ Funcionalidades

- ⚔️ Batalha por turnos entre 2 jogadores
- 🎲 Sistema de dados D&D (1d20 para acertar, dados de dano por arma)
- 🛡️ Classe de Armadura (CA) como sistema de defesa
- ✨ Acerto crítico no natural 20 (dano dobrado)
- 💧 Sistema de PM para uso de habilidades
- ❤️ Barra de vida e PM coloridas no terminal
- 🎭 4 classes de personagens com habilidades únicas
---

## 🧙 Personagens

| Classe | HP | PM | CA | Dado de Dano | Estilo |
|--------|----|----|-----|--------------|--------|
| ⚔️ Guerreiro  | 100 | 8  | 14 | 1d12 | Tanque corpo a corpo |
| 🔮 Mago    | 70  | 20 | 11 | 1d6  | Alto dano mágico     |
| 🏹 Arqueiro   | 80  | 12 | 13 | 1d8  | Arqueiro ágil        |
| ⚡ Feiticeiro | 75  | 18 | 11 | 1d6  | Feiticeiro arcano    |

### Habilidades

**⚔️ Guerreiro**
- `Grito de guerra` (3 PM) — Aumenta dano e CA por 3 turnos
- `Golpe devastador` (5 PM) — Golpe poderoso com dano extra

**🔮 Mago**
- `Bola de fogo` (4 PM) — Bola de fogo com dano explosivo
- `Escudo de gelo` (3 PM) — Aumenta a defesa por 3 turnos

**🏹 Arqueiro**
- `Tiro do poder` (3 PM) — Poderoso tiro sem margem de erro
- `Primeiros socorros` (4 PM) — Kit de de cura

**⚡ Feiticeiro**
- `Raio` (5 PM) — Poderoso raio com dano massivo e em cadeia
- `Escudo arcano` (4 PM) — Aumenta a defesa por 5 turnos

---

## 🚀 Instalação

**Pré-requisitos:**
- PHP 8.0 ou superior

**Clone o repositório:**
```bash
git clone https://github.com/seu-usuario/rpg-battle-terminal.git
cd rpg-battle-terminal
```

**Execute o jogo:**
```bash
php index.php
```

---

## 🎮 Como Jogar

1. Execute `php index.php` no terminal
2. **Jogador 1** digite seu nome e depois escolha seu personagem digitando o número correspondente
3. **Jogador 2** digite seu nome e depois escolha seu personagem digitando o número correspondente
4. A batalha começa! A cada turno o jogador pode:
   - `[1]` Atacar normalmente
   - `[2]` Usar Habilidade 1
   - `[3]` Usar Habilidade 2
5. Os turnos se alternam até um dos jogadores chegar a 0 HP

---

## 📁 Estrutura do Projeto

```
rpg-battle-terminal/
│
├── index.php                  # Ponto de entrada, seleção de personagens
│
├── battle_system/
│   └── battle.php             # Lógica de batalha por turnos
│
├── characters/
│   ├── default.php            # Classe base abstrata
│   ├── Guerreira.php            
│   ├── mago.php               
│   ├── Arqueiro.php             
│   └── Feiticeiro.php           
│
├── dice.php                   # Sistema de dados D&D
└── README.md
```

---

## 🎲 Sistema de Combate

O combate segue as regras básicas do D&D:

**Rolagem de ataque:**
```
1d20 + bônus de ataque  vs  Classe de Armadura (CA) do inimigo
```

**Dano:**
```
dado de dano (ex: 1d12) + bônus de dano
```

**Acerto Crítico (natural 20):**
```
dobra os dados de dano → 2d12 + bônus de dano
```

**PM (Pontos de Magia):**
- Necessário para usar habilidades especiais
- Cada habilidade tem um custo em PM
- Sem PM suficiente a habilidade não pode ser usada

---

## 🛠️ Tecnologias

- **PHP 8.0+**
- **Terminal / CLI**
- **Códigos ANSI** para cores no terminal
---

---

<p align="center">Feito com ⚔️ e 🎲</p>
