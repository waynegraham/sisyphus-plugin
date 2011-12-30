<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4; */

class SisyphusPlugin
{
  private static $_hooks = array(
    'install',
    'admin_theme_header',
    'admin_theme_footer'
  );

  private static $_filters = array(
    
  );

  public function __construct()
  {
    self::addHooksAndFilters();
  }

  public function FunctionName()
  {
    $broker = get_plugin_broker();
    foreach(self::$_hooks as $hookname) {

      $functionName = Inflector::variablize($hookName);
      $broker->addHook($hookname, array($this, $functionName));
    }

    foreach(self::$_filters as $filterName) {
      $functionName = Inflector::variablize($filterName);
      $broker->addFilter($filterName, array($this, $functionName));
    }
  }

  public function install()
  {
    
  }

  public function adminThemeHeader()
  {
    // queue sysyphus js
    queue_js('sysyphus.min');
  }

  public function adminThemeFooter()
  {
    echo "$('#item-form').sisyphus();"
  }
}

/*
* Local variables:
* tab-width: 4
* c-basic-offset: 4
* c-hanging-comment-ender-p: nil
* End:
*/
