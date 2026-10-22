# Implementation Plan: Homepage mockup

**Branch**: `004-homepage-mockup` | **Date**: 2026-10-22 | **Spec**: [spec.md](spec.md)

**Input**: Feature specification from `/specs/004-homepage-mockup/spec.md`

## Summary

Rebuild the home page and the shared header and footer from Figma node `6:2`. Keep the supplied logo. Use the mockup copy under the draft banner. Download the mockup photographs and icons into the theme. Add a small carousel script for the hero.

## Technical Context

**Language/Version**: PHP 8 templates, CSS, and one vanilla script

**Primary Dependencies**: WordPress `wp_nav_menu`, `ocsi_page_url()`, the existing `nav.js` toggle

**Storage**: Copy and markup in the theme. Photographs and icons in `assets/images/home/`. No new database fields.

**Testing**: Browser check at 1280px, 768px, and 375px against the Figma frame. Keyboard and reduced-motion checks on the carousel. About page check for the shared chrome.

**Target Platform**: Local WordPress at `http://localhost/ocsi/`

**Project Type**: Theme layout

**Performance Goals**: One carousel script on the front page only. No animation library.

**Constraints**: Plus Jakarta Sans for headings, Inter for body. Logo file unchanged. Inner page bodies unchanged. No inquiry form.

**Scale/Scope**: `front-page.php`, `header.php`, `footer.php`, `style.css`, `theme.json`, `editor.css`, `functions.php`, `assets/js/hero-carousel.js`, and the homepage images.

## Constitution Check

- The homepage copy is the mockup draft, flagged by the banner. Principle III is amended in the same change to say so. Pass after that edit.
- The logo stays the supplied file on a white header. Pass.
- The inquiry form stays off. Pass.
- A new behavior is specified here before the templates change. Pass.

## Project Structure

### Documentation (this feature)

```text
specs/004-homepage-mockup/
├── spec.md
├── plan.md
└── tasks.md
```

### Source code

```text
wp-content/themes/ocsi/
├── front-page.php
├── header.php
├── footer.php
├── functions.php
├── style.css
├── theme.json
└── assets/
    ├── css/editor.css
    ├── js/hero-carousel.js
    └── images/home/
```

## Design decisions recorded with the user

- Mockup copy is used as written.
- The branch directory, partners block, and live job list leave the homepage.
- The carousel auto-advances, can be paused, and stays still under reduced motion.
- Mockup photographs are placeholders.
- Palette follows the mockup: `#315EA0`, `#A20513`, `#C62828`.
- Headings switch from Manrope to Plus Jakarta Sans. DM Sans in the mockup is set in Inter. The footer wordmark is not a serif.
- Navigation labels stay on one line at one size. The current item is red.
- Header and footer apply on every page.

## Slide assets

The frame exported one hero photograph, used for San Pablo. The other slides reuse placeholder photographs already in the frame:

| Slide | Default | Photograph |
| --- | --- | --- |
| San Fernando, Pampanga | | Capability card 2 |
| San Pablo, Laguna Warehouse · Southern Tagalog Hub | Visible on first paint | Hero export |
| Imus, Cavite | | Capability card 3 |
| Oton, Iloilo | | People photograph |
