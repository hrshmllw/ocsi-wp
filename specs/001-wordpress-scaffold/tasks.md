# Tasks: WordPress scaffold

**Input**: Design documents from `/specs/001-wordpress-scaffold/`

**Prerequisites**: plan.md, spec.md

**Organization**: Tasks follow the work that already landed in commit `4864810` and the local database. Checked items are done. This list was written afterward.

## Phase 1 - Local WordPress

- [x] T001 Install WordPress into `c:\xampp\htdocs\ocsi` and create the MySQL database `ocsi`
- [x] T002 Create `wp-config.php` for local root with debug logging, hidden debug display, and `DISALLOW_FILE_EDIT`
- [x] T003 Install the site at `http://localhost/ocsi/` with the title “Optimized Customer Solutions, Inc.” and store the admin password in `.local-credentials`
- [x] T004 Set permalinks to `/%postname%/` and add the local `.htaccess` rewrite rules

## Phase 2 - Theme and plugin

- [x] T005 Add `wp-content/themes/ocsi` with header, footer, front page, page templates, archives, singles, 404, and search
- [x] T006 Add `wp-content/plugins/ocsi-core/ocsi-core.php` with branch and vacancy fields and no CV upload
- [x] T007 Activate the theme and the plugin and publish the priority pages in the local database
- [x] T008 Confirm `/`, `/about-ocsi/`, `/capabilities/`, `/our-network/`, `/our-partners/`, `/careers/`, `/contact-us/`, `/branches/`, `/jobs/`, and `/privacy-policy/` respond

## Phase 3 - Repository

- [x] T009 Allowlist the theme, plugin, README, brief, and visual direction in `.gitignore`
- [x] T010 Document local setup and InfinityFree limits in `README.md`
- [x] T011 Commit the custom code as `4864810` and push `main` to `https://github.com/hrshmllw/ocsi-wp`

## Remaining

- [ ] T012 Turn on the inquiry form only after an external SMTP account on port 587 delivers a test message
- [ ] T013 Use InfinityFree only if a temporary public preview is requested
