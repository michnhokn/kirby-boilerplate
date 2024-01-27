# Kirby Boilerplate with Vite

## What this boilerplate provides

* This is a project boilerplate based on Kirby 4 and Vite.
* It uses the public folder structure for a securer setup
* It comes with a predefined set of plugins and scripts to kickstart any Kirby project.
* To run the project either use your own server or use the provided devenv configuration.
* It provides a basic deployer configuration

## Installation

1. Install the project with all dependencies and init a git repository
    ```
    composer create-project michnhokn/kirby3-boilerplate <project-name>
    ```
2. Change the `composer.json` to the project needs
3. Change `site/config/env.php` to the project needs
4. Copy `.gitignore.example` to `.gitignore`
5. Start the environment `devenv up` & `devenv shell` and enjoy programming