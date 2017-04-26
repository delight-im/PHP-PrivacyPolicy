<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Language;

use Delight\PrivacyPolicy\MachinePrivacyPolicy;
use Delight\PrivacyPolicy\Scope\AppStoreIosAppScope;
use Delight\PrivacyPolicy\Scope\PlayStoreAndroidAppScope;
use Delight\PrivacyPolicy\Scope\WebsiteScope;
use Delight\PrivacyPolicy\Throwable\UnexpectedScopeError;

/** Privacy policy for machines as JSON */
final class JsonPrivacyPolicy extends MachinePrivacyPolicy {

	/**
	 * The flags that are passed to the {@see \json_encode} function
	 *
	 * @internal
	 *
	 * @var int
	 */
	const FLAGS_ENCODE = \JSON_UNESCAPED_UNICODE | \JSON_UNESCAPED_SLASHES | \JSON_NUMERIC_CHECK;

	/**
	 * Returns the policy as JSON
	 *
	 * @return string
	 * @throws UnexpectedScopeError
	 */
	public function toJson() {
		$out = [];

		$out['meta'] = [];

		if ($this->hasVersionName()) {
			$out['meta']['version'] = (string) $this->versionName;
		}

		if ($this->hasLastUpdated()) {
			$out['meta']['updated'] = (int) $this->lastUpdated;
		}

		if ($this->hasExpiration()) {
			$out['meta']['expires'] = (int) $this->expiration;
		}

		if ($this->hasCanonicalUrl()) {
			$out['meta']['canonical'] = (string) $this->canonicalUrl;
		}

		if ($this->hasScopes()) {
			$out['meta']['scopes'] = [];

			foreach ($this->scopes as $scope) {
				if ($scope instanceof WebsiteScope) {
					$out['meta']['scopes'][] = [
						'type' => 'web',
						'url' => (string) $scope->getUrl()
					];
				}
				elseif ($scope instanceof PlayStoreAndroidAppScope) {
					$out['meta']['scopes'][] = [
						'type' => 'android',
						'packageName' => (string) $scope->getPackageName()
					];
				}
				elseif ($scope instanceof AppStoreIosAppScope) {
					$out['meta']['scopes'][] = [
						'type' => 'ios',
						'trackId' => (string) $scope->getTrackId()
					];
				}
				else {
					throw new UnexpectedScopeError();
				}
			}
		}

		if ($this->hasDataGroups()) {
			$out['data'] = [];

			foreach ($this->dataGroups as $dataGroup) {
				$groupRecord = [];

				if ($dataGroup->hasPurposes()) {
					$groupRecord['purposes'] = [];

					foreach ($dataGroup->getPurposes() as $purpose) {
						$groupRecord['purposes'][] = (string) $purpose;
					}
				}

				$groupRecord['requirement'] = (string) $dataGroup->getRequirement();

				if ($dataGroup->hasElements()) {
					$groupRecord['elements'] = [];

					foreach ($dataGroup->getElements() as $element) {
						$groupRecord['elements'][] = [
							'type' => (string) $element->getType(),
							'requirement' => (string) $element->getRequirement(),
							'retention' => [
								'max' => (int) $element->getMaxRetention()
							],
							'viewable' => (bool) $element->isViewable(),
							'deletable' => (bool) $element->isDeletable()
						];
					}
				}

				$out['data'][] = $groupRecord;
			}
		}

		$out['principles'] = [];

		$out['principles']['data'] = [];
		$out['principles']['data']['trade'] = (bool) $this->isUserDataTraded();
		$out['principles']['data']['avoidance'] = (bool) $this->hasDataMinimizationGoal();

		if ($this->hasChildrenMinimumAge()) {
			$out['children'] = [];
			$out['children']['age'] = [];
			$out['children']['age']['min'] = (int) $this->childrenMinimumAge;
		}

		$out['email'] = [];
		$out['email']['marketing'] = [];
		$out['email']['marketing']['optOut'] = (bool) $this->hasPromotionalEmailOptOut();

		$out['cookies'] = [];
		$out['cookies']['firstParty'] = (bool) $this->hasFirstPartyCookies();
		$out['cookies']['thirdParty'] = (bool) $this->hasThirdPartyCookies();

		$out['choices'] = [];

		$out['choices']['account'] = [];
		$out['choices']['account']['deletion'] = (bool) $this->isAccountDeletable();

		$out['choices']['information'] = [];
		$out['choices']['information']['request'] = (bool) $this->hasRightToInformation();
		$out['choices']['information']['update'] = (bool) $this->hasRightToInformation();
		$out['choices']['information']['delete'] = (bool) $this->hasRightToInformation();

		$out['backups'] = (bool) $this->hasPreservationInBackups();

		$out['serviceProviders'] = [];
		$out['serviceProviders']['thirdParties'] = (bool) $this->hasThirdPartyServiceProviders();

		$out['mergersAndAcquisitions'] = [];
		$out['mergersAndAcquisitions']['transfer'] = (bool) $this->hasTransferUponMergerOrAcquisition();

		$out['security'] = [];
		$out['security']['tls'] = (bool) $this->hasTlsEverywhere();

		$out['changes'] = [];
		$out['changes']['notificationPeriod'] = (int) $this->getNotificationPeriod();

		if ($this->hasContactInformation()) {
			$out['contact'] = [];

			if ($this->hasContactEmail()) {
				$out['contact']['email'] = (string) $this->contactEmail;
			}

			if ($this->hasContactUrl()) {
				$out['contact']['url'] = (string) $this->contactUrl;
			}
		}

		return $this->encodeAsJson($out);
	}

	/**
	 * Encodes the supplied data as JSON
	 *
	 * @param array $data
	 * @return string
	 */
	private function encodeAsJson(array $data) {
		$flags = self::FLAGS_ENCODE;

		if (!$this->isMinified()) {
			$flags |= \JSON_PRETTY_PRINT;
		}

		return \json_encode($data, $flags);
	}

}
