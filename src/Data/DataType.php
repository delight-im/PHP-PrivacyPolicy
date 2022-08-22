<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Data;

use Delight\PrivacyPolicy\Throwable\UnexpectedDataTypeError;

/** Types of individual data elements collected from the user */
final class DataType {

	/** @var string the version of the application that has been used by the user for their access */
	const ACCESS_APP_VERSION = 'access.app.version';
	/** @var string the date and time of each individual access by the user (e.g. as stored in the access logs) */
	const ACCESS_DATETIME = 'access.datetime';
	/** @var string the date of each individual access by the user (e.g. as stored in the access logs) */
	const ACCESS_DATETIME_DATE = 'access.datetime.date';
	/** @var string the time of each individual access by the user (e.g. as stored in the access logs) */
	const ACCESS_DATETIME_TIME = 'access.datetime.time';
	/** @var string whether the device used for the access supports file uploads */
	const ACCESS_DEVICE_FEATURES_FILE_UPLOAD = 'access.device.features.file_upload';
	/** @var string the date and/or time of the first individual access by the user */
	const ACCESS_FIRST_TIME = 'access.first.time';
	/** @var string the HTTP request method of each individual access by the user (e.g. as stored in the access logs) */
	const ACCESS_HTTP_METHOD = 'access.http.method';
	/** @var string the HTTP status code of each individual access by the user (e.g. as stored in the access logs) */
	const ACCESS_HTTP_STATUS = 'access.http.status';
	/** @var string the Internet Protocol (IP) address of the user for each individual access (e.g. as stored in the access logs) */
	const ACCESS_IP_ADDRESS = 'access.ip.address';
	/** @var string the Internet Protocol (IP) address of the user for each individual access with its precision reduced to 25% (e.g. as stored in the access logs) */
	const ACCESS_IP_ADDRESS_25_PERCENT = 'access.ip.address.25_percent';
	/** @var string the Internet Protocol (IP) address of the user for each individual access with its precision reduced to 50% (e.g. as stored in the access logs) */
	const ACCESS_IP_ADDRESS_50_PERCENT = 'access.ip.address.50_percent';
	/** @var string the Internet Protocol (IP) address of the user for each individual access with its precision reduced to 75% (e.g. as stored in the access logs) */
	const ACCESS_IP_ADDRESS_75_PERCENT = 'access.ip.address.75_percent';
	/** @var string the referring site (or individual page) of the user for each individual access (e.g. as stored in the access logs) */
	const ACCESS_REFERER = 'access.referer';
	/** @var string the amount of data transferred (usually the number of bytes sent or received) for each individual access by the user (e.g. as stored in the access logs) */
	const ACCESS_SIZE = 'access.size';
	/** @var string the requested URL for each individual access by the user (e.g. as stored in the access logs) */
	const ACCESS_URL = 'access.url';
	/** @var string the user-agent string of the user for each individual access (e.g. as stored in the access logs) */
	const ACCESS_USERAGENT_STRING = 'access.useragent.string';
	/** @var string the date and/or time when billing has been cancelled */
	const BILLING_CANCELLATION_TIME = 'billing.cancellation.time';
	/** @var string the date and/or time when billing has ended or will end */
	const BILLING_END_TIME = 'billing.end.time';
	/** @var string whether a free trial is currently active */
	const BILLING_FREE_TRIAL = 'billing.free_trial';
	/** @var string an identification number with an external payment service provider */
	const BILLING_ID_PAYMENT_SERVICE_PROVIDER = 'billing.id.payment_service_provider';
	/** @var string the date and/or time when billing options have most recently been modified */
	const BILLING_MODIFICATION_TIME = 'billing.modification.time';
	/** @var string the date and/or time of the next (scheduled) payment */
	const BILLING_NEXT_PAYMENT_TIME = 'billing.next_payment.time';
	/** @var string whether there are payments past due at the moment */
	const BILLING_PAST_DUE = 'billing.past_due';
	/** @var string the plan or package that has been chosen and is used for billing */
	const BILLING_PLAN = 'billing.plan';
	/** @var string the date and/or time when billing has started */
	const BILLING_START_TIME = 'billing.start.time';
	/** @var string the physical address of one of the user's contacts */
	const CONTACT_ADDRESS = 'contact.address';
	/** @var string the country as part of the physical address of one of the user's contacts */
	const CONTACT_ADDRESS_COUNTRY = 'contact.address.country';
	/** @var string the locality (usually the city) as part of the physical address of one of the user's contacts */
	const CONTACT_ADDRESS_LOCALITY = 'contact.address.locality';
	/** @var string the location of a building or apartment (usually including the street, the street or house number, and potentially the apartment number) within a locality as part of the physical address of one of the user's contacts */
	const CONTACT_ADDRESS_PLACE = 'contact.address.place';
	/** @var string the postal code as part of the physical address of one of the user's contacts */
	const CONTACT_ADDRESS_POSTAL_CODE = 'contact.address.postal_code';
	/** @var string the region (often the state or province) as part of the physical address of one of the user's contacts */
	const CONTACT_ADDRESS_REGION = 'contact.address.region';
	/** @var string the complete date of birth of one of the user's contacts */
	const CONTACT_BIRTH_DATE = 'contact.birth.date';
	/** @var string the month and day of the date of birth of one of the user's contacts */
	const CONTACT_BIRTH_DATE_MONTH_DAY = 'contact.birth.date.md';
	/** @var string the year of the date of birth of one of the user's contacts */
	const CONTACT_BIRTH_DATE_YEAR = 'contact.birth.date.y';
	/** @var string the year and month of the date of birth of one of the user's contacts */
	const CONTACT_BIRTH_DATE_YEAR_MONTH = 'contact.birth.date.ym';
	/** @var string the department of one of the user's contacts within their company */
	const CONTACT_COMPANY_DEPARTMENT = 'contact.company.department';
	/** @var string the name of the company of one of the user's contacts */
	const CONTACT_COMPANY_NAME = 'contact.company.name';
	/** @var string the date and/or time the contact has been created */
	const CONTACT_CREATION_TIME = 'contact.creation.time';
	/** @var string the email address of one of the user's contacts */
	const CONTACT_EMAIL = 'contact.email';
	/** @var string the fax number of one of the user's contacts */
	const CONTACT_FAX = 'contact.fax';
	/** @var string the identifying number or ID (e.g. IBAN) of the bank account of one of the user's contacts */
	const CONTACT_FINANCIAL_BANK_ACCOUNT_ID = 'contact.financial.bank.account.id';
	/** @var string the identifying number or ID (e.g. BIC) of the bank or financial institute of one of the user's contacts */
	const CONTACT_FINANCIAL_BANK_ID = 'contact.financial.bank.id';
	/** @var string the name of the bank or financial institute of one of the user's contacts */
	const CONTACT_FINANCIAL_BANK_NAME = 'contact.financial.bank.name';
	/** @var string the gender of one of the user's contacts */
	const CONTACT_GENDER = 'contact.gender';
	/** @var string the value-added tax (VAT) identification number (IN) (VATIN) of a contact in the European Union */
	const CONTACT_IDENTIFIERS_EU_VAT_IN = 'contact.identifiers.eu.vat.in';
	/** @var string the date and/or time the contact has most recently been modified */
	const CONTACT_MODIFICATION_TIME = 'contact.modification.time';
	/** @var string the name of one of the user's contacts */
	const CONTACT_NAME = 'contact.name';
	/** @var string the alias, nickname or username of one of the user's contacts */
	const CONTACT_NAME_ALIAS = 'contact.name.alias';
	/** @var string the family name of one of the user's contacts */
	const CONTACT_NAME_FAMILY = 'contact.name.family';
	/** @var string the given name of one of the user's contacts */
	const CONTACT_NAME_GIVEN = 'contact.name.given';
	/** @var string the date and/or time of the contact's original message */
	const CONTACT_ORIGINAL_MESSAGE_TIME = 'contact.original_message.time';
	/** @var string the phone number of one of the user's contacts */
	const CONTACT_PHONE = 'contact.phone';
	/** @var string the landline phone number of one of the user's contacts */
	const CONTACT_PHONE_HOME = 'contact.phone.home';
	/** @var string the mobile phone number of one of the user's contacts */
	const CONTACT_PHONE_MOBILE = 'contact.phone.mobile';
	/** @var string the contact's reference as a number or as text */
	const CONTACT_REFERENCE = 'contact.reference';
	/** @var string the URL of the website of one of the user's contacts */
	const CONTACT_WEBSITE_URL = 'contact.website.url';
	/** @var string the price, cost or other monetary amount of one of the user's contracts per billing cycle */
	const CONTRACT_BILLING_AMOUNT = 'contract.billing.amount';
	/** @var string the billing cycle of one of the user's contracts */
	const CONTRACT_BILLING_CYCLE = 'contract.billing.cycle';
	/** @var string the cancellation period of one of the user's contracts */
	const CONTRACT_CANCELLATION_PERIOD = 'contract.cancellation.period';
	/** @var string the date and/or time the contract has been cancelled */
	const CONTRACT_CANCELLATION_TIME = 'contract.cancellation.time';
	/** @var string the date and/or time the contract has been created */
	const CONTRACT_CREATION_TIME = 'contract.creation.time';
	/** @var string the date and/or time the contract has most recently been modified */
	const CONTRACT_MODIFICATION_TIME = 'contract.modification.time';
	/** @var string any custom notes pertaining to one of the user's contracts */
	const CONTRACT_NOTES = 'contract.notes';
	/** @var string the contractual partner or (second) contracting party of one of the user's contracts */
	const CONTRACT_PARTNER = 'contract.partner';
	/** @var string the end date of a period of one of the user's contracts */
	const CONTRACT_PERIOD_END = 'contract.period.end';
	/** @var string the term of extension on (automatic) renewal of one of the user's contracts */
	const CONTRACT_PERIOD_EXTENSION = 'contract.period.extension';
	/** @var string the start date of a period of one of the user's contracts */
	const CONTRACT_PERIOD_START = 'contract.period.start';
	/** @var string the customer number */
	const CUSTOMER_NUMBER = 'customer.number';
	/** @var string the brand and version of the web browser on one of the user's devices */
	const DEVICE_BROWSER = 'device.browser';
	/** @var string the brand of the web browser on one of the user's devices */
	const DEVICE_BROWSER_BRAND = 'device.browser.brand';
	/** @var string the version of the web browser on one of the user's devices */
	const DEVICE_BROWSER_VERSION = 'device.browser.version';
	/** @var string the primary time zone that one of the user's devices is configured for */
	const DEVICE_DATETIME_TIME_ZONE = 'device.datetime.time_zone';
	/** @var string a unique identifier of one of the user's devices that remains constant for the lifetime of the device (e.g. "Android ID") */
	const DEVICE_ID_PERMANENT = 'device.id.permanent';
	/** @var string a unique identifier of one of the user's devices that can be reset by the user at any time (e.g. "Android Advertising ID" or "Apple Advertising Identifier") */
	const DEVICE_ID_RESETTABLE = 'device.id.resettable';
	/** @var string the preferred language that one of the user's devices is configured for */
	const DEVICE_LANGUAGE = 'device.language';
	/** @var string the manufacturer of one of the user's devices */
	const DEVICE_MANUFACTURER = 'device.manufacturer';
	/** @var string the model name of one of the user's devices */
	const DEVICE_MODEL = 'device.model';
	/** @var string the brand and version of the operating system (OS) on one of the user's devices */
	const DEVICE_OS = 'device.os';
	/** @var string the brand of the operating system (OS) on one of the user's devices */
	const DEVICE_OS_BRAND = 'device.os.brand';
	/** @var string the version of the operating system (OS) on one of the user's devices */
	const DEVICE_OS_VERSION = 'device.os.version';
	/** @var string the hidden list of additional (concealed) recipients of an email other than the primary recipient(s) */
	const EMAIL_BCC = 'email.bcc';
	/** @var string the message body or actual text of an email */
	const EMAIL_BODY = 'email.body';
	/** @var string the list of additional recipients of an email other than the primary recipient(s) */
	const EMAIL_CC = 'email.cc';
	/** @var string the date and time (written) of an email */
	const EMAIL_DATETIME = 'email.datetime';
	/** @var string the date (written) of an email */
	const EMAIL_DATETIME_DATE = 'email.datetime.date';
	/** @var string the time (written) of an email */
	const EMAIL_DATETIME_TIME = 'email.datetime.time';
	/** @var string the email address of the sender of an email */
	const EMAIL_FROM = 'email.from';
	/** @var string the email address of the sender of an email designated to receive replies */
	const EMAIL_REPLY_TO = 'email.reply_to';
	/** @var string the email address of the sender of an email designated to receive undeliverable messages */
	const EMAIL_RETURN_PATH = 'email.return_path';
	/** @var string the subject of an email */
	const EMAIL_SUBJECT = 'email.subject';
	/** @var string the email address of the recipient(s) of an email */
	const EMAIL_TO = 'email.to';
	/** @var string the number of the invoice */
	const INVOICE_NUMBER = 'invoice.number';
	/** @var string the message body or actual text of a letter */
	const LETTER_BODY = 'letter.body';
	/** @var string the note about additional recipients of a letter */
	const LETTER_CC = 'letter.cc';
	/** @var string the date and/or time the letter has been created */
	const LETTER_CREATION_TIME = 'letter.creation.time';
	/** @var string the date and time (written) of a letter */
	const LETTER_DATETIME = 'letter.datetime';
	/** @var string the date (written) of a letter */
	const LETTER_DATETIME_DATE = 'letter.datetime.date';
	/** @var string the time (written) of a letter */
	const LETTER_DATETIME_TIME = 'letter.datetime.time';
	/** @var string the list of enclosures of a letter */
	const LETTER_ENCLOSURES = 'letter.enclosures';
	/** @var string the headline or title of a letter */
	const LETTER_HEADLINE = 'letter.headline';
	/** @var string whether the letter has been the first one */
	const LETTER_IS_FIRST = 'letter.is_first';
	/** @var string whether the letter is for personal matters or for business matters */
	const LETTER_MATTER_PERSONAL_OR_BUSINESS = 'letter.matter.personal_or_business';
	/** @var string the date and/or time the letter has most recently been modified */
	const LETTER_MODIFICATION_TIME = 'letter.modification.time';
	/** @var string the postscript ("PS") to a letter */
	const LETTER_PS = 'letter.ps';
	/** @var string the salutation of the letter */
	const LETTER_SALUTATION = 'letter.salutation';
	/** @var string the subject of a letter */
	const LETTER_SUBJECT = 'letter.subject';
	/** @var string the valediction of the letter */
	const LETTER_VALEDICTION = 'letter.valediction';
	/** @var string the access privileges granted to the user */
	const USER_ACCESS_PRIVILEGES = 'user.access.privileges';
	/** @var string the physical address of the user */
	const USER_ADDRESS = 'user.address';
	/** @var string the country as part of the physical address of the user */
	const USER_ADDRESS_COUNTRY = 'user.address.country';
	/** @var string the locality (usually the city) as part of the physical address of the user */
	const USER_ADDRESS_LOCALITY = 'user.address.locality';
	/** @var string the location of a building or apartment (usually including the street, the street or house number, and potentially the apartment number) within a locality as part of the physical address of the user */
	const USER_ADDRESS_PLACE = 'user.address.place';
	/** @var string the postal code as part of the physical address of the user */
	const USER_ADDRESS_POSTAL_CODE = 'user.address.postal_code';
	/** @var string the region (often the state or province) as part of the physical address of the user */
	const USER_ADDRESS_REGION = 'user.address.region';
	/** @var string the complete date of birth of the user */
	const USER_BIRTH_DATE = 'user.birth.date';
	/** @var string the month and day of the date of birth of the user */
	const USER_BIRTH_DATE_MONTH_DAY = 'user.birth.date.md';
	/** @var string the year of the date of birth of the user */
	const USER_BIRTH_DATE_YEAR = 'user.birth.date.y';
	/** @var string the year and month of the date of birth of the user */
	const USER_BIRTH_DATE_YEAR_MONTH = 'user.birth.date.ym';
	/** @var string the place of birth of the user */
	const USER_BIRTH_PLACE = 'user.birth.place';
	/** @var string the blood group or blood type of the user */
	const USER_BLOOD_GROUP = 'user.blood.group';
	/** @var string the entry of the user's company in the commercial register */
	const USER_COMPANY_COMMERCIAL_REGISTER_ENTRY = 'user.company.commercial_register.entry';
	/** @var string the department of the user within their company */
	const USER_COMPANY_DEPARTMENT = 'user.company.department';
	/** @var string the members of the executive board of the user's company */
	const USER_COMPANY_EXECUTIVE_BOARD_MEMBERS = 'user.company.executive_board.members';
	/** @var string the logo of the company of the user */
	const USER_COMPANY_LOGO = 'user.company.logo';
	/** @var string the date and/or time the logo of the user's company has been created */
	const USER_COMPANY_LOGO_CREATION_TIME = 'user.company.logo.creation.time';
	/** @var string the label for the logo of the user's company */
	const USER_COMPANY_LOGO_LABEL = 'user.company.logo.label';
	/** @var string the date and/or time the logo of the user's company has most recently been modified */
	const USER_COMPANY_LOGO_MODIFICATION_TIME = 'user.company.logo.modification.time';
	/** @var string the members of the management of the user's company */
	const USER_COMPANY_MANAGEMENT_MEMBERS = 'user.company.management.members';
	/** @var string the name of the company of the user */
	const USER_COMPANY_NAME = 'user.company.name';
	/** @var string the members of the supervisory board of the user's company */
	const USER_COMPANY_SUPERVISORY_BOARD_MEMBERS = 'user.company.supervisory_board.members';
	/** @var string the user's country */
	const USER_COUNTRY = 'user.country';
	/** @var string the email address of the user */
	const USER_EMAIL = 'user.email';
	/** @var string whether the user's email address has been verified */
	const USER_EMAIL_VERIFIED = 'user.email.verified';
	/** @var string the fax number of the user */
	const USER_FAX = 'user.fax';
	/** @var string the identifying number or ID (e.g. IBAN) of the bank account of the user */
	const USER_FINANCIAL_BANK_ACCOUNT_ID = 'user.financial.bank.account.id';
	/** @var string the identifying number or ID (e.g. BIC) of the bank or financial institute of the user */
	const USER_FINANCIAL_BANK_ID = 'user.financial.bank.id';
	/** @var string the name of the bank or financial institute of the user */
	const USER_FINANCIAL_BANK_NAME = 'user.financial.bank.name';
	/** @var string the brand name (e.g. MasterCard or VISA) of a credit card of the user */
	const USER_FINANCIAL_CREDIT_CARD_BRAND = 'user.financial.credit_card.brand';
	/** @var string the verification code (CVC), verification value (CVV), security code (CSC) or other verification number of a credit card of the user */
	const USER_FINANCIAL_CREDIT_CARD_CVC = 'user.financial.credit_card.cvc';
	/** @var string the expiration date of a credit card of the user */
	const USER_FINANCIAL_CREDIT_CARD_EXPIRATION = 'user.financial.credit_card.expiration';
	/** @var string the number of a credit card of the user */
	const USER_FINANCIAL_CREDIT_CARD_NUMBER = 'user.financial.credit_card.number';
	/** @var string the gender of the user */
	const USER_GENDER = 'user.gender';
	/** @var string the geographical coordinates of the user */
	const USER_GEO_COORDINATES = 'user.geo.coordinates';
	/** @var string the height of the user */
	const USER_HEIGHT = 'user.height';
	/** @var string the "steuerliche Identifikationsnummer" ("Steuer-IdNr.") of the user in Germany */
	const USER_IDENTIFIERS_DEU_ST_IDNR = 'user.identifiers.deu.st_idnr';
	/** @var string the "Steuernummer" or "Steuer-Identnummer" ("St.-Nr.") of the user in Germany */
	const USER_IDENTIFIERS_DEU_ST_NR = 'user.identifiers.deu.st_nr';
	/** @var string the value-added tax (VAT) identification number (IN) (VATIN) of the user in the European Union */
	const USER_IDENTIFIERS_EU_VAT_IN = 'user.identifiers.eu.vat.in';
	/** @var string the "Social Security number" (SSN) of the user in the United States of America */
	const USER_IDENTIFIERS_USA_SSN = 'user.identifiers.usa.ssn';
	/** @var string the Internet Protocol (IP) address of the user */
	const USER_IP_ADDRESS = 'user.ip.address';
	/** @var string the Internet Protocol (IP) address of the user with its precision reduced to 25% */
	const USER_IP_ADDRESS_25_PERCENT = 'user.ip.address.25_percent';
	/** @var string the Internet Protocol (IP) address of the user with its precision reduced to 50% */
	const USER_IP_ADDRESS_50_PERCENT = 'user.ip.address.50_percent';
	/** @var string the Internet Protocol (IP) address of the user with its precision reduced to 75% */
	const USER_IP_ADDRESS_75_PERCENT = 'user.ip.address.75_percent';
	/** @var string the date and time of the (last) login of the user */
	const USER_LOGIN_DATETIME = 'user.login.datetime';
	/** @var string the date of the (last) login of the user */
	const USER_LOGIN_DATETIME_DATE = 'user.login.datetime.date';
	/** @var string the time of the (last) login of the user */
	const USER_LOGIN_DATETIME_TIME = 'user.login.datetime.time';
	/** @var string the name of the user */
	const USER_NAME = 'user.name';
	/** @var string the alias, nickname or username of the user */
	const USER_NAME_ALIAS = 'user.name.alias';
	/** @var string the family name of the user */
	const USER_NAME_FAMILY = 'user.name.family';
	/** @var string the given name of the user */
	const USER_NAME_GIVEN = 'user.name.given';
	/** @var string any custom notes saved by the user */
	const USER_NOTES = 'user.notes';
	/** @var string the occupation of the user */
	const USER_OCCUPATION = 'user.occupation';
	/** @var string the current occupation of the user */
	const USER_OCCUPATION_CURRENT = 'user.occupation.current';
	/** @var string the preferred occupation of the user */
	const USER_OCCUPATION_PREFERRED = 'user.occupation.preferred';
	/** @var string the password of the user as cleartext */
	const USER_PASSWORD_CLEARTEXT = 'user.password.cleartext';
	/** @var string the password of the user hashed using a well-known hashing algorithm that is accepted as such in the industry */
	const USER_PASSWORD_HASHED = 'user.password.hashed';
	/** @var string the password of the user hashed using an algorithm and configuration (cf. number of rounds) currently regarded as strong in the industry (e.g. Argon2, bcrypt, scrypt) */
	const USER_PASSWORD_HASHED_STRONG = 'user.password.hashed.strong';
	/** @var string whether password resets are permitted for the user */
	const USER_PASSWORD_RESETTABLE = 'user.password.resettable';
	/** @var string the phone number of the user */
	const USER_PHONE = 'user.phone';
	/** @var string the landline phone number of the user */
	const USER_PHONE_HOME = 'user.phone.home';
	/** @var string the mobile phone number of the user */
	const USER_PHONE_MOBILE = 'user.phone.mobile';
	/** @var string the primary picture of the user (e.g. portrait or profile picture) */
	const USER_PICTURE = 'user.picture';
	/** @var string the user's reference as a number or as text */
	const USER_REFERENCE = 'user.reference';
	/** @var string the date and time of the registration of the user */
	const USER_REGISTRATION_DATETIME = 'user.registration.datetime';
	/** @var string the date of the registration of the user */
	const USER_REGISTRATION_DATETIME_DATE = 'user.registration.datetime.date';
	/** @var string the time of the registration of the user */
	const USER_REGISTRATION_DATETIME_TIME = 'user.registration.datetime.time';
	/** @var string the signature of the user */
	const USER_SIGNATURE = 'user.signature';
	/** @var string the date and/or time the user's signature has been created */
	const USER_SIGNATURE_CREATION_TIME = 'user.signature.creation.time';
	/** @var string the signature of the user digitally drawn on their device */
	const USER_SIGNATURE_DRAWN = 'user.signature.drawn';
	/** @var string the handwritten signature of the user */
	const USER_SIGNATURE_HANDWRITTEN = 'user.signature.handwritten';
	/** @var string the label for the user's signature */
	const USER_SIGNATURE_LABEL = 'user.signature.label';
	/** @var string the date and/or time the user's signature has most recently been modified */
	const USER_SIGNATURE_MODIFICATION_TIME = 'user.signature.modification.time';
	/** @var string the URL of the website of the user */
	const USER_WEBSITE_URL = 'user.website.url';
	/** @var string the weight of the user */
	const USER_WEIGHT = 'user.weight';
	/** @var string the color of one of the user's vehicles */
	const VEHICLE_COLOR = 'vehicle.color';
	/** @var string the place of construction of one of the user's vehicles */
	const VEHICLE_CONSTRUCTION_PLACE = 'vehicle.construction.place';
	/** @var string the year of construction of one of the user's vehicles */
	const VEHICLE_CONSTRUCTION_YEAR = 'vehicle.construction.date.y';
	/** @var string the make of one of the user's vehicles */
	const VEHICLE_MAKE = 'vehicle.make';
	/** @var string the model name of one of the user's vehicles */
	const VEHICLE_MODEL = 'vehicle.model';
	/** @var string any custom notes pertaining to one of the user's vehicles */
	const VEHICLE_NOTES = 'vehicle.notes';
	/** @var string the registration plate number of one of the user's vehicles */
	const VEHICLE_REGISTRATION_PLATE_NUMBER = 'vehicle.registration.plate.number';

	/**
	 * Converts an identifier to a human-readable title in natural language
	 *
	 * @param string $identifier one of the constants from this class
	 * @return string the title in natural language
	 * @throws UnexpectedDataTypeError
	 */
	public static function toNaturalLanguage($identifier) {
		switch ($identifier) {
			case self::ACCESS_APP_VERSION: return 'Version of application used for access';
			case self::ACCESS_DATETIME_DATE: return 'Date for each access';
			case self::ACCESS_DATETIME: return 'Date and time for each access';
			case self::ACCESS_DATETIME_TIME: return 'Time for each access';
			case self::ACCESS_DEVICE_FEATURES_FILE_UPLOAD: return 'Availability of file uploads';
			case self::ACCESS_FIRST_TIME: return 'Time of first access';
			case self::ACCESS_HTTP_METHOD: return 'HTTP request method for each access';
			case self::ACCESS_HTTP_STATUS: return 'HTTP status code for each access';
			case self::ACCESS_IP_ADDRESS_25_PERCENT: return 'Internet Protocol (IP) address for each access (reduced to 25%% precision)';
			case self::ACCESS_IP_ADDRESS_50_PERCENT: return 'Internet Protocol (IP) address for each access (reduced to 50%% precision)';
			case self::ACCESS_IP_ADDRESS_75_PERCENT: return 'Internet Protocol (IP) address for each access (reduced to 75%% precision)';
			case self::ACCESS_IP_ADDRESS: return 'Internet Protocol (IP) address for each access';
			case self::ACCESS_REFERER: return 'Referring site (URL) for each access';
			case self::ACCESS_SIZE: return 'Amount of data transferred for each access';
			case self::ACCESS_URL: return 'Requested page (URL) for each access';
			case self::ACCESS_USERAGENT_STRING: return 'User-agent string for each access';
			case self::BILLING_CANCELLATION_TIME: return 'Time of cancellation';
			case self::BILLING_END_TIME: return 'End of billing';
			case self::BILLING_FREE_TRIAL: return 'Usage of free trial';
			case self::BILLING_ID_PAYMENT_SERVICE_PROVIDER: return 'Identification number with external payment service provider';
			case self::BILLING_MODIFICATION_TIME: return 'Time of last modification to billing options';
			case self::BILLING_NEXT_PAYMENT_TIME: return 'Time of next payment';
			case self::BILLING_PAST_DUE: return 'Payments past due';
			case self::BILLING_PLAN: return 'Plan or package for billing';
			case self::BILLING_START_TIME: return 'Start of billing';
			case self::CONTACT_ADDRESS_COUNTRY: return 'Country of contact';
			case self::CONTACT_ADDRESS_LOCALITY: return 'City of contact';
			case self::CONTACT_ADDRESS_PLACE: return 'Street name and house number of contact';
			case self::CONTACT_ADDRESS_POSTAL_CODE: return 'Postal code of contact';
			case self::CONTACT_ADDRESS_REGION: return 'State of contact';
			case self::CONTACT_ADDRESS: return 'Address of contact';
			case self::CONTACT_BIRTH_DATE_MONTH_DAY: return 'Month and day of birth of contact';
			case self::CONTACT_BIRTH_DATE: return 'Date of birth of contact';
			case self::CONTACT_BIRTH_DATE_YEAR_MONTH: return 'Year and month of birth of contact';
			case self::CONTACT_BIRTH_DATE_YEAR: return 'Year of birth of contact';
			case self::CONTACT_COMPANY_DEPARTMENT: return 'Department of contact within company';
			case self::CONTACT_COMPANY_NAME: return 'Company name of contact';
			case self::CONTACT_CREATION_TIME: return 'Time of creation of contact';
			case self::CONTACT_EMAIL: return 'Email address of contact';
			case self::CONTACT_FAX: return 'Fax number of contact';
			case self::CONTACT_FINANCIAL_BANK_ACCOUNT_ID: return 'Bank account number of contact';
			case self::CONTACT_FINANCIAL_BANK_ID: return 'Bank identifier of contact';
			case self::CONTACT_FINANCIAL_BANK_NAME: return 'Bank name of contact';
			case self::CONTACT_GENDER: return 'Gender of contact';
			case self::CONTACT_IDENTIFIERS_EU_VAT_IN: return 'VAT ID (European Union) of contact';
			case self::CONTACT_MODIFICATION_TIME: return 'Time of last modification to contact';
			case self::CONTACT_NAME_ALIAS: return 'Alias or username of contact';
			case self::CONTACT_NAME_FAMILY: return 'Family name of contact';
			case self::CONTACT_NAME_GIVEN: return 'Given name of contact';
			case self::CONTACT_NAME: return 'Name of contact';
			case self::CONTACT_ORIGINAL_MESSAGE_TIME: return 'Time of original message of contact';
			case self::CONTACT_PHONE_HOME: return 'Residential phone number of contact';
			case self::CONTACT_PHONE_MOBILE: return 'Mobile phone number of contact';
			case self::CONTACT_PHONE: return 'Phone number of contact';
			case self::CONTACT_REFERENCE: return 'Reference of contact';
			case self::CONTACT_WEBSITE_URL: return 'Website (URL) of contact';
			case self::CONTRACT_BILLING_AMOUNT: return 'Billing amount of contract';
			case self::CONTRACT_BILLING_CYCLE: return 'Billing cycle of contract';
			case self::CONTRACT_CANCELLATION_PERIOD: return 'Cancellation period of contract';
			case self::CONTRACT_CANCELLATION_TIME: return 'Time of cancellation of contract';
			case self::CONTRACT_CREATION_TIME: return 'Time of creation of contract';
			case self::CONTRACT_MODIFICATION_TIME: return 'Time of last modification to contract';
			case self::CONTRACT_NOTES: return 'Custom notes on contract';
			case self::CONTRACT_PARTNER: return 'Contractual partner';
			case self::CONTRACT_PERIOD_END: return 'End of contract';
			case self::CONTRACT_PERIOD_EXTENSION: return 'Contract duration after renewal';
			case self::CONTRACT_PERIOD_START: return 'Start of contract';
			case self::CUSTOMER_NUMBER: return 'Customer number';
			case self::DEVICE_BROWSER_BRAND: return 'Brand of web browser on device';
			case self::DEVICE_BROWSER: return 'Brand and version of web browser on device';
			case self::DEVICE_BROWSER_VERSION: return 'Version of web browser on device';
			case self::DEVICE_DATETIME_TIME_ZONE: return 'Time zone of device';
			case self::DEVICE_ID_PERMANENT: return 'Permanent identifier of device';
			case self::DEVICE_ID_RESETTABLE: return 'Resettable identifier of device';
			case self::DEVICE_LANGUAGE: return 'Language of device';
			case self::DEVICE_MANUFACTURER: return 'Manufacturer of device';
			case self::DEVICE_MODEL: return 'Model name of device';
			case self::DEVICE_OS_BRAND: return 'Brand of operating system on device';
			case self::DEVICE_OS: return 'Brand and version of operating system on device';
			case self::DEVICE_OS_VERSION: return 'Version of operating system on device';
			case self::EMAIL_BCC: return 'Email addresses in BCC line of email';
			case self::EMAIL_BODY: return 'Message text of email';
			case self::EMAIL_CC: return 'Email addresses in CC line of email';
			case self::EMAIL_DATETIME_DATE: return 'Date of email';
			case self::EMAIL_DATETIME: return 'Date and time of email';
			case self::EMAIL_DATETIME_TIME: return 'Time of email';
			case self::EMAIL_FROM: return 'Email address of sender of email';
			case self::EMAIL_REPLY_TO: return 'Email address of designated receiver of replies to email';
			case self::EMAIL_RETURN_PATH: return 'Email address of designated receiver of information on undeliverable email';
			case self::EMAIL_SUBJECT: return 'Subject of email';
			case self::EMAIL_TO: return 'Email addresses of recipients of email';
			case self::INVOICE_NUMBER: return 'Invoice number';
			case self::LETTER_BODY: return 'Message text of letter';
			case self::LETTER_CC: return 'Notes on additional recipients of letter';
			case self::LETTER_CREATION_TIME: return 'Time of creation of letter';
			case self::LETTER_DATETIME_DATE: return 'Date of letter';
			case self::LETTER_DATETIME: return 'Date and time of letter';
			case self::LETTER_DATETIME_TIME: return 'Time of letter';
			case self::LETTER_ENCLOSURES: return 'List of enclosures to letter';
			case self::LETTER_HEADLINE: return 'Headline of letter';
			case self::LETTER_IS_FIRST: return 'Classification of letter as first letter';
			case self::LETTER_MATTER_PERSONAL_OR_BUSINESS: return 'Classification of letter as personal or as relating to business';
			case self::LETTER_MODIFICATION_TIME: return 'Time of last modification to letter';
			case self::LETTER_PS: return 'Postscript of letter';
			case self::LETTER_SALUTATION: return 'Salutation of letter';
			case self::LETTER_SUBJECT: return 'Subject of letter';
			case self::LETTER_VALEDICTION: return 'Valediction of letter';
			case self::USER_ACCESS_PRIVILEGES: return 'Access privileges';
			case self::USER_ADDRESS_COUNTRY: return 'Country';
			case self::USER_ADDRESS_LOCALITY: return 'City';
			case self::USER_ADDRESS_PLACE: return 'Street name and house number';
			case self::USER_ADDRESS_POSTAL_CODE: return 'Postal code';
			case self::USER_ADDRESS_REGION: return 'State';
			case self::USER_ADDRESS: return 'Address';
			case self::USER_BIRTH_DATE_MONTH_DAY: return 'Month and day of birth';
			case self::USER_BIRTH_DATE: return 'Date of birth';
			case self::USER_BIRTH_DATE_YEAR_MONTH: return 'Year and month of birth';
			case self::USER_BIRTH_DATE_YEAR: return 'Year of birth';
			case self::USER_BIRTH_PLACE: return 'Place of birth';
			case self::USER_BLOOD_GROUP: return 'Blood group';
			case self::USER_COMPANY_COMMERCIAL_REGISTER_ENTRY: return 'Entry of company in commercial register';
			case self::USER_COMPANY_DEPARTMENT: return 'Department within company';
			case self::USER_COMPANY_EXECUTIVE_BOARD_MEMBERS: return 'Members of executive board of company';
			case self::USER_COMPANY_LOGO_CREATION_TIME: return 'Time of creation of logo of company';
			case self::USER_COMPANY_LOGO_LABEL: return 'Label for logo of company';
			case self::USER_COMPANY_LOGO_MODIFICATION_TIME: return 'Time of last modification to logo of company';
			case self::USER_COMPANY_LOGO: return 'Logo of company';
			case self::USER_COMPANY_MANAGEMENT_MEMBERS: return 'Members of management of company';
			case self::USER_COMPANY_NAME: return 'Company name';
			case self::USER_COMPANY_SUPERVISORY_BOARD_MEMBERS: return 'Members of supervisory board of company';
			case self::USER_COUNTRY: return 'Country';
			case self::USER_EMAIL: return 'Email address';
			case self::USER_EMAIL_VERIFIED: return 'Verification status of email address';
			case self::USER_FAX: return 'Fax number';
			case self::USER_FINANCIAL_BANK_ACCOUNT_ID: return 'Bank account number';
			case self::USER_FINANCIAL_BANK_ID: return 'Bank identifier';
			case self::USER_FINANCIAL_BANK_NAME: return 'Bank name';
			case self::USER_FINANCIAL_CREDIT_CARD_BRAND: return 'Brand name of credit card';
			case self::USER_FINANCIAL_CREDIT_CARD_CVC: return 'Verification code (e.g. CVC, CVV, CSC) of credit card';
			case self::USER_FINANCIAL_CREDIT_CARD_EXPIRATION: return 'Expiration date of credit card';
			case self::USER_FINANCIAL_CREDIT_CARD_NUMBER: return 'Card number of credit card';
			case self::USER_GENDER: return 'Gender';
			case self::USER_GEO_COORDINATES: return 'Geographical coordinates';
			case self::USER_HEIGHT: return 'Height';
			case self::USER_IDENTIFIERS_DEU_ST_IDNR: return 'Steuerliche Identifikationsnummer (Steuer-IdNr.) (Germany)';
			case self::USER_IDENTIFIERS_DEU_ST_NR: return 'Steuernummer (St.-Nr) (Germany)';
			case self::USER_IDENTIFIERS_EU_VAT_IN: return 'VAT ID (European Union)';
			case self::USER_IDENTIFIERS_USA_SSN: return 'Social Security number (SSN) (United States of America)';
			case self::USER_IP_ADDRESS_25_PERCENT: return 'Internet Protocol (IP) address (reduced to 25%% precision)';
			case self::USER_IP_ADDRESS_50_PERCENT: return 'Internet Protocol (IP) address (reduced to 50%% precision)';
			case self::USER_IP_ADDRESS_75_PERCENT: return 'Internet Protocol (IP) address (reduced to 75%% precision)';
			case self::USER_IP_ADDRESS: return 'Internet Protocol (IP) address';
			case self::USER_LOGIN_DATETIME_DATE: return 'Date of login';
			case self::USER_LOGIN_DATETIME: return 'Date and time of login';
			case self::USER_LOGIN_DATETIME_TIME: return 'Time of login';
			case self::USER_NAME_ALIAS: return 'Alias or username';
			case self::USER_NAME_FAMILY: return 'Family name';
			case self::USER_NAME_GIVEN: return 'Given name';
			case self::USER_NAME: return 'Name';
			case self::USER_NOTES: return 'Custom notes';
			case self::USER_OCCUPATION_CURRENT: return 'Current occupation';
			case self::USER_OCCUPATION_PREFERRED: return 'Preferred occupation';
			case self::USER_OCCUPATION: return 'Occupation';
			case self::USER_PASSWORD_CLEARTEXT: return 'Password (cleartext)';
			case self::USER_PASSWORD_HASHED: return 'Password (hash)';
			case self::USER_PASSWORD_HASHED_STRONG: return 'Password (strong hash)';
			case self::USER_PASSWORD_RESETTABLE: return 'Availability of password reset';
			case self::USER_PHONE_HOME: return 'Residential phone number';
			case self::USER_PHONE_MOBILE: return 'Mobile phone number';
			case self::USER_PHONE: return 'Phone number';
			case self::USER_PICTURE: return 'Picture';
			case self::USER_REFERENCE: return 'Reference';
			case self::USER_REGISTRATION_DATETIME_DATE: return 'Date of registration';
			case self::USER_REGISTRATION_DATETIME: return 'Date and time of registration';
			case self::USER_REGISTRATION_DATETIME_TIME: return 'Time of registration';
			case self::USER_SIGNATURE_CREATION_TIME: return 'Time of creation of signature';
			case self::USER_SIGNATURE_DRAWN: return 'Digitally drawn signature';
			case self::USER_SIGNATURE_HANDWRITTEN: return 'Handwritten signature';
			case self::USER_SIGNATURE_LABEL: return 'Label for signature';
			case self::USER_SIGNATURE_MODIFICATION_TIME: return 'Time of last modification to signature';
			case self::USER_SIGNATURE: return 'Signature';
			case self::USER_WEBSITE_URL: return 'Website (URL)';
			case self::USER_WEIGHT: return 'Body weight';
			case self::VEHICLE_COLOR: return 'Color of vehicle';
			case self::VEHICLE_CONSTRUCTION_PLACE: return 'Place of construction of vehicle';
			case self::VEHICLE_CONSTRUCTION_YEAR: return 'Year of construction of vehicle';
			case self::VEHICLE_MAKE: return 'Make of vehicle';
			case self::VEHICLE_MODEL: return 'Model name of vehicle';
			case self::VEHICLE_NOTES: return 'Custom notes on vehicle';
			case self::VEHICLE_REGISTRATION_PLATE_NUMBER: return 'Registration plate number of vehicle';
			default: throw new UnexpectedDataTypeError($identifier);
		}
	}

}
