<?php
$I = new AcceptanceTester\CRMUsersManagementSteps($scenario);
$I->wantTo('check that login and logout work');

$I->amGoingTo('Register new User');

$I->amInListUsersUi();
$I->clickOnRegisterNewUserButton();
$I->seeIAmInAddUserUi();
$user = $I->imagineUser();
$I->fillUserDataForm($user);
$I->submitUserDataForm();
$I->logout();

$I = new AcceptanceTester\CRMGuestSteps($scenario);
$I->amGoingTo('login');

$I->seeLink('login');
$I->click('login');
$I->seeIAmInLoginFormUi();
$I->fillLoginForm($user);
$I->submitLoginForm();

$I->seeIAmAtHomepage();
$I->dontSeeLink('login');
$I->seeUsername($user);
$I->seeLink('logout');

$I->logout();

$I->seeIAmAtHomepage();
$I->dontSeeUsername($user);
$I->dontSeeLink('logout');
$I->seeLink('login');

