# Registry of Scientometric Data Sources

Display and manage metadata of open Scientometric data sources.

A demo can be found here: https://labs.tib.eu/rosi/

## Features

- Overview of data sources in an interactive, searchable table
- Detailed view of a data source

## Installation and usage

#### Method 1

Use this method if you want to deploy once and make your changes on the webserver.

- Download as a zip file
- Deploy on a webserver
- Add or change sources as needed in the file data/sources.json

#### Method 2

Use this method if you want to make your changes in the repository and pull the changes with git.

- Clone this repository to a webserver
- Add or change sources as needed in the file data/sources.json in this repository (e.g. fork and PR)
- Schedule a script (e.g. cron) which runs 'git pull' on the webserver to get the latest changes

## Development

- Fork the repository
- Make your changes
- Open a pull request with your changes

## Requirements

- Webserver, e.g. Apache, Nginx, IIS
- [PHP](https://php.net) Version 7+
- [Vue.js](https://vuejs.org) Version 3.x

## Structure

    .
    ├─ assets                   # Style sheets, images, javascript files               
    ├─ data                     # Data files
    │  ├─ options.json          # Options used by Vue.js for showing the sources
    │  ├─ schema.json           # Schema of the sources
    │  └─ sources.json          # List of the sources
    ├─ prototype                # Redirect to ImpactViz prototype
    ├─ uploads                  # Downloadable files linked in the pages    
    ├─ .gitignore               # Git ignore file
    ├─ about.php                # Page about this registry    
    ├─ footer.php               # Footer included in all pages
    ├─ graph.php                # Page dataflow between scientometric data sources
    ├─ header.php               # Header included in all pages
    ├─ index.php                # Page non-technical overview of the registry
    ├─ LICENCE                  # Licence file
    ├─ package.json             # Package file, e.g. meta data, dependencies
    ├─ README.md                # This file
    ├─ tech.php                 # Page technical overview of the registry
    └─ vendor                   # Dependent files, e.g. vue.js
       └─ vue.global.prod.js    # Vue.js global minimised build

## Notes

- The latest version of Vue.js can be downloaded from https://unpkg.com/vue@3/dist/vue.global.prod.js.
  This should be saved in the file "vendor/vue.global.prod.js".

---
