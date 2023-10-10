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
                <h2 class="sub-title-footer">Institucional</h2>
                <?php 
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer-menu',   
                            'container' => 'nav',   
                        )
                    );
                ?>
            </div>
        </div>
    </div>
</footer>
