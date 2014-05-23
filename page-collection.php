<?php
/*
Template Name: Collection
*/
?>
<?php get_header(); ?>

<?php $loop = new WP_Query( array( 'post_type' => 'collection', 'posts_per_page' => -1 ) ); ?>
<section class="main content horizontal overflow">
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<div class="product">
  <div class="image-container">
    <?php 
      // $custom_image = $post_meta_data['custom_image_front'][0];
      // echo wp_get_attachment_image($custom_image, 'thumbnail');
      $front = wp_get_attachment_image_src(get_post_meta(get_the_ID(), 'custom_image_front', true), 'full');
      $rear = wp_get_attachment_image_src(get_post_meta(get_the_ID(), 'custom_image_rear', true), 'full');
      $size = get_post_meta(get_the_ID(), 'custom_size', true);
      $color = get_post_meta(get_the_ID(), 'custom_color', true);
      $model = get_post_meta(get_the_ID(), 'custom_model', true);
      $other = get_post_meta(get_the_ID(), 'custom_other', true);
    ?>
    <img class="front" src="<?php echo $front[0]; ?>" alt="Salco Product Front">
    <img class="rear" src="<?php echo $rear[0]; ?>" alt="Salco Product Rear">
  </div>
  <div class="details">
    <h1><?php the_title(); ?></h1>
    <ul>
      <li><strong>Size:</strong> <p><?php echo $size; ?></p></li>
      <li><strong>Color:</strong> <p><?php echo $color; ?></p></li>
      <li><strong>Model:</strong> <p><?php echo $model; ?></p></li>
      <li><strong>Other:</strong> <p><?php echo $other; ?></p></li>
    </ul>
  </div>
</div>
<?php endwhile; wp_reset_query(); ?>
</section>

<?php get_footer(); ?>
