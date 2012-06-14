<?php get_header(); ?>

<div id="main">
<div class="mainright">
	<div class="tl"><div class="c"></div></div>
	<div class="midl">
	<div class="c">
	<div id="maincontent">

	<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="topPost">
  <h2 class="topTitle"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
  <div class="topContent"><?php the_content('(continue reading...)'); ?></div>
  <div id="batas"></div>
<div class="cleared"></div>
</div> <!-- Closes topPost -->

<?php endwhile; ?>

<?php else : ?>

<div class="topPost">
  <h2 class="topTitle"><a href="<?php the_permalink() ?>">Not Found</a></h2>
  <div class="topContent"><p>Sorry, but you are looking for something that isn't here. You can search again by using <a href="#searchform">this form</a>...</p></div>
</div> <!-- Closes topPost -->

<?php endif; ?>

	</div>
	</div>
	</div>
	<div class="botl"><div class="c"></div></div>
</div><!-- Closes Main left-->

<?php get_sidebar(); ?>
<div class="cleared"></div>

</div><!-- Closes Main -->
</div>

<?php get_footer(); ?>