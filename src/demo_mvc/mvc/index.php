<?php
require_once('./lib/Bootstrap.class.php');
use \TreinamentoSf\Bootstrap as Bootstrap;

Bootstrap::getInstance()->init();
Bootstrap::getInstance()->route($_GET['go']);
