<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4; */

if(!defined('SYSYPHUS_PLUGIN_VERSION')) {
  define('SYSYPHUS_PLUGIN_VERSION', get_plugin_ini('Sysyphus', 'version'));
}

if(!define('SYSYPHUS_PLUGIN_DIR')) {
  define('SYSYPHUS_PLUGIN_DIR', dirname(__FILE__));
}

require_once 'SysyphusPlugin.php';

new SysyphusPlugin;

/*
* Local variables:
* tab-width: 4
* c-basic-offset: 4
* c-hanging-comment-ender-p: nil
* End:
*/

