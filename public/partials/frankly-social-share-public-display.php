<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://frankly.dk
 * @since      1.0.0
 *
 * @package    Frankly_Social_Share
 * @subpackage Frankly_Social_Share/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="social-share">
    <ul>
        <li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" class="facebook" target="_blank" title="Del på Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href="http://twitter.com/share?text=<?php echo urlencode(the_title()); ?>&url=<?php echo urlencode(the_permalink()); ?>&via=twitter&related=<?php echo urlencode('Blog Name'); ?>" class="tweet" target="_blank" title="Del på Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title(); ?>&summary=&source=" class="linkedin" target="_blank" title="Del på Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
        <li><a href="mailto:?subject=<?php the_title(); ?>&body=Hej,%0AJeg tror du vil finde denne artikel interessant: <?php the_permalink();?>" class="emailicon" title="Del via email"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
    </ul>
</div>