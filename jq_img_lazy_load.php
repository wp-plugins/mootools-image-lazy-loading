<?php
   
  /*
Plugin Name: MooTools lazy load plugin
Plugin URI: http://xn----zmcajjd2g4dcbc5b.com/
Description: a quick and dirty wordpress plugin to enable image lazy loading.
Version: v0.01
Author: morsel
Author URI: http://xn----zmcajjd2g4dcbc5b.com/
*/

function MooTools_lazy_load_headers() {
  $plugin_path = plugins_url('/', __FILE__);
  $lazy_url = $plugin_path . 'lazyload.js';
  $jq_url = 'http://ajax.googleapis.com/ajax/libs/mootools/1.2.3/mootools-yui-compressed.js';
  wp_deregister_script('MooTools');
  wp_enqueue_script('MooTools', $jq_url, false,'1.2.3');
  wp_enqueue_script('MooToolslazyload', $lazy_url, false, '1.2.3');
}

function MooTools_lazy_load_ready() {
  echo <<<EOF
<script type="text/javascript">
window.addEvent('domready',function() {
if (navigator.platform == "iPad") return;
	var lazyloader = new LazyLoad();
});
</script>
EOF;
}

  add_action('wp_head', 'MooTools_lazy_load_headers', 5);
  add_action('wp_head', 'MooTools_lazy_load_ready', 12);
?>