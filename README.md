# Campo Minado (PHP)

Este projeto é uma implementação simples do jogo **Campo Minado** usando PHP. O jogo gera um tabuleiro de tamanho 5x5 e coloca 5 minas aleatoriamente. O objetivo é abrir todas as células sem detonar uma mina.

## Como jogar

1. **Objetivo**: O objetivo do jogo é abrir todas as células do tabuleiro sem encontrar uma mina. O jogo termina quando uma mina é aberta.
2. **Tabuleiro**: O tabuleiro é uma grade de 5x5 com 5 minas aleatórias espalhadas.
3. **Coordenadas**: O jogador deve informar as coordenadas `x,y` (de 0 a 4) para abrir a célula correspondente.
4. **Interação**: Quando uma célula é aberta:
    - Se for uma mina, o jogo termina e o jogador perde.
    - Se não for uma mina, o número exibido na célula indica a quantidade de minas nas células adjacentes.
    - Se a célula não tiver minas adjacentes, as células vizinhas são abertas automaticamente.
5. **Vitória**: O jogo é vencido quando todas as células sem mina são abertas.

## Como rodar o jogo
  
   Pode estar aceassando o link https://onlinegdb.com/n0L4M-0Uj para executar por la.

   Ou

1. Clone o repositório para sua máquina:

    ```bash
    git clone https://github.com/seu-usuario/campo-minado.git
    ```

2. Navegue até o diretório do projeto:

    ```bash
    cd campo-minado
    ```

3. Execute o script PHP:

    ```bash
    php jogo.php
    ```

    **Nota**: Certifique-se de ter o PHP instalado em sua máquina. Caso não tenha, você pode [baixar o PHP aqui](https://www.php.net/downloads.php).

## Explicação do código

O código implementa o jogo **Campo Minado** com as seguintes funcionalidades:

- **Função `iniciarTabuleiro($tabuleiroSize, $numMinas)`**:
    - Inicializa o tabuleiro com células vazias e aleatoriamente coloca as minas.
    - Calcula a quantidade de minas vizinhas para cada célula.

- **Função `exibirTabuleiro($tabuleiro)`**:
    - Exibe o estado atual do tabuleiro no terminal. Células abertas mostram o número de minas vizinhas ou uma "X" (se for mina), enquanto células fechadas mostram um `?`.

- **Função `abrirCelula(&$tabuleiro, $x, $y)`**:
    - Abre a célula nas coordenadas especificadas e verifica se a célula contém uma mina.
    - Se a célula não tiver minas adjacentes, ela automaticamente abre as células vizinhas.

- **Função `verificarVitoria($tabuleiro)`**:
    - Verifica se o jogador venceu, ou seja, se todas as células sem minas foram abertas.

- **Função `jogarCampoMinado($tabuleiroSize, $numMinas)`**:
    - Função principal que executa o jogo, mostrando o tabuleiro, solicitando as coordenadas ao jogador e verificando se ele venceu ou perdeu.

## Exemplo de execução

```bash
Tabuleiro:
? ? ? ? ? 
? ? ? ? ? 
? ? ? ? ? 
? ? ? ? ? 
? ? ? ? ? 

Digite as coordenadas (x,y) para abrir (0 a 4): 0 0
Tabuleiro:
? ? ? ? ? 
? ? ? ? ? 
? ? ? ? ? 
? ? ? ? ? 
? ? ? ? ? 

Digite as coordenadas (x,y) para abrir (0 a 4): 1 1
...
