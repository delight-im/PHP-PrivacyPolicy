<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy;

use Delight\PrivacyPolicy\Data\DataBasis;
use Delight\PrivacyPolicy\Data\DataPurpose;
use Delight\PrivacyPolicy\Data\DataRequirement;
use Delight\PrivacyPolicy\Data\DataSpecialCondition;
use Delight\PrivacyPolicy\Data\DataType;
use Delight\PrivacyPolicy\Markup\AbbreviationMarkup;
use Delight\PrivacyPolicy\Markup\ConcatenationMarkup;
use Delight\PrivacyPolicy\Markup\DefinitionList\DefinitionGroup;
use Delight\PrivacyPolicy\Markup\DefinitionList\DefinitionList;
use Delight\PrivacyPolicy\Markup\ImageMarkup;
use Delight\PrivacyPolicy\Markup\LinkMarkup;
use Delight\PrivacyPolicy\Markup\Markup;
use Delight\PrivacyPolicy\Markup\TextMarkup;
use Delight\PrivacyPolicy\Scope\AppStoreIosAppScope;
use Delight\PrivacyPolicy\Scope\PlayStoreAndroidAppScope;
use Delight\PrivacyPolicy\Scope\WebsiteScope;
use Delight\PrivacyPolicy\Throwable\InvalidFormatArgumentsError;
use Delight\PrivacyPolicy\Throwable\TranslationNotFoundError;
use Delight\PrivacyPolicy\Throwable\UnexpectedScopeError;

/** Privacy policy in natural language that can be read by humans */
abstract class HumanPrivacyPolicy extends PrivacyPolicy {

	/**
	 * Whether missing translations should cause an error
	 *
	 * This setting can be used to find untranslated strings during development
	 *
	 * @var bool
	 */
	const FAIL_ON_MISSING_TRANSLATIONS = false;

	/**
	 * Returns the short title of the policy
	 *
	 * @return string
	 */
	abstract public function getShortTitle();

	/**
	 * Returns the long title of the policy
	 *
	 * @return string
	 */
	abstract public function getLongTitle();

	/**
	 * Returns the policy as HTML
	 *
	 * @return string
	 */
	public function toHtml() {
		return $this->toMarkup()->toHtml(0);
	}

	/**
	 * Returns the policy as plain text
	 *
	 * @return string
	 */
	public function toPlainText() {
		return $this->toMarkup()->toPlainText(0);
	}

	/**
	 * Returns the policy as Markdown
	 *
	 * @return string
	 */
	public function toMarkdown() {
		return $this->toMarkup()->toMarkdown(0);
	}

	/**
	 * Returns a translation of the supplied text
	 *
	 * This method should only ever be called by the {@see lang} method
	 *
	 * @param string $text the English text to translate
	 * @return string the translated text
	 * @throws TranslationNotFoundError
	 */
	abstract protected function translateUnformatted($text);

	/**
	 * Formats the specified UNIX timestamp as a date
	 *
	 * @param int $unixTimestamp the UNIX timestamp in seconds to format
	 * @return string the formatted date
	 */
	abstract protected function formatDate($unixTimestamp);

	/**
	 * Formats the specified number of hours
	 *
	 * @param int $n
	 * @return string the formatted number as a string
	 */
	abstract protected function formatHours($n);

	/**
	 * Formats the specified number of days
	 *
	 * @param int $n
	 * @return string the formatted number as a string
	 */
	abstract protected function formatDays($n);

	/**
	 * Formats the specified number of weeks
	 *
	 * @param int $n
	 * @return string the formatted number as a string
	 */
	abstract protected function formatWeeks($n);

	/**
	 * Formats the specified number of months
	 *
	 * @param int $n
	 * @return string the formatted number as a string
	 */
	abstract protected function formatMonths($n);

	/**
	 * Formats the specified number of years
	 *
	 * @param int $n
	 * @return string the formatted number as a string
	 */
	abstract protected function formatYears($n);

	/**
	 * Returns the policy as generic markup
	 *
	 * @return Markup
	 */
	private function toMarkup() {
		return new DefinitionList(function (DefinitionList $list) {
			if ($this->publishedAt !== null) {
				$list->addDefinitionGroup($this->lang('Date of publication'), function (DefinitionGroup $group) {
					$group->addDefinition($this->formatDate($this->publishedAt));
				});
			}

			if ($this->takesEffectAt !== null) {
				$list->addDefinitionGroup($this->lang('Effective date'), function (DefinitionGroup $group) {
					$group->addDefinition($this->formatDate($this->takesEffectAt));
				});
			}

			if ($this->expiresAt !== null) {
				$list->addDefinitionGroup($this->lang('Date of expiration'), function (DefinitionGroup $group) {
					$group->addDefinition($this->formatDate($this->expiresAt));
				});
			}

			if ($this->hasVersionName()) {
				$list->addDefinitionGroup($this->lang('Version'), function (DefinitionGroup $group) {
					$group->addDefinition($this->versionName);
				});
			}

			if ($this->hasCanonicalUrl()) {
				$list->addDefinitionGroup($this->lang('Latest version'), function (DefinitionGroup $group) {
					$group->addDefinition(new LinkMarkup($this->canonicalUrl));
				});
			}

			$list->addDefinitionGroup($this->lang('General'), function (DefinitionGroup $group) {
				$group->addDefinition(
					$this->lang('Protecting your privacy and keeping your personal information safe is our highest priority.')
					.
					Markup::SPACE
					.
					$this->lang('This privacy statement (“privacy policy” or “policy”) is designed to help you better understand how and to what extent we collect, use, disclose, transfer and store your information.')
				);

				$group->addDefinitionInteractively(function () {
					$definition = $this->lang('The policy applies to our websites, mobile apps, software applications, products and services, collectively referred to as “services”.');

					if ($this->hasScopes()) {
						$definition .= Markup::SPACE;
						$definition .= $this->lang('These services include:');
					}

					return $definition;
				});

				if ($this->hasScopes()) {
					$group->addDefinition(new DefinitionList(function (DefinitionList $list) {
						foreach ($this->scopes as $scope) {
							$list->addDefinitionGroup($scope, function (DefinitionGroup $group) use ($scope) {
								if ($scope instanceof WebsiteScope) {
									$group->addDefinition($this->lang('Website'));
								}
								elseif ($scope instanceof PlayStoreAndroidAppScope) {
									$group->addDefinition($this->lang('Android app (available from “Google Play”, a digital distribution platform operated by Google Inc.)'));
								}
								elseif ($scope instanceof AppStoreIosAppScope) {
									$group->addDefinition($this->lang('iOS app (available from the “App Store”, a digital distribution platform operated by Apple Inc.)'));
								}
								else {
									throw new UnexpectedScopeError();
								}
							});
						}
					}));
				}

				$group->addDefinition($this->lang('This privacy policy governs your use of our services regardless of the domain names, operating systems, platforms or devices that are used to access the services, and regardless of whether such access is in connection with an account or not.'));
				$group->addDefinition($this->lang('As a condition for your use of our services as a customer, user or visitor (collectively referred to as a “user” or as your “use”), you consent to the terms of this policy and you agree that your personal information will be handled as outlined below.'));
			});

			$list->addDefinitionGroup($this->lang('Our principles'), function (DefinitionGroup $group) {
				if (!$this->isUserDataTraded()) {
					$group->addDefinition($this->lang('We never sell, rent out or trade any of our user’s personal information with third parties for commercial purposes.'));
				}

				if ($this->hasDataMinimizationGoal()) {
					$group->addDefinition($this->lang('We always collect only the minimum amount of personal information necessary to provide our services to you, unless you choose to provide more such information voluntarily.'));
				}

				$group->addDefinition(
					$this->lang('We encourage you to give us, and, more generally, any provider of digital services, only the amount of data you are comfortable sharing.')
					.
					Markup::SPACE
					.
					$this->lang('If in doubt, rather do not share sensitive information.')
				);

				if ($this->rightOfAccess && $this->rightToRectification && $this->rightToErasure) {
					$group->addDefinition($this->lang('We offer you simple ways to view, update or delete the data we have collected about you.'));
				}
			});

			if ($this->hasChildrenMinimumAge()) {
				$list->addDefinitionGroup($this->lang('Children’s Online Privacy Protection'), function (DefinitionGroup $group) {
					$group->addDefinition($this->lang('None of our services are designed for, intended to attract, or directed towards children under the age of %d.', $this->childrenMinimumAge));

					$group->addDefinition(
						$this->lang('We never knowingly collect any information from children under %d.', $this->childrenMinimumAge)
						.
						Markup::SPACE
						.
						$this->lang('If you are a child below that age, you may not use any of our services.', $this->childrenMinimumAge)
					);

					$group->addDefinition($this->lang('If we have any plausible reason to believe that you are a user who is under the age of %d, we will have to prohibit you from continuing your use of our services.', $this->childrenMinimumAge));

					$group->addDefinitionInteractively(function () {
						$definition = $this->lang('Should you believe that we might have any personal information of a child under the age of %d, in particular a child of your own, please contact us so that the data in question can be deleted, if appropriate.', $this->childrenMinimumAge);

						if ($this->hasContactInformation()) {
							$definition .= Markup::SPACE;
							$definition .= $this->lang('For our contact information, please see further below.');
						}

						return $definition;
					});
				});
			}

			if ($this->hasPromotionalEmailOptOut()) {
				$list->addDefinitionGroup($this->lang('Email communication'), function (DefinitionGroup $group) {
					$group->addDefinition($this->lang('You may opt out of receiving any newsletters or promotional messages from us at any time.'));
					$group->addDefinition($this->lang('This is possible either by using the “Unsubscribe” feature at the bottom of such emails that we may send, or by adjusting the settings in your account within our services, where applicable.'));
					$group->addDefinition($this->lang('You will continue to receive essential, non-promotional messages regarding your account, such as technical notices, order confirmations, or other service-related messages, which are required for us to be able to provide our services to you.'));
				});
			}

			if ($this->hasCookies()) {
				$list->addDefinitionGroup($this->lang('Cookies'), function (DefinitionGroup $group) {
					if ($this->hasFirstPartyCookies()) {
						$group->addDefinition(
							$this->lang('Cookies are minimal text files that contain small amounts of data.')
							.
							Markup::SPACE
							.
							$this->lang('They are transferred from our servers to your device through your web browser or app.')
							.
							Markup::SPACE
							.
							$this->lang('Your web browser or app then sends these small text files back to us whenever you access our services.')
						);

						$group->addDefinition(
							$this->lang('These cookies do not necessarily contain any personal or identifying information.')
							.
							Markup::SPACE
							.
							$this->lang('They are, however, commonly used to store a unique identifier for every individual user, so that our servers do not lose information on who you are while you are moving through the individual parts of our services.')
						);

						$group->addDefinition(
							$this->lang('We may use cookies and similar technologies, such as “Web Storage” (specifically “localStorage”) and “Internal Storage”, to make interactions with our services more convenient, efficient and secure.')
							.
							Markup::SPACE
							.
							$this->lang('For example, we may use these technologies to keep you signed in and to remember your preferences with regard to our services.')
						);

						$group->addDefinition(
							$this->lang('As such, cookies and the related technologies are essential for the operation of our services.')
							.
							Markup::SPACE
							.
							$this->lang('You therefore consent to our use of cookies and related technologies when using our services.')
							.
							Markup::SPACE
							.
							$this->lang('Without these technologies, use of our services would not be reasonably possible.')
						);

						$group->addDefinition(
							$this->lang('Your web browser or operating system usually provides means to delete such data currently stored on your device.')
							.
							Markup::SPACE
							.
							$this->lang('They may even provide methods to disable the use of such technologies completely.')
							.
							Markup::SPACE
							.
							$this->lang('You are welcome to make use of these settings and features of your web browser or operating system, but that may prevent our services from working correctly for you.')
							.
							Markup::SPACE
							.
							$this->lang('For more information on how to delete such data currently stored on your device, please refer to the manual or help section of your web browser or operating system.')
						);
					}

					if ($this->hasThirdPartyCookies()) {
						$group->addDefinition(new DefinitionList(function (DefinitionList $list) {
							$list->addDefinitionGroup($this->lang('Third-party cookies'), function (DefinitionGroup $group) {
								$group->addDefinition($this->lang('Some contents of our services are provided by third parties that are not directly affiliated with us.'));
								$group->addDefinition($this->lang('These external contents, which are displayed, rendered, played back or otherwise conveyed directly within our services, may include advertising, analytics and components from social media.'));
								$group->addDefinition($this->lang('The third parties that provide these contents may store cookies on your device for their own purposes and interests, which we cannot control.'));
								$group->addDefinition($this->lang('The settings and features of your web browser or operating system may allow you to control how third parties can store cookies on your device.'));
							});
						}));
					}
				});
			}

			if ($this->hasDataGroups()) {
				$list->addDefinitionGroup($this->lang('Information we collect and why we collect it'), function (DefinitionGroup $group) {
					foreach ($this->dataGroups as $dataGroup) {
						$group->addDefinition(new DefinitionList(function (DefinitionList $list) use ($dataGroup) {
							$list->addDefinitionGroup($dataGroup->getTitle(), function (DefinitionGroup $group) use ($dataGroup) {
								$group->addDefinition($dataGroup->getDescription());

								$group->addDefinition(
									new ConcatenationMarkup(
										new TextMarkup(
											$this->lang('Required:')
										),
										new AbbreviationMarkup(
											DataRequirement::toBool($dataGroup->getRequirement()) ? $this->lang('yes') : $this->lang('no'),
											$this->lang(
												DataRequirement::toNaturalLanguage($dataGroup->getRequirement())
											)
										)
									)
								);

								if ($dataGroup->hasBases()) {
									$basesMarkup = [];

									$basesMarkup[] = new TextMarkup(
										$this->lang('Lawful basis:')
									);

									foreach ($dataGroup->getBases() as $base) {
										$basesMarkup[] = new AbbreviationMarkup(
											$this->lang(
												DataBasis::toNaturalLanguage($base)
											),
											$this->lang(
												DataBasis::toLegalReference($base)
											)
										);
										$basesMarkup[] = new TextMarkup(Markup::MIDDLE_DOT);
									}

									\array_pop($basesMarkup);

									$group->addDefinition(
										new ConcatenationMarkup(...$basesMarkup)
									);
								}

								if ($dataGroup->hasSpecialConditions()) {
									$specialConditionsMarkup = [];

									$specialConditionsMarkup[] = new TextMarkup(
										$this->lang('Condition for the processing of special categories of personal data:')
									);

									foreach ($dataGroup->getSpecialConditions() as $specialCondition) {
										$specialConditionsMarkup[] = new AbbreviationMarkup(
											$this->lang(
												DataSpecialCondition::toNaturalLanguage($specialCondition)
											),
											$this->lang(
												DataSpecialCondition::toLegalReference($specialCondition)
											)
										);
										$specialConditionsMarkup[] = new TextMarkup(Markup::MIDDLE_DOT);
									}

									\array_pop($specialConditionsMarkup);

									$group->addDefinition(
										new ConcatenationMarkup(...$specialConditionsMarkup)
									);
								}

								if ($dataGroup->hasPurposes()) {
									foreach ($dataGroup->getPurposes() as $purpose) {
										$group->addDefinition($this->lang(
											DataPurpose::toNaturalLanguage($purpose)
										));
									}
								}

								if ($dataGroup->hasElements()) {
									foreach ($dataGroup->getElements() as $dataElement) {
										$group->addDefinition(new DefinitionList(function (DefinitionList $list) use ($dataElement) {
											$dataTypeName = DataType::toNaturalLanguage($dataElement->getType());

											$list->addDefinitionGroup($this->lang($dataTypeName), function (DefinitionGroup $group) use ($dataElement) {
												$group->addDefinition(
													new ConcatenationMarkup(
														new TextMarkup(
															$this->lang('Required:')
														),
														new AbbreviationMarkup(
															DataRequirement::toBool($dataElement->getRequirement()) ? $this->lang('yes') : $this->lang('no'),
															$this->lang(
																DataRequirement::toNaturalLanguage($dataElement->getRequirement())
															)
														)
													)
												);

												if ($dataElement->hasMaxRetention()) {
													if ($dataElement->getMaxRetention() <= 72) {
														// format number of 0 to 72 hours
														$group->addDefinition($this->lang(
															'Maximum retention time: %s',
															$this->formatHours($dataElement->getMaxRetention())
														));
													}
													elseif ($dataElement->getMaxRetention() <= 504) {
														// format number of 4 to 21 days
														$group->addDefinition($this->lang(
															'Maximum retention time: %s',
															$this->formatDays(\ceil($dataElement->getMaxRetention() / 24))
														));
													}
													elseif ($dataElement->getMaxRetention() <= 1008) {
														// format number of 4 to 6 weeks
														$group->addDefinition($this->lang(
															'Maximum retention time: %s',
															$this->formatWeeks(\ceil($dataElement->getMaxRetention() / 24 / 7))
														));
													}
													elseif ($dataElement->getMaxRetention() <= 13148) {
														// format number of 2 to 18 months
														$group->addDefinition($this->lang(
															'Maximum retention time: %s',
															$this->formatMonths(\ceil($dataElement->getMaxRetention() / 24 / 30.436875))
														));
													}
													else {
														// format number of 2 or more years
														$group->addDefinition($this->lang(
															'Maximum retention time: %s',
															$this->formatYears(\ceil($dataElement->getMaxRetention() / 24 / 365.2425))
														));
													}
												}
											});
										}));
									}
								}
							});
						}));
					}
				});
			}

			$list->addDefinitionGroup($this->lang('Mandatory disclosure'), function (DefinitionGroup $group) {
				$group->addDefinition($this->lang('Laws in the jurisdictions that we operate in may obligate us to disclose certain personal information or other information that we collect about our users to local law enforcement authorities.'));
				$group->addDefinition($this->lang('We may be compelled to such disclosure in response to a court order, a warrant or a similar request by a judicial body or a government agency, or when we believe in good faith that the disclosure is reasonably necessary to protect our rights or property, that of any third party, or the safety of the general public.'));
				$group->addDefinition($this->lang('In any case, we will provide data only to the extent necessary to satisfy the request, and, whenever possible and legally permitted, we will make a reasonable effort to notify affected users of any such disclosure.'));
			});

			$list->addDefinitionGroup($this->lang('Retention and deletion of data'), function (DefinitionGroup $group) {
				$group->addDefinition($this->lang('We will retain certain pieces of personal information for as long as you use our services, as long as your account exists, or as long as needed for us to be able to provide our services to you.'));

				if ($this->isAccountDeletable()) {
					$group->addDefinitionInteractively(function () {
						$definition = $this->lang('If you would like to cancel your use of our services, delete your account, or delete your personal information, you may do so in the respective sections of our services.');
						$definition .= Markup::SPACE;
						$definition .= $this->lang('If you need help, please contact us.');

						if ($this->hasContactInformation()) {
							$definition .= Markup::SPACE;
							$definition .= $this->lang('See further below for our contact information.');
						}

						return $definition;
					});
				}

				if ($this->hasPreservationInBackups()) {
					$group->addDefinition(
						$this->lang('In order to prevent loss of data due to human errors or system failures, we keep additional backup copies of data, as most companies and service providers do, which may include some of your personal information.')
						.
						Markup::SPACE
						.
						$this->lang('This means that parts of your personal information may temporarily remain on our servers even after deletion or termination of your use of our services.')
					);
				}

				$group->addDefinition($this->lang('We may retain and use your personal information and data as necessary to comply with our legal obligations, to resolve disputes, and to enforce our rights and agreements.'));
			});

			if ($this->hasThirdPartyServiceProviders()) {
				$list->addDefinitionGroup($this->lang('Service providers, contractors and agents'), function (DefinitionGroup $group) {
					$group->addDefinition($this->lang('From time to time, we may share some information we have collected from you, including personal information, with a limited number of third-party vendors, service providers, contractors, resellers, agents or business partners, solely for the purpose of performing certain functions on our behalf.'));

					$group->addDefinition(
						$this->lang('Such third parties help us provide and improve our services.')
						.
						Markup::SPACE
						.
						$this->lang('Functions performed by them on our behalf may include payment processing, network data transmission, fraud prevention, customer support management and similar services.')
					);

					$group->addDefinition($this->lang('These third parties do not have any right to use the information that we share about you beyond what is necessary to assist us with the specific task at hand.'));
				});
			}

			if ($this->hasInternationalTransfers()) {
				$list->addDefinitionGroup($this->lang('International data transfers'), function (DefinitionGroup $group) {
					$group->addDefinition(
						$this->lang('Some of our external service providers and recipients of personal data are based outside your country and outside our country.')
						.
						Markup::SPACE
						.
						$this->lang('This means that the processing of your personal data by those third parties involves an international transfer of your data to a third country.')
						.
						Markup::SPACE
						.
						$this->lang('Such third countries may have data protection rules that are different from those in your or our country.')
					);
					$group->addDefinition($this->lang('Thus, for any international transfer of data, we ensure that appropriate technical, organizational and contractual measures are in place to guarantee that a similar degree of protection is afforded to your data internationally and that your personal data remains protected to the standards described in this policy.'));
					$group->addDefinition(new DefinitionList(function (DefinitionList $list) {
						$list->addDefinitionGroup($this->lang('We verify that at least one of the following safeguards is implemented:'), function (DefinitionGroup $group) {
							$group->addDefinition($this->lang('The country of the recipient has been deemed to provide an adequate level of protection for personal data by the European Commission.'));
							$group->addDefinition($this->lang('The recipient is certified as part of the EU-US and Swiss-US Privacy Shield Frameworks.'));
							$group->addDefinition($this->lang('Standard Contractual Clauses, as adopted by or approved by the European Commission, are in place.'));
							$group->addDefinition($this->lang('The recipient has Binding Corporate Rules that guarantee the protection of personal data.'));
						});
					}));
					$group->addDefinition($this->lang('Please contact us if you want further information on the specific mechanisms used by us when transferring your personal data internationally.'));
				});
			}

			if ($this->hasTransferUponMergerOrAcquisition()) {
				$list->addDefinitionGroup($this->lang('Mergers and acquisitions'), function (DefinitionGroup $group) {
					$group->addDefinition($this->lang('If we are involved in a merger, an acquisition by another company, or a sale of all or a portion of our business or assets, your information will likely be among the assets transferred.'));
					$group->addDefinition($this->lang('If any such change of ownership happens, the organization receiving your personal information will have to respect the promises that we have made in any pre-existing privacy policy such as this one.'));

					$group->addDefinition(
						$this->lang('You will be notified via a prominent notice within our services or by email to the primary email address specified in your account at least %d days before any such transfer of your personal information.', $this->getNotificationPeriod())
						.
						Markup::SPACE
						.
						$this->lang('This notification will include help on choices you may have regarding the transfer and treatment of your personal information.')
					);
				});
			}

			$list->addDefinitionGroup($this->lang('How we secure your information'), function (DefinitionGroup $group) {
				$group->addDefinition(
					$this->lang('We take the trust that you place in us very seriously.')
					.
					Markup::SPACE
					.
					$this->lang('We have therefore implemented all measures reasonably necessary to protect the personal information of our users from unauthorized access, modification, deletion, disclosure or other misuse.')
				);

				$group->addDefinition($this->lang('We follow generally accepted industry standards to protect the data submitted to us, both during transmission and after we have received it, and continue to expand our protections as becomes necessary with changing technology.'));

				if ($this->hasTlsEverywhere()) {
					$group->addDefinition($this->lang('In particular, all connections to and from our services are encrypted using Secure Sockets Layer (SSL) and Transport Layer Security (TLS) technologies.'));
				}

				$group->addDefinition(
					$this->lang('However, please be aware that, despite our best efforts, no method of electronic transmission or storage is perfectly secure and no measures can guarantee absolute security.')
					.
					Markup::SPACE
					.
					$this->lang('Hardware or software failure as well as other factors may compromise the security of user information, as is the case with all other providers of digital services.')
				);

				$group->addDefinition(
					$this->lang('Apart from that, please recognize that protecting your personal information is, in other parts, also your own responsibility.')
					.
					Markup::SPACE
					.
					$this->lang('Especially, you are responsible for safeguarding any passwords and other authentication information that you use to access our services, as well as limiting physical access to the devices used.')
				);

				$group->addDefinition($this->lang('You should never disclose your authentication information to any third party and you should notify us immediately of any unauthorized use of your account.'));
			});

			$list->addDefinitionGroup($this->lang('Links to external websites, applications and products'), function (DefinitionGroup $group) {
				$group->addDefinition($this->lang('Some parts and sections of our services may contain external links to websites, applications or products owned by and operated by third parties.'));

				$group->addDefinition(
					$this->lang('We advise you to verify the privacy practices of those third parties individually.')
					.
					Markup::SPACE
					.
					$this->lang('We have no knowledge about and are not responsible for the way that those third parties handle any personal information which you provide to them yourself.')
				);

				$group->addDefinition($this->lang('We encourage you not to provide any personal information to those third parties before assuring yourself of proper privacy practices on their part.'));
			});

			if ($this->rightOfAccess || $this->rightToRectification || $this->rightToErasure || $this->rightToRestrictProcessing || $this->rightToDataPortability || $this->rightToObject || $this->rightsRelatedToAutomatedDecisions) {
				$list->addDefinitionGroup($this->lang('Your rights'), function (DefinitionGroup $group) {
					$group->addDefinition($this->lang('Except as limited under applicable law, you have the following rights with regard to your personal data:'));

					if ($this->rightOfAccess) {
						$group->addDefinition(
							new DefinitionList(function (DefinitionList $list) {
								$list->addDefinitionGroup(
									new AbbreviationMarkup(
										$this->lang('Access your personal data'),
										$this->lang('Right of access (EU, General Data Protection Regulation (GDPR), Article 15)')
									),
									function (DefinitionGroup $group) {
										$group->addDefinition($this->lang('You have the right to be informed of and request access to the personal data we process about you.'));
									}
								);
							})
						);
					}

					if ($this->rightToRectification) {
						$group->addDefinition(
							new DefinitionList(function (DefinitionList $list) {
								$list->addDefinitionGroup(
									new AbbreviationMarkup(
										$this->lang('Update your personal data'),
										$this->lang('Right to rectification (EU, General Data Protection Regulation (GDPR), Article 16)')
									),
									function (DefinitionGroup $group) {
										$group->addDefinition($this->lang('You have the right to request that we amend or update your personal data where it is inaccurate or incomplete.'));
									}
								);
							})
						);
					}

					if ($this->rightToErasure) {
						$group->addDefinition(
							new DefinitionList(function (DefinitionList $list) {
								$list->addDefinitionGroup(
									new AbbreviationMarkup(
										$this->lang('Erase your personal data'),
										$this->lang('Right to erasure (EU, General Data Protection Regulation (GDPR), Article 17)')
									),
									function (DefinitionGroup $group) {
										$group->addDefinition($this->lang('You have the right to request that we delete your personal data.'));
									}
								);
							})
						);
					}

					if ($this->rightToRestrictProcessing) {
						$group->addDefinition(
							new DefinitionList(function (DefinitionList $list) {
								$list->addDefinitionGroup(
									new AbbreviationMarkup(
										$this->lang('Restrict the use of your personal data'),
										$this->lang('Right to restriction of processing (EU, General Data Protection Regulation (GDPR), Article 18)')
									),
									function (DefinitionGroup $group) {
										$group->addDefinition($this->lang('You have the right to request that we temporarily or permanently stop processing your personal data.'));
									}
								);
							})
						);
					}

					if ($this->rightToDataPortability) {
						$group->addDefinition(
							new DefinitionList(function (DefinitionList $list) {
								$list->addDefinitionGroup(
									new AbbreviationMarkup(
										$this->lang('Export your personal data'),
										$this->lang('Right to data portability (EU, General Data Protection Regulation (GDPR), Article 20)')
									),
									function (DefinitionGroup $group) {
										$group->addDefinition($this->lang('You have the right to request a copy of your personal data in electronic and machine-readable form, and the right to transmit that personal data to another service provider.'));
									}
								);
							})
						);
					}

					if ($this->rightToObject) {
						$group->addDefinition(
							new DefinitionList(function (DefinitionList $list) {
								$list->addDefinitionGroup(
									new AbbreviationMarkup(
										$this->lang('Object to direct marketing'),
										$this->lang('Right to object (EU, General Data Protection Regulation (GDPR), Article 21)')
									),
									function (DefinitionGroup $group) {
										$group->addDefinition($this->lang('You have the right to object to your personal data being processed for direct marketing purposes.'));
									}
								);
							})
						);
						$group->addDefinition(
							new DefinitionList(function (DefinitionList $list) {
								$list->addDefinitionGroup(
									new AbbreviationMarkup(
										$this->lang('Object to the use of your personal data'),
										$this->lang('Right to object (EU, General Data Protection Regulation (GDPR), Article 21)')
									),
									function (DefinitionGroup $group) {
										$group->addDefinition($this->lang('You have the right to object to us processing your personal data on grounds relating to your particular situation where we no longer have a legitimate reason or legal need to process it.'));
									}
								);
							})
						);
					}

					if ($this->rightsRelatedToAutomatedDecisions) {
						$group->addDefinition(
							new DefinitionList(function (DefinitionList $list) {
								$list->addDefinitionGroup(
									new AbbreviationMarkup(
										$this->lang('Object to automated decision-making'),
										$this->lang('Rights related to automated individual decision-making, including profiling (EU, General Data Protection Regulation (GDPR), Article 22)')
									),
									function (DefinitionGroup $group) {
										$group->addDefinition($this->lang('You have the right not to be subject to a decision based solely on automated decision-making, including profiling, where the decision would have a legal effect on you or produce a similarly significant effect.'));
									}
								);
							})
						);
					}

					$group->addDefinitionInteractively(function () {
						$definition = $this->lang('If you have any questions regarding the protection of your data, your rights, or how to exercise them, please contact us.');

						if ($this->hasContactInformation()) {
							$definition .= Markup::SPACE;
							$definition .= $this->lang('For our contact information, please see further below.');
						}

						$definition .= Markup::SPACE;
						$definition .= $this->lang('Upon verification of your identity, we will respond to your request within a reasonable period of time.');

						return $definition;
					});
					$group->addDefinitionInteractively(function () {
						$definition = $this->lang('If you are unsatisfied with our response or with the way we are processing your personal data, you may contact your local data protection authority.');

						if ($this->competentSupervisoryAuthorityName !== null || $this->competentSupervisoryAuthorityUrl !== null) {
							$definition .= Markup::SPACE;
							$definition .= $this->lang('You may also contact the data protection authority that is responsible for us:');
						}

						return $definition;
					});

					if ($this->competentSupervisoryAuthorityName !== null || $this->competentSupervisoryAuthorityUrl !== null) {
						if ($this->competentSupervisoryAuthorityUrl !== null) {
							$group->addDefinition(
								new LinkMarkup($this->competentSupervisoryAuthorityUrl, $this->competentSupervisoryAuthorityName)
							);
						}
						else {
							$group->addDefinition($this->competentSupervisoryAuthorityName);
						}
					}

					$group->addDefinition($this->lang('You are free to file a complaint with the data protection authority.'));
				});
			}

			$list->addDefinitionGroup($this->lang('Changes to this privacy policy'), function (DefinitionGroup $group) {
				$group->addDefinition(
					$this->lang('We may change this privacy policy from time to time.')
					.
					Markup::SPACE
					.
					$this->lang('Most changes will presumably be minor only and will therefore not affect your rights.')
				);

				$group->addDefinition(
					$this->lang('Should there be any substantial changes to this policy with material effects on any of your rights or choices, you will be notified via a prominent notice within our services or by email to the primary email address specified in your account at least %d days prior to such changes taking effect.', $this->getNotificationPeriod())
					.
					Markup::SPACE
					.
					$this->lang('This notification will include help on choices you may have regarding the treatment of your personal information.')
				);

				$group->addDefinition($this->lang('For any less significant changes to this privacy policy that do not affect your rights or choices in a material way, we encourage all users to check this policy for updated versions periodically.'));
				$group->addDefinition($this->lang('In general, the applicable version of this policy is the one that is current at the time of your access of our services.'));
			});

			if ($this->hasContactInformation()) {
				$list->addDefinitionGroup($this->lang('Contact information of the controller'), function (DefinitionGroup $group) {
					$group->addDefinition(
						$this->lang('If you have any questions or concerns regarding this policy, our privacy practices or certain aspects of our services, please contact us at any time.')
						.
						Markup::SPACE
						.
						$this->lang('We want to help and will be happy to address your concerns.')
						.
						Markup::SPACE
						.
						$this->lang('We are responsible for the processing of personal data under this policy.')
					);

					if ($this->hasContactEmail()) {
						$group->addDefinition($this->lang('You can reach us via email at:'));
						$group->addDefinition(
							new LinkMarkup('mailto:' . $this->contactEmail, $this->contactEmail)
						);
					}

					if ($this->hasContactUrl() && !$this->hasContactImage()) {
						$group->addDefinition($this->lang('Our full contact information can be found at:'));
						$group->addDefinition(
							new LinkMarkup($this->contactUrl)
						);
					}

					if ($this->hasContactImage()) {
						$imageMarkup = new ImageMarkup(
							$this->contactImage[0],
							$this->contactImage[1],
							$this->contactImage[2],
							$this->contactImage[3]
						);

						if ($this->hasContactUrl()) {
							$group->addDefinition(
								new LinkMarkup($this->contactUrl, $imageMarkup, $this->contactImage[1])
							);
						}
						else {
							$group->addDefinition($imageMarkup);
						}
					}
				});
			}
		});
	}

	/**
	 * Returns a translation of the supplied text, optionally inserting any specified format arguments
	 *
	 * This uses the {@see translateUnformatted} method implemented by subclasses
	 *
	 * @param string $text the English text to translate
	 * @param array ...$arguments (optional) the format arguments to insert
	 * @return string the translated text with format arguments inserted as needed
	 * @throws InvalidFormatArgumentsError
	 * @throws TranslationNotFoundError
	 */
	private function lang($text, ...$arguments) {
		try {
			$translated = $this->translateUnformatted($text);
		}
		catch (TranslationNotFoundError $e) {
			if (self::FAIL_ON_MISSING_TRANSLATIONS) {
				throw new TranslationNotFoundError($text);
			}
			else {
				$translated = $text;
			}
		}

		$formatted = @\sprintf($translated, ...$arguments);

		if ($formatted === false) {
			throw new InvalidFormatArgumentsError();
		}

		return $formatted;
	}

}
