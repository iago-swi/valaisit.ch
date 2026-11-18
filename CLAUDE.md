# CLAUDE.md

Guidance for Claude Code when working in this repository.

## Project overview

**valaisit.ch** is a static, bilingual (DE / FR) one-page site for ValaisIT.ch — local help with computers, phones and AI in Guttet (Valais, Switzerland). Pure HTML and CSS, a few lines of vanilla JavaScript, one PHP script for the contact form. No build step, no framework, no package manager.

See [README.md](README.md) for the file structure, the coming-soon mode and how to run the site locally.

## Design

Before changing anything visual, or adding a page or component, read [design-system.md](design-system.md). It holds the colour tokens, typography, layout rules, components, the three characters with their slogans, and the tone of voice. Keep it up to date when the design changes.

## Working rules

- All styling lives in `css/style.css`. Use the CSS variables from `:root`, never raw colour values.
- Content is mirrored: every text change goes into both `de/index.html` and `fr/index.html`, and into `coming-soon.html` when it concerns the slogans or pictures.
- German uses Swiss spelling ("ss", not "ß"). French uses Swiss usage ("natel") and a narrow no-break space (`&#8239;`) before `?`, `!` and `:`.
- Source pictures and the printed notices are in `resources/`, which is not in the repository. Web pictures in `images/` are 760px-wide WebP exports of them.
- Local preview: `php -S localhost:8123`. PHP's built-in server ignores `.htaccess`, so the coming-soon mode is not active locally; open `/coming-soon.html` directly.
- Commit or push only when asked.
