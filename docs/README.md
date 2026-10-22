# Documentation index

This file lists every project document. Add a row when a document is created. Update the row when its scope changes.

Work completed before the documentation rule is recorded in the three feature folders below. Those specs were written on 2026-10-21 from the commits and the uncommitted theme edits. They do not replace the brief or the visual direction.

## Standing documents

| Document | Owns |
| --- | --- |
| [README.md](../README.md) | Local setup, what git tracks, InfinityFree limits |
| [ocsi-website-project-brief.md](../ocsi-website-project-brief.md) | Sitemap, audiences, requirements, scope, launch checklist |
| [ocsi-visual-direction.md](../ocsi-visual-direction.md) | Palette, type, logo treatment, page art direction |
| [docs/design-brief.md](design-brief.md) | Designer handoff: purpose, tone, visual directions, palette, page intent. Summarizes the brief and visual direction; those remain the source of truth. |
| [.specify/memory/constitution.md](../.specify/memory/constitution.md) | Working rules for the theme, plugin, hosting, and documentation. Version 1.0.1 clarifies that the live pages use the draft in spec 003. |

## Feature specifications

Each folder has `spec.md`, `plan.md`, and `tasks.md`.

| Folder | Owns | State on 2026-10-21 |
| --- | --- | --- |
| [specs/001-wordpress-scaffold](../specs/001-wordpress-scaffold/spec.md) | Local WordPress install, OCSI theme, OCSI Core, git allowlist | Implemented in commit `4864810` |
| [specs/002-logo-palette](../specs/002-logo-palette/spec.md) | Logo file and the first recommended palette | Superseded for interface color by spec 004. The logo file is unchanged. |
| [specs/003-public-profile-copy](../specs/003-public-profile-copy/spec.md) | Draft page copy from public profiles, and the six local branch records | Inner pages still use this draft. The homepage copy is the mockup draft in spec 004. |
| [specs/004-homepage-mockup](../specs/004-homepage-mockup/spec.md) | Homepage, header, and footer from the Figma mockup | Built in the theme. Copy follows the mockup under the draft banner. |

## Spec Kit

Feature work uses the Spec Kit skills installed for Cursor: specify, then plan, then tasks. Artifacts go in `specs/<number>-<name>/`. The constitution and templates live under `.specify/`. Skills live under `.cursor/skills/`.
