# Changelog

## 4.0

* Added a theme.json with editor styles for the block editor: system fonts, a type scale, content width and basic block styles. Nothing is loaded on the front end
* Added a minimal editor stylesheet so the classic editor also uses system fonts
* Added support for editing pages with Elementor: the Elementor editor gets a minimal template that shows the content, while visitors still get the theme's blank page
* The default footer text is now the same in the Customizer and on the front end
* Fixed: the "Display Site Title and Tagline" Customizer option is now unchecked by default, as it already was on the front end
* Removed the emoji script and styles from the front end
* Removed the empty block supports styles from the front end
* Removed the REST API, RSD, feed and generator links from the page head. The REST API and the feeds still work
* Removed the obsolete -ms- and -webkit- prefixes from the logo CSS
* Removed the duotone SVG filters and the wlwmanifest link from the front end on WordPress 6.1 and 6.2

## 3.3

* Tested up to WordPress 7.1
* Updated minimal PHP version to 8.2
* Updated minimal WordPress version to 6.1
* Updated the code style to the WordPress Coding Standards

## 3.2

* Tested up to WordPress 6.9
* Changed the logo default image size to 512x512 to make it easier to reuse the site icon
* Updated the code to remove unused WordPress frontend css styles
* Removed the automatic home link from the home logo

## 3.1.1

* Tested up to WordPress 6.6

## 3.1

* Tested up to WordPress 6.3
* Updated minimal PHP version to 7.4
* Update: Footer is not rendered at all if set to not show it
* Update: Header is not rendered at all if set to not show site title and tagline
* Update: dequeued block editor global-css in the front-end
* Update: all css styles are now conditionally loaded to reduce rendered html

## 3.0.3

* Added featured images support. Props Eric Pfeiffer
* Tested up to WordPress 6.0

## 3.0.2

* Changed footer sanitization to wp_kses_post to allow basic html
* Tested up to WordPress 5.9

## 3.0.1

* Customizer options sanitization

## 3.0

* Added Footer settings to the Customizer

## 2.2

* Tested up to WordPress 5.8

## 2.1

* Tested up to WordPress 5.5

## 2.0

* Added wp_body_open() and some required headers. Enjoy!

## 1.5

* Minor updates and WordPress Coding Standards fixes

## 1.4.1

* Fixed custom logo markup

## 1.4

* Code revised to conform to WordPress coding conventions

## 1.3

* Refactor and optimization. Yes, really

## 1.2.3

* First release available at the WordPress theme directory. Woohoo!

## 1.2.2

* fixes to comply with Theme review team

## 1.2.1

* fixes to comply with Theme review team

## 1.2

* submitted to the WordPress theme directory

## 1.1

* Let's clean up this mess before review

## 1.0

* Beta phase finished. It won't get any better than this, let's go for 1.0!

## 0.4

* Woo! Theme customization! Now you can set a center logo, set the page background and hide the title

## 0.3

* WPO time. **PageSpeed 100/100** on the second try. Not bad.

## 0.2

Feature testing:
* No posts - check
* No pages - check
* No categories - check
* No tags - check
* No sidebars - check
* No menus - check

## 0.1

* 16:00 PM let's make a theme!
* 18:00 PM I've made a theme!
* 18:05 PM Have I made a theme?
