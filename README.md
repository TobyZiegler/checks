# The Children of the Checks — Project Brief & Living Document

> *Paste this file at the start of any working session on this project along with style-sheet-toby-web.md and README-study.md (the main site README) to restore full context.*

---

## What This Is

**The Children of the Checks** is a project page living at `projects.tobyziegler.com/checks/` — one entry in the Projects section of Toby's Study. It tells the story of a design intervention that began with two yellow sheets taped together and became a beloved, nationally-imitated tradition.

It is simultaneously:
- A portfolio piece demonstrating design instinct, resource ingenuity, and iterative improvement
- A memorial to a program that worked beautifully and ended quietly
- A primary example of the throughline that runs through Toby's career: *arrive, identify the gap, build the thing, watch it outlast the organizational will to sustain it*

This page lives within the larger `projects.tobyziegler.com` subdomain alongside other project showcases. The checks project may be among the first built — it is also the emotional anchor of the whole portfolio.

---

## URL Structure

```
projects.tobyziegler.com/
└── checks/
    ├── index.php       ← the project page
    └── images/         ← rendered check images (full, card, thumbnail sizes)
```

The subdomain root (`projects.tobyziegler.com`) will eventually host a landing/index page linking to all project subfolders. That page is out of scope for this build — the `/checks/` page is self-contained and can exist before the parent index does.

---

## The Story

*Source: TheChildrenofTheChecksStory.txt — do not paraphrase this away. Toby's voice in that document is the voice of this page.*

A CMN representative arrived at CoxHealth printing services needing telethon checks printed. The existing artifact was two yellow sheets taped together with vague check-like printing — what the organization had been using for years. Toby was appalled.

With roughly a month and no dedicated budget:
- Negotiated access to the engineering department's large-format plotter in exchange for replacement ink cartridges
- Designed a realistic, proportionally correct display check sized to cut cleanly on the 32-inch guillotine cutter
- Photographed a blue sky with fluffy clouds for the background; embedded the CMN phone number in the routing field and the document number as the check number
- Printed 50 full-color checks on the plotter, mounted on pasteboard for rigidity

They were an immediate hit. The following year, Cole — a CMN child from Springfield — was added to the background. The year after that, another child. Then another. Eventually each child's story was typeset in the memo field, and retroactively added for earlier children.

Organizations began saving the checks. Framing them. Displaying them proudly in their businesses. The old yellow sheets had always gone immediately in the trash.

Outside vendor quote (with a labor-donation discount): **$50+ per check.**
In-house cost: **under $7 per check.**
Cost reduction: **approximately 85%.**

Other CMN chapters across the country attempted to replicate the formula. The model spread.

New management eventually objected to the "lightness" of the design and the white-balance adjustment cameras made on the sky background. The checks shifted to plain blue. A few years later, they stopped asking for checks at all.

*Thus ended the era of the Children of the Checks.*

---

## Visual Assets

### The Checks Themselves

The primary content of this page is the checks. They are the argument. Text supports them; they do not illustrate the text.

**Existing asset confirmed:**
- `6680_CMN_Display_Check_Cole_.pdf` — Check #6680, featuring Cole Hill; dated approximately 2006. Full-color, sky background, Cole photo, CMN logo, memo text with Cole's story. This is the emotional centerpiece of the whole project.

**Additional checks:** Other years' checks should be sourced if files exist. The progression from sky-only to Cole to multi-child lineup is the visual arc of the story. Even two or three checks spanning the timeline tell it.

**Rendered sizes:**
| Name | Dimensions | Use |
|---|---|---|
| Full / detail | 1400 × 700 px | Full-screen view, lightbox, detail inspection |
| Hero card | 800 × 400 px | Timeline row image, primary display size |
| Thumbnail | 400 × 200 px | Grid overview, if used |

The check aspect ratio is approximately 2:1 (landscape). Render from PDF at sufficient DPI to be sharp at full display size — 150dpi minimum at the target pixel dimensions.

---

## Page Architecture

### Layout Concept: The Chronicle

This is not a case study. It is a chronicle — a story with a beginning, a progression, and an end. The page structure should reflect that.

**Single scrolling page.** No tabs, no accordion tricks. The reader moves through time.

**Primary structure:**

1. **Page header** — Project title, a one-line descriptor, and a subtle breadcrumb back to the projects index (when it exists) or tobyziegler.com

2. **Opening beat** — The problem: two yellow sheets taped together. No image here (no asset exists, and the absence of image is the point). A brief, honest, slightly wry description. This sets the contrast for everything that follows.

3. **The timeline** — Each significant milestone gets a row:
   - First check (sky only) — image + brief note
   - Cole added (check #6680 or nearby) — image + Cole's story from the memo field, restated in brief
   - More children added — image + note on how the tradition grew
   - Organizations keeping and displaying the checks — no image needed; the quote or observation carries it
   - National spread — brief mention; no asset needed
   - The end — final note; plain blue, then silence

4. **The numbers** — A small, quiet callout: under $7 vs $50+. ~85% cost reduction. Let the math speak without overselling it.

5. **Footer / closing beat** — *"Thus ended the era of the Children of the Checks."* This line stays verbatim. It is the ending. Nothing after it except the standard site footer.

### Timeline row layout (desktop)

```
[image: hero card, ~800×400]    [text: milestone note, right-aligned or left — alternating optional]
```

On mobile: image full width, text below. No alternating — stack cleanly.

---

## Design Direction

### Tone

**Memorial display case, not portfolio slide.** This is a room in the Study where something real is on display. The visitor should feel like they're looking at framed artifacts, not scrolling a case study.

Warm. A little proud. A little elegiac at the end. The dry wit from the source text belongs here — *"They were an immediate hit"* is perfect; don't dilute it.

### Visual Identity

Fully consistent with the Study design system — no exceptions:

- **Typography:** Fraunces (display, headers, project title) + DM Sans (body, captions, notes)
- **Palette:** Classic Study — `#F5F0E8` page background, `#EDE6D8` alternating rows, `#2C1F14` primary text, `#3A5C3B` green accents, `#7B2D3A` burgundy accents
- **Buttons/links:** Pill-shaped, same component language as the rest of the Study
- **Noise overlay:** Yes — same subtle grain as the main site

### The Checks as Images

The checks are the primary visual element. They have their own strong aesthetic — blue sky, photographic portrait, CMN branding — which is warm and somewhat nostalgic. Don't fight it. Let the checks be the most colorful thing on the page. The surrounding UI should be quiet enough that the checks feel like they're on display, not competing with the container.

**Consider:** A subtle drop shadow or thin border on the check images to suggest a physical object being held up or displayed. Nothing heavy — just enough to lift them off the background.

**Lightbox / enlarge:** Full-size view on click. The Cole check has enough detail (the memo text, the routing numbers, the child's face) that a visitor will want to get closer. Simple implementation — click to enlarge, click or Esc to dismiss.

### The "No Image" Beat

The opening beat (two yellow sheets taped together) has no image. Consider a placeholder treatment:
- A roughly-proportioned rectangle in pale yellow (`#F5E6A0` or similar) with a brief italic label: *"The original. Two sheets of yellow paper, taped together."*
- Not trying to be funny — just honest about what it was, and why it prompted a redesign

---

## Content Notes

### Voice

Draw directly from TheChildrenofTheChecksStory.txt. Toby's telling of this story is already good — understated, warm, the right amount of pride, the right amount of rue at the end. The page copy should feel like a condensed, edited version of that document, not a rewrite.

Key phrases to preserve or closely echo:
- "scratch-stop" or "double-take scratch-stop" — this is vivid and real; don't genericize it
- "They were a hit." / "He was an even bigger hit." — the cadence works
- "Thus ended the era of the Children of the Checks." — verbatim, final line

### The Numbers

Present the cost comparison clearly but without a sales-pitch tone. A quiet line in the text, or a small callout block — not a big bold statistic badge. The story does enough work; the number just confirms it.

### Cole's Story

The memo text from check #6680 is Cole's actual story:
> *Cole Hill, of Springfield, MO, was born with a severe meconium aspiration... After 17 days in St. Louis, Cole made a complete recovery. Your donations to Children's Miracle Network helped provide Cole with synagis shots to prevent him from contracting the deadly RSV virus.*

This is real. Use it. It's what made the checks worth keeping.

---

## Technical Notes

### Stack

Consistent with the rest of the Study:
- PHP or HTML (no database needed for this page — static content only)
- Vanilla JS for the lightbox enlargement
- No frameworks, no build step
- Inline CSS (per-page, consistent with current subdomain pattern)

### Image handling

Images live in `checks/images/`. Three sizes per check, named consistently:
```
images/
├── check-6680-full.jpg       ← 1400×700
├── check-6680-card.jpg       ← 800×400
├── check-6680-thumb.jpg      ← 400×200
└── [additional checks follow same pattern]
```

Hero card size is used in the timeline. Full size is loaded by the lightbox. Thumbnails available for future grid view or overview section.

### No server-side dependencies

This page has no database, no API calls, no PHP logic needed beyond template rendering. It could be a plain `.html` file. Use `.php` for consistency with the rest of the Study if you prefer, but there's no requirement for it.

---

## Open Decisions

- [ ] Do additional check files exist beyond the Cole check (#6680)? The visual arc of the story (sky-only → Cole → more children) depends on having multiple years represented. Toby to check archives.
- [ ] Does the check progression have documented years attached to each version? Even approximate dates would make the timeline more concrete.
- [ ] `projects.tobyziegler.com` parent index — out of scope for this build, but the checks page should be architected to sit cleanly within it when it's built
- [ ] Link from tobyziegler.com bookcase — the checks project should eventually have a shelf entry. Currently the main site has a placeholder on shelf 1.
- [ ] Additional children stories — if story text exists for other children beyond Cole, it belongs in the memo callout for their respective checks

---

## Files to Include at Session Start

When starting a working session on this project:
1. **This README** (README-checks.md) — project brief
2. **style-sheet-toby-web.md** — design system and working preferences
3. **README-study.md** — main site context
4. **TheChildrenofTheChecksStory.txt** — source narrative; voice reference
5. **6680_CMN_Display_Check_Cole_.pdf** — primary visual asset
6. **Any additional check PDFs discovered** — add to this list as located

---

## What This Page Is Not

- Not a case study with a problem/solution/results framework
- Not a metrics dashboard
- Not self-congratulatory
- Not a LinkedIn post dressed up as a webpage
- A memorial. A chronicle. A room in the Study where something real is on display.

---

*Created: March 2026 — initial brief. Page build not yet started.*
