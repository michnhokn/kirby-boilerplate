# Kirby Boilerplate with Vite

---
## What This Boilerplate Provides ✨

* **Kirby 5 & Vite Integration:** This boilerplate is built upon the robust Kirby 5 content management system and uses Vite for a lightning-fast development experience. 🚀
* **Secure Public Folder Structure:** Enjoy peace of mind with a secure public folder setup, keeping your project files safe and organized. 🔒
* **Ready-to-Use Plugins & Scripts:** Jumpstart your Kirby project with a curated collection of essential plugins and helpful scripts, right out of the box. 🛠️
* **Flexible Development Environment:** Choose your preferred setup! Run your project on your own server or leverage the provided development environment configuration for a seamless experience. 💻
* **Basic Deployer Configuration:** Get started with deployments quickly thanks to the included basic Deployer configuration. 📤

-----

## Setup 🚀

Here's how to get your project up and running:

1.  **Clone the Repository:**
    Start by cloning the boilerplate to your local machine. Replace `<project-name>` with your desired project directory name.

    ```bash
    git clone git@github.com:michnhokn/kirby-boilerplate.git <project-name> \
    && cd <project-name>
    ```

2.  **Start Environment and Install Dependencies:**
    Next, we'll fire up your development environment and grab all the necessary dependencies.

    First, bring up the development environment:

    ```bash
    devenv up
    ```

    Then, inside the `devenv` shell, install the Composer and npm dependencies:

    ```bash
    devenv shell && composer install && npm install
    ```