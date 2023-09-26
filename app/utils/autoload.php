<?php 
$controllers = glob( APP. "/controllers/*.php" );
$models = glob( APP. "/models/*.php" );
$repos = glob( APP. "/repositories/*.php" );

require APP . '/models/EntityModel.php';

foreach($controllers as $c) require_once $c;
foreach($models as $m) require_once $m;
foreach($repos as $r) require_once $r;