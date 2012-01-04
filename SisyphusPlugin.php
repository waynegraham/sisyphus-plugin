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
    foreach (self::$_hooks as $hookName) {
      $functionName = Inflector::variablize($hookName);
      get_plugin_broker()->addHook(
        $hookName,
        array($this, $functionName),
        'Sisyphus'
      );
    }

  }

  public function adminThemeHeader()
  {
    queue_js('jNotify.jquery');
    queue_js('sisyphus');

    queue_css('jNotify.jquery');
  }

  public function adminThemeFooter()
  {
    echo "
  <script>
jQuery(function() {
   jQuery('form').sisyphus({
    timeout: 15,
    onSave: function() {
      jNotify('Data saved to Local Storage', 500);
    }, 
    onRestore: function(){
      //jNotify('Data restored from Local Storage', 500);
    },
    onRelease: function() {
      //jNotify('Data removed from Local Storage', 'warning', 500);
    }
  });
});
  </script>";
  }
}

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * c-hanging-comment-ender-p: nil
 * End:
 */
