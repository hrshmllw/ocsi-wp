# Tasks: Public profile copy

**Input**: Design documents from `/specs/003-public-profile-copy/`

**Prerequisites**: plan.md, spec.md

**Organization**: Checked items are the template edits already in the working tree. This list was written afterward.

## Phase 1 - Replace placeholders

- [x] T001 [US1] Draft the home page in `wp-content/themes/ocsi/front-page.php` from public profiles and flag it
- [x] T002 [US1] Draft About, Capabilities, Network, Partners, Careers, and Contact in `wp-content/themes/ocsi/page-templates/`
- [x] T003 [US1] Keep the branch and job archive flags in `archive-branch.php` and `archive-job.php`

## Phase 2 - Hold back unconfirmed facts

- [x] T004 [US2] Use “distributor” on the partners page and omit exclusive or authorized
- [x] T005 [US2] Omit phone, email, benefits, awards, partner logos, mission, vision, values, and leadership names
- [x] T006 [US3] Leave the contact form as a written field list with no `<form>`

## Remaining

- [ ] T007 Replace each draft flag only after OCSI confirms that page
- [ ] T008 Add mission, vision, values, leadership, benefits, awards, and contact details when OCSI supplies them
- [ ] T009 Add approved photographs in place of the empty photo slots
