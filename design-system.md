# ValaisIT.ch — design system

The reference for how the site looks and why. The source of truth for values is [css/style.css](css/style.css); this file explains the intent so that new pages and components stay consistent.

## Origin and character

The site is the online twin of the printed notice (*Aushang*) that hangs in the village shop. Someone who saw the paper version must recognise the site at a glance, and the other way round.

- **Friendly, local, a little funny.** The audience is village residents, many of them not at ease with technology. Nothing should look corporate or "techy".
- **Paper, ink, one red.** A light paper background, near-black text, and Valais red as the only accent.
- **The animals carry the humour.** Colour and playfulness come from the three illustrations; everything around them stays quiet.
- **Light theme only.** There is no dark mode.

## Colour tokens

Defined in `:root` in `css/style.css`. Always use the variable, never the raw value.

| Token | Value | Use |
|---|---|---|
| `--paper` | `#F5F3EE` | Page background (notice-board paper) |
| `--white` | `#FFFFFF` | Pills, form fields, text on dark or red |
| `--ink` | `#16171D` | Text, borders, solid buttons, contact panel |
| `--coal` | `#24262F` | Form panel inside the ink contact panel |
| `--red` | `#C8102E` | Valais red: accent word in the title, sticker, red button, focus ring |
| `--red-d` | `#A50D26` | Hover state of red buttons |
| `--muted` | `#555761` | Secondary text (descriptions, footer, French line on the teaser) |
| `--rule` | `rgba(22, 23, 29, 0.16)` | Thin separator between sections |

Two extra colours exist only for form feedback on the dark panel: `#9BE3B0` (sent) and `#FFB3BE` (error).

Rules:

- Red is an accent, not a surface colour. It appears on one word of the main title, the sticker, the primary contact button and link underlines. Do not add red backgrounds elsewhere.
- No gradients, no shadows. Depth comes from the ink panel and the rounded pictures only.

## Typography

Two families from Google Fonts: **Space Grotesk 700** (`--display`) and **Inter 400 / 600 / 700** (`--body`).

| Role | Family | Size | Notes |
|---|---|---|---|
| Main title (`.hero h1`) | Space Grotesk 700 | `clamp(2.125rem, 8.6vw, 4.75rem)` | line-height 0.98, letter-spacing -0.035em |
| Section heading (`.h2`) | Space Grotesk 700 | `clamp(1.5rem, 3vw, 2.125rem)` | line-height 1.1, max 20em wide |
| Card slogan (`.trio h2`) | Space Grotesk 700 | `clamp(1.125rem, 2.1vw, 1.5rem)` | line-height 1.15 |
| Intro text (`.lede`) | Inter 400 | `clamp(1.0625rem, 1.9vw, 1.3125rem)` | max 31em wide |
| Body | Inter 400 | `1rem` | line-height 1.55 |
| Label (`.label`) | Inter 700 | `0.8125rem` (0.75rem on cards) | uppercase, letter-spacing 0.16em |
| Buttons, pills | Inter 600 | `1rem` | |
| Sticker | Space Grotesk 700 | `clamp(1rem, 1.7vw, 1.1875rem)` | centred, two lines |

Rules:

- Headlines are sentence case. Uppercase is reserved for the small `.label`, as on the printed notice.
- The red word in the title (`<span class="red">`) is the notice's signature: "Computer**hilfe**" in German, "**Aide** informatique locale" in French. One red word per title, no more.
- Keep text lines under about 36em.

## Layout

- **Container:** `.wrap`, 1000px wide plus gutters. Gutter is 20px, 32px from 640px up.
- **Vertical rhythm:** `.band` gives each section `clamp(44px, 6.5vw, 84px)` of padding; `.band-rule` adds a thin line on top.
- **Alignment:** everything is left-aligned. Nothing is centred except text inside the sticker.
- **Radii:** 28px (`--radius`) for the contact panel, 24px for pictures (20px on small screens), 20px for the form panel, 14px for the sticker, 12px for form fields, fully round (`999px`) for buttons, pills and the language switch.
- **Borders:** 2px solid ink for buttons, pills, the language switch and the top rule of the "ways" list.

Breakpoints (mobile first, `min-width`):

| From | What changes |
|---|---|
| 640px | Wider gutter, phone number appears in the header, lists go to two columns |
| 760px | Character cards go from rows to three columns |
| 900px | Sticker moves beside the intro text; "also", "about" and contact become two columns |
| 1024px | The four "ways" sit in one row |

## Components

**Header** (`.site-header`) — brand "Valais<span>IT</span>.ch" with "IT" in red, phone number, and the DE/FR switch (`.lang-switch`, current language filled with ink).

**Hero** (`.hero`) — small location label, main title, intro text, call and WhatsApp buttons, and the sticker.

**Sticker** (`.sticker`) — red, white bold text, rotated -4°. It carries the offer ("first diagnosis free") on the site and "coming soon" on the teaser. One per screen area; it is the only tilted element.

**Buttons** (`.btn`) — pill shape, 46px minimum height.
- `.btn-solid`: ink background, the main action on a light background.
- `.btn-line`: outline, the secondary action.
- `.btn-red`: red, the main action inside the dark contact panel.

**Character cards** (`.trio`) — see the next section.

**Pills** (`.pill`) — white, 2px ink outline. Used for the extra services in the "also" section, each followed by one muted sentence.

**Ways list** (`.ways-list`) — four ways to get help, each with a line icon, a short heading and one sentence, separated by a 2px ink rule. No cards, no boxes.

**Contact panel** (`.contact-panel`) — the dark block from the notice: ink background, white text, name and phone number in large type, action buttons, and the form on a `--coal` panel with white fields.

**Icons** — inline SVG, 24×24 viewBox, stroke only (`stroke-width: 2`, round caps and joins), `currentColor`. No icon font, no filled icons.

## The three characters

Each service has one animal, one picture and one pun per language. The pairing is fixed:

| Animal | Service | Picture | German slogan | French slogan |
|---|---|---|---|---|
| Ibex | Computers | `images/steinbock-laptop.webp` | Der Computer bockt? Ich bringe ihn zur Vernunft. | Votre ordinateur vous rend chèvre ? Je le ramène à la raison. |
| Marmot | Phones | `images/murmeltier-handy.webp` | Handy im Winterschlaf? Ich wecke es auf. | Votre natel hiberne ? Je le réveille. |
| Valais Blacknose sheep | Introduction to AI | `images/schaf-tablet.webp` | KI, eine verstrickte Sache? Ich entwirre sie mit Ihnen. | L'IA vous embrouille ? Je la détricote avec vous. |

- **The pun belongs to the animal**, not to the device: the ibex bucks (*bocken*, *rendre chèvre*), the marmot hibernates, the sheep knits and unravels wool (*verstrickt*, *détricoter*). If a picture changes, keep that link.
- **Order:** ibex, marmot, sheep.
- **Slogan shape:** a question about the problem, then a short first-person answer.
- **Pictures:** portrait 3:4, 760px wide, WebP, shown uncropped with rounded corners. Same 3D illustration style and a Valais landscape in each. Originals live in `resources/` (not in the repository).
- **Card layout:** label, slogan, one line of detail. Below 760px the picture sits left (42%) and the text right; from 760px up the picture is on top in three columns.

## Motion

One moment only: on page load the sticker is "stamped" onto the page (`@keyframes stamp`, 0.45s after a 0.6s delay). Buttons have a 0.15s colour transition on hover. Nothing else moves, and `prefers-reduced-motion` switches all of it off.

Do not add scroll animations, fade-ins or hover effects on cards.

## Voice and language

- **Two languages, mirrored:** German (`de/`, Swiss spelling: "ss" instead of "ß") and French (`fr/`, Swiss usage: "natel" for mobile phone). Every text change goes into both.
- **Tone:** first person, warm, plain words, no jargon. Formal address (*Sie* / *vous*).
- **French typography:** narrow no-break space (`&#8239;`) before `?`, `!` and `:`; typographic apostrophe `’`; en dash with spaces for asides.
- **Buttons say what they do:** "079 305 53 50 anrufen", "Nachricht senden".

## Coming-soon page

`coming-soon.html` uses the same tokens and components, with three differences:

- **Bilingual on one page:** the German line first, the French line right under it (`.soon-fr`, or a `<span lang="fr">` in muted colour inside the card slogan).
- **Teaser only:** the three pictures with the question half of each slogan, no answers, no contact details, no links.
- **Sticker text:** "Bald da! / Bientôt là !".

## Accessibility

- Visible keyboard focus everywhere: 3px red outline (white inside the dark panel).
- Every picture has a descriptive `alt` text in the page's language.
- French text on a German page is marked with `lang="fr"`.
- Text contrast: ink on paper and white on ink or red only; muted grey is for secondary text at body size or larger.
- Pages must not scroll sideways at any width from 375px up.
