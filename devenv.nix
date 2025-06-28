{ pkgs, lib, config, ... }:

{
  packages = [
    pkgs.jq
    pkgs.git
    pkgs.gnupatch
  ];

  languages.javascript = {
    enable = lib.mkDefault true;
    package = lib.mkDefault pkgs.nodejs_22;
  };

  languages.php = {
    enable = lib.mkDefault true;
    version = lib.mkDefault "8.3";

    extensions = [];

    ini = ''
      memory_limit = 256M
      upload_max_filesize = 500M
      post_max_size = 500M
      max_execution_time = 300
      realpath_cache_ttl = 3600J
      session.gc_probability = 0
      display_errors = On
      error_reporting = E_ALL
      opcache.memory_consumption = 256M
      opcache.interned_strings_buffer = 20
      zend.assertions = 0
      short_open_tag = 0
      zend.detect_unicode = 0
      realpath_cache_ttl = 3600
    '';

    fpm.pools.web = lib.mkDefault {
      settings = {
        "clear_env" = "no";
        "pm" = "dynamic";
        "pm.max_children" = 10;
        "pm.start_servers" = 2;
        "pm.min_spare_servers" = 1;
        "pm.max_spare_servers" = 10;
      };
    };
  };

  services.caddy = {
    enable = lib.mkDefault true;

    virtualHosts.":8000" = lib.mkDefault {
      extraConfig = ''
        root * public/
        php_fastcgi unix/${config.languages.php.fpm.pools.web.socket}
        encode zstd gzip
        file_server
        log {
          output stderr
          format console
          level ERROR
        }
      '';
    };
  };

  services.mailhog.enable = lib.mkDefault true;

  # Webpack compatibility
  env.NODE_OPTIONS = lib.mkDefault "--openssl-legacy-provider";
}
