<!--
Sync Impact Report
- Version change: template → 1.0.0
- Modified principles: placeholders replaced with the rules already in use
- Added sections: Platform constraints, Documentation
- Removed sections: none
- Follow-up TODOs: none
-->

# OCSI Constitution

## Core Principles

### I. Custom theme and plugin

The public site is WordPress. Custom code lives in the OCSI theme and the OCSI Core plugin. WordPress core, `wp-config.php`, uploads, `.htaccess`, and `.local-credentials` stay on disk and out of git.

### II. Branches and vacancies

OCSI Core adds two content types: branches at `/branches/` and vacancies at `/jobs/`. A branch stores address, region, phone, hours, and a directions link. A vacancy stores department, location, employment type, closing date, and an apply link. Responsibilities and qualifications stay in the post editor. The site does not accept CV uploads.

### III. Confirmed facts only

Copy taken from public profiles is a draft until OCSI confirms it. Claims the sources disagree on are left out. The line “Moving Brands Forward.” is proposed copy, not approved messaging. The palette in `ocsi-visual-direction.md` still needs stakeholder approval. The logo file stays the supplied red and blue artwork and sits on a white header.

### IV. Build locally, launch on managed hosting

Build and review on XAMPP at `http://localhost/ocsi`, database `ocsi`. InfinityFree is only a temporary preview. Launch hosting is managed WordPress hosting. Inquiry forms stay off until a test message reaches the right inbox through external SMTP.

### V. Document every change

Every completed change updates the document that already owns the topic, or adds a new one. `docs/README.md` lists every document. New behavior is specified with Spec Kit under `specs/` before it is built. Work finished before this rule was recorded afterward in `specs/001-wordpress-scaffold`, `specs/002-logo-palette`, and `specs/003-public-profile-copy`.

## Platform constraints

- The theme is responsive and mobile-first. Headings use Manrope. Body text uses Inter.
- Authorized staff update pages, branches, and vacancies in WordPress.
- Permalinks use the “Post name” structure.
- Comments stay closed. This is a corporate site, not a blog.

## Documentation

Standing documents are `README.md`, `ocsi-website-project-brief.md`, and `ocsi-visual-direction.md`. Feature records live under `specs/<feature>/` as `spec.md`, `plan.md`, and `tasks.md`. The catalog is `docs/README.md`. A feature spec links to the brief or the visual direction instead of copying them.

## Governance

This constitution is the project’s working agreement. A change to these rules is an edit of this file, noted in `docs/README.md`, with the version below updated. A new or expanded rule increments the minor version. A wording clarification increments the patch version. Removing or redefining a rule increments the major version.

**Version**: 1.0.0 | **Ratified**: 2026-10-21 | **Last Amended**: 2026-10-21
