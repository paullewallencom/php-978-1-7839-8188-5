<?php 
$I = new AcceptanceTester\CRMUsersManagementSteps($scenario);
$I->wantTo('check that if I cancel deletion nothing happens');

$I->amInListUsersUi();
$I->clickOnRegisterNewUserButton();
$I->seeIAmInAddUserUi();
$first_user = $I->imagineUser();
$I->fillUserDataForm($first_user);
$I->submitUserDataForm();

$I->seeIamInViewUserUi();

$I->amInListUsersUi();
$I->seeUserInList($first_user);
$I->seeDeleteButtonBesideUser($first_user);
$I->clickDeleteButtonBesideUser($first_user);

$I->seeDeletionConfirmation();
$I->cancelDeletion();

$I->seeIAmInListUsersUi();
$I->seeUserInList($first_user);

$I->wantTo('check that if I confirm deletion then application deletes User');

$I->clickDeleteButtonBesideUser($first_user);
$I->seeDeletionConfirmation();
$I->confirmDeletion();

$I->seeIAmInListUsersUi();
$I->dontSeeUserInList($first_user);

