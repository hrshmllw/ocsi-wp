# Implementation Plan: WordPress scaffold

**Branch**: `001-wordpress-scaffold` | **Date**: 2026-10-21 | **Spec**: [spec.md](spec.md)

**Input**: Feature specification from `/specs/001-wordpress-scaffold/spec.md`

This plan records decisions already carried out. It was written after commit `4864810`.

## Summary

Install WordPress into the existing XAMPP folder, add a custom theme and a small plugin for branches and vacancies, and push only that custom code to `hrshmllw/ocsi-wp`. InfinityFree can preview the site later. It is not the launch host.

## Technical Context

**Language/Version**: PHP 8, WordPress 6.6 or newer (installed from the current wordpress.org package on 2026-10-21)

**Primary Dependencies**: WordPress, the OCSI theme, OCSI Core 0.1.0

**Storage**: MySQL database `ocsi` on local XAMPP. Content rows are not in git.

**Testing**: Manual checks against `http://localhost/ocsi/` during the scaffold. No automated test suite was added.

**Target Platform**: XAMPP on Windows for daily work. InfinityFree only as a later preview. Managed WordPress hosting for launch.

**Project Type**: WordPress theme and plugin inside a full local WordPress tree

**Performance Goals**: Not set. The theme is a small PHP template set.

**Constraints**: No CV upload. No inquiry form until SMTP is tested. Do not commit core, config, or credentials. Git Bash must not rewrite WP-CLI paths that start with `/`.

**Scale/Scope**: One corporate site. Pages named in the project brief, plus branch and vacancy directories.

## Constitution Check

*Checked against `.specify/memory/constitution.md` after the constitution was adopted. The scaffold already followed these rules.*

- Custom code is the theme and OCSI Core. Core is gitignored.
- Branches and vacancies match the field lists. No CV upload.
- The contact template does not send mail.
- Local URL and database name match the constitution.
- `README.md` documents setup and the InfinityFree limits.

## Project Structure

### Documentation (this feature)

```text
specs/001-wordpress-scaffold/
├── plan.md
├── spec.md
└── tasks.md
```

`research.md`, `data-model.md`, and `contracts/` were not created. The hosting notes are in `README.md`. The field lists are in `wp-content/plugins/ocsi-core/ocsi-core.php`.

### Source Code (repository root)

```text
wp-content/themes/ocsi/          # templates, CSS, navigation
wp-content/plugins/ocsi-core/    # branch and vacancy types
README.md
.gitignore
ocsi-website-project-brief.md
ocsi-visual-direction.md
```

## As built

- WordPress, `wp-config.php`, and `.htaccess` exist locally and are ignored.
- Admin username `ocsi` and the generated password are in `.local-credentials`.
- Permalinks are `/%postname%/`.
- The theme registers a primary menu, Manrope and Inter, a mobile nav script, closed comments, and alphabetical branch and job archives.
- Fallback menu links: About OCSI, Capabilities, Our Network, Our Partners, Careers, plus a Contact Us link in the header.
- Debug logging is on in `wp-config.php` (`WP_DEBUG`, `WP_DEBUG_LOG`). Display of errors is off. File editing in wp-admin is disallowed.
