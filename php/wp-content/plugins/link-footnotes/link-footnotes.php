<?php
/*
  Plugin Name:  Link Footnotes
  Plugin URI:   http://www.nutt.net/tag/link-footnotes/
  Description:  Add any external links in your posts and pages to a footnote of the post
  Version:      0.1.7
  Author:       Ryan Nutt
  Author URI:   http://www.nutt.net
  License: 	GPL2
 */

$linkFootnotes = new LinkFootnotes();

class LinkFootnotes {
    
    /** Default options array */
    private $defaultOptions = array(
        'showCSS' => true,
        'defaultOn' => true,
        'heading' => '<h2>Links</h2>',
        'target' => ''
    );
    
    public function __construct() {
        
        add_action('admin_menu', array($this, 'adminMenu'));  
        add_action('admin_init', array($this, 'adminInit'));
        
        add_filter('the_content', array($this, 'theContentFilter')); 
        
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate')); 
    }
    
    public function activate() {
        add_option('link_footnotes', $this->defaultOptions);
    }
    public function deactivate() {
        delete_option('link_footnotes'); 
    }
    
    /** 
     * Wrapper to get the options from the database so I don't have to 
     * do it over and over again
     * @return mixed
     */
    private function getOptions() {
        $opts = get_option('link_footnotes', $this->defaultOptions); 
        $opts = array_merge($this->defaultOptions, $opts); 
        return $opts; 
        
    }
    
    /**
     * Add settings options to the Settings -> Writing menu
     */
    public function adminMenu() {
        add_settings_section('link_footnotes',
                'Link Footnotes',
                array(
                    $this,
                    'drawSection')
                , 'writing');
        add_settings_field('lf_default', 
                'Default On', 
                array(
                    $this, 
                    'drawDefaultOn'
                ) , 
                'writing',
                'link_footnotes'); 
        
        add_settings_field('lf_header',
                'Heading',
                array(
                    $this,
                    'drawHeader'
                ), 'writing', 'link_footnotes'); 
        add_settings_field('lf_target',
                'Link Target',
                array(
                    $this,
                    'drawTarget'
                ), 'writing', 'link_footnotes'
                );
    }
    
    public function adminInit() {
        register_setting('writing', 'link_footnotes', array($this, 'sanitize')); 
    }
    
    /** Clean up the array to save */
    public function sanitize($input) { 
        $input['defaultOn'] = isset($input['defaultOn']) && $input['defaultOn'] == 'on';
        
        
        if (!isset($input['heading']))
            $input['heading'] = ''; 
        if (!isset($input['target']))
            $input['target'] = '';
        return $input; 
    }
    
    
    public function drawDefaultOn() {
        $opts = $this->getOptions();
        
        echo '<input type="checkbox" name="link_footnotes[defaultOn]"'.checked($opts['defaultOn'], true, false).'>&nbsp;Footnotes on by default<br />This can be overridden per post by using the lf_on and lf_off meta fields'; 
    }
    
    public function drawHeader() {
        $opts = $this->getOptions(); 
        echo '<input type="text" name="link_footnotes[heading]" value="'.$opts['heading'].'">';
    }
    
    public function drawSection() {
        ?>
        Link Footnotes allows you to include footnotes of all external links
        in a post or page. <a href="http://www.nutt.net/tag/link-footnotes/" target="_blank">More info</a>
<?php
    }
    
    public function drawTarget() {
        $opts = $this->getOptions();
        echo '<input type="text" name="link_footnotes[target]" value="'.$opts['target'].'">';
    }
    
    /** Add the footnotes if needed */
    public function theContentFilter($content) {
        
        /* We only want this to work on single pages */
        if (!is_single()) return $content; 
        
        global $post;
        
        $forceOn = get_post_meta($post->ID, 'lf_on', true) != '';
        $forceOff = get_post_meta($post->ID, 'lf_off', true) != '';
        
        /* If it's turned off, no reason to continue */
        if ($forceOff === true) return $content; 
        
        $opts = $this->getOptions();
        if (!($opts['defaultOn'] || $forceOn))
            return $content; 
        
        /* Get all the links from the content */
        if (preg_match_all('/href="(.*?)"/', $content, $rayMatches)) {
            if (is_array($rayMatches[1]) && count($rayMatches[1])>0) {
                $blogHome = get_option('home'); 
                $out = ''; 
                $ray = array_unique($rayMatches[1]);
                foreach ($ray as $link) {
                    
                    if (preg_match('/^http(s?):\/\//i', $link) && strpos($link, $blogHome) === false) {
                        $out .= '<li><a href="'.$link.'"'.((!empty($opts['target'])) ? ' target="'.$opts['target'].'"' : '').'>'.preg_replace('/^http(s?):\/\//i', '', $link).'</a></li>'; 
                    }
                }
                if ($out != '') 
                    $content .= '<div class="lf_wrapper">'.$opts['heading'].'<ul>'.$out.'</ul></div>';
            }
        }
        
        
        return $content; 
    }
    
}
?>