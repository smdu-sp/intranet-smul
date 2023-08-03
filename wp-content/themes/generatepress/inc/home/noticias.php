<?php

$posts = wp_get_recent_posts( array( 'numberposts' => 3 ) );

?>

<section id="ultimas-noticias">

<div class="section-title">
    <h2 class="sub-title-home">Últimas noticias</h2>
    <div class="linha">
    </div>
</div>

<?php

foreach ( $posts as $index => $value ) {
    $postId = $posts[$index]['ID'];
    $postExcerpt = wp_trim_words( $posts[$index]['post_content'], 100, '...' );
    $postTitle = $posts[$index]['post_title'];
    $postsPageId = get_option( 'page_for_posts' );
?>

<a href="<?= get_post_permalink($postId) ?>">
    <article id="post-<?= $postId ?>" class="post-<?= $postId ?>">
        <div class="inside-article article">
            <h3 class="sub-title"> <?= $postTitle ?></h3>
            <p class="text"><?= $postExcerpt ?></p>
        </div>
    </article>
</a>

<?php
}
?>
    <div class="section-bnt">
        <a href="<?= get_post_permalink($postsPageId) ?>" class="button-home mais-font menos-font">Ver Mais</a>
    </div>
    
</section>
