# Precovid

The website was created to support citizens across Latin America in self-assessing potential COVID-19 symptoms and accessing up-to-date information and personalized guidance based on their health status. I developed this project during my third semester of Commercial Engineering, while also participating in Startup School an entrepreneurship and innovation track at the School of Engineering, Adolfo Ibáñez University.

<img width="3022" height="896" alt="image" src="https://github.com/user-attachments/assets/5ca3b117-95dc-4b90-921f-9783b0b686c2" />

Our team includes doctors, engineers, and journalists. Although most of us had never met in person, we came together with a shared purpose: to save lives.

**GEOEDUCA:** Javiera Gonzalez, Valentina Cáceres, Francisco Concha, Francisco Vergara. **AWAKELABS:** Gustavo Rodriguez, Ricardo Hermosilla. **UAI STARTUP SCHOOL:** Alfredo Osorio, Matías Donoso, Raimundo Valdivia. **OTROS COLABORADORES:** Claudio Moreno, Alberto Roa, Iván González, Matías Lobos, Paula Mardones, Carla Mardones, Leonardo Ramos, Matías Quinteros, Kurt Müller, Dino Cisterna, Daniela Bustos, Javiera Rosales, Evelyn Neira, Cristian Gonzalez, Daniela Bustos, Emiliano Araneda...

## Quick Start

```sh
cd app
php -S localhost:8000 router.php
```

**Requirements:** PHP 7.2+ with `curl`, `json`, `mbstring` extensions

## Algorithm

The assessment algorithm uses a weighted scoring system based on **13 peer-reviewed research papers** (2020-2021) to evaluate:

- Symptom specificity and combinations
- Age-based risk adjustments
- Comorbidity factors
- Exposure history
- Dynamic threshold system (35-45 points)

**Documentation:** [ALGORITHM_DOCUMENTATION.md](ALGORITHM_DOCUMENTATION.md)

## Structure

```
app/
  index.php          # Algorithm logic
  router.php         # Routing
  views/             # UI templates
  static/            # Assets
literature/          # Research papers
```

## Configuration

Optional configuration via `.env`:

```env
APP_ENV=development
RUTA=http://localhost:8000
CSRF_SECRET=your_secret_key
```

## Privacy

**Medical Disclaimer:** This tool is for screening purposes only and does not provide medical diagnosis. All data is collected for public health interest, not commercial purposes.

## License

Educational and public health purposes. For reuse or adaptation, please contact the original authors or open an issue.
