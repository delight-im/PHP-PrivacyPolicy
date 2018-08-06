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
use Delight\PrivacyPolicy\Language\EnglishPrivacyPolicy;
use Delight\PrivacyPolicy\Language\GermanFormalPrivacyPolicy;
use Delight\PrivacyPolicy\Language\GermanInformalPrivacyPolicy;

$policy = new EnglishPrivacyPolicy();

// or

$policy = new GermanFormalPrivacyPolicy();
// or
$policy = new GermanInformalPrivacyPolicy();
```

#### Privacy policies for machines in formal language

```php
use Delight\PrivacyPolicy\Language\JsonPrivacyPolicy;

$policy = new JsonPrivacyPolicy();
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
$policy->setChildrenMinimumAge(13);
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
use Delight\PrivacyPolicy\Data\DataBasis;
use Delight\PrivacyPolicy\Data\DataGroup;
use Delight\PrivacyPolicy\Data\DataPurpose;
use Delight\PrivacyPolicy\Data\DataRequirement;
use Delight\PrivacyPolicy\Data\DataSpecialCondition;
use Delight\PrivacyPolicy\Data\DataType;

$policy->addDataGroup(
    'Server logs',
    'Whenever you access our services, ...',
    [ DataBasis::LEGITIMATE_INTERESTS ],
    null, // [ DataSpecialCondition::EXPLICIT_CONSENT ]
    [ DataPurpose::ADMINISTRATION ],
    DataRequirement::ALWAYS,

    function (DataGroup $group) {
        $group->addElement(
            DataType::ACCESS_IP_ADDRESS,
            DataRequirement::ALWAYS,
            24 * 7
        );
    }
);
```

#### Lawful bases

```php
use Delight\PrivacyPolicy\Data\DataBasis;

DataBasis::CONSENT;
DataBasis::CONTRACT;
DataBasis::LEGAL_OBLIGATION;
DataBasis::LEGITIMATE_INTERESTS;
DataBasis::PUBLIC_INTEREST;
DataBasis::VITAL_INTERESTS;
```

#### Special conditions

```php
use Delight\PrivacyPolicy\Data\DataSpecialCondition;

DataSpecialCondition::ARCHIVING_OR_RESEARCH;
DataSpecialCondition::EMPLOYMENT_AND_SOCIAL_SECURITY;
DataSpecialCondition::EXPLICIT_CONSENT;
DataSpecialCondition::FOUNDATION_ASSOCIATION_OR_NON_PROFIT;
DataSpecialCondition::HEALTH_AND_SOCIAL_CARE;
DataSpecialCondition::LEGAL_CLAIMS_OR_JUDICIAL_CAPACITY;
DataSpecialCondition::PUBLIC_DATA;
DataSpecialCondition::PUBLIC_HEALTH;
DataSpecialCondition::SUBSTANTIAL_PUBLIC_INTEREST;
DataSpecialCondition::VITAL_INTERESTS;
```

#### Data purposes

```php
use Delight\PrivacyPolicy\Data\DataPurpose;

DataPurpose::ADMINISTRATION;
DataPurpose::ADVERTISING;
DataPurpose::CUSTOMER_SUPPORT;
DataPurpose::FULFILLMENT;
DataPurpose::MARKETING;
DataPurpose::PERSONALIZATION;
DataPurpose::RESEARCH;
```

#### Data requirements

```php
use Delight\PrivacyPolicy\Data\DataRequirement;

DataRequirement::ALWAYS;
DataRequirement::OPT_IN;
DataRequirement::OPT_OUT;
```

#### Data types

##### Primary

```php
use Delight\PrivacyPolicy\Data\DataType;

DataType::ACCESS_DATETIME;
DataType::ACCESS_DATETIME_DATE;
DataType::ACCESS_DATETIME_TIME;
DataType::ACCESS_HTTP_METHOD;
DataType::ACCESS_HTTP_STATUS;
DataType::ACCESS_IP_ADDRESS;
DataType::ACCESS_IP_ADDRESS_25_PERCENT;
DataType::ACCESS_IP_ADDRESS_50_PERCENT;
DataType::ACCESS_IP_ADDRESS_75_PERCENT;
DataType::ACCESS_REFERER;
DataType::ACCESS_SIZE;
DataType::ACCESS_URL;
DataType::ACCESS_USERAGENT_STRING;

DataType::BILLING_CANCELLATION_TIME;
DataType::BILLING_END_TIME;
DataType::BILLING_FREE_TRIAL;
DataType::BILLING_MODIFICATION_TIME;
DataType::BILLING_NEXT_PAYMENT_TIME;
DataType::BILLING_PAST_DUE;
DataType::BILLING_PLAN;
DataType::BILLING_START_TIME;

DataType::CUSTOMER_NUMBER;

DataType::DEVICE_BROWSER;
DataType::DEVICE_BROWSER_BRAND;
DataType::DEVICE_BROWSER_VERSION;
DataType::DEVICE_DATETIME_TIME_ZONE;
DataType::DEVICE_ID_PERMANENT;
DataType::DEVICE_ID_RESETTABLE;
DataType::DEVICE_LANGUAGE;
DataType::DEVICE_MANUFACTURER;
DataType::DEVICE_MODEL;
DataType::DEVICE_OS;
DataType::DEVICE_OS_BRAND;
DataType::DEVICE_OS_VERSION;

DataType::USER_ACCESS_PRIVILEGES;
DataType::USER_ADDRESS;
DataType::USER_ADDRESS_COUNTRY;
DataType::USER_ADDRESS_LOCALITY;
DataType::USER_ADDRESS_PLACE;
DataType::USER_ADDRESS_POSTAL_CODE;
DataType::USER_ADDRESS_REGION;
DataType::USER_BIRTH_DATE;
DataType::USER_BIRTH_DATE_MONTH_DAY;
DataType::USER_BIRTH_DATE_YEAR;
DataType::USER_BIRTH_DATE_YEAR_MONTH;
DataType::USER_BIRTH_PLACE;
DataType::USER_BLOOD_GROUP;
DataType::USER_COMPANY_DEPARTMENT;
DataType::USER_COMPANY_LOGO;
DataType::USER_COMPANY_NAME;
DataType::USER_COUNTRY;
DataType::USER_EMAIL;
DataType::USER_EMAIL_VERIFIED;
DataType::USER_FAX;
DataType::USER_FINANCIAL_BANK_ACCOUNT_ID;
DataType::USER_FINANCIAL_BANK_ID;
DataType::USER_FINANCIAL_BANK_NAME;
DataType::USER_FINANCIAL_CREDIT_CARD_BRAND;
DataType::USER_FINANCIAL_CREDIT_CARD_CVC;
DataType::USER_FINANCIAL_CREDIT_CARD_EXPIRATION;
DataType::USER_FINANCIAL_CREDIT_CARD_NUMBER;
DataType::USER_GENDER;
DataType::USER_GEO_COORDINATES;
DataType::USER_HEIGHT;
DataType::USER_IDENTIFIERS_DEU_ST_IDNR;
DataType::USER_IDENTIFIERS_DEU_ST_NR;
DataType::USER_IDENTIFIERS_EU_VAT_IN;
DataType::USER_IDENTIFIERS_USA_SSN;
DataType::USER_IP_ADDRESS;
DataType::USER_IP_ADDRESS_25_PERCENT;
DataType::USER_IP_ADDRESS_50_PERCENT;
DataType::USER_IP_ADDRESS_75_PERCENT;
DataType::USER_LOGIN_DATETIME;
DataType::USER_LOGIN_DATETIME_DATE;
DataType::USER_LOGIN_DATETIME_TIME;
DataType::USER_NAME;
DataType::USER_NAME_ALIAS;
DataType::USER_NAME_FAMILY;
DataType::USER_NAME_GIVEN;
DataType::USER_NOTES;
DataType::USER_OCCUPATION;
DataType::USER_OCCUPATION_CURRENT;
DataType::USER_OCCUPATION_PREFERRED;
DataType::USER_PASSWORD_CLEARTEXT;
DataType::USER_PASSWORD_HASHED;
DataType::USER_PASSWORD_HASHED_STRONG;
DataType::USER_PASSWORD_RESETTABLE;
DataType::USER_PHONE;
DataType::USER_PHONE_HOME;
DataType::USER_PHONE_MOBILE;
DataType::USER_PICTURE;
DataType::USER_REGISTRATION_DATETIME;
DataType::USER_REGISTRATION_DATETIME_DATE;
DataType::USER_REGISTRATION_DATETIME_TIME;
DataType::USER_SIGNATURE;
DataType::USER_SIGNATURE_DRAWN;
DataType::USER_SIGNATURE_HANDWRITTEN;
DataType::USER_WEBSITE_URL;
DataType::USER_WEIGHT;
```

##### Secondary

```php
use Delight\PrivacyPolicy\Data\DataType;

DataType::ACCESS_APP_VERSION;
DataType::ACCESS_FIRST_TIME;

DataType::BILLING_ID_PAYMENT_SERVICE_PROVIDER;

DataType::CONTACT_ADDRESS;
DataType::CONTACT_ADDRESS_COUNTRY;
DataType::CONTACT_ADDRESS_LOCALITY;
DataType::CONTACT_ADDRESS_PLACE;
DataType::CONTACT_ADDRESS_POSTAL_CODE;
DataType::CONTACT_ADDRESS_REGION;
DataType::CONTACT_BIRTH_DATE;
DataType::CONTACT_BIRTH_DATE_MONTH_DAY;
DataType::CONTACT_BIRTH_DATE_YEAR;
DataType::CONTACT_BIRTH_DATE_YEAR_MONTH;
DataType::CONTACT_COMPANY_DEPARTMENT;
DataType::CONTACT_COMPANY_NAME;
DataType::CONTACT_CREATION_TIME;
DataType::CONTACT_EMAIL;
DataType::CONTACT_FAX;
DataType::CONTACT_FINANCIAL_BANK_ACCOUNT_ID;
DataType::CONTACT_FINANCIAL_BANK_ID;
DataType::CONTACT_FINANCIAL_BANK_NAME;
DataType::CONTACT_GENDER;
DataType::CONTACT_IDENTIFIERS_EU_VAT_IN;
DataType::CONTACT_MODIFICATION_TIME;
DataType::CONTACT_NAME;
DataType::CONTACT_NAME_ALIAS;
DataType::CONTACT_NAME_FAMILY;
DataType::CONTACT_NAME_GIVEN;
DataType::CONTACT_ORIGINAL_MESSAGE_TIME;
DataType::CONTACT_PHONE;
DataType::CONTACT_PHONE_HOME;
DataType::CONTACT_PHONE_MOBILE;
DataType::CONTACT_REFERENCE;
DataType::CONTACT_WEBSITE_URL;

DataType::EMAIL_BCC;
DataType::EMAIL_BODY;
DataType::EMAIL_CC;
DataType::EMAIL_DATETIME;
DataType::EMAIL_DATETIME_DATE;
DataType::EMAIL_DATETIME_TIME;
DataType::EMAIL_FROM;
DataType::EMAIL_REPLY_TO;
DataType::EMAIL_RETURN_PATH;
DataType::EMAIL_SUBJECT;
DataType::EMAIL_TO;

DataType::INVOICE_NUMBER;

DataType::USER_REFERENCE;
```

##### Tertiary

```php
use Delight\PrivacyPolicy\Data\DataType;

DataType::ACCESS_DEVICE_FEATURES_FILE_UPLOAD;

DataType::CONTRACT_BILLING_AMOUNT;
DataType::CONTRACT_BILLING_CYCLE;
DataType::CONTRACT_CANCELLATION_PERIOD;
DataType::CONTRACT_CANCELLATION_TIME;
DataType::CONTRACT_CREATION_TIME;
DataType::CONTRACT_MODIFICATION_TIME;
DataType::CONTRACT_NOTES;
DataType::CONTRACT_PARTNER;
DataType::CONTRACT_PERIOD_END;
DataType::CONTRACT_PERIOD_EXTENSION;
DataType::CONTRACT_PERIOD_START;

DataType::LETTER_BODY;
DataType::LETTER_CC;
DataType::LETTER_CREATION_TIME;
DataType::LETTER_DATETIME;
DataType::LETTER_DATETIME_DATE;
DataType::LETTER_DATETIME_TIME;
DataType::LETTER_ENCLOSURES;
DataType::LETTER_HEADLINE;
DataType::LETTER_IS_FIRST;
DataType::LETTER_MATTER_PERSONAL_OR_BUSINESS;
DataType::LETTER_MODIFICATION_TIME;
DataType::LETTER_PS;
DataType::LETTER_SALUTATION;
DataType::LETTER_SUBJECT;
DataType::LETTER_VALEDICTION;

DataType::USER_COMPANY_COMMERCIAL_REGISTER_ENTRY;
DataType::USER_COMPANY_EXECUTIVE_BOARD_MEMBERS;
DataType::USER_COMPANY_LOGO_CREATION_TIME;
DataType::USER_COMPANY_LOGO_LABEL;
DataType::USER_COMPANY_LOGO_MODIFICATION_TIME;
DataType::USER_COMPANY_MANAGEMENT_MEMBERS;
DataType::USER_COMPANY_SUPERVISORY_BOARD_MEMBERS;
DataType::USER_SIGNATURE_CREATION_TIME;
DataType::USER_SIGNATURE_LABEL;
DataType::USER_SIGNATURE_MODIFICATION_TIME;

DataType::VEHICLE_COLOR;
DataType::VEHICLE_CONSTRUCTION_PLACE;
DataType::VEHICLE_CONSTRUCTION_YEAR;
DataType::VEHICLE_MAKE;
DataType::VEHICLE_MODEL;
DataType::VEHICLE_NOTES;
DataType::VEHICLE_REGISTRATION_PLATE_NUMBER;
```

### Specifying the scope of your policy

```php
use Delight\PrivacyPolicy\Scope\AppStoreIosAppScope;
use Delight\PrivacyPolicy\Scope\WebsiteScope;
use Delight\PrivacyPolicy\Scope\PlayStoreAndroidAppScope;

$policy->addScope(
    new WebsiteScope('https://www.example.com/', 'example.com')
);

// and/or

$policy->addScope(
    new PlayStoreAndroidAppScope('com.example.app', 'Example for Android')
);

// and/or

$policy->addScope(
    new AppStoreIosAppScope('54614917093', 'Example for iOS')
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

The “Bootstrap” front-end framework overwrites some of the default CSS properties for definition/description lists. In order to fix how the policy is displayed, you have to reset those properties to their default values. Usually, you may want to restrict these resets to the container element of your policy.

```css
dl { margin: 1.12em 0; }
dl dl { margin: 0; }
dd { margin-left: 40px; }
```

## Disclaimer

This project does not constitute legal advice and is not to be relied upon or acted on as such. Any material presented here is for general information purposes only and may be out of date, incomplete or not suitable for your jurisdiction. You should seek independent legal advice from a qualified professional to guide your decisions around a valid and complete privacy policy.

## Contributing

All contributions are welcome! If you wish to contribute, please create an issue first so that your feature, problem or question can be discussed.

## License

This project is licensed under the terms of the [MIT License](https://opensource.org/licenses/MIT).
