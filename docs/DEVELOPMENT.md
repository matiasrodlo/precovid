# Precovid Developer Documentation

<!--
  This file provides technical documentation for developers working on the Precovid project.
  Each section explains a key aspect of the codebase, setup, or extension points.
-->

## Overview

<!--
  High-level summary of the project, its stateless nature, and data handling approach.
-->
Precovid is a PHP web application designed to help users self-assess COVID-19 symptoms and receive recommendations. The app is stateless and does not use a persistent database; instead, it sends form data to an external API for logging.

---

## Main Application Flow

<!--
  Step-by-step explanation of how a user request is handled from entry to result.
-->
1. **Entry Point:**
   - All requests are routed through `app/router.php`, which serves static files directly and passes other requests to `app/index.php`.

2. **Routing:**
   - The `router.php` script parses the URL and sets a `ruta` parameter, which determines which view to load.
   - Example: `/login` loads `views/login.php`.

3. **User Journey:**
   - **Login:** User enters basic info (name, country, email) and accepts terms (`views/login.php`).
   - **Form:** User answers symptom questions (`views/formulario.php`).
   - **Result:** App calculates a risk score and redirects to a result page (`views/resultados/positivo.php` or `views/resultados/negativo.php`).
   - **Recommendations:** User can view further advice based on their result.

4. **Data Handling:**
   - Form data is sanitized and sent via cURL to `http://precovid.conmapas.cl/nuevaTest` as JSON.
   - No data is stored locally.

---

## Directory Structure

<!--
  Explains the purpose of each main directory and subdirectory in the codebase.
-->
- `app/`
  - `index.php` — Main controller, handles routing, form processing, and result logic.
  - `router.php` — Handles static file serving and URL parsing.
  - `views/` — All user-facing pages (login, form, results, privacy, etc.).
  - `static/` — Static resources:
    - `css/` — CSS files (Bootstrap, custom styles).
    - `js/` — JS files (form validation, etc.).
    - `images/` — Logos, icons, etc.
    - `json/` — Country and region data (see below).
- `panel/` — Admin or panel area (minimal, not documented here).
- `docs/` — Documentation, presentations, logos, and media.

---

## Static Data (Countries & Regions)

<!--
  Describes the JSON files used for country/region selection and how to update them.
-->
- JSON files in `app/static/json/` provide country and region data for forms:
  - `countries.min.json` — List of all countries and calling codes.
  - `latam.json` — Latin American countries.
  - `chile.json` — Chilean regions and communes.
- These are loaded dynamically in the forms to populate dropdowns.

---

## Adding or Modifying Symptom Questions

<!--
  Step-by-step guide for developers to add or change questions in the self-assessment form.
-->
- Edit `app/views/formulario.php`:
  - Each question is a Bootstrap-styled block with radio buttons for "Sí"/"No".
  - To add a new question:
    1. Add a new block in the HTML form.
    2. Add the new field to the `$args` array for sanitization.
    3. Update the `$datos` array in `index.php` to include the new field.
    4. Adjust the risk calculation logic as needed.

---

## Updating Regions or Countries

<!--
  Explains how to update the static region/country data for the forms.
-->
- Edit the relevant JSON files in `app/static/json/`.
- Ensure the structure matches the existing format (see current files for examples).

---

## Analytics & Tracking

<!--
  Notes on analytics scripts and privacy.
-->
- Google Analytics and Facebook Pixel are included in `views/partials/header.php`.
- No user tracking beyond standard analytics.

---

## Privacy & Terms

<!--
  Where to find the privacy policy and terms of use for users.
-->
- Users must accept terms and privacy policy before using the app.
- See `views/privacidad.php` and `views/terminos.php` for full text.

---

## Contributing

<!--
  Guidelines for contributing to the project.
-->
- Fork the repository and submit pull requests for improvements.
- Please document any new features or changes in this file and the README.
- For questions or issues, open a GitHub issue.

---

## Contact

<!--
  How to get in touch with the maintainers or ask questions.
-->
For questions, contact the original authors or open an issue on GitHub.

## FAQ for Developers

**Q: How do I add a new symptom question?**
A: Edit `app/views/formulario.php` to add the question, update the `$args` array in `index.php`, and adjust the risk calculation logic as needed.

**Q: How do I update the list of countries or regions?**
A: Edit the relevant JSON files in `app/static/json/`.

**Q: Where are static assets (CSS, JS, images) stored?**
A: All static assets are in `app/static/` with subfolders for `css/`, `js/`, `images/`, and `json/`.

**Q: How do I run the app locally?**
A: From the `app/` directory, run `php -S localhost:8000 router.php` and open [http://localhost:8000](http://localhost:8000) in your browser. 