<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('see that landing page is up');
$I->amOnPage('/');
$I->see('Our CRM');

