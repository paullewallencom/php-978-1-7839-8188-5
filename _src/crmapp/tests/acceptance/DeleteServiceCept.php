<?php 
$I = new AcceptanceTester\CRMServicesManagementSteps($scenario);
$I->wantTo('check that if I cancel deletion nothing happens');

$I->amInListServicesUi();
$I->clickOnRegisterNewServiceButton();
$I->seeIAmInAddServiceUi();
$first_service = $I->imagineService();
$I->fillServiceDataForm($first_service);
$I->submitServiceDataForm();

$I->seeIamInViewServiceUi();

$I->amInListServicesUi();
$I->seeServiceInList($first_service);
$I->seeDeleteButtonBesideService($first_service);
$I->clickDeleteButtonBesideService($first_service);

$I->seeDeletionConfirmation();
$I->cancelDeletion();

$I->seeIAmInListServicesUi();
$I->seeServiceInList($first_service);

$I->wantTo('check that if I confirm deletion then application deletes Service');

$I->clickDeleteButtonBesideService($first_service);
$I->seeDeletionConfirmation();
$I->confirmDeletion();

$I->seeIAmInListServicesUi();
$I->dontSeeServiceInList($first_service);

