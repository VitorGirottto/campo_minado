<?php

$tabuleiroSize = 5; //tamanho do tabuleiro
$numMinas = 5; //número de minas

function iniciarTabuleiro($tabuleiroSize, $numMinas) {
    $tabuleiro = array();
    
    for ($i = 0; $i < $tabuleiroSize; $i++) {
        for ($j = 0; $j < $tabuleiroSize; $j++) {
            $tabuleiro[$i][$j] = ['mina' => false, 'aberto' => false, 'minasVizinhas' => 0];
        }
    }

    $minasColocadas = 0;
    while ($minasColocadas < $numMinas) {
        $i = rand(0, $tabuleiroSize - 1);
        $j = rand(0, $tabuleiroSize - 1);
        if (!$tabuleiro[$i][$j]['mina']) {
            $tabuleiro[$i][$j]['mina'] = true;
            $minasColocadas++;
        }
    }

    for ($i = 0; $i < $tabuleiroSize; $i++) {
        for ($j = 0; $j < $tabuleiroSize; $j++) {
            if ($tabuleiro[$i][$j]['mina']) {
                for ($di = -1; $di <= 1; $di++) {
                    for ($dj = -1; $dj <= 1; $dj++) {
                        $ni = $i + $di;
                        $nj = $j + $dj;
                        if ($ni >= 0 && $ni < $tabuleiroSize && $nj >= 0 && $nj < $tabuleiroSize) {
                            $tabuleiro[$ni][$nj]['minasVizinhas']++;
                        }
                    }
                }
            }
        }
    }

    return $tabuleiro;
}

function exibirTabuleiro($tabuleiro) {
    foreach ($tabuleiro as $linha) {
        foreach ($linha as $celula) {
            if ($celula['aberto']) {
                echo $celula['mina'] ? 'X' : $celula['minasVizinhas'];
            } else {
                echo '?';
            }
            echo ' ';
        }
        echo "\n";
    }
}

function abrirCelula(&$tabuleiro, $x, $y) {
    if ($tabuleiro[$x][$y]['aberto']) {
        return false;
    }

    $tabuleiro[$x][$y]['aberto'] = true;

    if ($tabuleiro[$x][$y]['mina']) {
        return 'fim';
    }

    if ($tabuleiro[$x][$y]['minasVizinhas'] == 0) {
        for ($di = -1; $di <= 1; $di++) {
            for ($dj = -1; $dj <= 1; $dj++) {
                $ni = $x + $di;
                $nj = $y + $dj;
                if ($ni >= 0 && $ni < count($tabuleiro) && $nj >= 0 && $nj < count($tabuleiro[0])) {
                    abrirCelula($tabuleiro, $ni, $nj);
                }
            }
        }
    }

    return true;
}

function verificarVitoria($tabuleiro) {
    foreach ($tabuleiro as $linha) {
        foreach ($linha as $celula) {
            if (!$celula['aberto'] && !$celula['mina']) {
                return false;
            }
        }
    }
    return true;
}

function jogarCampoMinado($tabuleiroSize, $numMinas) {
    $tabuleiro = iniciarTabuleiro($tabuleiroSize, $numMinas);

    $jogoAtivo = true;
    while ($jogoAtivo) {
        echo "Tabuleiro:\n";
        exibirTabuleiro($tabuleiro);

        echo "\nDigite as coordenadas (x,y) para abrir (0 a ".($tabuleiroSize-1)."): ";
        $input = trim(fgets(STDIN));
        list($x, $y) = explode(" ", $input); // Agora aceita espaço em vez de vírgula

        if ($x >= 0 && $x < $tabuleiroSize && $y >= 0 && $y < $tabuleiroSize) {
            $resultado = abrirCelula($tabuleiro, $x, $y);
            if ($resultado === 'fim') {
                echo "Você perdeu! Uma mina explodiu!\n";
                break;
            }

            // Verifica se o jogador venceu
            if (verificarVitoria($tabuleiro)) {
                echo "Parabéns! Você venceu!\n";
                break;
            }
        } else {
            echo "Coordenadas inválidas! Tente novamente.\n";
        }
    }
}

jogarCampoMinado($tabuleiroSize, $numMinas);

?>
