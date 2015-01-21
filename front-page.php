<?php 
/* @package WordPress @subpackage FoundationPress @since FoundationPress NUSCru 1.0 */
  get_header( 'home' ); ?>
<?php while (have_posts()) : the_post(); ?>
<article <?php post_class() ?>id="post-
  <?php the_ID(); ?>">
  <?php do_action( 'foundationPress_page_before_entry_content'); ?>

    <?php the_content(); ?>

  <footer>
    <?php wp_link_pages(array( 'before'=>'
    <nav id="page-nav">
      <p>' . __('Pages:', 'FoundationPress'), 'after' => '</p>
    </nav>' )); ?>
    <p>
      <?php the_tags(); ?>
    </p>
  </footer>
  <?php do_action( 'foundationPress_page_before_comments'); ?>
  <?php comments_template(); ?>
  <?php do_action( 'foundationPress_page_after_comments'); ?>
</article>
<?php endwhile;?>

<?php do_action( 'foundationPress_after_content'); ?>

<div class="entry-content">
  <div class="small-12 medium-8 large-8 columns feature-image-post">

    <?php do_action( 'foundationPress_before_content'); ?>

    <?php query_posts(array( 'post__in'=>get_option('sticky_posts'))); if (have_posts()) : while (have_posts()) : the_post();?>
        <div class="entry-content">
          <?php the_post_thumbnail(); ?>
          <p><a href="<?php echo get_permalink(); ?>">Read More</a>
          </p>
        </div>

    <?php endwhile; else: endif; wp_reset_query(); ?>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
