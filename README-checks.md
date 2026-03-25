# The Children of the Checks — Project Brief & Living Document

> *Paste this file at the start of any working session on this project along with style-sheet-toby-web.md and the main site README to restore full context.*

---

## Current Status

**Phase:** Initial build complete. Deployed and live at `projects.tobyziegler.com/checks/`.

**Decisions made:**
- Single scrolling page — chronicle/timeline layout
- Alternating `#F5F0E8` / `#EDE6D8` backgrounds on timeline entries (full-bleed bands via negative margins)
- H1 title in `var(--green)` — forest green
- Study-style footer (bookcase-base gradient, wordmark, three-column layout, "Other rooms" links)
- Lightbox on click for full-size check view — Esc / click-outside to dismiss
- "No image" placeholder for the original yellow-sheets beat — pale yellow rectangle, italic caption
- Cost callout block with left green border — quiet, not a badge
- Final line verbatim: *"Thus ended the era of the Children of the Checks."*

**Files deployed:**
```
projects.tobyziegler.com/checks/
├── index.php               ← the project page
└── images/
    ├── card/               ← 800×400px display images (used in timeline)
    ├── full/               ← 1400×700px images (loaded by lightbox)
    └── thumb/              ← 400×200px (available; not currently used)
```

**Bookcase shelf:**
- Shelf 2 HTML snippet: `shelf2-checks-snippet.html`
- Shelf image: `check-cole2-card.jpg` — copy to main site `assets/` folder before deploying
- New CSS for `.bc-check-panel` and `.bc-checks-info` included in the snippet file

**Next steps:**
- [ ] Deploy `index.php` to `projects.tobyziegler.com/checks/`
- [ ] Copy `check-cole2-card.jpg` to `tobyziegler.com/assets/`
- [ ] Replace Shelf 2 ghost block in `index.html` with snippet
- [ ] Add new CSS from snippet into `index.html` style block
- [ ] Add `projects.tobyziegler.com/checks/` to footer "Other rooms" on main site and Dad-a-Base
- [ ] Add nav link or contextual entry point from tobyziegler.com main site

---

## What This Is

**The Children of the Checks** is a project page at `projects.tobyziegler.com/checks/` — one entry in the Projects section of Toby's Study. It tells the story of a design intervention that began with two yellow sheets taped together and became a beloved, nationally-imitated tradition for the CoxHealth / CMN telethon.

It is simultaneously:
- A portfolio piece demonstrating design instinct, resource ingenuity, and iterative improvement
- A memorial to a program that worked beautifully and ended quietly
- A primary example of the throughline that runs through Toby's career: arrive, identify the gap, build the thing, watch it outlast the organizational will to sustain it

---

## URL Structure

```
projects.tobyziegler.com/
└── checks/
    ├── index.php
    └── images/
        ├── card/       ← 800×400 — used in timeline rows
        ├── full/       ← 1400×700 — loaded by lightbox on click
        └── thumb/      ← 400×200 — available for future use
```

The subdomain root (`projects.tobyziegler.com`) will eventually host a landing/index page linking to all project subfolders. That page is deferred — the `/checks/` page is self-contained.

---

## The Story

*Source: TheChildrenofTheChecksStory.txt — Toby's voice in that document is the voice of this page.*

A CMN representative arrived at CoxHealth printing services needing telethon checks printed. The existing artifact was two yellow sheets of paper taped together. Toby was appalled.

With roughly a month and no dedicated budget:
- Negotiated access to the engineering department's large-format plotter in exchange for replacement ink cartridges
- Designed a realistic display check sized to cut on the 32-inch guillotine cutter
- Shot a blue-sky photograph for the background; embedded the CMN phone number in the routing field
- Printed 50 full-color checks, mounted on pasteboard for rigidity

They were a hit. The following year, Cole was added. Then more children, year by year. Their stories went in the memo field. Organizations began keeping and displaying the checks proudly. Outside vendor quote: $50+. In-house cost: under $7. Cost reduction: ~85%.

New management eventually ended the program. Plain blue checks, then no checks at all.

*Thus ended the era of the Children of the Checks.*

---

## The Full Roster

| Year | Entry | Notes |
|---|---|---|
| 2002 | The Cloudscape | First check — sky only, no children |
| 2004 | Cole (first) | First child added; no memo story yet |
| 2005 | Cole (revisited) | Memo stories introduced — retroactively added for all children |
| 2006 | Lauren | Bilateral Brachial Plexus Injury |
| 2006 | Blake | Tetralogy of Fallot — two checks this year |
| 2007 | Danielle | L-Dopa Responsive Dystonia, misdiagnosed 6 years |
| 2008 | Megan | Stage 4 cancer, continued dancing through chemo |
| 2008 | Jodelyn & Scotlyn | Twin sisters, 13 weeks premature |
| 2009 | Jackson | Rhabdomyosarcoma at age 2; cancer free |
| 2010 | Brooke | Stage 4 Neuroblastoma, bone marrow transplant |
| 2011 | Kadie | Scimitar Syndrome, 11 surgeries — last child featured |
| 2012 | Cloudscape (return) | Management removed children; back to sky only |
| 2013 | Blue only | Final check; program ended shortly after |

---

## Image Assets

**Source files:** Exported from original print files at 72dpi actual size. Sizes vary slightly:
- Most checks: 2160×1008px source
- Two larger originals (pre-guillotine sizing): 2448×1152px
- Final blue check: 1980×936px

**Rendered sizes** (produced via `sips` batch script):

| Size | Dimensions | Use |
|---|---|---|
| Full | 1400×700px | Lightbox detail view |
| Card | 800×400px | Timeline row display |
| Thumb | 400×200px | Available; not currently used |

**Naming convention:** `check-{name}-{size}.jpg`
Examples: `check-cole2-card.jpg`, `check-cloudscape1-full.jpg`, `check-blueonly-thumb.jpg`

**Complete file list:**
```
card/                           full/                           thumb/
check-blake-card.jpg            check-blake-full.jpg            check-blake-thumb.jpg
check-blueonly-card.jpg         check-blueonly-full.jpg         check-blueonly-thumb.jpg
check-brooke-card.jpg           check-brooke-full.jpg           check-brooke-thumb.jpg
check-cloudscape1-card.jpg      check-cloudscape1-full.jpg      check-cloudscape1-thumb.jpg
check-cloudscape2-card.jpg      check-cloudscape2-full.jpg      check-cloudscape2-thumb.jpg
check-cole1-card.jpg            check-cole1-full.jpg            check-cole1-thumb.jpg
check-cole2-card.jpg            check-cole2-full.jpg            check-cole2-thumb.jpg
check-danielle-card.jpg         check-danielle-full.jpg         check-danielle-thumb.jpg
check-jackson-card.jpg          check-jackson-full.jpg          check-jackson-thumb.jpg
check-jodelynscottlyn-card.jpg  check-jodelynscottlyn-full.jpg  check-jodelynscottlyn-thumb.jpg
check-kadie-card.jpg            check-kadie-full.jpg            check-kadie-thumb.jpg
check-lauren-card.jpg           check-lauren-full.jpg           check-lauren-thumb.jpg
check-megan-card.jpg            check-megan-full.jpg            check-megan-thumb.jpg
```

**Batch resize command** (run from `checks/images/` — reproduced here for future use):
```bash
mkdir -p full card thumb
for f in check-*-base.jpg; do
  base="${f%-base.jpg}"
  sips -Z 1400 "$f" --out "full/${base}-full.jpg"
  sips -Z 800  "$f" --out "card/${base}-card.jpg"
  sips -Z 400  "$f" --out "thumb/${base}-thumb.jpg"
done
```

---

## Page Architecture

**Single scrolling page.** Structure:

1. **Fixed nav** — back link to Toby's Study; site wordmark; gains frosted glass on scroll
2. **Hero** — project title (green Fraunces italic), subtitle, four meta stats
3. **Origin section** — `#EDE6D8` background; two-column label/content; the problem beat; the yellow-sheets placeholder; cost callout
4. **Timeline** — 13 entries in alternating background bands; image left/right alternating; year badge; entry name; note; story or memo block; lightbox on image click
5. **Ending section** — dark (`#1C1712`); large decorative year range; the final line verbatim
6. **Footer** — Study-style; bookcase-base gradient; wordmark; three-column nav

---

## Design Notes

Fully consistent with the Study design system:
- **Typography:** Fraunces (display) + DM Sans (body) — non-negotiable
- **Palette:** Classic Study — `#F5F0E8`, `#EDE6D8`, `#2C1F14`, `#3A5C3B`, `#7B2D3A`
- **H1:** `var(--green)` — forest green
- **Timeline alternation:** nth-child(even) entries pull `var(--bg-alt)` with negative left/right margins to bleed full width
- **Lightbox:** Vanilla JS; `data-full` attribute on each `<img>` points to full-size file; Esc or backdrop click to dismiss
- **Footer:** `linear-gradient(180deg, #803300 0%, #5c2a10 35%, #3e1c08 70%, #2a1005 100%)` — exact match to main site and Dad-a-Base footer

**Tone:** Memorial display case. Warm, slightly proud, elegiac at the end. The dry wit from the source text is present; nothing is oversold.

---

## Bookcase Shelf

**Shelf 2 on tobyziegler.com** — replaces the existing ghost shelf 02.

- **Left panel:** `check-cole2-card.jpg` — the 2005 Cole check, the emotional centerpiece of the series (child's face, sky, CMN logo, memo text visible)
- **Right panel:** Project number, title, one-line descriptor, stack tags, pill button link
- **Stack tags:** `Print Design` · `2002–2013` · `CoxHealth`
- **Image path in main site:** `assets/check-cole2-card.jpg`
- **CSS classes added:** `.bc-check-panel`, `.bc-check-img-wrap`, `.bc-checks-info`

Full snippet with CSS: `shelf2-checks-snippet.html`

---

## Technical Notes

- **Stack:** PHP/HTML, vanilla JS, no frameworks, no build step — consistent with all Study rooms
- **No server-side logic** — pure static content; `.php` extension used for consistency only
- **Lightbox:** Vanilla JS, ~25 lines; `data-full` attribute on each image; body scroll locked while open
- **Image lazy loading:** `loading="lazy"` on all timeline images
- **No database, no API** — this page has no server dependencies beyond the files themselves

---

## Open Decisions

- [ ] `projects.tobyziegler.com` parent index — not yet built; checks page is self-contained and ready
- [ ] Thumbnail size — rendered and available; no current use; consider for a future overview grid
- [ ] Link from main site nav — not yet added; contextual placement TBD

---

## Files to Include at Session Start

1. **This README** (README-checks.md)
2. **style-sheet-toby-web.md** — design system and working preferences
3. **TheChildrenofTheChecksStory.txt** — source narrative; voice reference
4. **Stories.md** — full roster with years and memo text
5. Main site `index.html` — if touching bookcase or footer

---

## What This Page Is Not

- Not a case study with a problem/solution/results framework
- Not a metrics dashboard
- Not self-congratulatory
- A memorial. A chronicle. A room in the Study where something real is on display.

---

*Created: March 2026 — initial brief.*
*Updated: March 2026 — initial build complete. Shelf 2 snippet ready.*