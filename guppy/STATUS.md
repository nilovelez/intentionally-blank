# Status

Version 3.3 is published as a GitHub release (v3.3, with the theme zip built by `git archive`) and approved in the WordPress.org theme directory (https://themes.trac.wordpress.org/ticket/300461); it is still waiting to be deployed there (WordPress.org serves 3.2). It requires PHP 8.2 and WordPress 6.1 and is tested up to WordPress 7.1. The theme is flagged as a special case in the theme directory, so it does not go through Theme Check.

Version 4.0 is in progress on `master`. The front end stays the same blank page, only lighter; the work is about the editing experience for headless sites. Plan, by milestones:

1. Front end review: done (emoji, block supports and head links removed; footer text and title option fixed).
2. Editor styles: done (`theme.json` for the block editor, `editor-style.css` for the classic editor; nothing loads on the front end).
3. Elementor: done (`builder-preview.php`, served only to page builder previews through `template_include`; Elementor Canvas pages behave as before).
4. AI and MCP: next. Test the MCP Adapter, the WordPress AI connectors, Studio's MCP and Novamira on the Studio site.
5. Theme directory listing: `readme.txt`, screenshot and the `style.css` description (a translated string: change it once, on purpose).
6. GitHub repository: README, description and topics.
7. Release 4.0.

Notes for the next sessions:

- The theme is live on many sites: never change behavior they rely on.
- The theme is translated into many languages: never change an existing translatable string without Nilo's permission (see `CLAUDE.md`).
- Playground: keep `"method": "rewrite-wp-config"` on `defineWpConfigConsts` in `blueprint.json`. With several workers, Playground CLI 3.1.64 corrupts its constants file otherwise, and the SQLite database follows.

## Log

Newest entries first. One per work session, brief.

- 2026-11-14: Version 4.0, milestones 1 to 3. Front end cleanup (front page down from 15.8 KB to about 0.6 KB), `theme.json` and classic editor styles, Elementor editor support with a separate preview template. Found and worked around a Playground CLI multi-worker bug that corrupted the test sites' databases. Created the Studio site (`~/Studio/intentionally-blank`, theme linked from the repo).
- 2026-11-14: Version 3.3. Added the development environment (Playground blueprint, WPCS and PHPCompatibilityWP via Composer, `.gitattributes` to keep development files out of the zip), fixed the WPCS formatting issues in `functions.php`, raised the minimum to PHP 8.2 and WordPress 6.1, tested up to 7.1. Deleted the old Git tags (their zips included development files), tested the release zip on Playground (WordPress 6.1 + PHP 8.2 and WordPress 7.1.4 + PHP 8.4) and published the v3.3 GitHub release. Approved in the theme directory, pending deployment.
- 2026-11-14: guppy/STATUS.md created.
