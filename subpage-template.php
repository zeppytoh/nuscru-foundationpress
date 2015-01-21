<?php
/*
Template Name: Page-template
*/
get_header(); ?>
		<?php do_action('foundationPress_before_content'); ?>

		<?php while (have_posts()) : the_post(); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<?php do_action('foundationPress_page_before_entry_content'); ?>
                <div class="sub-page">
                  <h1><?php the_title(); ?></h1>

                  <hr />
                  <div class="row">
                    <div class="entry-content">

                      <?php the_content(); ?>
                    </div>
                  </div>
                </div>
				<footer>
					<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'FoundationPress'), 'after' => '</p></nav>' )); ?>
					<p><?php the_tags(); ?></p>
				</footer>

			</article>
		<?php endwhile;?>

		<?php do_action('foundationPress_after_content'); ?>

<?php get_footer(); ?>
