<?php

$numPosts = 1;
$idCatMidia = get_category_by_slug('smul-na-midia')->term_id;
$postsMidia = wp_get_recent_posts( array( 'numberposts' => $numPosts, 'category' => $idCatMidia ) );

?>

<section id="smul-na-midia">

<div class="section-title">
    <h2 class="sub-title-home">SMUL na Mídia</h2>
    <div class="linha">
    </div>
</div>

<?php

foreach ( $postsMidia as $index => $value ) {
    $postId = $postsMidia[$index]['ID'];
    $postExcerpt = wp_trim_words( $postsMidia[$index]['post_content'], 100, '...' );
    $postTitle = $postsMidia[$index]['post_title'];
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
        <a href="<?= get_category_link($idCatMidia) ?>" class="button-home">Ver Mais</a>
    </div>
    
</section>
