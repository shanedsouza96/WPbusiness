<?php get_header(); ?>
  <section class="row title-bar">
    <div class="container">
        <div class="col-md-12">
          <h1><?php echo __('Blog'); ?></h1>
      </div>
    </div>
  </section>

  <section class="row main">
    <div class="container">
      <?php if(is_active_sidebar('sidebar')) : ?>
        <div class="col-md-8">
      <?php else : ?>
        <div class="col-md-12">
      <?php endif; ?>
        <?php if(have_posts()) : ?>
          <?php while(have_posts()) : the_post(); ?>
            <article class="post">
              <div class="col-md-5">
                <div class="post-thumbnail">
                  <?php if(has_post_thumbnail()): ?>
                     <?php the_post_thumbnail(); ?>
                  <?php endif; ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-block">
                    <?php echo __('Read More'); ?>
                </a>
              </div>
              <div class="col-md-7">
              <h3 style="color:blue#d90000;"><?php the_title(); ?></h3>
              <ul class="meta">
                <li>By 
                  <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                      <?php the_author(); ?>
                    </a>
                </li>
                <li>At <?php the_time('F j, Y g:i a'); ?></li>
                <li>In 
                  <?php
                      $categories = get_the_category();
                      $separator = ", ";
                      $output = '';

                      if($categories){
                        foreach($categories as $category){
                          $output .= '<a href="'.get_category_link($category->term_id).'">'.$category->cat_name .'</a>'. $separator;
                          //$output .= $category->cat_name . $separator;

                        }
                      }
                      echo trim($output, $separator);
                    ?>
                </li>
              </ul>
                  <?php the_excerpt(); ?>
              </div>
            </article>
            <div class="clr"></div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <?php if(is_active_sidebar('sidebar')) : ?>
        <div class="col-md-4">
          <?php dynamic_sidebar('sidebar'); ?>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <?php if(is_active_sidebar('content-region-1')) : ?>
      <?php dynamic_sidebar('content-region-1'); ?>
    <?php endif; ?>

    <?php if(is_active_sidebar('content-region-2')) : ?>
      <?php dynamic_sidebar('content-region-2'); ?>
    <?php endif; ?>

<?php get_footer(); ?>
