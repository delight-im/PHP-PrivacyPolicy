# Migration

 * [General](#general)
 * [From `v1.x.x` to `v2.x.x`](#from-v1xx-to-v2xx)

## General

Update your version of this library using Composer and its `composer update` or `composer require` commands [[?]](https://github.com/delight-im/Knowledge/blob/master/Composer%20(PHP).md#how-do-i-update-libraries-or-modules-within-my-application).

## From `v1.x.x` to `v2.x.x`

 * The Internationalization extension (`intl`) for PHP is now required.
 * The method `setLastUpdated` from class `PrivacyPolicy` has been renamed to `setPublishedAt`.
 * The method `hasLastUpdated` from class `PrivacyPolicy` has been removed.
 * The method `setExpiration` from class `PrivacyPolicy` has been renamed to `setExpiresAt`.
 * The method `hasExpiration` from class `PrivacyPolicy` has been removed.
 * For method `addDataGroup` from class `PrivacyPolicy`, between the second parameter (named “description”) and the former third parameter (named “purposes”), two new parameters (named “bases” and “specialConditions”) have been added.
 * For the constructor of class `DataGroup`, between the second parameter (named “description”) and the former third parameter (named “purposes”), two new parameters (named “bases” and “specialConditions”) have been added.
 * For method `addElement` from class `DataGroup`, the fourth parameter (named “viewable”) and the fifth parameter (named “deletable”) have been removed.
 * For the constructor of class `DataElement`, the fourth parameter (named “viewable”) and the fifth parameter (named “deletable”) have been removed.
 * The methods `isViewable` and `isDeletable` from class `DataElement` have been removed.
 * The method `setRightToInformation` from class `PrivacyPolicy` has been replaced by the five separate methods `setRightOfAccess`, `setRightToRectification`, `setRightToErasure`, `setRightToRestrictProcessing` and `setRightToObject`.
 * The method `hasRightToInformation` from class `PrivacyPolicy` has been removed.
 * The key `meta.updated` in the JSON output has been renamed to `meta.published`.
 * The attributes `viewable` and `deletable` in `data[*].elements[*]` in the JSON output have been removed.
 * For `data[*].requirement` and `data[*].elements[*].requirement` in the JSON output, all occurrences of the value `opt_in` have been replaced with `optIn`, and all occurrences of `opt_out` have been replaced with `optOut`.
 * The key `choices.information.request` in the JSON output has been renamed to `choices.data.access`.
 * The key `choices.information.update` in the JSON output has been renamed to `choices.data.rectification`.
 * The key `choices.information.delete` in the JSON output has been renamed to `choices.data.erasure`.
