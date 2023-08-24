<body>
    <footer>
        <div id="text_voltar_topo">
            <a onclick="scrolldiv('masthead')" class="text_back"><span>Voltar ao topo</span></a>
        </div>
        <div class="conteiner-footer" id="footer">
            <div class="container-cont">
                <div class="img-footer">
                    <img src="wp-content\themes\generatepress\assets\img\rodape-logo-smul.png" alt="imagem prefeitura">
                </div>
                <div class="informações-prefeitura">
                    <h2 class="sub-title-footer">Secretaria Municipal de<br>Urbanismo e Licenciamento</h3>
                    <p class="text-footer">Rua São Bento, 405, Centro - 8º, 17º, 18º, 19°, 20°, 21°<br>e 22° andar CEP 01011-100 - São Paulo - SP </p>
                    <p class="text-footer">Em caso de dúvidas e sugestões, entre em contato pelo email:<br><b><a href="mailto:smulsuporte@prefeitura.sp.gov.br" class="email-footer">smulsuporte@prefeitura.sp.gov.br</a></b></p>
                </div>
                <div class="barra-footer">
                </div>
                <div class="menu-footer">
                    <h2 class="sub-title-footer">Institucional </h3>
                    <ul class="lista">
                        <li class="lista-nav"><a href="#" target="_blank" rel="noopener noreferrer">Acesso Rápido</a></li>
                        <li class="lista-nav"><a href="#" target="_blank" rel="noopener noreferrer">Ouvidoria</a></li>
                        <li class="lista-nav"><a href="#" target="_blank" rel="noopener noreferrer">Transparência</a></li>
                        <li class="lista-nav"><a href="#" target="_blank" rel="noopener noreferrer">Manuais</a></li>
                        <li class="lista-nav"><a href="#" target="_blank" rel="noopener noreferrer">Servidores</a></li>
                        <li class="lista-nav"><a href="#" target="_blank" rel="noopener noreferrer">Outras secretarias</a></li>
                        <li class="lista-nav"><a href="#" target="_blank" rel="noopener noreferrer">Guia de boas práticas</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>

<style>

    #text_voltar_topo{
        display: flex;
        justify-content: right;
    }

    .text_back{
        margin-right: 90px;
        margin-bottom: 30px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        color: #0A3299;
        border-bottom: 1px solid #0A3299;
    }
    .text_back:hover{
        color: #0A3299;
    }

    .lista{
        margin: 0;
        padding: 0;
    }
 
    .conteiner-footer{
        background-color: #333333;
        width: 100%;
        display: flex;
        justify-content: center;        
    }

    .container-cont{
        display: flex;
        justify-content: left;
        min-width: 1200px;
        padding: 30px 0;
    }

    .sub-title-footer{
        color: #FFFFFF;
        font-size: 1.1em;
        font-weight: bold;
        font-weight: 700;
        margin-bottom: 10px;
        letter-spacing: 1px;
    }

    .barra-footer{
        width: 5px;
        height: 190px;
        background-color: white;
    }

    .menu-footer{
        margin-left: 3%;
    }

    .lista-nav{
        list-style: none;
        font-size: 14px;
        padding: 0;
        margin: 0;
    }

    .lista-nav a{
        color: rgb(250, 250, 250, 0.8);
    }

    .text-footer{
        font-size: 14px;
        color: rgb(250, 250, 250, 0.8);
    }

    .informações-prefeitura{
        margin: 0 60px 0 10px;
    }

    .email-footer{
        color: rgb(250, 250, 250, 0.8);
        letter-spacing: 0.5px;
    }

    a:hover{
        color: rgb(250, 250, 250);
    }

</style>