<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4; */

class SisyphusPlugin
{

  private static $_hooks = array(
    'admin_theme_header',
    'admin_theme_footer'
  );

  public function __construct()
  {
    self::addHooksAndFilters();
  }

  public function addHooksAndFilters()
  {
    $broker = get_plugin_broker();
    foreach(self::$_hooks as $hookname) {
      $functionName = Inflector::variablize($hookName);
      $broker->addHook($hookname, array($this, $functionName), 'Sisyphus');
    }
  }

  public function adminThemeHeader()
  {
    queue_js('sisyphus.min');
  }

  public function adminThemeFooter()
  {
    echo "<script>$('#item-form').sisyphus();</script>";
  }
}

/*
* Local variables:
* tab-width: 4
* c-basic-offset: 4
* c-hanging-comment-ender-p: nil
* End:
*/
