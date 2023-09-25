<!-- 
    This is a general page template which will serve all pages that are in our website
    From Wordpress Dashboard if we create a new page it will automatically set headers, get the title and posts for that pages and in the end a footer.
 -->

<?php get_header(); ?> 

<div class="container pt-5 pb-5">
    <h1><?php the_title(); ?></h1>

    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>
        <?php the_content(); ?>    <?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>