<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4; */

if(!defined('SISYPHUS_PLUGIN_VERSION')) {
  define('SISYPHUS_PLUGIN_VERSION', get_plugin_ini('Sisyphus', 'version'));
}

if(!defined('SISYPHUS_PLUGIN_DIR')) {
  define('SISYPHUS_PLUGIN_DIR', dirname(__FILE__));
}

require_once 'SisyphusPlugin.php';

new SisyphusPlugin;

/*
* Local variables:
* tab-width: 4
* c-basic-offset: 4
* c-hanging-comment-ender-p: nil
* End:
