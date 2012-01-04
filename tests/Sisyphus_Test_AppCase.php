<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4; */

require_once('../SisyphusPlugin.php');

class Sisyphus_Test_AppTestCase extends Omeka_Test_AppTestCase
{
  public static $sisyphusPlugin;

  public function setUpPlugin()
  {
    parent::setUp();

    $this->user = $this->db->getTable('user')->find(1);
    $this->_authenticateUser($this->user);

    $pluginBroker = get_plugin_broker();
    $this->sisyphusPlugin = $this->_addHostsAndFilters(
      $pluginBroker, 'Sisyphus'
    );

    $helper = new Omeka_Test_Helper_Plugin();
    $helper->setUp('Sisyphus');

    $this->_dbHelper = Omeka_Test_Helper_Db::factory($this->core);
  }

  public function _addHooksAndFilters($plugin_broker, $plugin_name)
  {
    $class_name = $plugin_name . 'Plugin';
    $plugin_broker->setCurrentPluginDirName($plugin_name);
    return (new $class_name);
  }

  public function tearDown()
  {
    parent::tearDown();
    $this->sisyphusPlugin->uninstall();
  }

}
