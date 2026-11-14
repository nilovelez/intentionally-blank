# Status

Version 3.3 is published in the WordPress.org theme directory. It requires PHP 8.2 and WordPress 6.1 and is tested up to WordPress 7.1. The theme is flagged as a special case in the theme directory, so it does not go through Theme Check.

Version 4.0 is ready: tagged `v4.0` and published as a GitHub pre-release, with the theme zip built by `git archive` and tested on WordPress 6.1 + PHP 8.2 and WordPress 7.1.4 + PHP 8.5. Nilo is testing it by hand, with other page builders and on other sites, before uploading it to the theme directory. If the tests need changes, the release is rebuilt; once it is uploaded, the GitHub release becomes a regular release.

The front end stays the same blank page, only lighter; 4.0 is about the editing experience for headless sites. Milestones:

1. Front end review: done.
2. Editor styles: done (`theme.json` for the block editor, `editor-style.css` for the classic editor).
3. Elementor: done (`builder-preview.php`, served only to page builder previews).
4. Theme directory listing: done (`readme.txt` and `style.css` headers; the description is unchanged).
5. GitHub repository: `README.md` and `CHANGELOG.md` done; the repository description and topics are pending.
6. Release 4.0: pre-release published, pending Nilo's tests and the upload to the theme directory.

## Log

Newest entries first. One per work session, brief.

- 2026-11-14: Version 4.0 prepared. Reviewed `readme.txt` and `style.css`, moved the changelog to `CHANGELOG.md` and the readme to `README.md`, removed the duotone SVG filters and the wlwmanifest link on WordPress 6.1 and 6.2, tested the zip on the minimum and latest versions and published the v4.0 pre-release. Version 3.3 is live in the theme directory.
- 2026-11-14: Version 4.0, milestones 1 to 3. Front end cleanup (front page down from 15.8 KB to about 0.6 KB), `theme.json` and classic editor styles, Elementor editor support with a separate preview template. Found and worked around a Playground CLI multi-worker bug that corrupted the test sites' databases. Created the Studio site (`~/Studio/intentionally-blank`, theme linked from the repo).
- 2026-11-14: Version 3.3. Added the development environment (Playground blueprint, WPCS and PHPCompatibilityWP via Composer, `.gitattributes` to keep development files out of the zip), fixed the WPCS formatting issues in `functions.php`, raised the minimum to PHP 8.2 and WordPress 6.1, tested up to 7.1. Deleted the old Git tags (their zips included development files), tested the release zip on Playground (WordPress 6.1 + PHP 8.2 and WordPress 7.1.4 + PHP 8.4) and published the v3.3 GitHub release. Approved in the theme directory, pending deployment.
- 2026-11-14: guppy/STATUS.md created.
