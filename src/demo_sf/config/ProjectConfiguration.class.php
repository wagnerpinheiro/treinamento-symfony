<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/symfony1/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();
require_once __DIR__.'/../lib/vendor/autoload.php';

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfPropelPlugin');
  }
}
