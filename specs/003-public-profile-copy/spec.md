# Feature Specification: Public profile copy

**Feature Branch**: `003-public-profile-copy`

**Created**: 2026-10-21

**Status**: Implemented as drafts

**Input**: User description: Research OCSI so the page content is not generic placeholder copy.

This spec was written after the templates were edited. The copy is still marked as a draft. It is not approved company messaging.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Read a specific company story (Priority: P1)

A visitor reading the home page, About, Capabilities, Network, Partners, Careers, or Contact sees sentences about OCSI’s Nestlé distribution work, dated from public profiles, instead of “copy will be added later” placeholders.

**Why this priority**: The user asked for content that is not generic filler.

**Independent Test**: Open those templates and confirm the visible paragraphs name OCSI, Nestlé, and places, and that each page still shows a draft flag.

**Acceptance Scenarios**:

1. **Given** the home template, **When** a visitor reads the hero, **Then** the headline is “Nestlé products, distributed by OCSI.” and a flag says the text is a draft from public profiles.
2. **Given** About, Capabilities, Network, Partners, Careers, or Contact, **When** a visitor reads the page, **Then** the intro is specific to OCSI and the same kind of draft flag is visible.
3. **Given** a claim the sources do not agree on, **When** the partners page describes the Nestlé relationship, **Then** the page says “distributor” and does not choose “exclusive” or “authorized”.

---

### User Story 2 - See what is still missing (Priority: P1)

A reviewer can tell which facts were not published because they were not found or not confirmed.

**Why this priority**: The constitution forbids presenting unconfirmed claims as fact.

**Independent Test**: Read Contact, Careers, Partners, and About for the explicit gaps.

**Acceptance Scenarios**:

1. **Given** Contact, **When** a visitor looks for a phone number or email, **Then** none is printed, and the page says none was found in the PhilJobNet or FDA listings that were used.
2. **Given** Careers, **When** a visitor looks for benefits or a sample vacancy, **Then** benefits are withheld and no sample vacancy is shown.
3. **Given** About, **When** a visitor looks for mission, vision, values, or leadership names, **Then** the page says those will be added when OCSI supplies them.
4. **Given** Partners, **When** a visitor looks for logos or awards, **Then** no partner logo and no award is shown.

---

### User Story 3 - Leave the inquiry form off (Priority: P2)

Contact explains how to inquire later, and does not collect personal information yet.

**Why this priority**: The scaffold already required tested mail before the form is turned on. The new copy must not quietly enable it.

**Independent Test**: Open the contact template and confirm there is no `<form>` element.

**Acceptance Scenarios**:

1. **Given** the contact template, **When** a visitor reads “Inquiry form”, **Then** the form is described as not active and the planned fields are listed as text.

### Edge Cases

- Photographs are still labeled as not supplied. The copy change did not add images.
- Branch rows come from WordPress. The sample branch and the sample vacancy from the scaffold were deleted. Six branches were published in the local database: San Fernando, Imus, San Pablo City, Gumaca, Las Piñas, and Oton. Phone and hours were left empty. Those rows are not in git. The addresses are listed in `plan.md`.
- Archive and single templates for branches and jobs keep a short flag. They do not repeat the company history.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: Home, About, Capabilities, Network, Partners, Careers, and Contact MUST replace the first scaffold’s generic placeholders with draft copy drawn from public profiles.
- **FR-002**: Each of those templates MUST show a visible flag that the copy is a draft and must be confirmed before publication.
- **FR-003**: The site MUST omit claims the sources disagree on, including whether the Nestlé appointment is exclusive.
- **FR-004**: The site MUST omit phone numbers, email addresses, benefits, awards, partner logos, mission, vision, values, and leadership names until OCSI confirms them.
- **FR-005**: Outlet counts and fleet size MUST NOT be published.
- **FR-006**: The contact form MUST remain inactive.

### Key Entities

- **Draft page copy**: PHP strings in the theme templates, not WordPress post content. Editors can still append page content where `ocsi_the_editable_content()` is called.
- **Source set named in the templates**: Jobstreet company profile, PhilJobNet, an FDA establishment record, and public job listings. The templates do not store the source URLs.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: The seven templates named in FR-001 contain OCSI-specific sentences and a draft flag.
- **SC-002**: Contact has no form element and names the San Fernando address only as a draft from those listings.
- **SC-003**: A reviewer can list, from the templates alone, the facts still waiting on OCSI.

## Assumptions

- The research was limited to public profiles. It is not an OCSI-approved company history.
- Sister companies are mentioned only as unnamed, matching the Jobstreet wording recorded in the About template.
- Product names on the partners page follow the spellings written there: Nescafé, Milo, Bear Brand, Nestea, Coffee-mate, Nido, Maggi, Chuckie, Nesvita, Nestogen, Nan, KitKat, Crunch, Fox’s, and Polo.
- This copy is in the working tree and was not part of commit `4864810`.
