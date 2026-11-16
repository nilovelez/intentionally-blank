# Status

Version 3.3 is published in the WordPress.org theme directory. It requires PHP 8.2 and WordPress 6.1 and is tested up to WordPress 7.1. The theme is flagged as a special case in the theme directory, so it does not go through Theme Check.

Version 4.0 is ready: tagged `v4.0` (commit e0e4668) and published as a GitHub pre-release, with the theme zip built by `git archive`. Nilo is using it on his own sites and asking other people to test it. Once it is tested, it goes to the theme directory; before that upload, the `style.css` description will be rewritten to explain what the theme does (approved by Nilo, translatable string).

The front end stays the same blank page, only lighter; 4.0 is about the editing experience: block editor, classic editor and page builders, used directly or through AI tools. Supported page builders: Elementor, Beaver Builder, SiteOrigin, WPBakery (Visual Composer) and Brizy. Divi is not supported: Divi 4 adds its assets to every page and Divi 5 only ships as a theme. Milestones:

1. Front end review: done.
2. Editor styles: done (`assets/css/editor-style.css` for the classic editor, `theme.json` for the block editor).
3. Page builders: done (`templates/builder-preview.php` and `assets/css/builder-preview.css` for builder previews; builder layout assets removed from the blank page).
4. Theme directory listing: `readme.txt` done; the `style.css` description is pending, before the upload.
5. GitHub repository: `README.md` and `CHANGELOG.md` done; the repository description and topics are pending.
6. Release 4.0: pre-release published, pending tests and the upload to the theme directory.

## Log

Newest entries first. One per work session, brief.

- 2026-11-16: Page builders. Added editor support for Beaver Builder, SiteOrigin and WPBakery (Visual Composer); Brizy needs no code (tested by Nilo on a live site). The blank page no longer loads Elementor, Beaver Builder, SiteOrigin or WPBakery layout assets (Canvas and other builder templates keep them). Added `builder-preview.css` and moved the CSS to `assets/css/` and the preview template to `templates/`. Dropped Divi. Looked into Playground previews in the theme directory: an unfinished, hidden feature, not worth it for now. Playground CLI `@latest` works again. Moved the `v4.0` tag to e0e4668 and rebuilt the zip; Nilo updates the GitHub pre-release.
- 2026-11-14: Version 4.0 prepared. Reviewed `readme.txt` and `style.css`, moved the changelog to `CHANGELOG.md` and the readme to `README.md`, removed the duotone SVG filters and the wlwmanifest link on WordPress 6.1 and 6.2, tested the zip on the minimum and latest versions and published the v4.0 pre-release. Version 3.3 is live in the theme directory.
- 2026-11-14: Version 4.0, milestones 1 to 3. Front end cleanup (front page down from 15.8 KB to about 0.6 KB), `theme.json` and classic editor styles, Elementor editor support with a separate preview template. Found and worked around a Playground CLI multi-worker bug that corrupted the test sites' databases. Created the Studio site (`~/Studio/intentionally-blank`, theme linked from the repo).
- 2026-11-14: Version 3.3. Added the development environment (Playground blueprint, WPCS and PHPCompatibilityWP via Composer, `.gitattributes` to keep development files out of the zip), fixed the WPCS formatting issues in `functions.php`, raised the minimum to PHP 8.2 and WordPress 6.1, tested up to 7.1. Deleted the old Git tags (their zips included development files), tested the release zip on Playground (WordPress 6.1 + PHP 8.2 and WordPress 7.1.4 + PHP 8.4) and published the v3.3 GitHub release. Approved in the theme directory, pending deployment.
- 2026-11-14: guppy/STATUS.md created.
