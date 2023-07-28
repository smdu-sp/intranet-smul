<?php

$posts = wp_get_recent_posts( array( 'numberposts' => 3 ) );

?>

<section id="ultimas-noticias">
    <h2>Últimas notícias</h2>

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
            <h3 class="sub-title mais-font menos-font"> <?= $postTitle ?></h3>
            <p class="text mais-font menos-font"><?= $postExcerpt ?></p>
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
