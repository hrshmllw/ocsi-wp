# Tasks: Logo palette

**Input**: Design documents from `/specs/002-logo-palette/`

**Prerequisites**: plan.md, spec.md

**Organization**: Checked items are the edits already in the working tree. This list was written afterward.

## Phase 1 - Logo

- [x] T001 Place the supplied mark at `wp-content/themes/ocsi/assets/images/ocsi-logo.svg` without recoloring it
- [x] T002 Show that file from `wp-content/themes/ocsi/header.php` when no custom logo is set

## Phase 2 - Leave the green palette

- [x] T003 Replace forest, ivory, sage, and gold in `wp-content/themes/ocsi/theme.json` with royal, clay, and cool paper tokens
- [x] T004 Point `wp-content/themes/ocsi/style.css` and `wp-content/themes/ocsi/assets/css/editor.css` at those tokens

## Phase 3 - Write the recommended palette

- [x] T005 Record `#C62828`, `#174A8B`, `#F7F8FA`, `#FFFFFF`, `#252B33`, and `#64748B` in `ocsi-visual-direction.md`
- [x] T006 Summarize the same palette in `README.md`, including the note that it is not approved

## Remaining

- [ ] T007 After stakeholders accept the written palette, or choose another, make `theme.json` and `style.css` use that same set
- [ ] T008 Commit the logo, the theme color edits, and the document edits together once the colors agree
