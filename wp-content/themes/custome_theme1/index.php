<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header>
        <h1><?php bloginfo('name'); ?></h1>
    </header>

    <main>

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <article>
                    <h2><?php the_title(); ?></h2>

                    <?php the_content(); ?>
                </article>

            <?php endwhile; ?>

        <?php else : ?>

            <p>No posts found.</p>

        <?php endif; ?>

    </main>

    <footer>
        <p>© <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>
