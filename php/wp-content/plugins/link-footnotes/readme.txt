=== Link Footnotes ===
Contributors: RyanNutt
Tags: link, links, footnote, post
Requires at least: 2.7
Tested up to: 3.3.1
Stable tag: 0.1.7

Adds a footnotes section to your posts with any external links

== Description ==

Adds a section to the bottom of your pages and posts listing any external
links. 

Only links starting with http or https are included so ftp, mailto, etc
will not be included in the list; although it would be pretty trival to
edit the plugin to allow them to. Likewise any links that start with your
blog URL are also excluded.

For more information, you can visit <a href="http://www.nutt.net/tag/link-footnotes/">Nutt.net</a>

== Installation ==

1. Upload the `link-footnotes` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. It's on by default, so any posts and pages with external links will display footnotes once activated

= Options =
There are three options on the Settings -> Writing page.

**Default On**

Whether you want the footnotes to display by default or not. If cleared then
the links will not be displayed even if there are external links. You can force
the links to show even if it's turned off using meta fields (see below)

**Heading**

Text that you want to display above the list. By default this is &lt;h2&gt;Links&lt;/h2&gt;

**Link Target**
Anything in this field will be used as the target attribute in the links created for
footnotes. For example, if you'd like to have all of the footnote links open in a 
new window you would enter _blank into the Link Target field. 

Only the footnote links are affected. The links in the post itself are not touched.

= Meta Fields =
You can override the Default On setting by including either `lf_on` or `lf_off`
meta fields in your post or page. The value for either field doesn't matter. As
long as it's not blank then the meta tag will work.

Using `lf_on` will force the link list to show even if the default is not to show. `lf_off`
will force the list not to show overriding the default. 

== Frequently Asked Questions ==

None yet
== Changelog ==

= 0.1.7 =
* Added option to allow you to add a target attribute to the footnotes links created. 

= 0.1.6 =
* Just changing where the plugin lives, no functional changes. No need to update. 
 
= 0.1.5 =
* Fix: Duplicate links are only shown once
* Fix: Use &lt;li&gt; instead of &lt;ul&gt; to wrap links

= 0.1 =
* First release

== Upgrade Notice ==

= 0.1.5 = 
A fix for a couple of small mistakes

= 0.1 =
First version, so there's really nothing to upgrade
