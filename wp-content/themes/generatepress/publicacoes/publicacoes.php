<?php

/**
 * Notícias
 */

function getPublicacoes() {
    global $wpdb;
    $where = "1 = 1";
    $sql =  <<<SQL
                SELECT * FROM publicacoes
                WHERE {$where}
                ORDER BY id DESC;
            SQL;
    $resultado = $wpdb->get_results($sql, OBJECT);
    
    return $resultado;
}

$queryPublicacoes = getPublicacoes();
echo print_r($queryPublicacoes);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_POST = json_decode(file_get_contents("php://input"), true);
    $dados = [];

    foreach($_POST as $chave => $valor) {      
      if (trim($valor) === '') {
        $valor = '';
      }

      $dados[$chave] = $valor;
    }

    global $wpdb;
    $wpdb->insert('publicacoes', $dados);

    return;
}

if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    $_POST = json_decode(file_get_contents("php://input"), true);
    $id = $_POST['id'];
    foreach($_POST as $chave => $valor) {
      if ($chave === 'id') {
        continue;
      }
  
      if (trim($valor) === '') {
        $valor = '';
      }
      
      $wpdb->update('publicacoes', array($chave => $valor), array('id' => $id));
    }

    return;
}

if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $_POST = json_decode(file_get_contents("php://input"), true);
    $id = $_POST['id'];
    $wpdb->delete('publicacoes', array('id' => $id));
    return;
}