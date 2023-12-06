<?php 
$comunicados = Array();
$existeComunicado = false;

foreach ( $fields as $key => $value ) {
    if ( substr( $key, 0, 10 ) === 'comunicado' && trim($fields[$key]['ativado']) === '1' ) {
        $existeComunicado = true;
        array_push( $comunicados, $fields[$key]);
    }
}

if ( $existeComunicado ) { ?>
    <div class="section-title">
        <h2 class="sub-title-home">Comunicados</h2>
        <div class="linha">
            <span class="decoracao"></span>
        </div>
    </div>
    <article id="comunicados" class="comunicados">
        <div id="appComunicados">
        </div>
    </article>
<?php }

$host = $_SERVER['HTTP_HOST'];
if ($host !== 'localhost') {
  wp_enqueue_script( 'vue-app', '/wp-content/themes/generatepress/assets/js/main.js' );
  wp_enqueue_style( 'vue-app', '/wp-content/themes/generatepress/assets/css/main.css' );
} else { ?>
  <script type="module" src="http://localhost:5173/@vite/client"></script>
<?php }
