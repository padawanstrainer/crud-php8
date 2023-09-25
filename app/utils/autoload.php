<?php 
$controllers = glob( APP. "/controllers/*.php" );
$models = glob( APP. "/models/*.php" );
$repos = glob( APP. "/repositories/*.php" );

foreach($controllers as $c) require $c;
foreach($models as $m) require $m;
foreach($repos as $r) require $r;