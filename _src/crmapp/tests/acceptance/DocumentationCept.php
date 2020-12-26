<?php 
$I = new AcceptanceTester\CRMUserSteps($scenario);
$I->wantTo('see whether user documentation is accessible');

$I->amOnPage('/site/docs');
$I->see('Documentation', 'h1');
$I->seeLargeBodyOfText();
