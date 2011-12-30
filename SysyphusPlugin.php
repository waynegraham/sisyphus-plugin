<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4; */

class SysyphusPlugin
{
  private static $_hooks = array(
    'install',
    'admin_theme_header'
  );

  private static $_filters = array(
    
  );

  public function __construct()
  {
    self::addHooksAndFilters();
  }

  public function FunctionName()
  {
    foreach(self::$_hooks as $hookname) {
      $functionName = Inflector::variablize($hookName);
      add_plugin_hook($hookname, array($this, $functionName));
    }

    foreach(self::$_filters as $filterName) {
      $functionName = Inflector::variablize($filterName);
      add_filter($filterName, array($this, $functionName));
    }
  }

  public function install()
  {
    
  }

  public function FunctionName()
  {
    // queue sysyphus js
    queue_js('sysyphus.min');
  }
}

/*
* Local variables:
* tab-width: 4
* c-basic-offset: 4
* c-hanging-comment-ender-p: nil
* End:
*/
