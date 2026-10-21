# Feature Specification: Logo palette

**Feature Branch**: `002-logo-palette`

**Created**: 2026-10-21

**Status**: Implemented in documents, partly applied in the theme

**Input**: User description: Rework the suggested palette so it works with the logo. It does not have to be pure `#FF0000` or `#0000FF`. Then record this recommended palette in the docs: corporate red `#C62828`, corporate blue `#174A8B`, cool off-white `#F7F8FA`, white `#FFFFFF`, charcoal `#252B33`, slate `#64748B`.

This spec was written after the work. The theme files are still uncommitted.

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Read the recommended palette (Priority: P1)

A designer or developer opens the visual direction and the README and finds one recommended set of colors, chosen to sit beside the logo without copying its pure red and pure blue into the interface.

**Why this priority**: The user asked for the documents to carry this palette.

**Independent Test**: Open `ocsi-visual-direction.md` section 4 and the Visual direction section of `README.md`.

**Acceptance Scenarios**:

1. **Given** the visual direction, **When** a reader looks up the palette, **Then** the six colors are corporate red `#C62828`, corporate blue `#174A8B`, cool off-white `#F7F8FA`, white `#FFFFFF`, charcoal `#252B33`, and slate `#64748B`.
2. **Given** the logo note, **When** a reader checks how the file is treated, **Then** the artwork stays `#FF0000` and `#0000FF` and is placed on white.
3. **Given** the README, **When** a reader checks the visual direction summary, **Then** it names the same six colors and says the palette still needs stakeholder approval.

---

### User Story 2 - See the logo in the header (Priority: P2)

A visitor sees the supplied OCSI mark in the header when no custom logo has been set in WordPress.

**Why this priority**: The palette work started from the logo file the user supplied.

**Independent Test**: Open the home page with no custom logo assigned and confirm the header image is `assets/images/ocsi-logo.svg`.

**Acceptance Scenarios**:

1. **Given** no custom logo in the customizer, **When** a visitor loads any theme page, **Then** the header shows `wp-content/themes/ocsi/assets/images/ocsi-logo.svg` with the company name.
2. **Given** a custom logo is assigned later, **When** a visitor loads a page, **Then** WordPress’s custom logo is used instead.

---

### User Story 3 - Interface colors move off the first green palette (Priority: P2)

The committed theme used forest green, warm ivory, and muted gold. That set was replaced in the working tree with shades taken from the logo’s red and blue.

**Why this priority**: The user asked for the interface to work with the logo. The later instruction was to update the documents to the corporate red and blue set, not to repaint the CSS again in that same request.

**Independent Test**: Compare `theme.json` and `style.css` in the working tree with commit `4864810`.

**Acceptance Scenarios**:

1. **Given** commit `4864810`, **When** the committed palette is read, **Then** it is forest `#183D32`, ivory `#F7F5EF`, charcoal `#252927`, sage `#DCE7DC`, gold `#D6A84B`, white, and line `#DADFD9`.
2. **Given** the working tree on 2026-10-21, **When** `theme.json` is read, **Then** the interface colors are royal `#2436A0`, deep royal `#1A2878`, clay `#C23B3B`, soft red `#E07070`, cool paper `#F4F6FB`, blue charcoal `#1C2438`, mist `#E7EBF6`, white, and cool line `#D5DCE8`.
3. **Given** the written recommendation `#C62828` and `#174A8B`, **When** `style.css` is searched, **Then** those hex values are not the colors currently painted on the page.

### Edge Cases

- White on `#C62828` and white on `#174A8B` are the contrast checks named in the visual direction. They have not been rechecked in the browser against the royal/clay CSS, because that CSS uses different colors.
- The logo file is untracked until `.gitignore` allows `wp-content/themes/ocsi/` contents through. The theme directory is already allowlisted, so the new SVG is tracked once it is added.
- Stakeholder approval of the palette is still open. The documents say so.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: `ocsi-visual-direction.md` MUST recommend corporate red `#C62828`, corporate blue `#174A8B`, cool off-white `#F7F8FA`, white `#FFFFFF`, charcoal `#252B33`, and slate `#64748B`.
- **FR-002**: The logo file MUST remain pure red `#FF0000` and pure blue `#0000FF`.
- **FR-003**: The header MUST show `assets/images/ocsi-logo.svg` when WordPress has no custom logo.
- **FR-004**: The README MUST repeat the recommended palette and state that it is not yet approved.
- **FR-005**: The theme MUST NOT keep the forest, ivory, and gold palette from the first commit.

### Key Entities

- **Logo file**: `wp-content/themes/ocsi/assets/images/ocsi-logo.svg`. Supplied artwork. Not recolored.
- **Recommended palette**: The six colors in the visual direction. Written down. Not yet the CSS values.
- **Working theme palette**: Royal, clay, and cool paper values currently in `theme.json` and `style.css`.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: Section 4 of `ocsi-visual-direction.md` lists the six recommended hex values.
- **SC-002**: The header template references `assets/images/ocsi-logo.svg`.
- **SC-003**: A reader can see, from this spec, that the CSS on disk and the recommended palette are different.

## Assumptions

- “Update the docs please”, with the six hex values pasted, applied to `ocsi-visual-direction.md` and `README.md` only.
- The earlier “use different shades” step is what put royal and clay into the theme. Those files are modified and not committed.
- Applying `#C62828` and `#174A8B` in `theme.json` and `style.css` was not part of the completed work. It remains open.
