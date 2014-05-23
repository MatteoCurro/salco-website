<?php
/*
Template Name: Columns
*/
?>
<?php get_header(); ?>

<?php /* $attachments = new Attachments( 'attachments' );  ?>
<?php if( $attachments->exist() ) : ?>
  <h3>Attachments</h3>
  <p>Total Attachments: <?php echo $attachments->total(); ?></p>
  <ul>
    <?php while( $attachments->get() ) : ?>
      <li>
        ID: <?php echo $attachments->id(); ?><br />
        Type: <?php echo $attachments->type(); ?><br />
        Subtype: <?php echo $attachments->subtype(); ?><br />
        URL: <?php echo $attachments->url(); ?><br />
        Image: <?php echo $attachments->image( 'thumbnail' ); ?><br />
        Source: <?php echo $attachments->src( 'full' ); ?><br />
        Size: <?php echo $attachments->filesize(); ?><br />
        Title Field: <?php echo $attachments->field( 'title' ); ?><br />
        Caption Field: <?php echo $attachments->field( 'caption' ); ?>
      </li>
    <?php endwhile; ?>
  </ul>
<?php endif; */ ?>

<section class="main content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article>
	<h1><?php the_title(); ?></h1>
	<div class="text-content columns">
	<?php the_content(); ?>
	</div>
	</article>
	<?php endwhile; endif; ?>
</section>
<?php $attachments = new Attachments( 'attachments' ); /* pass the instance name */ ?>
<?php if( $attachments->exist() ) : ?>
	<?php while( $attachments->get() ) : ?>
		<div class="bg-image" style="background-image: url('<?php echo $attachments->src( 'full' ); ?>');">
		</div>
	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
