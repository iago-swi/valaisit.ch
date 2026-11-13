# valaisit.ch

One-page site for [ValaisIT.ch](https://valaisit.ch) — local computer and phone help in Guttet (Valais, Switzerland) and the surrounding villages, by Philippe Noth.

Static, bilingual (DE / FR), no framework, no build step. Pure HTML and CSS, a few lines of vanilla JavaScript, and one small PHP script for the contact form.

## Structure

```
/
├── index.html      # Fallback redirect (browser language → de/ or fr/)
├── .htaccess       # Apache language redirect + 404
├── 404.html
├── contact.php     # Contact form handler (sends an e-mail)
├── assets/         # Favicon
├── css/style.css   # Single stylesheet, design tokens at the top
├── js/script.js    # Sends the form in the background
├── images/         # Ibex, marmot, sheep, Open Graph image
└── de/  fr/        # One folder per language, mirrored content
```

Text changes must be made in both `de/index.html` and `fr/index.html`.

## Running locally

```powershell
php -S localhost:8123
```

Then open <http://localhost:8123>. The contact form needs a mail server, so locally it shows its error message.

## Deploying

Copy the contents of this repository to the web root of an Apache host with PHP.
