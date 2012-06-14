<div id="bottom">
<div id="mfoot">

<div id="morefoot">

<div class="col1">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_left') ) : ?>
<h3>This is RAKALAP themes</h3>
<p>I hope you like it :)</p>
<p>You can change this widget in your themes option. </p>
<?php endif; ?>
</div>

<div class="col2">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_middle') ) : ?>
<h3>Visit our friends!</h3>
<ul><?php wp_list_bookmarks('title_li=&categorize=0'); ?></ul>
<?php endif; ?>
</div>

<div class="col3">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_right') ) : ?>
<h3>Archives</h3>
<ul><?php wp_get_archives('type=monthly&limit=12'); ?> </ul>
<?php endif; ?>
</div>

<div class="cleared"></div>
</div><!-- Closes morefoot -->

<div id="footer">
<div id="footerleft">
<p>Powered by <a href="http://www.wordpress.org/">WordPress</a>. <b>Rakalap Ver.1.1.0</b> Design by <a href="http://scriptutorial.co.cc/category/free-wp-themes">atsiruddin</a>. <a href="#top">Back to top &uarr;</a></p>
<!-- I Hope You Enjoy this theme! -->
</div>

<div id="footerright">
<a href="http://wordpress.org" title="WordPress platform" ><img src="<?php bloginfo('template_url'); ?>/images/logowp.png" alt="WordPress" width="34" height="34" /></a>
</div>
<div class="cleared"></div>
</div><!-- Closes footer -->
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>