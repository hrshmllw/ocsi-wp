# Feature Specification: Homepage mockup

**Feature Branch**: `004-homepage-mockup`

**Created**: 2026-10-22

**Status**: Implemented in the theme

**Input**: The Figma frame “High Fidelity design mockup” is the homepage. Follow its layout. Use the existing logo. Use the mockup copy as written, under the draft banner.

The frame is file `YTFqwNWXJQmSOxU4XBAnQ4`, node `6:2`: [OCSI in Figma](https://www.figma.com/design/YTFqwNWXJQmSOxU4XBAnQ4/OCSI?node-id=6-2). Page purpose stays in [the project brief](../../ocsi-website-project-brief.md). Color and type intent stay in [the visual direction](../../ocsi-visual-direction.md).

## User Scenarios & Testing *(mandatory)*

### User Story 1 - Read the homepage in the mockup’s order (Priority: P1)

A visitor on the home page sees the draft banner, the photo hero, the company introduction with its timeline, the channel grid, the capability cards, the people section, the closing inquiry band, and the new footer. The branch list, the partners block, and the live job list are not on the home page.

**Why this priority**: The mockup replaces the previous homepage layout.

**Independent Test**: Open the home page and compare the section order with the Figma frame.

**Acceptance Scenarios**:

1. **Given** the home page, **When** a visitor reads from the top, **Then** the sections are the draft banner, hero, company introduction, where the work happens, capabilities, people and careers, the closing band, and the footer.
2. **Given** the home page, **When** a visitor looks for a branch directory or a partners block, **Then** neither section is present.
3. **Given** the draft banner, **When** a visitor reads it, **Then** it says the presentation is a draft and shows “INTERNAL REVIEW V0.9”.

---

### User Story 2 - Move through the hero facilities (Priority: P1)

A visitor can see which facility the hero photo belongs to, move between four facilities, pause the rotation, and have the rotation stay still when the system asks for reduced motion.

**Why this priority**: The hero is the first thing on the page, and the mockup draws it as a carousel.

**Independent Test**: Load the home page, use the dots and the pause control, then reload with reduced motion enabled.

**Acceptance Scenarios**:

1. **Given** the hero, **When** the page first paints, **Then** the San Pablo, Laguna slide is visible, matching the frame.
2. **Given** motion is allowed, **When** six seconds pass, **Then** the next facility slide and its location label appear.
3. **Given** the pause control, **When** a visitor activates it, **Then** the slides stop advancing until play is chosen.
4. **Given** a keyboard user on the dot controls, **When** they press an arrow key, **Then** the matching slide is shown.
5. **Given** reduced motion, **When** the page loads, **Then** the slides do not advance on their own.

---

### User Story 3 - Use the shared header and footer (Priority: P1)

Every page uses the mockup header and footer. Navigation labels stay on one line. The current page’s label is red. The logo is the supplied OCSI mark.

**Why this priority**: The header and footer sit on every template, not only the home page.

**Independent Test**: Open the home page and About. Check the logo, the menu, and the footer columns.

**Acceptance Scenarios**:

1. **Given** any theme page, **When** a visitor looks at the header, **Then** the supplied logo sits beside “OCSI” and “Optimized Customer Solutions, Inc.”, the menu labels are on one line at one size, and “Contact Us” is an outlined button.
2. **Given** a page in the menu, **When** that page is open, **Then** its menu label is red.
3. **Given** the footer, **When** a visitor scans it, **Then** it has a brand column and columns for Company, Capabilities, Network, and Connect, plus the legal line and Privacy, Terms, and Compliance links.

### Edge Cases

- Terms of Service and Compliance pages do not exist yet. Those footer links use `ocsi_page_url()`, which returns the home URL until the pages exist. Heritage & Leadership points at About, the closest existing page.
- Only one hero photograph was exported from the frame (San Pablo). The other three slides reuse the capability and people placeholder photographs and keep their own location labels.
- The photographs and icons are placeholders from the mockup until OCSI supplies approved assets.
- Without JavaScript, the San Pablo slide stays visible and the other slides stay hidden.
- On viewports at or below 1100px the header menu collapses behind the existing Menu button, and the homepage grids become one column.

## Requirements *(mandatory)*

### Functional Requirements

- **FR-001**: The home page MUST follow the section layout of Figma node `6:2`.
- **FR-002**: Visible homepage copy MUST match the mockup wording, including figures the earlier draft omitted.
- **FR-003**: The draft banner MUST remain visible on the home page.
- **FR-004**: The header MUST use `assets/images/ocsi-logo.svg`, not the logo drawn in the mockup.
- **FR-005**: The hero MUST rotate four facility slides, expose dot controls and a pause control, and MUST NOT autoplay when `prefers-reduced-motion: reduce` matches.
- **FR-006**: Mockup photographs and icons MUST be stored in the theme. The page MUST NOT request `figma.com` asset URLs.
- **FR-007**: The header and footer markup MUST be shared by every theme template. Inner pages keep their current main content.
- **FR-008**: Headings MUST use Plus Jakarta Sans. Body text MUST use Inter.
- **FR-009**: Interface color MUST use blue `#315EA0`, deep red `#A20513`, and button red `#C62828`, with the supporting neutrals from the mockup.

### Key Entities

- **Homepage sections**: PHP in `front-page.php`. Copy is not stored as WordPress post content.
- **Facility slide**: An image, a location label, and a dot control.
- **Placeholder asset**: A file under `wp-content/themes/ocsi/assets/images/home/`.

## Success Criteria *(mandatory)*

### Measurable Outcomes

- **SC-001**: A side-by-side check of the home page at 1280px wide shows the same section order, alignment, and copy as node `6:2`.
- **SC-002**: At 768px and 375px the sections stack without horizontal overflow, and the menu still opens.
- **SC-003**: Every homepage image and icon resolves to a non-empty file in the theme.
- **SC-004**: About still renders its existing body under the new header and footer.
