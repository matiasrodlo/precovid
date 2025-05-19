# Precovid
![image](https://github.com/user-attachments/assets/4e8c88aa-10b9-4553-ae8b-047a549bcfc0)

<!--
  Project mission, context, and team credits.
-->
The website was created to support citizens across Latin America in self-assessing potential COVID-19 symptoms and accessing up-to-date information and personalized guidance based on their health status. I developed this project during my third semester of Commercial Engineering, while also participating in Startup School—an entrepreneurship and innovation track at the School of Engineering, Adolfo Ibáñez University.

Our team includes doctors, engineers, and journalists. Although most of us had never met in person, we came together with a shared purpose: to save lives.

**GEOEDUCA:** Javiera Gonzalez, Valentina Cáceres, Francisco Concha, Francisco Vergara. **CONMAPAS:** Jorge Ulloa, Salvador Muñoz, Gino Escobar. **AWAKELABS:** Gustavo Rodriguez, Ricardo Hermosilla. **UAI STARTUP SCHOOL:** Alfredo Osorio, Matías Donoso, Raimundo Valdivia. **OTROS COLABORADORES:** Claudio Moreno, Alberto Roa, Iván González, Matías Lobos, Paula Mardones, Carla Mardones, Leonardo Ramos, Matías Quinteros, Kurt Müller, Dino Cisterna, Daniela Bustos, Javiera Rosales, Evelyn Neira, Cristian Gonzalez, Daniela Bustos, Emiliano Araneda...

## Table of Contents
- [Description](#description)
- [Requirements](#requirements)
- [Features](#features)
- [Quick Start](#quick-start)
- [Directory Structure](#directory-structure)
- [How It Works](#how-it-works)
- [Privacy & Data Handling](#privacy--data-handling)
- [Developer Notes](#developer-notes)
- [Troubleshooting](#troubleshooting)
- [License](#license)

<!--
  Main project README. Provides a high-level overview, setup instructions, and developer notes.
-->
<p>
  <a href="https://noticias.uai.cl/precovid-org-pagina-tiene-como-objetivo-descongestionar-lineas-de-atencion-medica/">
    <img src="https://github-production-user-asset-6210df.s3.amazonaws.com/52969662/281578540-b5bd6790-d36e-4a22-8fd8-034e14aab6e8.png" alt="Precovid logo">
  </a>
</p>

## Requirements
- PHP 7.2 or higher
- PHP extensions: curl, json, mbstring
- Web server: Apache, Nginx, or PHP built-in server
- See [requirements.txt](requirements.txt) for details

## Features
- COVID-19 self-assessment
- Personalized recommendations
- No persistent user data
- Responsive design
- Easy to deploy (PHP built-in server or any web server)
- Minimal dependencies

## Quick Start

<!--
  Setup requirements and instructions for running the project locally.
-->
1. **Requirements:**
   - PHP 7.2 or higher
   - A web server (e.g., Apache, Nginx) or PHP built-in server

2. **Run locally:**
   ```sh
   cd app
   php -S localhost:8000 router.php
   ```
   Then open [http://localhost:8000](http://localhost:8000) in your browser.

3. **Directory Structure:**
   - `app/` - Main application code
     - `index.php` - Main entry point and controller
     - `router.php` - Handles routing and static file serving
     - `views/` - All user-facing pages (login, form, results, privacy, etc.)
     - `static/` - Static resources (CSS, JS, images, JSON data)
   - `panel/` - Admin or panel area (minimal)
   - `docs/` - Documentation, presentations, logos, and media
   - `README.md` - This file

## Directory Structure
```
app/
  index.php
  router.php
  views/
  static/
    css/
    js/
    images/
    json/
docs/
  DEVELOPMENT.md
  images/
panel/
README.md
```

## How It Works

<!--
  Explains the user journey and technical details of the app's workflow.
-->
1. **User Flow:**
   - The user lands on the home page and is prompted to log in with basic information (name, country, email, etc.).
   - After accepting terms, the user proceeds to a symptom self-assessment form.
   - The form asks about key COVID-19 symptoms (shortness of breath, fever, cough, etc.).
   - Upon submission, the app calculates a risk score and redirects the user to a result page (positive/negative) with recommendations.
   - The user can share their result via WhatsApp and is encouraged to re-evaluate after 12 hours if symptoms persist.

2. **Technical Details:**
   - The main logic is in `app/index.php`.
   - Form data is sanitized and sent to an external endpoint (`precovid.conmapas.cl/nuevaTest`) for logging.
   - The risk score is calculated based on symptom answers (see code for details).
   - Static data (countries, regions) is loaded from JSON files in `app/static/json/`.
   - The app uses Bootstrap for styling and includes Google Analytics and Facebook Pixel for analytics.

## Privacy & Data Handling

<!--
  Summarizes privacy policy and data handling for users and developers.
-->
- The application does **not** provide medical diagnosis or emergency services.
- All data is collected for public health interest and is not used for commercial purposes.
- Users must accept the privacy policy and terms before using the service.
- See the [Privacy Policy](app/views/privacidad.php) for full details.

## Developer Notes

<!--
  Key notes for developers, including extension points and contribution guidelines.
-->
- **Main files:**
  - `index.php`: Handles routing, form processing, and result logic.
  - `views/`: Contains all HTML/PHP templates for the user interface.
  - `static/`: Static assets (CSS, JS, images, JSON data).
- **Adding questions:** Edit `views/formulario.php` to add or modify symptom questions.
- **Updating regions/countries:** Edit the relevant JSON files in `static/json/`.
- **No persistent database** is used; data is sent to an external API.
- **Contributions:** PRs and issues are welcome! Please document any new features or changes.

## Troubleshooting
- **Address already in use:** Stop other PHP servers or use a different port (e.g., `php -S localhost:8080 router.php`).
- **Static files not loading:** Ensure you are using the correct `/static/` paths and that the `static/` folder exists with the right subfolders.
- **Permission errors:** Make sure your user has read access to all files in the project directory.

## License

<!--
  Licensing and reuse information.
-->
This project is for educational and public health purposes. For reuse or adaptation, please contact the original authors or open an issue.
