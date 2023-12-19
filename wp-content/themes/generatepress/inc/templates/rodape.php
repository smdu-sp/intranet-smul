<footer>
    <div id="text_voltar_topo">
        <a onclick="scrolldiv('masthead')" class="text_back"><span>Voltar ao topo</span></a>
    </div>
    <div class="conteiner-footer" id="footer">
        <div class="container-cont">
            <div class="img-footer">
                <img src="/wp-content/themes/generatepress/assets/img/rodape-logo-smul.png" alt="imagem prefeitura">
            </div>
            <div class="informacoes-prefeitura">
                <h2 class="sub-title-footer">Secretaria Municipal de<br>Urbanismo e Licenciamento</h3>
                    <p class="text-footer">Rua São Bento, 405, Centro - 8º, 17º, 18º, 19°, 20°, 21°<br>e 22° andar CEP 01011-100 - São Paulo - SP </p>
                    <p class="text-footer">Em caso de dúvidas e sugestões, entre em contato pelo email:<br><b><a href="mailto:smulsuporte@prefeitura.sp.gov.br" class="email-footer">smulsuporte@prefeitura.sp.gov.br</a></b></p>
            </div>
            <div class="barra-footer">
            </div>
            <div class="links">
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
                <div class="menu-sistemas">
                    <h2 class="sub-title-footer">Sistemas</h2>
                    <ul>
                            <li class="lista-sistemas-footer"><a target="_blank" href="https://portal.sei.sp.gov.br/" class="direct-link-footer" rel="noopener">SEI!</a></li>
                            <li class="lista-sistemas-footer"><a target="_blank" href="https://www.prefeitura.sp.gov.br/cidade/secretarias/licenciamento/servicos/index.php?p=6584" class="direct-link-footer" rel="noopener">CEDI</a></li>
                            <li class="lista-sistemas-footer"><a target="_blank" href="https://www.prefeitura.sp.gov.br/cidade/secretarias/licenciamento/noticias/?p=335562" class="direct-link-footer" rel="noopener">SISPEUC</a></li>
                            <li class="lista-sistemas-footer"><a target="_blank" href="" class="direct-link-footer" rel="noopener">SELSISA</a></li>
                            <li class="lista-sistemas-footer"><a target="_blank" href="https://simproc.prefeitura.sp.gov.br/Forms/login.aspx" class="direct-link-footer" rel="noopener">SIMPROC WEB</a></li>
                            <li class="lista-sistemas-footer"><a target="_blank" href="http://sj0934.prodam/SJ0934/servlet/LOGIN" class="direct-link-footer" rel="noopener">SIMPROC (Antigo)</a></li>
                            <li class="lista-sistemas-footer"><a target="_blank" href="https://simproc.prefeitura.sp.gov.br/Forms/login.aspx" class="direct-link-footer" rel="noopener">SIMPROC SERVIÇOS</a></li>
                            <li class="lista-sistemas-footer"><a target="_blank" href="http://consultasiszon.prefeitura.sp.gov.br/FormsRestrict/frmConsultaSQCL.aspx" class="direct-link-footer" rel="noopener">SISZON</a></li>
                            <li class="lista-sistemas-footer"><a target="_blank" href="https://www3.prefeitura.sp.gov.br/deolhonaobra/Forms/frmConsultaSlc.aspx" class="direct-link-footer" rel="noopener">De Olho na Obra</a></li>
                            <li class="lista-sistemas-footer"><a target="_blank" href="https://www.prefeitura.sp.gov.br/cidade/secretarias/fazenda/contaspublicas/index.php?p=27857" class="direct-link-footer" rel="noopener">Bens Patrimoniais</a></li>
                            <li class="lista-sistemas-footer"><a target="_blank" href="https://geosampa.prefeitura.sp.gov.br/" class="direct-link-footer" rel="noopener">GeoSampa</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>