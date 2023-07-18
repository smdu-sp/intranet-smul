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
        <div class="inside-article">
            <h3><?= $postTitle ?></h3>
            <p><?= $postExcerpt ?></p>
        </div>
        </article>
    </a>

<?php
}
?>

    <a href="<?= get_post_permalink($postsPageId) ?>">Ver Mais</a>
</section>
