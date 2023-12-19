<?php

$postId = url_to_postid( $url );
$post = get_post( $postId );
$postExcerpt = custom_trim_words( $post->post_content, 150, '...' );
$postTitle = $post->post_title;

?>

<div class="section-title">
    <h2 class="sub-title-home"><?= $titulo ?></h2>
    <div class="linha">
    </div>
</div>

<article id="post-<?= $postId ?>" class="post-<?= $postId ?>">
    <div class="inside-article article">
        <h3 class="sub-title"> <?= $postTitle ?></h3>
        <p class="text"><?= $postExcerpt ?></p>
    </div>
</article>
<div class="section-bnt">
    <a href="<?= $url ?>" class="button-home">Ver Mais</a>
</div>
