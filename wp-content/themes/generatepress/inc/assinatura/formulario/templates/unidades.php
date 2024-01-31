<?php
function getunidades(){

    include '../../conexoes/conexao.php';

    $sql = "SELECT unidades FROM unidades;";


    $resultado = $conn->query($sql);

    if ($resultado) {

        while ($linha = $resultado->fetch_assoc()) {
            echo '<option onclick="inserir_textoSelect()">' . $linha['unidades'] . '</option>';
        }
    }
}
?>
<script>
    function inserir_textoSelect() {
        var valores_unidade = document.getElementById("unidade").value;
        var campoSetor = document.getElementById("setor");
		campoSetor.innerText = valores_unidade + " / ";
    }
</script>