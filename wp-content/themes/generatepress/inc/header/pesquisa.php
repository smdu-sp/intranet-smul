<?php
?>
<div class="grid-container">
    <div class="container-search">
        <div id="divBusca">
            <input type="text" class="buscaCampo" placeholder="O que deseja Buscar?" />
            <button class="button" type="submit"><img class="lupa"
                    src="wp-content\themes\generatepress\assets\img\barra-pesquisa-icone.svg"></button>

        </div>
    </div>
</div>
<style>
    .container-search {
        max-width: 1140px;
        height: 61px;
        border-radius:5px;
    }

    .buscaCampo {
        font-size: 14px;
        font-family: 'Open Sans' sans-serif;
        background-color: aqua;
        width: 980px;
        height: 61px;
        border-radius:10px;
    }

    #divBusca {
        width: 100%;
        display: flex;
        border-radius:5px;
    }

    .button {
        width: 152px;
        height: 61px;
        border:2px solid #E3E3E3;
        border-radius:5px;
    }
</style>