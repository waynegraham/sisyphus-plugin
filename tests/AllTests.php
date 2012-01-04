<?php 
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4; */

require_once 'Sisyphus_Test_AppTestCase.php';

class Sisyphus_AllTests extends PHPUnit_Framework_TestSuite
{
  public static functions suite()
  {
    $suite = new Sisyphus_AllTests('Sisyphus Tests');

    $collector = new PHPUnit_Runner_IncludePathTestCollector(
      array(
        dirname(__FILE__) . '/integration'
      )
    );

    $suite->addTestFiles($collector->collectTests());
    return $suite;
  }
}
