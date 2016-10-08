<?php

/**
 * Load services definition file.
 */
$settings['container_yamls'][] = __DIR__ . '/services.yml';

$settings['trusted_host_patterns'] = array(
  '^example\.com$',
  '^www\.example\.com$',
  '^dev-adl-web\.pantheonsite\.io$',
  '^test-adl-web\.pantheonsite\.io$',
  '^live-adl-web\.pantheonsite\.io$',
  '^migration-adl-web\.pantheonsite\.io$',
);

if (file_exists(__DIR__ . '/settings.local.php')) {
  include __DIR__ . '/settings.local.php';
}

$config_directories = array(
    CONFIG_SYNC_DIRECTORY => 'sites/default/config',
  );

//$config_directories['sync'] = 'sites/default/files/config_t5qG-cJfydCY28kJ00tgYh5dQ1LdHgCHBtMLd2U76zq8wRkWtNFh1a7Fg5gUg7-WWqcx2nsnHg/sync';
