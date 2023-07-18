<?php 

$fields = get_fields();

echo '<pre>';
print_r( $fields );
echo '</pre>';

$tituloACF = $fields['titulo'];
$imagemACF = $fields['imagem']['url'];
$subtituloACF = $fields['postagem']['titulo'];
$conteudoACF = $fields['postagem']['conteudo'];

?>
<section #id="secao-TIPO-NUM">
    <div class="inside-article">
        <h2><?= $tituloACF ?></h2>
        <a href="#">
            <div>
                <div style="background-color: #ddd;"><img src="<?= $imagemACF ?>" alt=""></div>
                <div>
                    <h3><?= $subtituloACF ?></h3>
                    <p><?= $conteudoACF ?></p>
                </div>
            </div>
        </a>
    </div>
    <!-- <h2>Papo Urbano</h2>
    <div>
        <div>
            <img src="" alt="">
        </div>
        <div>
            <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean pulvinar luctus metus, vitae rutrum neque consectetur quis. Aliquam posuere, augue a mollis faucibus, ligula dolor volutpat turpis, in suscipit est ex lobortis massa. Fusce commodo nunc, lacinia ultricies ex luctus. Nunc in pellentesque urna. Vestibulum at ultricies orci, eget euismod orci. </p>
        </div>
    </div> -->
</section>