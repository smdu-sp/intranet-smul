<?php 

$itemsPorLinha = 6;

    if ($chave % $itemsPorLinha == 0) {
        $row = Array();
        
        for ($i = $chave; $i < $chave + $itemsPorLinha; $i++) { 
            if (array_key_exists($i, $publicacoes)) {
                array_push($row, $publicacoes[$i]);
            }
        }
 ?>
    <div class="row"><?php 
        foreach ($row as $publicacao) { 
            require "single.php";
        } ?>
    </div>
<?php
    }
    