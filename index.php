<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Children of the Checks — Toby Ziegler</title>
  <meta name="description" content="A decade of display checks for the Children's Miracle Network telethon — designed, printed, and iterated in-house from 2002 to 2013.">

  <!--
    Font loading: Lora + DM Sans via <link> (faster than @import).
    shared.css also has @import for these fonts — the <link> here takes
    precedence; shared.css @import will be a cache hit. No duplicate load.
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=DM+Sans:ital,opsz,wght@0,9..40,300..700;1,9..40,300..500&display=swap" rel="stylesheet">

  <!-- Design system: tokens, reset, body, chrome, buttons, keyframes -->
  <link rel="stylesheet" href="https://tobyziegler.com/assets/shared.css">

  <style>
    /*
     * style — The Children of the Checks
     * projects.tobyziegler.com/checks/
     *
     * Depends on shared.css loaded above. shared.css provides:
     *   tokens, reset, body, noise overlay, h1-h3 + p + em/strong,
     *   .room-name, .tagline, .burg/.green/.muted,
     *   .site-header/.site-footer and children,
     *   .btn system, .eyebrow pattern, @keyframes.
     *
     * This file covers only page-specific layout and components:
     *   site-nav (project page variant), hero, origin story,
     *   cost callout, timeline entries, ending section (warm shelf),
     *   check slideshow, lightbox, project-page footer.
     */


    /* ── Nav (project page variant) ────────────────────────────
     * Fixed transparent nav that gains frosted glass on scroll.
     * Intentionally NOT converted to .site-header — this page uses
     * a back-link-only nav, not the full room navigation pattern.
     * page-specific — .site-header not appropriate for this layout
     * ────────────────────────────────────────────────────────── */
    #site-nav {
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 100;
      padding: 1rem var(--pad-page);
      display: flex;
      align-items: center;
      justify-content: space-between;
      transition: background 0.3s ease, backdrop-filter 0.3s ease;
    }

    #site-nav.scrolled {
      background: rgba(245, 240, 232, 0.88);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-bottom: 1px solid var(--rule);
    }

    .nav-back {
      font-family: var(--font-body);
      font-size: var(--text-sm);
      font-weight: 500;
      color: var(--text-muted);
      text-decoration: none;
      letter-spacing: 0.03em;
      display: flex;
      align-items: center;
      gap: 0.4rem;
      transition: color 0.2s;
    }

    .nav-back:hover { color: var(--green); }

    .nav-back::before {
      content: '\2190';
      font-size: 1em;
    }

    .nav-home {
      font-family: var(--font-display);
      font-style: italic;
      font-size: var(--text-base);
      font-weight: 400;
      color: var(--text-muted);
      text-decoration: none;
      transition: color 0.2s;
    }

    .nav-home:hover { color: var(--green); }


    /* ── Hero ────────────────────────────────────────────────── */
    #hero {
      padding: 9rem var(--pad-page) 5rem;
      position: relative;
    }

    .hero-tag {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      margin-bottom: 1.5rem;
    }

    .hero-tag span {
      font-family: var(--font-body);
      font-size: var(--text-sm);
      font-weight: 500;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--burg);
    }

    .hero-tag::after {
      content: '';
      flex: 1;
      height: 1px;
      background: var(--burg);
      opacity: 0.4;
    }

    /* h1 green color — project pages per design system */
    #hero h1 {
      font-size: clamp(2.4rem, 5vw + 1rem, 4.2rem);
      font-weight: 700;
      font-style: italic;
      color: var(--green);
      margin-bottom: 1.25rem;
      line-height: 1.1;
    }

    .hero-subtitle {
      font-size: var(--text-body);
      color: var(--text-muted);
      font-weight: 300;
      max-width: 36rem;
      line-height: 1.6;
      margin-bottom: 2rem;
    }

    .hero-meta {
      display: flex;
      gap: 2rem;
      flex-wrap: wrap;
    }

    .meta-item {
      display: flex;
      flex-direction: column;
      gap: 0.2rem;
    }

    .meta-label {
      font-size: var(--text-xs);
      font-weight: 500;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--text-muted);
      opacity: 0.7;
    }

    .meta-value {
      font-family: var(--font-display);
      font-size: var(--text-base);
      font-weight: 400;
      color: var(--text);
    }


    /* ── Origin Story ────────────────────────────────────────── */
    #origin {
      background: var(--bg-alt);
      padding: 5rem var(--pad-page);
    }

    .origin-inner {
      max-width: 72rem;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1fr 2fr;
      gap: 4rem;
      align-items: start;
    }

    .origin-label {
      position: sticky;
      top: 6rem;
    }

    /* .section-tag — page-specific eyebrow variant.
     * Rule extends right (flex: 1 on ::after); .eyebrow in shared.css
     * uses a fixed-width left rule. Different enough to stay local.
     * page-specific — no shared token applies */
    .section-tag {
      display: flex;
      align-items: center;
      gap: 0.6rem;
      margin-bottom: 0.75rem;
    }

    .section-tag::before {
      content: '';
      width: 2rem;
      height: 1.5px;
      background: var(--green);
    }

    .section-tag span {
      font-size: var(--text-sm);
      font-weight: 500;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--green);
    }

    /* h2 inside sticky aside — heavier italic for the label role */
    .origin-label h2 {
      font-size: var(--text-body);
      font-style: italic;
      font-weight: 700;
      line-height: 1.2;
      color: var(--text);
    }

    .origin-body p {
      font-size: var(--text-base);
      color: var(--text);
      line-height: 1.75;
    }

    .origin-body p + p { margin-top: 1rem; }

    /* Before-artifact placeholder — intentional yellow for "receipt" feel */
    .before-artifact {
      margin: 2rem 0;
      border: 1.5px dashed rgba(44, 31, 20, 0.25);
      border-radius: 0.5rem;
      background: #F5E6A0;   /* page-specific: warm yellow receipt tone */
      padding: 2rem;
      text-align: center;
      aspect-ratio: 2 / 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
    }

    .before-artifact .artifact-label {
      font-family: var(--font-display);
      font-style: italic;
      font-size: var(--text-base);
      color: #7A6A30;   /* page-specific: warm ochre; no shared token */
      opacity: 0.85;
    }

    .before-artifact .artifact-sub {
      font-size: var(--text-sm);
      color: #7A6A30;
      opacity: 0.6;
      letter-spacing: 0.05em;
    }


    /* ── Cost Callout ────────────────────────────────────────── */
    .cost-callout {
      margin: 2.5rem 0 0;
      padding: 1.5rem 2rem;
      border-left: 3px solid var(--green);
      background: rgba(58, 92, 59, 0.06);   /* --green at 6% opacity */
      border-radius: 0 0.4rem 0.4rem 0;
    }

    .cost-row {
      display: flex;
      justify-content: space-between;
      align-items: baseline;
      padding: 0.35rem 0;
      font-size: var(--text-base);
      border-bottom: 1px solid var(--rule);
      gap: 1rem;
    }

    .cost-row:last-child { border-bottom: none; }
    .cost-row .cost-desc { color: var(--text-muted); }

    .cost-row .cost-num {
      font-family: var(--font-display);
      font-weight: 700;
      font-size: var(--text-base);
      color: var(--text);
      white-space: nowrap;
    }

    .cost-row.highlight .cost-num { color: var(--green); }


    /* ── Timeline ────────────────────────────────────────────── */
    #timeline {
      padding: 6rem var(--pad-page);
    }

    .timeline-header {
      max-width: 36rem;
      margin: 0 auto 4rem;
      text-align: center;
    }

    .timeline-header h2 {
      font-size: clamp(1.8rem, 3vw + 0.5rem, 2.6rem);
      font-style: italic;
      margin-bottom: 0.75rem;
    }

    .timeline-header p {
      color: var(--text-muted);
      font-size: var(--text-base);
    }

    .timeline-entry {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 3rem;
      align-items: start;
      margin-bottom: 5rem;
      padding-bottom: 5rem;
      border-bottom: 1px solid var(--rule);
      position: relative;
    }

    .timeline-entry:last-child {
      border-bottom: none;
      margin-bottom: 0;
    }

    .timeline-entry.flip         { direction: rtl; }
    .timeline-entry.flip > *     { direction: ltr; }

    .entry-image-wrap            { position: relative; }

    .entry-image-wrap img {
      width: 100%;
      height: auto;
      display: block;
      border-radius: 0.3rem;
      box-shadow: 0 4px 24px rgba(44, 31, 20, 0.18), 0 1px 4px rgba(44, 31, 20, 0.12);
      cursor: zoom-in;
      transition: box-shadow 0.2s ease, transform 0.2s ease;
    }

    .entry-image-wrap img:hover {
      box-shadow: 0 8px 36px rgba(44, 31, 20, 0.22), 0 2px 8px rgba(44, 31, 20, 0.18);
      transform: translateY(-2px);
    }

    .entry-year {
      position: absolute;
      top: -0.9rem;
      left: 1rem;
      background: var(--bg);
      border: 1.5px solid var(--rule);
      border-radius: 2rem;
      padding: 0.2rem 0.75rem;
      font-family: var(--font-display);
      font-size: var(--text-sm);
      font-weight: 700;
      color: var(--text-muted);
      letter-spacing: 0.03em;
    }

    .timeline-entry.milestone .entry-year {
      background: var(--green);
      border-color: var(--green);
      color: white;
    }

    .timeline-entry.ending .entry-year {
      background: var(--text-muted);
      border-color: var(--text-muted);
      color: white;
    }

    .entry-content  { padding-top: 0.5rem; }

    .entry-name {
      font-family: var(--font-display);
      font-size: var(--text-body);
      font-weight: 700;
      font-style: italic;
      color: var(--text);
      margin-bottom: 0.25rem;
      line-height: 1.15;
    }

    .entry-note {
      font-size: var(--text-sm);
      font-weight: 500;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      color: var(--green);
      margin-bottom: 0.75rem;
    }

    .entry-note.ending-note  { color: var(--text-muted); }
    .entry-note.warning-note { color: var(--burg); }

    .entry-story {
      font-size: var(--text-base);
      color: var(--text);
      line-height: 1.75;
    }

    /* Memo field — quoted source text, intentionally quieter than body.
     * --text-sm is appropriate here: this is "document voice," not narrative.
     * page-specific treatment; no shared component analog */
    .entry-memo {
      margin-top: 1rem;
      padding: 1rem 1.25rem;
      background: var(--bg-alt);
      border-left: 2px solid var(--rule);
      border-radius: 0 0.3rem 0.3rem 0;
      font-size: var(--text-sm);
      font-style: italic;
      color: var(--text-muted);
      line-height: 1.7;
    }

    .entry-memo .memo-label {
      font-style: normal;
      font-size: var(--text-xs);
      font-weight: 500;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--text-muted);
      opacity: 0.6;
      display: block;
      margin-bottom: 0.4rem;
    }

    .timeline-entry.text-only {
      grid-template-columns: 1fr;
      max-width: 36rem;
      margin-left: auto;
      margin-right: auto;
    }

    /* Alternating full-bleed bands via negative margins.
     * Negative values must match the parent horizontal padding (var(--pad-page)). */
    #timeline .timeline-entry:nth-child(even) {
      background: var(--bg-alt);
      margin-left: calc(-1 * var(--pad-page));
      margin-right: calc(-1 * var(--pad-page));
      padding-left: var(--pad-page);
      padding-right: var(--pad-page);
    }


    /* ── Ending Section (warm shelf) ───────────────────────────
     * Replaces the original dark (#bg-dark) ending section.
     * Parchment background + subtle wood-grain bottom edge —
     * reads as the last shelf before the footer rather than a
     * dramatic curtain call. The sentence earns its weight from
     * the story behind it; the background doesn't need to help.
     * ────────────────────────────────────────────────────────── */
    #ending {
      background: var(--bg);
      padding: 6rem var(--pad-page) 4rem;
      text-align: center;
      position: relative;
      border-top: 1px solid var(--rule);
    }

    /* Shelf ledge — echoes the bookcase ledge on the main Study */
    #ending::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 0.6rem;
      background: linear-gradient(180deg, #cc8733 0%, #803300 60%, #503320 100%);
      opacity: 0.7;
    }

    .ending-inner {
      max-width: 36rem;
      margin: 0 auto;
    }

    .ending-rule {
      width: 3rem;
      height: 1.5px;
      background: var(--rule-strong);
      margin: 0 auto 2.5rem;
    }

    /* Watermark years — same technique as the Study hero "T" watermark */
    .ending-years {
      font-family: var(--font-display);
      font-size: var(--text-display);
      font-weight: 700;
      font-style: italic;
      color: var(--text);
      opacity: 0.05;
      line-height: 1;
      margin-bottom: 1rem;
      letter-spacing: -0.02em;
      pointer-events: none;
      user-select: none;
    }

    /* h2 override — weight 300 italic; the sentence is the drama */
    #ending h2 {
      font-size: clamp(1.4rem, 3vw, 2rem);
      font-style: italic;
      font-weight: 300;
      color: var(--text);
      line-height: 1.4;
      margin-bottom: 1.5rem;
    }

    #ending p {
      font-size: var(--text-base);
      color: var(--text-muted);
      line-height: 1.75;
    }


    /* ── Check Slideshow ────────────────────────────────────────
     * Sits between the ending and the footer.
     * Auto-advances every 4 seconds (AUTO_INTERVAL in script).
     * Pauses on hover. Prev/next buttons + dot indicators.
     * Uses card-size images — already in browser cache from
     * the timeline lazy-load as the visitor scrolled through.
     * ────────────────────────────────────────────────────────── */
    #check-slideshow {
      background: var(--bg-alt);
      padding: 4rem var(--pad-page);
      text-align: center;
      border-top: 1px solid var(--rule);
    }

    .slideshow-label {
      font-family: var(--font-body);
      font-size: var(--text-xs);
      font-weight: 600;
      letter-spacing: 0.14em;
      text-transform: uppercase;
      color: var(--text-muted);
      margin-bottom: 2rem;
      opacity: 0.7;
    }

    .slideshow-stage {
      max-width: 36rem;
      margin: 0 auto;
    }

    /* .slideshow-img-wrap is the clipping boundary.
     * overflow: hidden keeps entering/exiting images inside the frame.
     * Height is locked by JS on init so the frame doesn't collapse
     * while the incoming image is absolutely positioned. */
    .slideshow-img-wrap {
      border-radius: 0.4rem;
      overflow: hidden;
      box-shadow: var(--shadow-lift);
      position: relative;
    }

    /* Base image rule — both slots share these */
    .slideshow-img-wrap img {
      display: block;
      width: 100%;
      height: auto;
    }

    /* .slide-current holds the frame height (position: relative).
     * .slide-incoming overlays it (position: absolute) until the
     * animation completes and it becomes the new current. */
    .slideshow-img-wrap img.slide-current {
      position: relative;
    }

    .slideshow-img-wrap img.slide-incoming {
      position: absolute;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* Slide-out: current check exits left over 3s */
    @keyframes slideOutLeft {
      from { transform: translateX(0);     opacity: 1; }
      to   { transform: translateX(-100%); opacity: 0.6; }
    }

    /* Slide-in: incoming check enters from right over 3s */
    @keyframes slideInRight {
      from { transform: translateX(100%);  opacity: 0.6; }
      to   { transform: translateX(0);     opacity: 1; }
    }

    .slideshow-img-wrap img.is-exiting {
      animation: slideOutLeft 3s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    .slideshow-img-wrap img.is-entering {
      animation: slideInRight 3s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    /* Caption fades — sliding it would be distracting */
    .slideshow-caption {
      margin-top: 1.25rem;
      font-family: var(--font-display);
      font-style: italic;
      font-size: var(--text-base);
      font-weight: 400;
      color: var(--text-muted);
      min-height: 1.8rem;
      transition: opacity 0.4s ease;
    }

    .slideshow-caption.fade-out { opacity: 0; }

    .slideshow-controls {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 1.5rem;
      margin-top: 1.5rem;
    }

    .slideshow-btn {
      background: none;
      border: 1.5px solid var(--rule-strong);
      border-radius: 50%;
      width: 2.5rem;
      height: 2.5rem;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      color: var(--text-muted);
      font-size: var(--text-base);
      transition: all var(--transition);
      flex-shrink: 0;
    }

    .slideshow-btn:hover {
      border-color: var(--green);
      color: var(--green);
      transform: translateY(-1px);
    }

    .slideshow-dots {
      display: flex;
      gap: 0.5rem;
      align-items: center;
    }

    .slideshow-dot {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      background: var(--rule-strong);
      transition: all 0.3s ease;
      cursor: pointer;
      border: none;
      padding: 0;
    }

    .slideshow-dot.active {
      background: var(--green);
      transform: scale(1.4);
    }


    /* ── Footer (project page variant) ─────────────────────────
     * Dark wood gradient — matches Study footer visually.
     * Uses a three-column grid, which is wider than .site-footer
     * in shared.css (two-item flex row). Kept as local styles.
     * page-specific — wider column grid not in shared.css
     * ────────────────────────────────────────────────────────── */
    #site-footer {
      background: linear-gradient(180deg, #803300 0%, #5c2a10 35%, #3e1c08 70%, #2a1005 100%);
      padding: 4rem 4rem 2rem;
    }

    .footer-inner {
      display: grid;
      grid-template-columns: 2fr 1fr 1fr;
      gap: 4rem;
      padding-bottom: 3rem;
      border-bottom: 1px solid rgba(250, 247, 242, 0.1);
      max-width: 90rem;
    }

    .footer-left {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    /* Dark-background .room-name analog — kept local to avoid fighting
     * shared.css color inheritance on dark surfaces */
    .footer-wordmark {
      font-family: var(--font-display);
      font-style: italic;
      font-size: var(--text-lg);
      font-weight: 300;
      color: var(--white-soft);
      letter-spacing: -0.02em;
    }

    .footer-tagline {
      font-size: var(--text-sm);
      color: rgba(250, 247, 242, 0.45);
    }

    .footer-col {
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
      padding-top: 0.25rem;
    }

    .footer-col-label {
      font-size: var(--text-xs);
      font-weight: 600;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: rgba(250, 247, 242, 0.3);
      margin-bottom: 0.25rem;
    }

    .footer-link {
      font-size: var(--text-sm);
      color: rgba(250, 247, 242, 0.55);
      text-decoration: none;
      transition: color 0.2s;
    }

    .footer-link:hover { color: var(--white-soft); }

    .footer-base {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-top: 1.5rem;
      flex-wrap: wrap;
      gap: 1rem;
      max-width: 90rem;
    }

    .footer-copy {
      font-size: var(--text-xs);
      color: rgba(250, 247, 242, 0.3);
    }


    /* ── Lightbox ────────────────────────────────────────────── */
    #lightbox {
      display: none;
      position: fixed;
      inset: 0;
      z-index: 500;
      background: rgba(28, 23, 18, 0.92);
      backdrop-filter: blur(6px);
      -webkit-backdrop-filter: blur(6px);
      align-items: center;
      justify-content: center;
      padding: 2rem;
      cursor: zoom-out;
    }

    #lightbox.open { display: flex; }

    #lightbox img {
      max-width: 100%;
      max-height: 90vh;
      border-radius: 0.3rem;
      box-shadow: 0 16px 64px rgba(0, 0, 0, 0.6);
      cursor: default;
    }

    #lightbox-close {
      position: absolute;
      top: 1.5rem;
      right: 1.5rem;
      background: none;
      border: 1.5px solid rgba(250, 247, 242, 0.3);
      border-radius: 50%;
      width: 2.5rem;
      height: 2.5rem;
      color: var(--white-soft);
      font-size: var(--text-base);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: border-color 0.2s, background 0.2s;
    }

    #lightbox-close:hover {
      border-color: rgba(250, 247, 242, 0.7);
      background: rgba(250, 247, 242, 0.1);
    }


    /* ── Responsive ──────────────────────────────────────────── */
    @media (max-width: 768px) {
      /* --pad-page's max() handles horizontal padding at all widths.
       * These overrides only adjust vertical padding at narrow screens. */
      #site-nav         { padding-top: 0.75rem; padding-bottom: 0.75rem; }
      #hero             { padding-top: 7rem; padding-bottom: 3.5rem; }
      #origin           { padding-top: 3.5rem; padding-bottom: 3.5rem; }
      #timeline         { padding-top: 4rem; padding-bottom: 4rem; }
      #ending           { padding-top: 4rem; padding-bottom: 3rem; }
      #check-slideshow  { padding-top: 3rem; padding-bottom: 3rem; }
      #site-footer      { padding-top: 3rem; padding-bottom: 1.5rem; }

      .origin-inner     { grid-template-columns: 1fr; gap: 2rem; }
      .origin-label     { position: static; }

      .timeline-entry {
        grid-template-columns: 1fr;
        gap: 1.5rem;
        margin-bottom: 3.5rem;
        padding-bottom: 3.5rem;
      }

      .timeline-entry.flip { direction: ltr; }

      .footer-inner { grid-template-columns: 1fr; gap: 2.5rem; }

      /* Reset alternating negative margins on narrow screens */
      #timeline .timeline-entry:nth-child(even) {
        margin-left: calc(-1 * var(--pad-page));
        margin-right: calc(-1 * var(--pad-page));
        padding-left: var(--pad-page);
        padding-right: var(--pad-page);
      }
    }
  </style>
</head>
<body>

  <!-- ── Navigation ──────────────────────────────────────────── -->
  <nav id="site-nav">
    <a href="https://tobyziegler.com" class="nav-back">Toby&#8217;s Study</a>
    <a href="https://tobyziegler.com" class="nav-home">Toby Ziegler</a>
  </nav>

  <!-- ── Hero ────────────────────────────────────────────────── -->
  <section id="hero">
    <div class="hero-tag">
      <span>Children&#8217;s Miracle Network</span>
    </div>
    <h1>The Children of the Checks</h1>
    <p class="hero-subtitle">A decade of display checks for the CMN telethon &#8212; designed, printed, and iterated in-house from two yellow sheets taped together to something worth keeping.</p>
    <div class="hero-meta">
      <div class="meta-item">
        <span class="meta-label">Years active</span>
        <span class="meta-value">2002 &#8211; 2013</span>
      </div>
      <div class="meta-item">
        <span class="meta-label">Children featured</span>
        <span class="meta-value">10</span>
      </div>
      <div class="meta-item">
        <span class="meta-label">Cost reduction</span>
        <span class="meta-value">~85%</span>
      </div>
      <div class="meta-item">
        <span class="meta-label">Heartfelt Thanks</span>
        <span class="meta-value">Incalculable</span>
      </div>
    </div>
  </section>

  <!-- ── Origin Story ─────────────────────────────────────────── -->
  <section id="origin">
    <div class="origin-inner">
      <div class="origin-label">
        <div class="section-tag"><span>The Problem</span></div>
        <h2>Two yellow sheets,<br>taped together.</h2>
      </div>
      <div class="origin-body">
        <p>After about a year on the new job, a representative from Children&#8217;s Miracle Network came to printing services needing more telethon checks printed for the upcoming broadcast. They were referred to me as the designer on staff.</p>
        <p>The sample they brought gave me a double-take. It was two yellow sheets of paper taped together with some printing which resembled a check in only the vaguest sense. Apparently this was what they&#8217;d been using for years to present donations from area organizations to CMN on television.</p>
        <p>I was appalled.</p>

        <div class="before-artifact">
          <span class="artifact-label">The original.</span>
          <span class="artifact-sub">Two sheets of yellow paper, taped together. No image survives &#8212; and none was worth keeping.</span>
        </div>

        <p>We had about a month and a half. I negotiated access to the engineering department&#8217;s large-format plotter in exchange for replacement ink cartridges, designed a realistic display check sized to cut cleanly on our 32-inch guillotine cutter, shot a photo of a blue sky with fluffy clouds for the background, and embedded the CMN phone number in the routing field. Fifty checks, printed in full color, mounted on pasteboard for rigidity.</p>
        <p>They were a hit.</p>

        <div class="cost-callout">
          <div class="cost-row">
            <span class="cost-desc">Outside vendor quote (with donation discount)</span>
            <span class="cost-num">$50+ each</span>
          </div>
          <div class="cost-row highlight">
            <span class="cost-desc">In-house cost</span>
            <span class="cost-num">under $7 each</span>
          </div>
          <div class="cost-row highlight">
            <span class="cost-desc">Cost reduction</span>
            <span class="cost-num">~85%</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ── Timeline ─────────────────────────────────────────────── -->
  <section id="timeline">
    <div class="timeline-header">
      <div class="section-tag" style="justify-content:center;"><span>The Chronicle</span></div>
      <h2>The checks, year by year.</h2>
      <p>Each year brought refinements. Each child made the next one harder to throw away.</p>
    </div>

    <!-- 2002: Cloudscape 1 -->
    <div class="timeline-entry milestone">
      <div class="entry-image-wrap">
        <span class="entry-year">2002</span>
        <img src="images/card/check-cloudscape1-card.jpg"
             data-full="images/full/check-cloudscape1-full.jpg"
             alt="The original CMN display check, 2002 &#8212; blue sky and clouds"
             loading="lazy">
      </div>
      <div class="entry-content">
        <div class="entry-name">The Cloudscape</div>
        <div class="entry-note">The one that started it all</div>
        <p class="entry-story">The check which started it all &#8212; before the idea to include the CMN children. Already light-years ahead of two yellow sheets taped together. Organizations actually kept these. The old yellow checks had always gone straight in the trash.</p>
        <p class="entry-story">Other CMN chapters around the country would eventually try to replicate this formula.</p>
      </div>
    </div>

    <!-- 2004: Cole 1 -->
    <div class="timeline-entry flip milestone">
      <div class="entry-image-wrap">
        <span class="entry-year">2004</span>
        <img src="images/card/check-cole1-card.jpg"
             data-full="images/full/check-cole1-full.jpg"
             alt="CMN display check featuring Cole Hill, 2004"
             loading="lazy">
      </div>
      <div class="entry-content">
        <div class="entry-name">Cole</div>
        <div class="entry-note">The first child</div>
        <p class="entry-story">Two years after the cloudscape check, Cole Hill of Springfield was added to the background. He was an even bigger hit than the first check.</p>
        <p class="entry-story">Cole&#8217;s original check was simpler &#8212; the idea to include the children&#8217;s stories in the memo field hadn&#8217;t arrived yet. That would come the following year, and it changed everything.</p>
      </div>
    </div>

    <!-- 2005: Cole 2 -->
    <div class="timeline-entry">
      <div class="entry-image-wrap">
        <span class="entry-year">2005</span>
        <img src="images/card/check-cole2-card.jpg"
             data-full="images/full/check-cole2-full.jpg"
             alt="CMN display check featuring Cole Hill with memo story, 2005"
             loading="lazy">
      </div>
      <div class="entry-content">
        <div class="entry-name">Cole, revisited</div>
        <div class="entry-note">The memo field finds its purpose</div>
        <p class="entry-story">The second year with Cole brought the insight that would define the rest of the series: put the child&#8217;s story in the memo field. Once that happened, the checks became more than design objects. They became records.</p>
        <div class="entry-memo">
          <span class="memo-label">From the memo field</span>
          When Cole Hill, of Springfield, MO was born, he suffered from a severe meconium aspiration. The stress of his birth caused him to inhale a bowel movement. His lungs were completely full of meconium. He was rushed to St. Louis where the doctors were not sure that he was going to live. After 17 days in St. Louis, Cole made a complete recovery. Your donations to Children&#8217;s Miracle Network helped provide Cole with synagis shots to prevent him from contracting the deadly RSV virus.
        </div>
      </div>
    </div>

    <!-- 2006: Lauren -->
    <div class="timeline-entry flip">
      <div class="entry-image-wrap">
        <span class="entry-year">2006</span>
        <img src="images/card/check-lauren-card.jpg"
             data-full="images/full/check-lauren-full.jpg"
             alt="CMN display check featuring Lauren Anderson, 2006"
             loading="lazy">
      </div>
      <div class="entry-content">
        <div class="entry-name">Lauren</div>
        <div class="entry-note">The lineup begins</div>
        <div class="entry-memo">
          <span class="memo-label">From the memo field</span>
          When Lauren Anderson of Springfield, MO was born, she suffered a Bilateral Brachial Plexus Injury. The nerves responsible for arm and hand movement were severed and stretched, leading to partial paralysis in both arms. Lauren has undergone many surgeries and therapies to increase movement in her hands and arms. Your donations to Children&#8217;s Miracle Network allow Lauren to get Physical and Occupational Therapy at CoxHealth, pay for her growth hormone treatment, and help her family get to specialty appointments out of town.
        </div>
      </div>
    </div>

    <!-- 2006: Blake -->
    <div class="timeline-entry">
      <div class="entry-image-wrap">
        <span class="entry-year">2006</span>
        <img src="images/card/check-blake-card.jpg"
             data-full="images/full/check-blake-full.jpg"
             alt="CMN display check featuring Blake Shanks, 2006"
             loading="lazy">
      </div>
      <div class="entry-content">
        <div class="entry-name">Blake</div>
        <div class="entry-note">Two checks in one year</div>
        <div class="entry-memo">
          <span class="memo-label">From the memo field</span>
          When Blake Shanks of Willard, MO was born, he was diagnosed with Tetralogy of Fallot &#8212; a hole in his heart with a pulmonary valve too narrow. If he cried, he lost oxygen and turned blue. At just 4 months old, he underwent open heart surgery to correct the defect. He is now doing wonderful. Your donations helped Blake&#8217;s parents travel to specialty appointments, provided oxygen when he needed it, and assisted with the cost of his CoxHealth hospital bills.
        </div>
      </div>
    </div>

    <!-- 2007: Danielle -->
    <div class="timeline-entry flip">
      <div class="entry-image-wrap">
        <span class="entry-year">2007</span>
        <img src="images/card/check-danielle-card.jpg"
             data-full="images/full/check-danielle-full.jpg"
             alt="CMN display check featuring Danielle Roeder, 2007"
             loading="lazy">
      </div>
      <div class="entry-content">
        <div class="entry-name">Danielle</div>
        <div class="entry-note"></div>
        <div class="entry-memo">
          <span class="memo-label">From the memo field</span>
          When Danielle Roeder was 6 months old, she started losing all muscle control until she was completely wheelchair bound &#8212; unable to move a muscle, speaking in a tiny strained whisper. Doctors did not know what was wrong and she was misdiagnosed for 6 years. In the summer of 2005, with the help of Children&#8217;s Miracle Network, Danielle and her family traveled to the Mayo Clinic. After days of testing, she was diagnosed with L-Dopa Responsive Dystonia &#8212; which mimics the symptoms of Parkinson&#8217;s. Now, with daily medication, Danielle can drive a power wheelchair, talk, sing, write, and most importantly, walk.
        </div>
      </div>
    </div>

    <!-- 2008: Megan -->
    <div class="timeline-entry">
      <div class="entry-image-wrap">
        <span class="entry-year">2008</span>
        <img src="images/card/check-megan-card.jpg"
             data-full="images/full/check-megan-full.jpg"
             alt="CMN display check featuring Megan White, 2008"
             loading="lazy">
      </div>
      <div class="entry-content">
        <div class="entry-name">Megan</div>
        <div class="entry-note"></div>
        <div class="entry-memo">
          <span class="memo-label">From the memo field</span>
          On Mother&#8217;s Day of 2007, Megan White was diagnosed with Stage 4 cancer. She underwent surgery to remove a 6-pound tumor that had swallowed one of her kidneys, then spent the next year in extensive chemotherapy. Through all of it, Megan continued to dance &#8212; and even compete at national competitions. Thanks to your donations, Megan is now able to call herself a cancer survivor.
        </div>
      </div>
    </div>

    <!-- 2008: Jodelyn & Scotlyn -->
    <div class="timeline-entry flip">
      <div class="entry-image-wrap">
        <span class="entry-year">2008</span>
        <img src="images/card/check-jodelynscottlyn-card.jpg"
             data-full="images/full/check-jodelynscottlyn-full.jpg"
             alt="CMN display check featuring Jodelyn and Scotlyn Belew, 2008"
             loading="lazy">
      </div>
      <div class="entry-content">
        <div class="entry-name">Jodelyn &amp; Scotlyn</div>
        <div class="entry-note">Two sisters, one check</div>
        <div class="entry-memo">
          <span class="memo-label">From the memo field</span>
          Jodelyn and Scotlyn Belew were born 13 weeks premature. Jodelyn weighed 2 pounds 1 ounce; Scotlyn weighed 1 pound 14 ounces. Though Scotlyn was smaller at birth, she grew into a healthy little girl. Jodelyn suffered a staph infection in her brain and underwent a craniotomy at 6 months of age, then was diagnosed with Cerebral Palsy. Jodelyn receives physical and occupational therapy at the CoxHealth Meyer Center and grows stronger every day.
        </div>
      </div>
    </div>

    <!-- 2009: Jackson -->
    <div class="timeline-entry">
      <div class="entry-image-wrap">
        <span class="entry-year">2009</span>
        <img src="images/card/check-jackson-card.jpg"
             data-full="images/full/check-jackson-full.jpg"
             alt="CMN display check featuring Jackson, 2009"
             loading="lazy">
      </div>
      <div class="entry-content">
        <div class="entry-name">Jackson</div>
        <div class="entry-note"></div>
        <div class="entry-memo">
          <span class="memo-label">From the memo field</span>
          At just 2 years old, Jackson was diagnosed with rhabdomyosarcoma &#8212; a rare cancer found in his prostate and bladder. He received radiation and chemotherapy in St. Louis. About a year later, his family received the news that he was officially cancer free. Jackson is now 3 years old, enjoying being a normal three-year-old boy. His parents are grateful for the donations that helped their son have a second chance.
        </div>
      </div>
    </div>

    <!-- 2010: Brooke -->
    <div class="timeline-entry flip">
      <div class="entry-image-wrap">
        <span class="entry-year">2010</span>
        <img src="images/card/check-brooke-card.jpg"
             data-full="images/full/check-brooke-full.jpg"
             alt="CMN display check featuring Brooke Kincaid, 2010"
             loading="lazy">
      </div>
      <div class="entry-content">
        <div class="entry-name">Brooke</div>
        <div class="entry-note"></div>
        <div class="entry-memo">
          <span class="memo-label">From the memo field</span>
          In 2005, when Brooke Kincaid was 2 years old, her parents noticed a lump in her leg and took her to the ER at Cox South. Doctors found additional lumps in her skull and on her adrenal gland. After being rushed to St. Louis Children&#8217;s Hospital, Brooke was diagnosed with Stage 4 Neuroblastoma. After 6 rounds of chemotherapy and a bone marrow transplant, Brooke is able to call herself a cancer survivor.
        </div>
      </div>
    </div>

    <!-- 2011: Kadie -->
    <div class="timeline-entry">
      <div class="entry-image-wrap">
        <span class="entry-year">2011</span>
        <img src="images/card/check-kadie-card.jpg"
             data-full="images/full/check-kadie-full.jpg"
             alt="CMN display check featuring Kadie, 2011"
             loading="lazy">
      </div>
      <div class="entry-content">
        <div class="entry-name">Kadie</div>
        <div class="entry-note">The last child</div>
        <div class="entry-memo">
          <span class="memo-label">From the memo field</span>
          When Kadie was born, she was immediately flown to St. Louis after doctors discovered her heart was on the wrong side of her body and she was missing most of her esophagus. She was diagnosed with a rare condition called Scimitar Syndrome and has had 11 surgeries. She continues to overcome medical obstacles and is truly a miracle. She enjoys cooking, gymnastics, and karate.
        </div>
      </div>
    </div>

    <!-- 2012: Cloudscape 2 -->
    <div class="timeline-entry flip ending">
      <div class="entry-image-wrap">
        <span class="entry-year">2012</span>
        <img src="images/card/check-cloudscape2-card.jpg"
             data-full="images/full/check-cloudscape2-full.jpg"
             alt="CMN display check, clouds only, 2012"
             loading="lazy">
      </div>
      <div class="entry-content">
        <div class="entry-name">Back to clouds.</div>
        <div class="entry-note warning-note">The children are gone</div>
        <p class="entry-story">The auto-focus saw the children as people, throwing cameras and timing off. The checks moved back to clouds only. The cameras took a moment to adjust their white-point compensation on the sky. The clouds were doomed.</p>
        <p class="entry-story">Mild protests and inquiries were met with certain answers: the children were no longer to be a feature of the checks.</p>
      </div>
    </div>

    <!-- 2013: Blue Only -->
    <div class="timeline-entry ending">
      <div class="entry-image-wrap">
        <span class="entry-year">2013</span>
        <img src="images/card/check-blueonly-card.jpg"
             data-full="images/full/check-blueonly-full.jpg"
             alt="CMN display check, plain blue, 2013 &#8212; the final check"
             loading="lazy">
      </div>
      <div class="entry-content">
        <div class="entry-name">Plain blue.</div>
        <div class="entry-note ending-note">The final check</div>
        <p class="entry-story">Plain blue. No children, no sky, no stories in the memo field. The need for checks has changed, so we haven&#8217;t printed a resupply in years. Perhaps we never will. Even the plain blue check will be missed.</p>
      </div>
    </div>

  </section>

  <!-- ── Ending ────────────────────────────────────────────────── -->
  <section id="ending">
    <div class="ending-inner">
      <div class="ending-years">2002&#8211;2013</div>
      <div class="ending-rule"></div>
      <h2>Thus ended the era of the Children of the Checks.</h2>
      <p>The work outlasted the organizational will to sustain it.</p>
    </div>
  </section>

  <!-- ── Check Slideshow ───────────────────────────────────────── -->
  <section id="check-slideshow">
    <div class="slideshow-label">The complete collection</div>
    <div class="slideshow-stage">
      <div class="slideshow-img-wrap" id="slideshow-wrap">
        <img id="slideshow-current" class="slide-current" src="" alt="">
        <img id="slideshow-incoming" class="slide-incoming" src="" alt="" aria-hidden="true">
      </div>
      <div class="slideshow-caption" id="slideshow-caption"></div>
      <div class="slideshow-controls">
        <button class="slideshow-btn" id="slide-prev" aria-label="Previous check">&#8592;</button>
        <div class="slideshow-dots" id="slideshow-dots"></div>
        <button class="slideshow-btn" id="slide-next" aria-label="Next check">&#8594;</button>
      </div>
    </div>
  </section>

  <!-- ── Footer ────────────────────────────────────────────────── -->
  <footer id="site-footer">
    <div class="footer-inner">

      <div class="footer-left">
        <span class="footer-wordmark">Toby Ziegler</span>
        <span class="footer-tagline">Designer. Builder. Student of the craft.</span>
      </div>

      <div class="footer-col">
        <span class="footer-col-label">This project</span>
        <a href="#hero" class="footer-link">The Checks</a>
        <a href="#origin" class="footer-link">The Origin</a>
        <a href="#timeline" class="footer-link">The Chronicle</a>
      </div>

      <div class="footer-col">
        <span class="footer-col-label">Other rooms</span>
        <a href="https://tobyziegler.com" class="footer-link">Toby&#8217;s Study</a>
        <a href="https://dadabase.tobyziegler.com" target="_blank" rel="noopener" class="footer-link">Dad-a-Base</a>
        <a href="https://resume.tobyziegler.com" target="_blank" rel="noopener" class="footer-link">The R&eacute;sum&eacute;</a>
      </div>

    </div>

    <div class="footer-base">
      <span class="footer-copy">&copy; <span id="footer-year"></span> Toby Ziegler. Made with care and Claude.</span>
      <a href="https://github.com/TobyZiegler/tobyzieglerdotcom" target="_blank" rel="noopener" class="footer-link">Source on GitHub</a>
    </div>
  </footer>

  <!-- ── Lightbox ──────────────────────────────────────────────── -->
  <div id="lightbox" role="dialog" aria-modal="true" aria-label="Check detail view">
    <button id="lightbox-close" aria-label="Close">&#10005;</button>
    <img id="lightbox-img" src="" alt="">
  </div>

  <!-- ── Scripts ───────────────────────────────────────────────── -->
  <script>
    // ── Footer year ──────────────────────────────────────────────
    var yearEl = document.getElementById('footer-year');
    if (yearEl) yearEl.textContent = new Date().getFullYear();

    // ── Nav scroll behavior ──────────────────────────────────────
    var nav = document.getElementById('site-nav');
    window.addEventListener('scroll', function() {
      nav.classList.toggle('scrolled', window.scrollY > 40);
    }, { passive: true });

    // ── Lightbox ─────────────────────────────────────────────────
    var lightbox = document.getElementById('lightbox');
    var lbImg    = document.getElementById('lightbox-img');
    var lbClose  = document.getElementById('lightbox-close');

    document.querySelectorAll('.entry-image-wrap img').forEach(function(img) {
      img.addEventListener('click', function() {
        lbImg.src = img.dataset.full || img.src;
        lbImg.alt = img.alt;
        lightbox.classList.add('open');
        document.body.style.overflow = 'hidden';
      });
    });

    function closeLightbox() {
      lightbox.classList.remove('open');
      document.body.style.overflow = '';
      lbImg.src = '';
    }

    lbClose.addEventListener('click', closeLightbox);
    lightbox.addEventListener('click', function(e) {
      if (e.target === lightbox) closeLightbox();
    });
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') closeLightbox();
    });

    // ── Check Slideshow ──────────────────────────────────────────
    //
    // Timing: 3s slide-in | 8s dwell | 3s slide-out (14s total cycle).
    // Two image slots: #slideshow-current (visible) and
    // #slideshow-incoming (animates in from right simultaneously as
    // current animates out left). After 3s the incoming becomes current.
    //
    // Card images are already warm in browser cache from the timeline
    // lazy-load as the visitor scrolled through above.

    var slides = [
      { src: 'images/card/check-cloudscape1-card.jpg',     caption: 'The Cloudscape, 2002' },
      { src: 'images/card/check-cole1-card.jpg',           caption: 'Cole, 2004' },
      { src: 'images/card/check-cole2-card.jpg',           caption: 'Cole, revisited, 2005' },
      { src: 'images/card/check-lauren-card.jpg',          caption: 'Lauren, 2006' },
      { src: 'images/card/check-blake-card.jpg',           caption: 'Blake, 2006' },
      { src: 'images/card/check-danielle-card.jpg',        caption: 'Danielle, 2007' },
      { src: 'images/card/check-megan-card.jpg',           caption: 'Megan, 2008' },
      { src: 'images/card/check-jodelynscottlyn-card.jpg', caption: 'Jodelyn & Scotlyn, 2008' },
      { src: 'images/card/check-jackson-card.jpg',         caption: 'Jackson, 2009' },
      { src: 'images/card/check-brooke-card.jpg',          caption: 'Brooke, 2010' },
      { src: 'images/card/check-kadie-card.jpg',           caption: 'Kadie, 2011' },
      { src: 'images/card/check-cloudscape2-card.jpg',     caption: 'Back to clouds, 2012' },
      { src: 'images/card/check-blueonly-card.jpg',        caption: 'Plain blue — the final check, 2013' }
    ];

    var SLIDE_DURATION = 3000;   /* ms — CSS animation duration (must match slideOutLeft/slideInRight) */
    var DWELL_DURATION = 8000;   /* ms — how long each check is fully visible */
    var CYCLE          = SLIDE_DURATION + DWELL_DURATION;   /* 11000ms total before exit begins */

    var current     = 0;
    var autoTimer   = null;
    var animating   = false;   /* guard: ignore nav during active transition */

    var imgCurrent  = document.getElementById('slideshow-current');
    var imgIncoming = document.getElementById('slideshow-incoming');
    var slideCaption = document.getElementById('slideshow-caption');
    var dotsWrap    = document.getElementById('slideshow-dots');
    var wrap        = document.getElementById('slideshow-wrap');
    var btnPrev     = document.getElementById('slide-prev');
    var btnNext     = document.getElementById('slide-next');

    // Build dot indicators
    slides.forEach(function(_, i) {
      var dot = document.createElement('button');
      dot.className = 'slideshow-dot' + (i === 0 ? ' active' : '');
      dot.setAttribute('aria-label', 'Go to check ' + (i + 1));
      dot.addEventListener('click', function() { if (!animating) { goTo(i); resetTimer(); } });
      dotsWrap.appendChild(dot);
    });

    function getDots() { return dotsWrap.querySelectorAll('.slideshow-dot'); }

    // Lock the wrap height to prevent collapse during absolute positioning
    function lockHeight() {
      wrap.style.height = wrap.offsetHeight + 'px';
    }

    function unlockHeight() {
      wrap.style.height = '';
    }

    function goTo(index, instant) {
      if (animating && !instant) return;

      var dots = getDots();
      dots[current].classList.remove('active');
      var next = (index + slides.length) % slides.length;

      if (instant) {
        // First load — no animation, just set the image
        current = next;
        imgCurrent.src = slides[current].src;
        imgCurrent.alt = slides[current].caption;
        imgIncoming.src = '';
        slideCaption.textContent = slides[current].caption;
        dots[current].classList.add('active');
        return;
      }

      // Begin animated transition
      animating = true;
      lockHeight();

      // Load incoming image into the second slot
      imgIncoming.src = slides[next].src;
      imgIncoming.alt = slides[next].caption;
      imgIncoming.removeAttribute('aria-hidden');

      // Fire both animations simultaneously
      imgCurrent.classList.add('is-exiting');
      imgIncoming.classList.add('is-entering');

      // Fade caption out at start of transition
      slideCaption.classList.add('fade-out');

      // After slide duration: swap slots, update caption, clean up
      setTimeout(function() {
        // Promote incoming to current
        imgCurrent.src = slides[next].src;
        imgCurrent.alt = slides[next].caption;
        imgCurrent.classList.remove('is-exiting');
        imgIncoming.classList.remove('is-entering');
        imgIncoming.src = '';
        imgIncoming.setAttribute('aria-hidden', 'true');

        current = next;
        dots[current].classList.add('active');

        // Fade caption in with new text
        slideCaption.textContent = slides[current].caption;
        slideCaption.classList.remove('fade-out');

        unlockHeight();
        animating = false;
      }, SLIDE_DURATION);
    }

    function startTimer() {
      // Wait for dwell, then trigger exit (exit takes SLIDE_DURATION,
      // so next slide's enter begins at CYCLE ms after the last enter)
      autoTimer = setInterval(function() {
        goTo(current + 1);
      }, CYCLE);
    }

    function resetTimer() {
      clearInterval(autoTimer);
      startTimer();
    }

    // Pause on hover
    var stage = document.querySelector('.slideshow-stage');
    stage.addEventListener('mouseenter', function() { clearInterval(autoTimer); });
    stage.addEventListener('mouseleave', function() { if (!animating) startTimer(); });

    btnPrev.addEventListener('click', function() { if (!animating) { goTo(current - 1); resetTimer(); } });
    btnNext.addEventListener('click', function() { if (!animating) { goTo(current + 1); resetTimer(); } });

    // Arrow key nav — only when lightbox is closed
    document.addEventListener('keydown', function(e) {
      if (lightbox.classList.contains('open')) return;
      if (animating) return;
      if (e.key === 'ArrowLeft')  { goTo(current - 1); resetTimer(); }
      if (e.key === 'ArrowRight') { goTo(current + 1); resetTimer(); }
    });

    // Initialize — instant load, then start auto-advance
    goTo(0, true);
    startTimer();
  </script>

</body>
</html>