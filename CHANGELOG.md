# Changelog

All Notable changes to `resume` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](http://keepachangelog.com/) principles.

## [Unreleased]

### Added
- Added middleware to config file
- Replaced references in code to middleware to point to config file
- Replaced TinyMCE with CKEditor because TinyMCE was getting annoying
- Added PHPUnit Tests

### Fixed
- Removed locale specific functions, replaced with my translation package
- Fixed problem with namespace and location of middleware
- Removed irrelevant tables from migrations
- Replaced header section in views with a push to stack scripts, which makes more sense
- Replaced references to Laravel's form functions with just normal forms, for ease of use
- Fixed a small issue with model and controller