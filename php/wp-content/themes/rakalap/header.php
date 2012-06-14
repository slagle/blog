<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"  />
<title><?php if (is_home () ) { bloginfo('name'); echo " - "; bloginfo('description'); 
} elseif (is_category() ) {single_cat_title(); echo " - "; bloginfo('name');
} elseif (is_single() || is_page() ) {single_post_title(); echo " - "; bloginfo('name');
} elseif (is_search() ) {bloginfo('name'); echo " search results: "; echo wp_specialchars($s);
} else { wp_title('',true); }?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta name="robots" content="follow, all" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
<!--[if lte IE 7]><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/ie6.css" /><![endif]-->
<script type="text/javascript"><!--//--><![CDATA[//><!--
sfHover = function() {
	if (!document.getElementsByTagName) return false;
	var sfEls = document.getElementById("nav").getElementsByTagName("li");

	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}

}
if (window.attachEvent) window.attachEvent("onload", sfHover);
//--><!]]></script>
</head>

<body>
<div id="top"></div>
<div id="wraper">
<div id="header">
	<div id="logo"><h1><a href="<?php echo get_option('home'); ?>"><?php bloginfo('name'); ?></a><h1>
		<span><?php bloginfo('description'); ?></span>
	</div>
	<div id="toprss">
	<a href="feed:<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/rss3.png" alt="Rss Feed" title="Rss Feed" width="60" height="60" /></a>
	</div>
	<div id="search">
		<form method="get" id="searchform" action="<?php bloginfo('url'); ?>" />
		<p>
		<input type="text" value="Search...." name="s" id="searchbox" onfocus="this.value=''" onBlur="this.value='Search....'"/>
		<input type="image" src="<?php bloginfo('template_url'); ?>/images/search.png" width="30" height="30" alt="search" class="submitbutton" title="search" />
		</p>
		</form>
	</div>
</div>
<div id="navbar">
	<div class="navbar">
		<ul id="nav">
			<li><a href="<?php echo get_option('home'); ?>">Home</a></li>
			<?php wp_list_pages('title_li=&depth=4&sort_column=menu_order'); ?>
		</ul>
	</div>
</div>
<div id="barmenu">
<div id="media">
	<ul>
	
	<?php
	if (get_option('twitid')) {
	?>
		<li><a href="http://twitter.com/<?php echo get_option('twitid'); ?>" alt='follow me on the twitter' title='follow me on the twitter'><img src="<?php bloginfo('template_url'); ?>/images/twitter.png" height='40' /></a></li>
	
	<?php
		} else {
		echo "";
		}
	?>
	<?php 
	if (get_option('fbid')) {
	?>
		<li><a href="<?php echo get_option('fbid'); ?>" alt='My profile on Facebook' title='My profile on Facebook'><img src='<?php bloginfo('template_url'); ?>/images/fb.png' height='40' /></a></li>
	<?php
	} else {
		echo "";
		}
	?>
	</ul>
</div>
</div>
<div class="cleared"></div>