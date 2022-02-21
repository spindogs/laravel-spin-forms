# Changelog

All notable changes to `LaravelSpinForms` will be documented in this file.

## 2.2.0 - 2022-02-21
- Added in the ability to have both pre/post input help text
- Added the fieldset block (deprecated form group)
- Added in $attributes->merge for radio/checkbox
- Updated readme with new blocks and debug information

## 2.1.3 - 2021-11-02
- Added readonly information to readme.me

## 2.1.2 - 2021-10-30
- [FIX] Selects were erroneously adding a label when not instructed to

## 2.1.1 - 2021-10-28
- Updated Select elements to not have search on by default

## 2.1.0 - 2021-10-27
- Allow all attributes to be added to a button

## 2.0.1 - 2021-10-22
- [FIX] Input Radio was not selecting correctly from old data

## 2.0.0 - 2021-08-15

### New Version
- Added in Form Wrap, Form Group.
- Field wrap element is decoupled html structure allowing the separation of label and element where necessary.
- Radio and Checkbox have been rewritten. The no longer take array inputs, but are now designed to sit inside a Form Group. This is a breaking change from V1 to V2
- Changed "default" to "value" when calling elements to make more semantic sense.
- Refactored code
- Minor bug fixes

## 1.1.0 - 2021-10-27
- Allow all attributes to be added to a button

## 1.0.2 - 2021-08-03

### Added
- Updated Input, Textarea, Select, Date Picker, Date Time Picker, Time Picker. Allowing for manual designation of id attribute


## 1.0.1 - 2021-05-06

### Added
- [FIX] Label was not obeying attribute designation, so not displaying class / for etc


## 1.0 - 2021-02-02

### Added
- Everything
