<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy;

use Delight\PrivacyPolicy\Data\DataGroup;
use Delight\PrivacyPolicy\Scope\Scope;

/** Privacy policy that can be composed programmatically */
abstract class PrivacyPolicy {

	/**
	 * The default minimum age (in years) for children
	 *
	 * See "COPPA" (USA), "GDPR" (EU), etc.
	 *
	 * @var int
	 */
	const CHILDREN_MINIMUM_AGE_DEFAULT = 13;

	/**
	 * The default period (in days) for notifications about major changes
	 *
	 * @var int
	 */
	const NOTIFICATION_PERIOD_DEFAULT = 30;

	/** @var int|null the time when the policy has been published as a UNIX timestamp in seconds */
	protected $publishedAt;
	/** @var int|null the time when the policy takes effect as a UNIX timestamp in seconds */
	protected $takesEffectAt;
	/** @var int|null the time when the policy will expire as a UNIX timestamp in seconds */
	protected $expiresAt;
	/** @var string|null the name of the current version in arbitrary format */
	protected $versionName;
	/** @var string|null the URL of the official policy in its latest version */
	protected $canonicalUrl;
	/** @var Scope[] the scopes that describe which services the policy applies to */
	protected $scopes;
	/** @var DataGroup[] the data groups that describe which data is collected and why */
	protected $dataGroups;
	/** @var bool whether user data is sold, rented or traded with third parties */
	protected $userDataTraded;
	/** @var bool whether the principle of Data Economy, Data Avoidance or Data Minimization is being followed */
	protected $dataMinimizationGoal;
	/** @var int|null the minimum age for children in years (see "COPPA" (USA), "GDPR" (EU), etc.) */
	protected $childrenMinimumAge;
	/** @var bool whether the user may opt-out from all emails that are not essential to the operation of the services */
	protected $promotionalEmailOptOut;
	/** @var bool whether first-party cookies are used and sent to the user's device */
	protected $firstPartyCookies;
	/** @var bool whether third-party cookies are used and sent to the user's device */
	protected $thirdPartyCookies;
	/** @var bool whether users may delete their entire accounts or similar collections of personal data */
	protected $accountDeletable;
	/** @var bool whether there are additional copies of user data for backup purposes */
	protected $preservationInBackups;
	/** @var bool whether user data may be shared with third-party service providers, vendors, contractors or agents */
	protected $thirdPartyServiceProviders;
	/** @var bool whether user data may be part of the assets transferred during mergers, acquisitions or other changes of ownership */
	protected $transferUponMergerOrAcquisition;
	/** @var bool whether all connections to the server are, without exceptions, secured using SSL/TLS */
	protected $tlsEverywhere;
	/** @var string|null the name of the data protection authority that is responsible */
	protected $competentSupervisoryAuthorityName;
	/** @var string|null the URL for more information on the data protection authority that is responsible */
	protected $competentSupervisoryAuthorityUrl;
	/** @var int the declared period for notifications to the user about major changes */
	protected $notificationPeriod;
	/** @var bool whether the user has the right of access */
	protected $rightOfAccess;
	/** @var bool whether the user has the right to rectification */
	protected $rightToRectification;
	/** @var bool whether the user has the right to erasure */
	protected $rightToErasure;
	/** @var bool whether the user has the right to restriction of processing */
	protected $rightToRestrictProcessing;
	/** @var bool whether the user has the right to data portability */
	protected $rightToDataPortability;
	/** @var bool whether the user has the right to object */
	protected $rightToObject;
	/** @var bool whether the user has rights related to automated individual decision-making, including profiling */
	protected $rightsRelatedToAutomatedDecisions;
	/** @var string|null the email address for contact */
	protected $contactEmail;
	/** @var string|null the URL of a page with (detailed) contact information */
	protected $contactUrl;
	/** @var array|null an image showing (detailed) contact information */
	protected $contactImage;

	/**
	 * Sets the time when the policy has been published
	 *
	 * @param int|null $publishedAt the time as a UNIX timestamp in seconds, or `null` to unset
	 */
	public function setPublishedAt($publishedAt) {
		$this->publishedAt = $publishedAt !== null ? ((int) $publishedAt) : null;
	}

	/**
	 * Sets the time when the policy takes effect
	 *
	 * @param int|null $takesEffectAt the time as a UNIX timestamp in seconds, or `null` to unset
	 */
	public function setTakesEffectAt($takesEffectAt) {
		$this->takesEffectAt = $takesEffectAt !== null ? ((int) $takesEffectAt) : null;
	}

	/**
	 * Sets the time when the policy will expire
	 *
	 * @param int|null $expiresAt the time as a UNIX timestamp in seconds, or `null` to unset
	 */
	public function setExpiresAt($expiresAt) {
		$this->expiresAt = $expiresAt !== null ? ((int) $expiresAt) : null;
	}

	/**
	 * Returns whether the name of the current version has been defined
	 *
	 * @return bool
	 */
	public function hasVersionName() {
		return $this->versionName !== null;
	}

	/**
	 * Sets the name of the current version
	 *
	 * @param string|null $versionName the name in arbitrary format, or `null` to unset
	 */
	public function setVersionName($versionName) {
		$this->versionName = $versionName !== null ? ((string) $versionName) : null;
	}

	/**
	 * Returns whether the URL of the official policy in its latest version has been defined
	 *
	 * @return bool
	 */
	public function hasCanonicalUrl() {
		return $this->canonicalUrl !== null;
	}

	/**
	 * Sets the URL of the official policy in its latest version
	 *
	 * @param string|null $canonicalUrl the URL, or `null` to unset
	 */
	public function setCanonicalUrl($canonicalUrl) {
		$this->canonicalUrl = $canonicalUrl !== null ? ((string) $canonicalUrl) : null;
	}

	/**
	 * Returns whether scopes have been defined that describe which services the policy applies to
	 *
	 * @return bool
	 */
	public function hasScopes() {
		return !empty($this->scopes);
	}

	/**
	 * Adds a scope that describes which services the policy applies to
	 *
	 * @param Scope $scope
	 */
	public function addScope(Scope $scope) {
		$this->scopes[] = $scope;
	}

	/**
	 * Returns whether data groups have been defined that describe which data is collected and why
	 *
	 * @return bool
	 */
	public function hasDataGroups() {
		return !empty($this->dataGroups);
	}

	/**
	 * Adds a data group that describes which data is collected and why
	 *
	 * @param string $title the title of the group in natural language, e.g. `Registration data` or `Access logs`
	 * @param string|null $description (optional) the description of the group and of the circumstances of collection in natural language
	 * @param string[]|null $purposes (optional) any number of constants from the {@see DataPurpose} class
	 * @param string|null $requirement (optional) one of the constants from the {@see DataRequirement} class
	 * @param callable|null $init (optional) a callback that receives the new instance and may initialize it
	 */
	public function addDataGroup($title, $description = null, array $purposes = null, $requirement = null, callable $init = null) {
		$this->dataGroups[] = new DataGroup($title, $description, $purposes, $requirement, $init);
	}

	/**
	 * Returns whether user data is sold, rented or traded with third parties
	 *
	 * @return bool
	 */
	public function isUserDataTraded() {
		return $this->userDataTraded;
	}

	/**
	 * Sets whether user data is sold, rented or traded with third parties
	 *
	 * @param bool $userDataTraded
	 */
	public function setUserDataTraded($userDataTraded) {
		$this->userDataTraded = (bool) $userDataTraded;
	}

	/**
	 * Returns whether the principle of Data Economy, Data Avoidance or Data Minimization is being followed
	 *
	 * The principle means that, in all situations and use cases, the service provider aims at collecting
	 * the minimum amount of user data possible, and, afterwards, user data is deleted again as soon as possible
	 *
	 * @return bool
	 */
	public function hasDataMinimizationGoal() {
		return $this->dataMinimizationGoal;
	}

	/**
	 * Sets whether the principle of Data Economy, Data Avoidance or Data Minimization is being followed
	 *
	 * The principle means that, in all situations and use cases, the service provider aims at collecting
	 * the minimum amount of user data possible, and, afterwards, user data is deleted again as soon as possible
	 *
	 * @param bool $dataMinimizationGoal
	 */
	public function setDataMinimizationGoal($dataMinimizationGoal) {
		$this->dataMinimizationGoal = (bool) $dataMinimizationGoal;
	}

	/**
	 * Returns whether a minimum age for children has been defined
	 *
	 * See "COPPA" (USA), "GDPR" (EU), etc.
	 *
	 * @return bool
	 */
	public function hasChildrenMinimumAge() {
		return !empty($this->childrenMinimumAge);
	}

	/**
	 * Sets the minimum age for children
	 *
	 * See "COPPA" (USA), "GDPR" (EU), etc.
	 *
	 * @param int|null $childrenMinimumAge the minimum age in years, or `null` to unset
	 */
	public function setChildrenMinimumAge($childrenMinimumAge) {
		$this->childrenMinimumAge = $childrenMinimumAge !== null ? ((int) $childrenMinimumAge) : null;
	}

	/**
	 * Returns whether the user may opt-out from all emails that are not essential to the operation of the services
	 *
	 * In particular, this includes emails sent for marketing or promotional purposes
	 *
	 * @return bool
	 */
	public function hasPromotionalEmailOptOut() {
		return $this->promotionalEmailOptOut;
	}

	/**
	 * Sets whether the user may opt-out from all emails that are not essential to the operation of the services
	 *
	 * In particular, this includes emails sent for marketing or promotional purposes
	 *
	 * @param bool $promotionalEmailOptOut
	 */
	public function setPromotionalEmailOptOut($promotionalEmailOptOut) {
		$this->promotionalEmailOptOut = (bool) $promotionalEmailOptOut;
	}

	/**
	 * Returns whether cookies are used and sent to the user's device
	 *
	 * @return bool
	 */
	public function hasCookies() {
		return $this->hasFirstPartyCookies() || $this->hasThirdPartyCookies();
	}

	/**
	 * Returns whether first-party cookies are used and sent to the user's device
	 *
	 * @return bool
	 */
	public function hasFirstPartyCookies() {
		return $this->firstPartyCookies;
	}

	/**
	 * Sets whether first-party cookies are used and sent to the user's device
	 *
	 * @param bool $firstPartyCookies
	 */
	public function setFirstPartyCookies($firstPartyCookies) {
		$this->firstPartyCookies = (bool) $firstPartyCookies;
	}

	/**
	 * Returns whether third-party cookies are used and sent to the user's device
	 *
	 * @return bool
	 */
	public function hasThirdPartyCookies() {
		return $this->thirdPartyCookies;
	}

	/**
	 * Sets whether third-party cookies are used and sent to the user's device
	 *
	 * @param bool $thirdPartyCookies
	 */
	public function setThirdPartyCookies($thirdPartyCookies) {
		$this->thirdPartyCookies = (bool) $thirdPartyCookies;
	}

	/**
	 * Returns whether users may delete their entire accounts or similar collections of personal data
	 *
	 * @return bool
	 */
	public function isAccountDeletable() {
		return $this->accountDeletable;
	}

	/**
	 * Sets whether users may delete their entire accounts or similar collections of personal data
	 *
	 * @param bool $accountDeletable
	 */
	public function setAccountDeletable($accountDeletable) {
		$this->accountDeletable = (bool) $accountDeletable;
	}

	/**
	 * Returns whether there are additional copies of user data for backup purposes
	 *
	 * @return bool
	 */
	public function hasPreservationInBackups() {
		return $this->preservationInBackups;
	}

	/**
	 * Sets whether there are additional copies of user data for backup purposes
	 *
	 * @param bool $preservationInBackups
	 */
	public function setPreservationInBackups($preservationInBackups) {
		$this->preservationInBackups = (bool) $preservationInBackups;
	}

	/**
	 * Returns whether user data may be shared with third-party service providers, vendors, contractors or agents
	 *
	 * @return bool
	 */
	public function hasThirdPartyServiceProviders() {
		return $this->thirdPartyServiceProviders;
	}

	/**
	 * Sets whether user data may be shared with third-party service providers, vendors, contractors or agents
	 *
	 * @param bool $thirdPartyServiceProviders
	 */
	public function setThirdPartyServiceProviders($thirdPartyServiceProviders) {
		$this->thirdPartyServiceProviders = (bool) $thirdPartyServiceProviders;
	}

	/**
	 * Returns whether user data may be part of the assets transferred during mergers, acquisitions or
	 * other changes of ownership
	 *
	 * @return bool
	 */
	public function hasTransferUponMergerOrAcquisition() {
		return $this->transferUponMergerOrAcquisition;
	}

	/**
	 * Sets whether user data may be part of the assets transferred during mergers, acquisitions or
	 * other changes of ownership
	 *
	 * @param bool $transferUponMergerOrAcquisition
	 */
	public function setTransferUponMergerOrAcquisition($transferUponMergerOrAcquisition) {
		$this->transferUponMergerOrAcquisition = (bool) $transferUponMergerOrAcquisition;
	}

	/**
	 * Returns whether all connections to the server are, without exceptions, secured using SSL/TLS
	 *
	 * @return bool
	 */
	public function hasTlsEverywhere() {
		return $this->tlsEverywhere;
	}

	/**
	 * Sets whether all connections to the server are, without exceptions, secured using SSL/TLS
	 *
	 * @param bool $tlsEverywhere
	 */
	public function setTlsEverywhere($tlsEverywhere) {
		$this->tlsEverywhere = (bool) $tlsEverywhere;
	}

	/**
	 * Returns the name of the data protection authority that is responsible
	 *
	 * @return string|null
	 */
	public function getCompetentSupervisoryAuthorityName() {
		return $this->competentSupervisoryAuthorityName;
	}

	/**
	 * Returns the URL for more information on the data protection authority that is responsible
	 *
	 * @return string|null
	 */
	public function getCompetentSupervisoryAuthorityUrl() {
		return $this->competentSupervisoryAuthorityUrl;
	}

	/**
	 * Sets the data protection authority that is responsible
	 *
	 * @param string|null $name the name, or `null` to unset
	 * @param string|null $url (optional) the URL for more information, or `null` to unset
	 */
	public function setCompetentSupervisoryAuthority($name = null, $url = null) {
		$this->competentSupervisoryAuthorityName = ($name !== null) ? ((string) $name) : null;
		$this->competentSupervisoryAuthorityUrl = ($url !== null) ? ((string) $url) : null;
	}

	/**
	 * Returns the declared period for notifications to the user about major changes
	 *
	 * @return int
	 */
	public function getNotificationPeriod() {
		return $this->notificationPeriod;
	}

	/**
	 * Sets the declared period for notifications to the user about major changes
	 *
	 * @param int $notificationPeriod
	 */
	public function setNotificationPeriod($notificationPeriod) {
		$this->notificationPeriod = (int) $notificationPeriod;
	}

	/**
	 * Returns whether the user has the right of access
	 *
	 * @return bool
	 */
	public function hasRightOfAccess() {
		return $this->rightOfAccess;
	}

	/**
	 * Sets whether the user has the right of access
	 *
	 * @param bool $rightOfAccess
	 */
	public function setRightOfAccess($rightOfAccess) {
		$this->rightOfAccess = (bool) $rightOfAccess;
	}

	/**
	 * Returns whether the user has the right to rectification
	 *
	 * @return bool
	 */
	public function hasRightToRectification() {
		return $this->rightToRectification;
	}

	/**
	 * Sets whether the user has the right to rectification
	 *
	 * @param bool $rightToRectification
	 */
	public function setRightToRectification($rightToRectification) {
		$this->rightToRectification = (bool) $rightToRectification;
	}

	/**
	 * Returns whether the user has the right to erasure
	 *
	 * @return bool
	 */
	public function hasRightToErasure() {
		return $this->rightToErasure;
	}

	/**
	 * Sets whether the user has the right to erasure
	 *
	 * @param bool $rightToErasure
	 */
	public function setRightToErasure($rightToErasure) {
		$this->rightToErasure = (bool) $rightToErasure;
	}

	/**
	 * Returns whether the user has the right to restriction of processing
	 *
	 * @return bool
	 */
	public function hasRightToRestrictProcessing() {
		return $this->rightToRestrictProcessing;
	}

	/**
	 * Sets whether the user has the right to restriction of processing
	 *
	 * @param bool $rightToRestrictProcessing
	 */
	public function setRightToRestrictProcessing($rightToRestrictProcessing) {
		$this->rightToRestrictProcessing = (bool) $rightToRestrictProcessing;
	}

	/**
	 * Returns whether the user has the right to data portability
	 *
	 * @return bool
	 */
	public function hasRightToDataPortability() {
		return $this->rightToDataPortability;
	}

	/**
	 * Sets whether the user has the right to data portability
	 *
	 * @param bool $rightToDataPortability
	 */
	public function setRightToDataPortability($rightToDataPortability) {
		$this->rightToDataPortability = (bool) $rightToDataPortability;
	}

	/**
	 * Returns whether the user has the right to object
	 *
	 * @return bool
	 */
	public function hasRightToObject() {
		return $this->rightToObject;
	}

	/**
	 * Sets whether the user has the right to object
	 *
	 * @param bool $rightToObject
	 */
	public function setRightToObject($rightToObject) {
		$this->rightToObject = (bool) $rightToObject;
	}

	/**
	 * Returns whether the user has rights related to automated individual decision-making, including profiling
	 *
	 * @return bool
	 */
	public function hasRightsRelatedToAutomatedDecisions() {
		return $this->rightsRelatedToAutomatedDecisions;
	}

	/**
	 * Sets whether the user has rights related to automated individual decision-making, including profiling
	 *
	 * @param bool $rightsRelatedToAutomatedDecisions
	 */
	public function setRightsRelatedToAutomatedDecisions($rightsRelatedToAutomatedDecisions) {
		$this->rightsRelatedToAutomatedDecisions = (bool) $rightsRelatedToAutomatedDecisions;
	}

	/**
	 * Returns whether any contact information has been set
	 *
	 * @return bool
	 */
	public function hasContactInformation() {
		return $this->hasContactEmail() || $this->hasContactUrl() || $this->hasContactImage();
	}

	/**
	 * Returns whether the email address for contact has been defined
	 *
	 * @return bool
	 */
	public function hasContactEmail() {
		return $this->contactEmail !== null;
	}

	/**
	 * Sets the email address for contact
	 *
	 * @param string|null $contactEmail the email address, or `null` to unset
	 */
	public function setContactEmail($contactEmail) {
		$this->contactEmail = $contactEmail !== null ? ((string) $contactEmail) : null;
	}

	/**
	 * Returns whether the URL of a page with (detailed) contact information has been defined
	 *
	 * @return bool
	 */
	public function hasContactUrl() {
		return $this->contactUrl !== null;
	}

	/**
	 * Sets the URL of a page with (detailed) contact information
	 *
	 * @param string|null $contactUrl the URL, or `null` to unset
	 */
	public function setContactUrl($contactUrl) {
		$this->contactUrl = $contactUrl !== null ? ((string) $contactUrl) : null;
	}

	/**
	 * Returns whether an image showing (detailed) contact information has been defined
	 *
	 * @return bool
	 */
	public function hasContactImage() {
		return !empty($this->contactImage) && !empty($this->contactImage[0]);
	}

	/**
	 * Sets an image showing (detailed) contact information
	 *
	 * @param string $source the URL of the image to display
	 * @param string|null $alternativeText (optional) the alternative text to show if the image cannot be displayed
	 * @param int|null $width (optional) the suggested width of the image in pixels
	 * @param int|null $height (optional) the suggested height of the image in pixels
	 */
	public function setContactImage($source, $alternativeText = null, $width = null, $height = null) {
		$this->contactImage = [
			($source !== null) ? ((string) $source) : null,
			($source !== null && $alternativeText !== null) ? ((string) $alternativeText) : null,
			($source !== null && $width !== null) ? ((int) $width) : null,
			($source !== null && $height !== null) ? ((int) $height) : null,
		];
	}

	public function __construct() {
		$this->publishedAt = null;
		$this->takesEffectAt = null;
		$this->expiresAt = null;
		$this->versionName = null;
		$this->canonicalUrl = null;
		$this->scopes = [];
		$this->dataGroups = [];
		$this->userDataTraded = false;
		$this->dataMinimizationGoal = true;
		$this->childrenMinimumAge = self::CHILDREN_MINIMUM_AGE_DEFAULT;
		$this->promotionalEmailOptOut = true;
		$this->firstPartyCookies = true;
		$this->thirdPartyCookies = true;
		$this->accountDeletable = true;
		$this->preservationInBackups = true;
		$this->thirdPartyServiceProviders = true;
		$this->transferUponMergerOrAcquisition = true;
		$this->tlsEverywhere = false;
		$this->competentSupervisoryAuthorityName = null;
		$this->competentSupervisoryAuthorityUrl = null;
		$this->notificationPeriod = self::NOTIFICATION_PERIOD_DEFAULT;
		$this->rightOfAccess = true;
		$this->rightToRectification = true;
		$this->rightToErasure = true;
		$this->rightToRestrictProcessing = true;
		$this->rightToDataPortability = true;
		$this->rightToObject = true;
		$this->rightsRelatedToAutomatedDecisions = true;
		$this->contactEmail = null;
		$this->contactUrl = null;
		$this->contactImage = null;
	}

}
