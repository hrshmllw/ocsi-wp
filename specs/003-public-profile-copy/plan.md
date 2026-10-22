# Implementation Plan: Public profile copy

**Branch**: `003-public-profile-copy` | **Date**: 2026-10-21 | **Spec**: [spec.md](spec.md)

**Input**: Feature specification from `/specs/003-public-profile-copy/spec.md`

This plan records the copy already placed in the theme. It was written after those edits.

## Summary

Replace the scaffold’s placeholder sentences with draft copy from OCSI’s public profiles. Keep a flag on every affected page. Leave out anything the sources do not support. Do not enable the inquiry form.

## Technical Context

**Language/Version**: PHP templates in the OCSI theme

**Primary Dependencies**: `template-parts/outline.php` for titled sections

**Storage**: Copy is in the template files. Branch and vacancy records remain in the `ocsi` database.

**Testing**: Not a separate test suite. The draft flag is the visible check.

**Target Platform**: Local WordPress theme

**Project Type**: Theme copy

**Performance Goals**: N/A

**Constraints**: Draft until OCSI confirms. No CV upload. No live form. No unapproved logos.

**Scale/Scope**: Front page, six page templates, the footer draft line, the branch and job archive flags, and six branch records in the local database.

## Constitution Check

- Unverified copy is flagged. Disputed wording is omitted. Pass.
- The inquiry form stays off. Pass.
- The project brief is not copied into this spec. Page purpose stays in `ocsi-website-project-brief.md`. Pass.

## Project Structure

### Documentation (this feature)

```text
specs/003-public-profile-copy/
├── plan.md
├── spec.md
└── tasks.md
```

No `research.md` was kept. The templates themselves name the sources that were used.

### Source Code (repository root)

```text
wp-content/themes/ocsi/front-page.php
wp-content/themes/ocsi/page-templates/about.php
wp-content/themes/ocsi/page-templates/capabilities.php
wp-content/themes/ocsi/page-templates/network.php
wp-content/themes/ocsi/page-templates/partners.php
wp-content/themes/ocsi/page-templates/careers.php
wp-content/themes/ocsi/page-templates/contact.php
wp-content/themes/ocsi/archive-branch.php
wp-content/themes/ocsi/archive-job.php
wp-content/themes/ocsi/footer.php
```

## As built

- Home hero eyebrow is “Since 2002”. The headline is “Nestlé products, distributed by OCSI.” Sections cover the company introduction, where the work happens, capabilities, and the distribution network, and they link into the matching pages.
- About records the 2002, 2005, 2007, 2018, and 2019 dates written in the template, and a “Still to be supplied” section.
- Capabilities covers distribution, sales execution, and logistics, and states that outlet counts and fleet size are omitted.
- Network says Luzon and Western Visayas coverage in the words of the template, and lists branch entries from WordPress.
- Partners names Nestlé Philippines and the product list, and withholds logos and awards.
- Careers points HR at WordPress vacancies and an external apply link.
- Contact prints the MacArthur Highway, Barangay Saguin, City of San Fernando, Pampanga address as a draft and lists the planned form fields without a form.
- The footer says the copy is a draft from public profiles.
- The sample branch and the sample vacancy were deleted from the local database. Six published branches replaced them. Those rows are not in git. Street addresses are stored only where a listing published one.

| Branch | Address stored |
| --- | --- |
| San Fernando, Pampanga | MacArthur Highway, Barangay Saguin, City of San Fernando, Pampanga |
| Imus, Cavite | Aguinaldo Highway, Anabu 1-B, City of Imus, Cavite 4103 |
| San Pablo City, Laguna | Mahabang Parang, Barangay San Francisco, San Pablo City, Laguna |
| Gumaca, Quezon | Gumaca, Quezon |
| Las Piñas | Las Piñas City |
| Oton, Iloilo | Circumferential Road 1, Barangay Pakiad, Oton, Iloilo 5020 |
