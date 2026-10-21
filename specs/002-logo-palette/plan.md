# Implementation Plan: Logo palette

**Branch**: `002-logo-palette` | **Date**: 2026-10-21 | **Spec**: [spec.md](spec.md)

**Input**: Feature specification from `/specs/002-logo-palette/spec.md`

This plan records what changed after the scaffold commit. It was written after the edits.

## Summary

Keep the supplied logo as pure red and blue. Stop using forest green and gold in the interface. Document a corporate red and corporate blue palette that is darker than the logo’s pure colors. The theme working tree uses a separate set of logo-derived shades and has not been repainted to the documented hex values.

## Technical Context

**Language/Version**: CSS in the OCSI theme, `theme.json` version 3

**Primary Dependencies**: OCSI theme 0.1.0, the logo SVG

**Storage**: N/A

**Testing**: Not run in a browser for the final documented hex values, because those values are not in the stylesheet.

**Target Platform**: The local WordPress theme

**Project Type**: Theme visual tokens and two markdown documents

**Performance Goals**: N/A

**Constraints**: Do not recolor the logo file. Do not treat the palette as approved. Logo sits on a white header.

**Scale/Scope**: `theme.json`, `style.css`, `assets/css/editor.css`, header markup, `ocsi-visual-direction.md`, `README.md`

## Constitution Check

- The logo file is unchanged artwork on a white header. Pass.
- The documents say the palette is not approved and that “Moving Brands Forward.” is not approved messaging. Pass.
- The theme CSS and the visual direction currently name different interface colors. That is recorded here rather than papered over. The open task is to paint the documented colors after stakeholders accept them, or to edit the documents if a different set is chosen.

## Project Structure

### Documentation (this feature)

```text
specs/002-logo-palette/
├── plan.md
├── spec.md
└── tasks.md
```

### Source Code (repository root)

```text
wp-content/themes/ocsi/theme.json
wp-content/themes/ocsi/style.css
wp-content/themes/ocsi/assets/css/editor.css
wp-content/themes/ocsi/assets/images/ocsi-logo.svg
wp-content/themes/ocsi/header.php
ocsi-visual-direction.md
README.md
```

## As built

- Visual direction section 4 is the recommended palette. Directions A, B, and C share those hex values and differ only in how much red or blue is used.
- README “Visual direction” matches that section and points at the document.
- `header.php` outputs the SVG from the theme when `has_custom_logo()` is false.
- Working `theme.json` palette slugs are `royal`, `deep-royal`, `clay`, `soft-red`, `paper`, `ink`, `mist`, `white`, and `line`.
- Buttons and links in the working stylesheet use `#2436A0` and `#1A2878`. Soft red `#E07070` is used as a small highlight. Page background is `#F4F6FB`. Text is `#1C2438`.
