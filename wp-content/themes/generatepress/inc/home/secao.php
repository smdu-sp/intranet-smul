<?php 

$arraySecao =  $fields[$key];

$titulo = $arraySecao['titulo'];
$urlImagem = $arraySecao['imagem']['url'];
$subtitulo = $arraySecao['subtitulo'];
$conteudo = $arraySecao['texto'];
$url = $arraySecao['url'];
$tipoSecao = $arraySecao['tipo_de_secao'];

if ( ! array_key_exists( $tipoSecao, $countSecoes ) )
{
    $countSecoes[$tipoSecao] = 0;
}

$countSecoes[$tipoSecao]++;

?>
<section #id="secao-<?= "{$tipoSecao}-{$countSecoes[$tipoSecao]}" ?>">
    <div class="inside-article">
        <h2><?= $titulo ?></h2>
        <a href="<?= $url ?>">
            <div>
                <div style="background-color: #ddd;"><img src="<?= $urlImagem ?>" alt=""></div>
                <div>
                    <h3><?= $subtitulo ?></h3>
                    <p><?= $conteudo ?></p>
                </div>
            </div>
        </a>
    </div>
</section>