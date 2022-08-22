# PHP-PrivacyPolicy

Programmatically composable privacy policies for [humans](../../tree/examples/Humans) and [machines](../../tree/examples/Machines)

## Requirements

 * PHP 5.6.0+
   * Internationalization extension (`intl`)

## Installation

 1. Include the library via Composer [[?]](https://github.com/delight-im/Knowledge/blob/master/Composer%20(PHP).md):

    ```
    $ composer require delight-im/privacy-policy
    ```

 1. Include the Composer autoloader:

    ```php
    require __DIR__ . '/vendor/autoload.php';
    ```

## Upgrading

Migrating from an earlier version of this project? See our [upgrade guide](Migration.md) for help.

## Usage

* [Creating an instance](#creating-an-instance)
  * [Privacy policies for humans in natural language](#privacy-policies-for-humans-in-natural-language)
  * [Privacy policies for machines in formal language](#privacy-policies-for-machines-in-formal-language)
* [Displaying or printing an instance](#displaying-or-printing-an-instance)
  * [Privacy policies for humans in natural language](#privacy-policies-for-humans-in-natural-language-1)
  * [Privacy policies for machines in formal language](#privacy-policies-for-machines-in-formal-language-1)
* [Defining metadata](#defining-metadata)
* [Describing your privacy practices](#describing-your-privacy-practices)
* [Explaining the amount, type and purpose of the data you collect](#explaining-the-amount-type-and-purpose-of-the-data-you-collect)
  * [Lawful bases](#lawful-bases)
  * [Special conditions](#special-conditions)
  * [Data purposes](#data-purposes)
  * [Data requirements](#data-requirements)
  * [Data types](#data-types)
    * [Primary](#primary)
    * [Secondary](#secondary)
    * [Tertiary](#tertiary)
* [Specifying the scope of your policy](#specifying-the-scope-of-your-policy)
* [Configuring an instance](#configuring-an-instance)
  * [Privacy policies for machines in formal language](#privacy-policies-for-machines-in-formal-language-2)

### Creating an instance

#### Privacy policies for humans in natural language

```php
$policy = new \Delight\PrivacyPolicy\Language\EnglishPrivacyPolicy();

// or

$policy = new \Delight\PrivacyPolicy\Language\GermanFormalPrivacyPolicy();
// or
$policy = new \Delight\PrivacyPolicy\Language\GermanInformalPrivacyPolicy();
```

#### Privacy policies for machines in formal language

```php
$policy = new \Delight\PrivacyPolicy\Language\JsonPrivacyPolicy();
```

### Displaying or printing an instance

#### Privacy policies for humans in natural language

```php
$policy->toHtml();
// or
$policy->toPlainText();
// or
$policy->toMarkdown();
```

#### Privacy policies for machines in formal language

```php
$policy->toJson();
```

### Defining metadata

```php
$policy->setPublishedAt(1393372800);
$policy->setTakesEffectAt(1394582400);
$policy->setExpiresAt(1395792000);
$policy->setVersionName('v3.1.4');
$policy->setCanonicalUrl('https://www.example.com/privacy.html');
$policy->setContactEmail('privacy@example.com');
$policy->setContactUrl('https://www.example.com/contact.html');
// $policy->setContactImage('https://www.example.com/images/contact.png', 'Jane Doe, 123 Main Street, Anytown, USA', 420, 360);
```

### Describing your privacy practices

```php
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
```

### Explaining the amount, type and purpose of the data you collect

```php
$policy->addDataGroup(
    'Server logs',
    'Whenever you access our services, ...',
    [ \Delight\PrivacyPolicy\Data\DataBasis::LEGITIMATE_INTERESTS ],
    null, // [ \Delight\PrivacyPolicy\Data\DataSpecialCondition::EXPLICIT_CONSENT ]
    [ \Delight\PrivacyPolicy\Data\DataPurpose::ADMINISTRATION ],
    \Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS,

    function (\Delight\PrivacyPolicy\Data\DataGroup $group) {
        $group->addElement(
            \Delight\PrivacyPolicy\Data\DataType::ACCESS_IP_ADDRESS,
            \Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS,
            24 * 7
        );
    }
);
```

#### Lawful bases

```php
\Delight\PrivacyPolicy\Data\DataBasis::CONSENT;
\Delight\PrivacyPolicy\Data\DataBasis::CONTRACT;
\Delight\PrivacyPolicy\Data\DataBasis::LEGAL_OBLIGATION;
\Delight\PrivacyPolicy\Data\DataBasis::LEGITIMATE_INTERESTS;
\Delight\PrivacyPolicy\Data\DataBasis::PUBLIC_INTEREST;
\Delight\PrivacyPolicy\Data\DataBasis::VITAL_INTERESTS;
```

#### Special conditions

```php
\Delight\PrivacyPolicy\Data\DataSpecialCondition::ARCHIVING_OR_RESEARCH;
\Delight\PrivacyPolicy\Data\DataSpecialCondition::EMPLOYMENT_AND_SOCIAL_SECURITY;
\Delight\PrivacyPolicy\Data\DataSpecialCondition::EXPLICIT_CONSENT;
\Delight\PrivacyPolicy\Data\DataSpecialCondition::FOUNDATION_ASSOCIATION_OR_NON_PROFIT;
\Delight\PrivacyPolicy\Data\DataSpecialCondition::HEALTH_AND_SOCIAL_CARE;
\Delight\PrivacyPolicy\Data\DataSpecialCondition::LEGAL_CLAIMS_OR_JUDICIAL_CAPACITY;
\Delight\PrivacyPolicy\Data\DataSpecialCondition::PUBLIC_DATA;
\Delight\PrivacyPolicy\Data\DataSpecialCondition::PUBLIC_HEALTH;
\Delight\PrivacyPolicy\Data\DataSpecialCondition::SUBSTANTIAL_PUBLIC_INTEREST;
\Delight\PrivacyPolicy\Data\DataSpecialCondition::VITAL_INTERESTS;
```

#### Data purposes

```php
\Delight\PrivacyPolicy\Data\DataPurpose::ADMINISTRATION;
\Delight\PrivacyPolicy\Data\DataPurpose::ADVERTISING;
\Delight\PrivacyPolicy\Data\DataPurpose::CUSTOMER_SUPPORT;
\Delight\PrivacyPolicy\Data\DataPurpose::FULFILLMENT;
\Delight\PrivacyPolicy\Data\DataPurpose::MARKETING;
\Delight\PrivacyPolicy\Data\DataPurpose::PERSONALIZATION;
\Delight\PrivacyPolicy\Data\DataPurpose::RESEARCH;
```

#### Data requirements

```php
\Delight\PrivacyPolicy\Data\DataRequirement::ALWAYS;
\Delight\PrivacyPolicy\Data\DataRequirement::OPT_IN;
\Delight\PrivacyPolicy\Data\DataRequirement::OPT_OUT;
```

#### Data types

##### Primary

```php
\Delight\PrivacyPolicy\Data\DataType::ACCESS_DATETIME;
\Delight\PrivacyPolicy\Data\DataType::ACCESS_DATETIME_DATE;
\Delight\PrivacyPolicy\Data\DataType::ACCESS_DATETIME_TIME;
\Delight\PrivacyPolicy\Data\DataType::ACCESS_HTTP_METHOD;
\Delight\PrivacyPolicy\Data\DataType::ACCESS_HTTP_STATUS;
\Delight\PrivacyPolicy\Data\DataType::ACCESS_IP_ADDRESS;
\Delight\PrivacyPolicy\Data\DataType::ACCESS_IP_ADDRESS_25_PERCENT;
\Delight\PrivacyPolicy\Data\DataType::ACCESS_IP_ADDRESS_50_PERCENT;
\Delight\PrivacyPolicy\Data\DataType::ACCESS_IP_ADDRESS_75_PERCENT;
\Delight\PrivacyPolicy\Data\DataType::ACCESS_REFERER;
\Delight\PrivacyPolicy\Data\DataType::ACCESS_SIZE;
\Delight\PrivacyPolicy\Data\DataType::ACCESS_URL;
\Delight\PrivacyPolicy\Data\DataType::ACCESS_USERAGENT_STRING;

\Delight\PrivacyPolicy\Data\DataType::BILLING_CANCELLATION_TIME;
\Delight\PrivacyPolicy\Data\DataType::BILLING_END_TIME;
\Delight\PrivacyPolicy\Data\DataType::BILLING_FREE_TRIAL;
\Delight\PrivacyPolicy\Data\DataType::BILLING_MODIFICATION_TIME;
\Delight\PrivacyPolicy\Data\DataType::BILLING_NEXT_PAYMENT_TIME;
\Delight\PrivacyPolicy\Data\DataType::BILLING_PAST_DUE;
\Delight\PrivacyPolicy\Data\DataType::BILLING_PLAN;
\Delight\PrivacyPolicy\Data\DataType::BILLING_START_TIME;

\Delight\PrivacyPolicy\Data\DataType::CUSTOMER_NUMBER;

\Delight\PrivacyPolicy\Data\DataType::DEVICE_BROWSER;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_BROWSER_BRAND;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_BROWSER_VERSION;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_DATETIME_TIME_ZONE;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_ID;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_ID_IMEI;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_ID_MAC_ADDRESS;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_ID_PERMANENT;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_ID_RESETTABLE;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_LANGUAGE;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_LOCATION_APPROXIMATE;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_LOCATION_PRECISE;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_MANUFACTURER;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_MODEL;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_OS;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_OS_BRAND;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_OS_VERSION;

\Delight\PrivacyPolicy\Data\DataType::USER_ACCESS_PRIVILEGES;
\Delight\PrivacyPolicy\Data\DataType::USER_ADDRESS;
\Delight\PrivacyPolicy\Data\DataType::USER_ADDRESS_COUNTRY;
\Delight\PrivacyPolicy\Data\DataType::USER_ADDRESS_LOCALITY;
\Delight\PrivacyPolicy\Data\DataType::USER_ADDRESS_PLACE;
\Delight\PrivacyPolicy\Data\DataType::USER_ADDRESS_POSTAL_CODE;
\Delight\PrivacyPolicy\Data\DataType::USER_ADDRESS_REGION;
\Delight\PrivacyPolicy\Data\DataType::USER_BIRTH_DATE;
\Delight\PrivacyPolicy\Data\DataType::USER_BIRTH_DATE_MONTH_DAY;
\Delight\PrivacyPolicy\Data\DataType::USER_BIRTH_DATE_YEAR;
\Delight\PrivacyPolicy\Data\DataType::USER_BIRTH_DATE_YEAR_MONTH;
\Delight\PrivacyPolicy\Data\DataType::USER_BIRTH_PLACE;
\Delight\PrivacyPolicy\Data\DataType::USER_BLOOD_GROUP;
\Delight\PrivacyPolicy\Data\DataType::USER_COMPANY_DEPARTMENT;
\Delight\PrivacyPolicy\Data\DataType::USER_COMPANY_LOGO;
\Delight\PrivacyPolicy\Data\DataType::USER_COMPANY_NAME;
\Delight\PrivacyPolicy\Data\DataType::USER_COUNTRY;
\Delight\PrivacyPolicy\Data\DataType::USER_EMAIL;
\Delight\PrivacyPolicy\Data\DataType::USER_EMAIL_VERIFIED;
\Delight\PrivacyPolicy\Data\DataType::USER_FAX;
\Delight\PrivacyPolicy\Data\DataType::USER_FINANCIAL_BANK_ACCOUNT_ID;
\Delight\PrivacyPolicy\Data\DataType::USER_FINANCIAL_BANK_ID;
\Delight\PrivacyPolicy\Data\DataType::USER_FINANCIAL_BANK_NAME;
\Delight\PrivacyPolicy\Data\DataType::USER_FINANCIAL_CREDIT_CARD_BRAND;
\Delight\PrivacyPolicy\Data\DataType::USER_FINANCIAL_CREDIT_CARD_CVC;
\Delight\PrivacyPolicy\Data\DataType::USER_FINANCIAL_CREDIT_CARD_EXPIRATION;
\Delight\PrivacyPolicy\Data\DataType::USER_FINANCIAL_CREDIT_CARD_NUMBER;
\Delight\PrivacyPolicy\Data\DataType::USER_GENDER;
\Delight\PrivacyPolicy\Data\DataType::USER_GEO_COORDINATES;
\Delight\PrivacyPolicy\Data\DataType::USER_HEIGHT;
\Delight\PrivacyPolicy\Data\DataType::USER_IDENTIFIERS_DEU_ST_IDNR;
\Delight\PrivacyPolicy\Data\DataType::USER_IDENTIFIERS_DEU_ST_NR;
\Delight\PrivacyPolicy\Data\DataType::USER_IDENTIFIERS_EU_VAT_IN;
\Delight\PrivacyPolicy\Data\DataType::USER_IDENTIFIERS_USA_SSN;
\Delight\PrivacyPolicy\Data\DataType::USER_IP_ADDRESS;
\Delight\PrivacyPolicy\Data\DataType::USER_IP_ADDRESS_25_PERCENT;
\Delight\PrivacyPolicy\Data\DataType::USER_IP_ADDRESS_50_PERCENT;
\Delight\PrivacyPolicy\Data\DataType::USER_IP_ADDRESS_75_PERCENT;
\Delight\PrivacyPolicy\Data\DataType::USER_LOGIN_DATETIME;
\Delight\PrivacyPolicy\Data\DataType::USER_LOGIN_DATETIME_DATE;
\Delight\PrivacyPolicy\Data\DataType::USER_LOGIN_DATETIME_TIME;
\Delight\PrivacyPolicy\Data\DataType::USER_NAME;
\Delight\PrivacyPolicy\Data\DataType::USER_NAME_ALIAS;
\Delight\PrivacyPolicy\Data\DataType::USER_NAME_FAMILY;
\Delight\PrivacyPolicy\Data\DataType::USER_NAME_GIVEN;
\Delight\PrivacyPolicy\Data\DataType::USER_NOTES;
\Delight\PrivacyPolicy\Data\DataType::USER_OCCUPATION;
\Delight\PrivacyPolicy\Data\DataType::USER_OCCUPATION_CURRENT;
\Delight\PrivacyPolicy\Data\DataType::USER_OCCUPATION_PREFERRED;
\Delight\PrivacyPolicy\Data\DataType::USER_PASSWORD_CLEARTEXT;
\Delight\PrivacyPolicy\Data\DataType::USER_PASSWORD_HASHED;
\Delight\PrivacyPolicy\Data\DataType::USER_PASSWORD_HASHED_STRONG;
\Delight\PrivacyPolicy\Data\DataType::USER_PASSWORD_RESETTABLE;
\Delight\PrivacyPolicy\Data\DataType::USER_PHONE;
\Delight\PrivacyPolicy\Data\DataType::USER_PHONE_HOME;
\Delight\PrivacyPolicy\Data\DataType::USER_PHONE_MOBILE;
\Delight\PrivacyPolicy\Data\DataType::USER_PICTURE;
\Delight\PrivacyPolicy\Data\DataType::USER_REGISTRATION_DATETIME;
\Delight\PrivacyPolicy\Data\DataType::USER_REGISTRATION_DATETIME_DATE;
\Delight\PrivacyPolicy\Data\DataType::USER_REGISTRATION_DATETIME_TIME;
\Delight\PrivacyPolicy\Data\DataType::USER_SIGNATURE;
\Delight\PrivacyPolicy\Data\DataType::USER_SIGNATURE_DRAWN;
\Delight\PrivacyPolicy\Data\DataType::USER_SIGNATURE_HANDWRITTEN;
\Delight\PrivacyPolicy\Data\DataType::USER_WEBSITE_URL;
\Delight\PrivacyPolicy\Data\DataType::USER_WEIGHT;
```

##### Secondary

```php
\Delight\PrivacyPolicy\Data\DataType::ACCESS_APP_VERSION;
\Delight\PrivacyPolicy\Data\DataType::ACCESS_FIRST_TIME;

\Delight\PrivacyPolicy\Data\DataType::BILLING_ID_PAYMENT_SERVICE_PROVIDER;

\Delight\PrivacyPolicy\Data\DataType::CALENDAR_EVENT_DATETIME;
\Delight\PrivacyPolicy\Data\DataType::CALENDAR_EVENT_DATETIME_DATE;
\Delight\PrivacyPolicy\Data\DataType::CALENDAR_EVENT_DATETIME_TIME;
\Delight\PrivacyPolicy\Data\DataType::CALENDAR_EVENT_TITLE;
\Delight\PrivacyPolicy\Data\DataType::CALENDAR_EVENT_TYPE;

\Delight\PrivacyPolicy\Data\DataType::CLIENT_DIAGNOSTICS;
\Delight\PrivacyPolicy\Data\DataType::CLIENT_DIAGNOSTICS_ENERGY_USAGE;
\Delight\PrivacyPolicy\Data\DataType::CLIENT_DIAGNOSTICS_ERRORS;
\Delight\PrivacyPolicy\Data\DataType::CLIENT_DIAGNOSTICS_ERRORS_LOGS;
\Delight\PrivacyPolicy\Data\DataType::CLIENT_DIAGNOSTICS_ERRORS_RATE;
\Delight\PrivacyPolicy\Data\DataType::CLIENT_DIAGNOSTICS_FRAME_RATE;
\Delight\PrivacyPolicy\Data\DataType::CLIENT_DIAGNOSTICS_TIMING;

\Delight\PrivacyPolicy\Data\DataType::CLIENT_INTERACTIONS;
\Delight\PrivacyPolicy\Data\DataType::CLIENT_INTERACTIONS_CLICKS_OR_TAPS;
\Delight\PrivacyPolicy\Data\DataType::CLIENT_INTERACTIONS_SESSIONS;
\Delight\PrivacyPolicy\Data\DataType::CLIENT_INTERACTIONS_VIEWS;
\Delight\PrivacyPolicy\Data\DataType::CLIENT_INTERACTIONS_VISITS;

\Delight\PrivacyPolicy\Data\DataType::CONTACT_ADDRESS;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_ADDRESS_COUNTRY;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_ADDRESS_LOCALITY;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_ADDRESS_PLACE;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_ADDRESS_POSTAL_CODE;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_ADDRESS_REGION;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_BIRTH_DATE;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_BIRTH_DATE_MONTH_DAY;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_BIRTH_DATE_YEAR;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_BIRTH_DATE_YEAR_MONTH;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_COMPANY_DEPARTMENT;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_COMPANY_NAME;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_CREATION_TIME;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_EMAIL;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_FAX;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_FINANCIAL_BANK_ACCOUNT_ID;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_FINANCIAL_BANK_ID;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_FINANCIAL_BANK_NAME;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_GENDER;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_IDENTIFIERS_EU_VAT_IN;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_MODIFICATION_TIME;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_NAME;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_NAME_ALIAS;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_NAME_FAMILY;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_NAME_GIVEN;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_ORIGINAL_MESSAGE_TIME;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_PHONE;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_PHONE_HOME;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_PHONE_MOBILE;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_REFERENCE;
\Delight\PrivacyPolicy\Data\DataType::CONTACT_WEBSITE_URL;

\Delight\PrivacyPolicy\Data\DataType::EMAIL_BCC;
\Delight\PrivacyPolicy\Data\DataType::EMAIL_BODY;
\Delight\PrivacyPolicy\Data\DataType::EMAIL_CC;
\Delight\PrivacyPolicy\Data\DataType::EMAIL_DATETIME;
\Delight\PrivacyPolicy\Data\DataType::EMAIL_DATETIME_DATE;
\Delight\PrivacyPolicy\Data\DataType::EMAIL_DATETIME_TIME;
\Delight\PrivacyPolicy\Data\DataType::EMAIL_FROM;
\Delight\PrivacyPolicy\Data\DataType::EMAIL_REPLY_TO;
\Delight\PrivacyPolicy\Data\DataType::EMAIL_RETURN_PATH;
\Delight\PrivacyPolicy\Data\DataType::EMAIL_SUBJECT;
\Delight\PrivacyPolicy\Data\DataType::EMAIL_TO;

\Delight\PrivacyPolicy\Data\DataType::FILE_CONTENTS;
\Delight\PrivacyPolicy\Data\DataType::FILE_NAME;
\Delight\PrivacyPolicy\Data\DataType::FILE_SIZE;

\Delight\PrivacyPolicy\Data\DataType::INVOICE_AMOUNT_GROSS;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_AMOUNT_NET;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_CUSTOMER_NUMBER;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_DATETIME_DATE;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_FULFILLMENT_PERIOD;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_NUMBER;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_RECIPIENT;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_TAXES;

\Delight\PrivacyPolicy\Data\DataType::USER_REFERENCE;
```

##### Tertiary

```php
\Delight\PrivacyPolicy\Data\DataType::ACCESS_DEVICE_FEATURES_FILE_UPLOAD;

\Delight\PrivacyPolicy\Data\DataType::CONTRACT_BILLING_AMOUNT;
\Delight\PrivacyPolicy\Data\DataType::CONTRACT_BILLING_CYCLE;
\Delight\PrivacyPolicy\Data\DataType::CONTRACT_CANCELLATION_PERIOD;
\Delight\PrivacyPolicy\Data\DataType::CONTRACT_CANCELLATION_TIME;
\Delight\PrivacyPolicy\Data\DataType::CONTRACT_CREATION_TIME;
\Delight\PrivacyPolicy\Data\DataType::CONTRACT_MODIFICATION_TIME;
\Delight\PrivacyPolicy\Data\DataType::CONTRACT_NOTES;
\Delight\PrivacyPolicy\Data\DataType::CONTRACT_PARTNER;
\Delight\PrivacyPolicy\Data\DataType::CONTRACT_PERIOD_END;
\Delight\PrivacyPolicy\Data\DataType::CONTRACT_PERIOD_EXTENSION;
\Delight\PrivacyPolicy\Data\DataType::CONTRACT_PERIOD_START;

\Delight\PrivacyPolicy\Data\DataType::DEVICE_DIAGNOSTICS;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_DIAGNOSTICS_ENERGY;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_DIAGNOSTICS_ENERGY_LEVEL;
\Delight\PrivacyPolicy\Data\DataType::DEVICE_DIAGNOSTICS_ENERGY_SOURCE;

\Delight\PrivacyPolicy\Data\DataType::INVOICE_CREATION_TIME;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_DISCOUNT;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_ITEM_DESCRIPTION;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_ITEM_DISCOUNT;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_ITEM_PRICE_GROSS;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_ITEM_PRICE_NET;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_ITEM_QUANTITY;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_ITEM_TAXES;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_MESSAGE;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_MODIFICATION_TIME;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_NOTES;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_PAYMENT_DATETIME;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_PAYMENT_TERMS;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_REFUND_DATETIME;
\Delight\PrivacyPolicy\Data\DataType::INVOICE_REMINDER_DATETIME;

\Delight\PrivacyPolicy\Data\DataType::LETTER_BODY;
\Delight\PrivacyPolicy\Data\DataType::LETTER_CC;
\Delight\PrivacyPolicy\Data\DataType::LETTER_CREATION_TIME;
\Delight\PrivacyPolicy\Data\DataType::LETTER_DATETIME;
\Delight\PrivacyPolicy\Data\DataType::LETTER_DATETIME_DATE;
\Delight\PrivacyPolicy\Data\DataType::LETTER_DATETIME_TIME;
\Delight\PrivacyPolicy\Data\DataType::LETTER_ENCLOSURES;
\Delight\PrivacyPolicy\Data\DataType::LETTER_HEADLINE;
\Delight\PrivacyPolicy\Data\DataType::LETTER_IS_FIRST;
\Delight\PrivacyPolicy\Data\DataType::LETTER_MATTER_PERSONAL_OR_BUSINESS;
\Delight\PrivacyPolicy\Data\DataType::LETTER_MODIFICATION_TIME;
\Delight\PrivacyPolicy\Data\DataType::LETTER_PS;
\Delight\PrivacyPolicy\Data\DataType::LETTER_SALUTATION;
\Delight\PrivacyPolicy\Data\DataType::LETTER_SUBJECT;
\Delight\PrivacyPolicy\Data\DataType::LETTER_VALEDICTION;

\Delight\PrivacyPolicy\Data\DataType::USER_COMPANY_COMMERCIAL_REGISTER_ENTRY;
\Delight\PrivacyPolicy\Data\DataType::USER_COMPANY_EXECUTIVE_BOARD_MEMBERS;
\Delight\PrivacyPolicy\Data\DataType::USER_COMPANY_LOGO_CREATION_TIME;
\Delight\PrivacyPolicy\Data\DataType::USER_COMPANY_LOGO_LABEL;
\Delight\PrivacyPolicy\Data\DataType::USER_COMPANY_LOGO_MODIFICATION_TIME;
\Delight\PrivacyPolicy\Data\DataType::USER_COMPANY_MANAGEMENT_MEMBERS;
\Delight\PrivacyPolicy\Data\DataType::USER_COMPANY_SUPERVISORY_BOARD_MEMBERS;
\Delight\PrivacyPolicy\Data\DataType::USER_FINANCIAL_PURCHASE_HISTORY;
\Delight\PrivacyPolicy\Data\DataType::USER_IDENTIFIERS_ACCOUNT_ID;
\Delight\PrivacyPolicy\Data\DataType::USER_IDENTIFIERS_ACCOUNT_NAME;
\Delight\PrivacyPolicy\Data\DataType::USER_IDENTIFIERS_ACCOUNT_TYPE;
\Delight\PrivacyPolicy\Data\DataType::USER_SIGNATURE_CREATION_TIME;
\Delight\PrivacyPolicy\Data\DataType::USER_SIGNATURE_LABEL;
\Delight\PrivacyPolicy\Data\DataType::USER_SIGNATURE_MODIFICATION_TIME;

\Delight\PrivacyPolicy\Data\DataType::VEHICLE_COLOR;
\Delight\PrivacyPolicy\Data\DataType::VEHICLE_CONSTRUCTION_PLACE;
\Delight\PrivacyPolicy\Data\DataType::VEHICLE_CONSTRUCTION_YEAR;
\Delight\PrivacyPolicy\Data\DataType::VEHICLE_MAKE;
\Delight\PrivacyPolicy\Data\DataType::VEHICLE_MODEL;
\Delight\PrivacyPolicy\Data\DataType::VEHICLE_NOTES;
\Delight\PrivacyPolicy\Data\DataType::VEHICLE_REGISTRATION_PLATE_NUMBER;
```

### Specifying the scope of your policy

```php
$policy->addScope(
    new \Delight\PrivacyPolicy\Scope\WebsiteScope('https://www.example.com/', 'example.com')
);

// and/or

$policy->addScope(
    new \Delight\PrivacyPolicy\Scope\PlayStoreAndroidAppScope('com.example.app', 'Example for Android')
);

// and/or

$policy->addScope(
    new \Delight\PrivacyPolicy\Scope\AppStoreIosAppScope('54614917093', 'Example for iOS')
);
```

### Configuring an instance

#### Privacy policies for machines in formal language

```php
$policy->setMinified(true);
```

## Frequently asked questions

### How can I help translate the policy to my language?

If there's a class for your language in the [`src/Language/`](src/Language/) directory already, you can just start working on that file.

If there's no such class yet, simply create a new file for your language:

 1. Copy the [template](../../blob/templates/src/Language/MyLanguagePrivacyPolicy.php) class that extends `HumanPrivacyPolicy`
 1. Rename the class and file to specify the name of your language (following the common naming scheme)
 1. Update the documentation comment for the class
 1. Replace all occurrences of

    ```php
    throw new TranslationNotFoundError();
    ```

    (except for that in the `default` case of the `switch` block) with a `return` statement specifying the translated string

### Why is the HTML output not displayed correctly when using the “Bootstrap” framework?

The “Bootstrap” front-end framework overwrites some of the default CSS properties for definition/description lists. In order to fix how the policy is displayed, you have to reset those properties to their default values or improve them further. Usually, you may want to restrict these resets to the container element of your policy.

#### Bootstrap 3

```css
dl {
    margin-top: 0;
    margin-bottom: 16px;
}
dl dl {
    margin-left: 24px;
}
dd {
    margin-bottom: 8px;
    margin-left: 0;
}
dl dl dl dd {
    margin-bottom: 0;
}
```

#### Bootstrap 4

```css
dl {
    margin-top: 0;
    margin-bottom: 1rem;
}
dl dl {
    margin-left: 1.5rem;
}
dd {
    margin-bottom: 0.5rem;
    margin-left: 0;
}
dl dl dl dd {
    margin-bottom: 0;
}
```

## Disclaimer

This project does not constitute legal advice and is not to be relied upon or acted on as such. Any material presented here is for general information purposes only and may be out of date, incomplete or not suitable for your jurisdiction. You should seek independent legal advice from a qualified professional to guide your decisions around a valid and complete privacy policy.

## Contributing

All contributions are welcome! If you wish to contribute, please create an issue first so that your feature, problem or question can be discussed.

## License

This project is licensed under the terms of the [MIT License](https://opensource.org/licenses/MIT).
