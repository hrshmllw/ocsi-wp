# Feature Specification: WordPress scaffold

**Feature Branch**: `001-wordpress-scaffold`

**Created**: 2026-10-21

**Status**: Implemented

**Input**: User description: Scaffold a WordPress site for OCSI from scratch in `c:\xampp\htdocs\ocsi`, track it in https://github.com/hrshmllw/ocsi-wp, and record that InfinityFree is only a free preview host.

This spec was written after the work, from commit `4864810` and the local install. It records what was built.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Open the local corporate site (Priority: P1)

A reviewer starts XAMPP and opens the OCSI site on this machine. The home page and the brief’s priority pages are reachable with readable URLs.

**Why this priority**: Nothing else can be reviewed until the site runs locally.

**Independent Test**: With Apache and MySQL running, open `http://localhost/ocsi/` and the page paths listed below. Each returns a page from the OCSI theme.

**Acceptance Scenarios**:

1. **Given** XAMPP is running and the `ocsi` database exists, **When** a reviewer opens `http://localhost/ocsi/`, **Then** the OCSI theme is shown.
2. **Given** permalinks are set to “Post name”, **When** a reviewer opens `/about-ocsi/`, `/capabilities/`, `/our-network/`, `/our-partners/`, `/careers/`, `/contact-us/`, `/branches/`, and `/jobs/`, **Then** each URL resolves to the matching template.
3. **Given** a path that does not exist, **When** a reviewer opens it, **Then** the theme’s 404 template is shown.

---

### User Story 2 - Maintain branches and vacancies (Priority: P1)

An authorized editor adds a branch or a vacancy in WordPress. The public directory lists it. A vacancy does not collect a CV on this site.

**Why this priority**: The brief’s core features are the branch directory and CMS-managed jobs.

**Independent Test**: In wp-admin, create a branch and a vacancy, then open `/branches/` and `/jobs/`.

**Acceptance Scenarios**:

1. **Given** an editor publishes a branch with address, region, phone, hours, and a directions link, **When** a visitor opens `/branches/`, **Then** that branch is listed.
2. **Given** an editor publishes a vacancy with department, location, employment type, closing date, and an apply link, **When** a visitor opens the vacancy, **Then** those fields are shown and responsibilities stay in the post body.
3. **Given** any vacancy, **When** a visitor looks for a file upload, **Then** there is no CV upload.

---

### User Story 3 - Clone without WordPress core (Priority: P2)

A developer clones `hrshmllw/ocsi-wp` and follows `README.md` to recreate the local install. Secrets and WordPress core are not in the repository.

**Why this priority**: The repo is the shareable part of the project. The local database and core stay on the machine that runs the site.

**Independent Test**: Inspect the git allowlist and confirm `wp-config.php` and `.local-credentials` are absent from the commit.

**Acceptance Scenarios**:

1. **Given** a fresh clone, **When** a developer lists tracked paths, **Then** they see the OCSI theme, OCSI Core, `README.md`, the project brief, and the visual direction.
2. **Given** the local install, **When** someone looks for the admin password, **Then** it is only in `.local-credentials`, which git ignores.

### Edge Cases

- Git Bash rewrites a leading `/` in a WP-CLI argument into a Windows path. Permalink updates from Git Bash must set `MSYS_NO_PATHCONV=1` or run from a PHP file. This was hit while fixing permalinks.
- PHP `mail()` is not used. The contact template lists the planned fields and states that the form is off.
- Comments and the generator meta tag are closed on the public site.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: The site MUST run as WordPress at `http://localhost/ocsi/` with the database named `ocsi`.
- **FR-002**: The OCSI theme and the OCSI Core plugin MUST both be active.
- **FR-003**: The theme MUST provide templates for Home, About OCSI, Capabilities, Our Network, Our Partners, Careers, and Contact, plus branch and vacancy archives and singles.
- **FR-004**: Branches MUST be public posts at `/branches/` with address, region, phone, hours, and a directions link.
- **FR-005**: Vacancies MUST be public posts at `/jobs/` with department, location, employment type, closing date, and an apply link.
- **FR-006**: The site MUST NOT accept CV uploads.
- **FR-007**: The inquiry form MUST stay inactive until external SMTP on port 587 is tested.
- **FR-008**: The repository MUST track the theme, the plugin, and the planning documents, and MUST NOT track WordPress core, `wp-config.php`, uploads, `.htaccess`, or `.local-credentials`.
- **FR-009**: `README.md` MUST explain the local recreate steps and why InfinityFree is a preview host only.

### Key Entities

- **Branch**: A location visitors can look up. Fields are address, region or service area, phone, hours, and a map or directions link.
- **Vacancy**: A job HR publishes and closes. Fields are department, location, employment type (full-time, contractual, or other), closing date, and an apply link. The description is the post body.
- **Page**: A WordPress page assigned to one of the theme templates. Page rows live in the local database, not in git.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: `http://localhost/ocsi/` and the eight paths in User Story 1 respond from the OCSI theme when XAMPP is running.
- **SC-002**: A published branch appears on `/branches/` and a published vacancy appears on `/jobs/` without a CV field.
- **SC-003**: Commit `4864810` contains the theme, the plugin, the README, the brief, and the visual direction, and does not contain WordPress core or credentials.

## Assumptions

- WordPress was installed on this machine on 2026-10-21. Core files remain in the folder and are gitignored.
- Priority pages, a sample branch, and a sample vacancy were created in the local database during that install. They are not files in git. The sample branch and sample vacancy were later removed. The replacement records are in `specs/003-public-profile-copy`.
- The first committed theme used a forest, ivory, and gold palette. The later palette work is `specs/002-logo-palette`. The first page copy was explicitly placeholder. The later draft copy is `specs/003-public-profile-copy`.
- Production hosting is still the managed WordPress host named in the project brief. InfinityFree was evaluated and rejected as the launch host. Limits are in `README.md`.
