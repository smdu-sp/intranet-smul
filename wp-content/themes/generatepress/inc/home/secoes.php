<?php
    $fields = get_fields();
    $countSecoes = Array();

    foreach ( $fields as $key => $value ) {
        if ( substr( $key, 0, 5 ) === 'secao' && trim($fields[$key]['ativado']) === '1') {
            include 'secao.php';            
        };
    }

?>

<style>
    .container-titulo {
        margin-bottom: 20px;
        display: block;
        position: relative;
    }

    .decoracao-titulo {
        display: block;
        content: "";
        border-bottom: 1px #0a3299 solid;
        width: 100%;
        position: absolute;
        bottom: 3px;
    }

    .titulo {
        margin-bottom: 0px;
        display: inline-block;
        border-bottom: 7px #0a3299 solid;
    }

    
</style>
