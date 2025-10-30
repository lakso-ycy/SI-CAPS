# SI CAPS Frontend-only

This workspace is trimmed to frontend only per request. Backend PHP APIs and data scripts were removed.

What remains

- index.php router that loads views
- views/: home.php (dashboard), profile.php, login.php, carousel.php
- assets/: css, js, images, fonts
- node_modules for vendor assets (Chart.js, jQuery, Flatpickr, LineIcons, AlpineJS)

Removed

- api/ (all PHP API endpoints)
- views/average.php, views/average_kab.php
- assets/mail/
- dist/ build output
- misc dev files: error_log, test_project_connection.py, xlsx_to_issues.py, Diskominfo.xlsx

Notes

- Because backend endpoints are removed, charts render placeholder demo data. The UI and layout still work.
- If you later re-enable APIs, revert changes in `assets/js/changes.js` to call the endpoints and remove `renderPlaceholderChart` paths.

How to run (options)

- Quick: Use an extension like Live Server to open `index.php` or serve the folder with a simple PHP server.

Optional commands

```bash
# Serve with PHP (requires PHP installed)
php -S localhost:8000 -t .
```

Open <http://localhost:8000/?page=home>
