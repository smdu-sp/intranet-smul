<?php
?>
<div class="tetses">
    <div class="container-search">
        <div id="divBusca">
            <input type="text" id="txtBusca" placeholder="O que deseja Buscar?" />
            <input class="button" type="submit" src="C:\xampp\htdocs\git\intranet-smul-main\intranet-smul\wp-content\themes\generatepress\assets\img\barra-pesquisa-icone.svg">
        </div>
    </div>
</div>


<style>
    .tetses {
        display: flex;
        justify-content: center;
        
    
    }

    .container-search {
        padding: 10px;
        display: flex;
        justify-content: center;
        width: 1400px;
    }

    #divBusca {
        display: flex;
        min-width: 1200px;
    }   

    .button {
        text-align: inline;
        float: right;
        position: sticky;
        border-radius: 5px;
        border: 1px solid #E3E3E3;
        background: #F5F5F5;
        width: 200px;
        margin-left: -7px;
    }

    #txtBusca {
        width: 100%;
        height: 61px;
    }

    .lupa {
        width: 0%;
    }

    @media only screen and (max-width: 1210px) {
        #divBusca {
            min-width: 90%;
        }
    }
</style>