<?php
/*
Template Name: Contatos
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();

$alfabeto = range('A', 'Z');

?>

<div id="carregando-conteudo" class="container-carregando">
    <div class="carregando-animacao" aria-label="Animação carregamento"></div>
    <div class="carregando-mensagem">Carregando o conteúdo...</div>
</div>

<div id="container-contatos" class="container-contatos hidden">
    <div class="form-contatos">
        <label>Nome:</label>
        <input type="text" id="pesquisa-nome" data-tipo="nome">
        <button type="button" id="botao-pesquisa-nome" class="botao-pesquisa-contatos" onclick="pesquisarContatos('nome')" disabled>Buscar</button>
        <label>Cargo:</label>
        <input type="text" id="pesquisa-cargo" data-tipo="cargo">
        <button type="button" id="botao-pesquisa-cargo" class="botao-pesquisa-contatos" onclick="pesquisarContatos('cargo')" disabled>Buscar</button>
        <label>Unidade:</label>
        <input type="text" id="pesquisa-departamento" data-tipo="departamento">
        <button type="button" id="botao-pesquisa-departamento" class="botao-pesquisa-contatos" onclick="pesquisarContatos('departamento')" disabled>Buscar</button>
    </div>
    <div class="alfabeto">
        <ul class="lista-alfabeto" id="lista-alfabeto">
            <?php
            foreach ($alfabeto as $key => $value) { ?>
                <li class="list"><button type="button" class="botao-alfabeto" onclick="filtroAlfabeto( '<?= $value ?>' )"><?= $value ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div id="carregando-contatos" class="container-carregando">
        <div class="carregando-animacao" aria-label="Animação carregamento"></div>
        <div class="carregando-mensagem">Carregando o conteúdo...</div>
    </div>
    <div id="container-lista-contatos" class="hidden">
        <div id="lista-de-contatos"></div>
        <div id="paginacao-contatos">
            <div></div>
            <div>
                <button class="botao-seta-contatos seta-dupla" type="button" onclick="mudarPagina(-999)"><?= iconeSVG( 'seta-primeiro.svg' ) ?></button>
                <button class="botao-seta-contatos" type="button" onclick="mudarPagina(-1)"><?= iconeSVG( 'seta-anterior.svg' ) ?></button>
                <button class="botao-proximo-contatos" type="button" onclick="mudarPagina(1)">Próxima Página</button>
                <button class="botao-seta-contatos seta-direita" type="button" onclick="mudarPagina(1)"><?= iconeSVG( 'seta-anterior.svg' ) ?></button>
                <button class="botao-seta-contatos seta-direita seta-dupla" type="button" onclick="mudarPagina(999)"><?= iconeSVG( 'seta-primeiro.svg' ) ?></button>
            </div>
            <div class="pagina-atual-contatos">Página <span id="pagina-atual-contatos">1</span></div>
        </div>
    </div>
</div>
