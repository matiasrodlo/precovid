# Precovid

## Table of Contents
- [Description](#description)
  - [Context](#context)
- [Requirements](#requirements)
- [Features](#features)
- [Quick Start](#quick-start)
  - [Requirements](#requirements-1)
  - [Run locally](#run-locally)
  - [Directory Structure](#directory-structure-1)
- [Directory Structure](#directory-structure)
- [How It Works](#how-it-works)
  - [User Flow](#user-flow)
  - [COVID-19 Symptom Detection Logic](#covid-19-symptom-detection-logic)
    - [Primary Symptoms](#primary-symptoms)
    - [Contact History](#contact-history)
    - [Secondary Symptoms](#secondary-symptoms)
    - [Result Determination](#result-determination)
    - [Differential Diagnosis](#differential-diagnosis)
  - [Technical Details](#technical-details)
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

## Description

<!--
  Project mission, context, and team credits.
-->
Our main mission was to contribute to the relief of the burden on healthcare lines, while providing data and recommendations based on the symptoms of each caller. Since the beginning of the pandemic, several healthcare professionals volunteered to handle inquiries from possible non-critical cases and provide information through social media, aiming to prevent the saturation of the healthcare system and reserve it for those who truly need it. It was in this context that a group of professionals and students decided to join forces to create Precovid.org.

This website has been designed to assist citizens throughout Latin America in self-assessing possible COVID-19 symptoms and providing updated information and personalized advice based on their health status.

To start the self-assessment, users must enter their personal information and location. Once this information is provided, the platform will proceed to ask a series of questions to determine the possible presence of a COVID-19 case.

Our team consists of doctors, engineers, and journalists. Despite most of us having never met in person, we have come together with the purpose of saving lives.

**GEOEDUCA:** Javiera Gonzalez, Valentina Cáceres, Francisco Concha, Francisco Vergara. **CONMAPAS:** Jorge Ulloa, Salvador Muñoz, Gino Escobar. **AWAKELABS:** Gustavo Rodriguez, Ricardo Hermosilla. **UAI STARTUP SCHOOL:** Alfredo Osorio, Matías Donoso, Raimundo Valdivia. **OTROS COLABORADORES:** Claudio Moreno, Alberto Roa, Iván González, Matías Lobos, Paula Mardones, Carla Mardones, Leonardo Ramos, Matías Quinteros, Kurt Müller, Dino Cisterna, Daniela Bustos, Javiera Rosales, Evelyn Neira, Cristian Gonzalez, Daniela Bustos, Emiliano Araneda...

**Context:**

This project was developed during my third semester of Business Administration, while simultaneously participating in Startup School, a graduation pathway focused on entrepreneurship and innovation at the School of Engineering at the Adolfo Ibáñez University.

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

2. **COVID-19 Symptom Detection Logic:**
   The application uses a sophisticated weighted scoring system based on early COVID-19 research and clinical observations. The detection process involves:

   a) **Primary Symptoms** (20 points each):
   - Shortness of breath (key respiratory symptom)
   - Fever (common in COVID-19 cases)
   - Cough (persistent dry cough is typical)
   
   b) **Contact History** (30 points):
   - Contact with a confirmed COVID-19 case
   
   c) **Secondary Symptoms** (12.5 points each):
   - Nasal mucus (less common in COVID-19)
   - Muscle pain (common but not specific)
   - Gastrointestinal symptoms (less common in COVID-19)
   - Duration of symptoms (longer symptoms may indicate COVID-19)

   d) **Result Determination:**
   A positive result is triggered if either:
   - The total probability score is ≥ 50% (multiple symptoms present)
   - All three primary symptoms are present (shortness of breath, fever, cough)

   e) **Differential Diagnosis:**
   - Some symptoms have negative weights when absent to reduce false positives
   - This helps differentiate COVID-19 from other respiratory conditions
   - The system prioritizes identifying potential cases while minimizing false negatives

3. **Technical Details:**
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
