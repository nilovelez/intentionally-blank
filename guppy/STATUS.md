# Status

Version 3.3 is published as a GitHub release (v3.3, with the theme zip built by `git archive`) and approved in the WordPress.org theme directory (https://themes.trac.wordpress.org/ticket/300461); it is waiting to be deployed there. It requires PHP 8.2 and WordPress 6.1 and is tested up to WordPress 7.1. The theme is flagged as a special case in the theme directory, so it does not go through Theme Check. No further work is planned after the deployment.

## Log

Newest entries first. One per work session, brief.

- 2026-11-14: Version 3.3. Added the development environment (Playground blueprint, WPCS and PHPCompatibilityWP via Composer, `.gitattributes` to keep development files out of the zip), fixed the WPCS formatting issues in `functions.php`, raised the minimum to PHP 8.2 and WordPress 6.1, tested up to 7.1. Deleted the old Git tags (their zips included development files), tested the release zip on Playground (WordPress 6.1 + PHP 8.2 and WordPress 7.1.4 + PHP 8.4) and published the v3.3 GitHub release. Approved in the theme directory, pending deployment.
- 2026-11-14: guppy/STATUS.md created.
