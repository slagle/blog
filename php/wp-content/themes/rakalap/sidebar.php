<div id="sidebars">

<div id="sidebar_full">
<ul>

 <li>
<?php include (TEMPLATEPATH . '/welcome.php'); ?>
 </li>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_full') ) : ?>

 <li>
 <div class="sidebarbox">
 <h2>Recent Posts</h2>
 <ul>
  <?php wp_get_archives('type=postbypost&limit=10'); ?>
 </ul>
 </div>
 </li>

 <li>
 <div class="sidebarbox">
 <h2>Browse by tags</h2>
 <?php wp_tag_cloud('smallest=8&largest=17&number=30'); ?>
 </div>
 </li>

<?php endif; ?>

</ul>
</div><!-- Closes Sidebar_full -->
<div class="cleared"></div>
</div> <!-- Closes Sidebars -->