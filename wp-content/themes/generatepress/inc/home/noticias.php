<?php

$posts = wp_get_recent_posts( array( 'numberposts' => 3 ) );

?>

<div>
    <h2>Últimas notícias</h2>

<?php

foreach ( $posts as $index => $value ) {
    $postId = $posts[$index]['ID'];
    $postExcerpt = wp_trim_words( $posts[$index]['post_content'], 100, '...' );
    $postTitle = $posts[$index]['post_title'];
?>

    <div>
        <h3><?= $postTitle ?></h3>
        <p><?= $postExcerpt ?></p>
    </div>

<?php
}
?>

    <button type="button">Ver Mais</button>
</div>
