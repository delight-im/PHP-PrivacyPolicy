<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

// enable error reporting
\error_reporting(E_ALL);
\ini_set('display_errors', 'stdout');

// enable assertions
\ini_set('assert.active', 1);
@\ini_set('zend.assertions', 1);
\ini_set('assert.exception', 1);

\header('Content-type: text/html; charset=utf-8');

require __DIR__ . '/../vendor/autoload.php';

$_GET['lang'] = isset($_GET['lang']) ? (string) $_GET['lang'] : 'en';
$_GET['variant'] = isset($_GET['variant']) ? (int) $_GET['variant'] : 1;

if ($_GET['lang'] === 'json') {
	$policy = new \Delight\PrivacyPolicy\Language\JsonPrivacyPolicy();
}
elseif ($_GET['lang'] === 'de') {
	if ($_GET['variant'] === 2) {
		$policy = new \Delight\PrivacyPolicy\Language\GermanInformalPrivacyPolicy();
	}
	else {
		$policy = new \Delight\PrivacyPolicy\Language\GermanFormalPrivacyPolicy();
	}
}
else {
	$policy = new \Delight\PrivacyPolicy\Language\EnglishPrivacyPolicy();
}

$policy->setPublishedAt(1393372800);
$policy->setTakesEffectAt(1394582400);
$policy->setExpiresAt(1395792000);
$policy->setVersionName('v3.1.4');
$policy->setCanonicalUrl('https://www.example.com/privacy.html');

$policy->addScope(
	new \Delight\PrivacyPolicy\Scope\WebsiteScope('https://www.example.com/', 'example.com')
);
$policy->addScope(
	new \Delight\PrivacyPolicy\Scope\PlayStoreAndroidAppScope('com.example.app', 'Example for Android')
);
$policy->addScope(
	new \Delight\PrivacyPolicy\Scope\AppStoreIosAppScope('54614917093', 'Example for iOS')
);

$policy->addDataGroup(
	'Server logs',
	'Whenever you access our services, including your access of any individual part or section of our services, we record certain information about the nature of your access. That information is never combined with information from other data sources and will not be associated with the identity of any account. However, we reserve the right to review the data retrospectively if there is specific evidence supporting the suspicion of a case of fraud or any other illegal activity or illegal use of our services.',
	[ \Delight\PrivacyPolicy\Data\DataBasis::LEGITIMATE_INTERESTS ],
	null,
	[ \Delight\PrivacyPolicy\Data\DataPurpose::ADMINISTRATION ],
	\Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS,

	function (\Delight\PrivacyPolicy\Data\DataGroup $group) {
		$retentionTimeHours = 24 * 14;

		$group->addElement(
			\Delight\PrivacyPolicy\Data\DataType::ACCESS_HTTP_METHOD,
			\Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS,
			$retentionTimeHours
		);

		$group->addElement(
			\Delight\PrivacyPolicy\Data\DataType::ACCESS_HTTP_STATUS,
			\Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS,
			$retentionTimeHours
		);

		$group->addElement(
			\Delight\PrivacyPolicy\Data\DataType::ACCESS_IP_ADDRESS,
			\Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS,
			$retentionTimeHours
		);

		$group->addElement(
			\Delight\PrivacyPolicy\Data\DataType::ACCESS_REFERER,
			\Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS,
			$retentionTimeHours
		);

		$group->addElement(
			\Delight\PrivacyPolicy\Data\DataType::ACCESS_SIZE,
			\Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS,
			$retentionTimeHours
		);

		$group->addElement(
			\Delight\PrivacyPolicy\Data\DataType::ACCESS_DATETIME,
			\Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS,
			$retentionTimeHours
		);

		$group->addElement(
			\Delight\PrivacyPolicy\Data\DataType::ACCESS_URL,
			\Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS,
			$retentionTimeHours
		);

		$group->addElement(
			\Delight\PrivacyPolicy\Data\DataType::ACCESS_USERAGENT_STRING,
			\Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS,
			$retentionTimeHours
		);
	}
);

$policy->addDataGroup(
	'Account information',
	'When you create an account by signing up, and whenever you use that account by signing in afterwards, we collect the data that you provide to us voluntarily in the course of that process.',
	[
		\Delight\PrivacyPolicy\Data\DataBasis::CONTRACT,
		\Delight\PrivacyPolicy\Data\DataBasis::CONSENT
	],
	[ \Delight\PrivacyPolicy\Data\DataSpecialCondition::EXPLICIT_CONSENT ],
	[
		\Delight\PrivacyPolicy\Data\DataPurpose::ADMINISTRATION,
		\Delight\PrivacyPolicy\Data\DataPurpose::FULFILLMENT,
		\Delight\PrivacyPolicy\Data\DataPurpose::PERSONALIZATION
	],
	\Delight\PrivacyPolicy\Data\DataRequirement::OPT_IN,

	function (\Delight\PrivacyPolicy\Data\DataGroup $group) {
		$group->addElement(
			\Delight\PrivacyPolicy\Data\DataType::USER_EMAIL,
			\Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS,
			null
		);

		$group->addElement(
			\Delight\PrivacyPolicy\Data\DataType::USER_PASSWORD_HASHED_STRONG,
			\Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS,
			null
		);

		$group->addElement(
			\Delight\PrivacyPolicy\Data\DataType::USER_NAME_ALIAS,
			\Delight\PrivacyPolicy\Data\DataRequirement::OPT_IN,
			null
		);

		$group->addElement(
			\Delight\PrivacyPolicy\Data\DataType::USER_REGISTRATION_DATETIME,
			\Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS,
			null
		);

		$group->addElement(
			\Delight\PrivacyPolicy\Data\DataType::USER_LOGIN_DATETIME,
			\Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS,
			null
		);

		$group->addElement(
			\Delight\PrivacyPolicy\Data\DataType::USER_SIGNATURE,
			\Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS,
			null
		);
	}
);

$policy->setUserDataTraded(false);
$policy->setDataMinimizationGoal(true);
$policy->setChildrenMinimumAge(16);
$policy->setPromotionalEmailOptOut(true);
$policy->setFirstPartyCookies(true);
$policy->setThirdPartyCookies(true);
$policy->setAccountDeletable(true);
$policy->setPreservationInBackups(true);
$policy->setThirdPartyServiceProviders(true);
$policy->setInternationalTransfers(true);
$policy->setTransferUponMergerOrAcquisition(true);
$policy->setTlsEverywhere(true);
$policy->setCompetentSupervisoryAuthority('Estonian Data Protection Inspectorate', 'http://www.aki.ee/en');
$policy->setNotificationPeriod(30);
$policy->setRightOfAccess(true);
$policy->setRightToRectification(true);
$policy->setRightToErasure(true);
$policy->setRightToRestrictProcessing(true);
$policy->setRightToDataPortability(true);
$policy->setRightToObject(true);
$policy->setRightsRelatedToAutomatedDecisions(true);
$policy->setContactEmail('privacy@example.com');
$policy->setContactUrl('https://www.example.com/contact.html');
// $policy->setContactImage('https://www.example.com/images/contact.png', 'Jane Doe, 123 Main Street, Anytown, USA', 420, 360);

echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '<meta charset="utf-8">';
echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
echo '<title>PHP-PrivacyPolicy</title>';
echo '</head>';
echo '<body>';

echo '<p>';
echo '<a href="?lang=en">English</a>';
echo ' &middot; ';
echo '<a href="?lang=de&variant=1">German (formal)</a>';
echo ' &middot; ';
echo '<a href="?lang=de&variant=2">German (informal)</a>';
echo ' &middot; ';
echo '<a href="?lang=json">JSON</a>';
echo '</p>';

echo '<hr>';

if ($policy instanceof \Delight\PrivacyPolicy\HumanPrivacyPolicy) {
	echo '<h1>' . $policy->getShortTitle() . '</h1>';
	echo '<h2>' . $policy->getLongTitle() . '</h2>';

	echo '<p>';
	echo '<a href="#html">HTML</a>';
	echo ' &middot; ';
	echo '<a href="#plain">Plain text</a>';
	echo ' &middot; ';
	echo '<a href="#markdown">Markdown</a>';
	echo '</p>';

	echo '<hr>';
}

if ($policy instanceof \Delight\PrivacyPolicy\Language\JsonPrivacyPolicy) {
	echo '<h3>JSON</h3>';
	echo '<pre>' . $policy->toJson() . '</pre>';
}

if ($policy instanceof \Delight\PrivacyPolicy\HumanPrivacyPolicy) {
	echo '<h3 id="html">HTML</h3>';
	echo $policy->toHtml();

	echo '<hr>';

	echo '<h3 id="plain">Plain text</h3>';
	echo '<pre>' . $policy->toPlainText() . '</pre>';

	echo '<hr>';

	echo '<h3 id="markdown">Markdown</h3>';
	echo '<pre>' . $policy->toMarkdown() . '</pre>';
}

echo '</body>';
echo '</html>';
