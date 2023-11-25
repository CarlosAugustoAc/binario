<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor Binário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        //Capturando os daos do formulário
        $n = $_GET['n'] ?? 0;
    ?>

    <div class="container">
        <header>
        <h1><em>Conversor <span>Binário</span></em> </h1>
            <div id="select" >   
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">            
                    <ul id="fechar">
                        <li onclick="encerrar()"  name="op1">Hexadecimal</li>
                        <li onclick="encerrar()">Binário</li>
                        <li onclick="encerrar()">Octal</li>   
                        <a href="historico.php"><li onclick="encerrar()">Histórico</li></a>             
                    </ul>
                </form>
                    <img src="img/baixo.png" id="op" onclick="op()">
            </div>
        </header>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get" id="form">
            <label for="n">Decimal</label>
            <br>
            <input type="number" name="n" value="<?=$n?>">
            <input type="submit" value="Converter">
        </form>
        <div class="resultado">
        <?php
            $r = base_convert($n, 10, 2);
            echo "<h2>Binário</h2>"; 
            echo "<h4>$r</h4>"; 
         ?>
        <h2>Representação Gráfica</h2>
        <div class="grafico">
            <?php
           

            if($n == 0) {
                echo "<h5 class='red'>Não há representações gráficas</h5>";
            }


        $base_binario = 2;
        $base_octal = 8;
        $base_hexadecimal = 16;
        $base_decimal = 10;
             
            $matriz = [
                [50],
                [50]
            ];
            $result = array();
            $divisor = array();
            $cont = 0;
            $soma = 0;
            $parada  = 0;
            /////////////////
            $base = 2;
            while ($n>=1) {
                $divisor[$soma] = $n;
                $result[$soma] = $n%2;
                $n= intdiv($n,2);
                $soma++;
                $parada++;
            }       
            ///////////////
            for ($l = 0; $l < $parada; $l++) {
                for ($c = 0; $c < $parada; $c++) {
                    if ($l == $c) {
                        $matriz[$l][$c] = 1;
                    }
                    else if ($c - $l == 1) {
                        $matriz[$l][$c] = 2;
                    }
                    else if ($l - $c == 1) {
                        $matriz[$l][$c] = 3;
                    }
                    else {
                        $matriz[$l][$c] = 0;
                    }
                } 
                $cont++;               
            }
            $avanco = 0;
            $avanco2 = 0;
            for ($l = 0; $l < $cont; $l++) {
                echo "<table>  <tr>";
                for ($c = 0; $c < $cont; $c++) {
                    if ($l == $c) {
                        //echo "<td>".$matriz[$l][$c]."</td>";
                        echo "<td>".$divisor[$avanco]."</td>";
                        $avanco++;
                    }
                    else if ($c - $l == 1) {
                        echo "<td id='borda'>".$matriz[$l][$c]."</td>";
                    }
                    else if ($l - $c == 1) {
                        //echo "<td id='vermelho'>".$matriz[$l][$c]."</td>";
                        echo "<td id='result'>".$result[$avanco2]."</td>";
                        $avanco2++;
                    }
                    else {
                        echo "<td id='nulo'></td>";
                    }
                }
                echo "</tr> </table>";
            }
            ?>
        </div>
        </div>
    </div>


    <script>
        var movimento = document.querySelector('#op')
        var fechar = document.querySelector('#fechar')
        movimento.style.transform = 'rotate(0deg)'
        function op(){
            if(movimento.style.transform == 'rotate(0deg)') {
                movimento.style.transform = 'rotate(180deg)'
                fechar.style.height = '100%'
                fechar.style.padding = '10px'
                fechar.style.paddingRight = '50px';
            }
            else {
                movimento.style.transform = 'rotate(0deg)'
                fechar.style.height = '0'
                fechar.style.padding = '0'
            }
        }
        function encerrar() {
            movimento.style.transform = 'rotate(0deg)'
            fechar.style.height = '0'
            fechar.style.padding = '0'
            
        }

    </script>
</body>
</html>