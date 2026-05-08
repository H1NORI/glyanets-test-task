# Project FULL setup (with Modules enabling)


### 1. Clone repository
```
git clone https://github.com/H1NORI/glyanets-test-task.git
```

### 2. Enter project directory
```
cd glyanets-test-task
```

### 3. Install dependencies
```
composer install
```

### 4. Run local server
```
php -S localhost:8000 -t web
```

### 5. Set options for CSS to work correctly, open file with `sudo nano web/sites/default/settings.php` and add this text:
```
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;
```

### 6. Open site in browser
```
http://localhost:8000/core/install.php
```

### 7. DRUPAL configuration that I used:
```
Language: English
Installation profile: Standard
Database type: SQLite
Site name: Glyanets
```

### 8. Enamble custom module my_first_module
```
vendor/bin/drush en my_first_module
```

### 9. Clear cache (after changes)
```
vendor/bin/drush cr
```

### 10. Add `Current Route Block` below content, you can make it here
```
http://localhost:8000/admin/structure/block
```


### 11. Here is the pages you can use:
```
http://localhost:8000/my-first-page
http://localhost:8000/my-form
```


## The files I addded:
```
.gitignore
README.md
web/modules/my_first_module
├── README.md
├── my_first_module.info.yml
├── my_first_module.module
├── my_first_module.routing.yml
├── my_first_module.services.yml
├── src
│   ├── Controller
│   │   └── MyPageController.php
│   ├── Form
│   │   └── MySimpleForm.php
│   ├── Plugin
│   │   └── Block
│   │       └── CurrentRouteBlock.php
│   └── Service
│       └── EntityInfoService.php
└── templates
    └── my-first-page.html.twig
```


## What was implemented

* Custom Drupal module structure
* Controller + Twig template rendering
* Dependency Injection service
* Custom block plugin
* Simple form with submission output
* Basic routing configuration


## Challenges

* Understanding settings file(css is not configured from the box)
* Working with render arrays vs Twig templates in controller