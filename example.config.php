<?php
$CONFIG = array (
  'memcache.local' => '\\OC\\Memcache\\APCu',
  'apps_paths' =>
  array (
    0 =>
    array (
      'path' => '/var/www/html/apps',
      'url' => '/apps',
      'writable' => false,
    ),
    1 =>
    array (
      'path' => '/var/www/html/custom_apps',
      'url' => '/custom_apps',
      'writable' => true,
    ),
  ),
  'memcache.distributed' => '\\OC\\Memcache\\Redis',
  'memcache.locking' => '\\OC\\Memcache\\Redis',
  'redis' =>
  array (
    'host' => '127.0.0.1',
    'password' => 'XXX',
    'port' => 6379,
  ),
  'upgrade.disable-web' => true,
  'instanceid' => 'XXX',
  'passwordsalt' => 'XXX',
  'secret' => 'XXX',
  'trusted_domains' =>
  array (
    0 => 'your.ip.address.here:8080', // <-- change this
    1 => 'nextcloud.youdomain.com', // <-- change this
  ),
  'trusted_proxies' =>
  array (
    0 => '127.0.0.1',
  ),
  'datadirectory' => '/var/www/html/data',
  'dbtype' => 'mysql',
  'version' => '30.0.2.2',
  'overwrite.cli.url' => 'https://nextcloud.youdomain.com', // <-- change this
  'overwriteprotocol' => 'https',
  'overwritehost' => 'nextcloud.youdomain.com', // <-- change this
  'dbname' => 'nextcloud',
  'dbhost' => '127.0.0.1',
  'dbport' => '',
  'dbtableprefix' => 'oc_',
  'mysql.utf8mb4' => true,
  'dbuser' => 'nextcloud',
  'dbpassword' => 'XXX',
  'installed' => true,
  'maintenance' => false,
  'default_phone_region' => 'NL', // <-- change this
  'maintenance_window_start' => 3,
  'memories.exiftool' => '/var/www/html/custom_apps/memories/bin-ext/exiftool-amd64-musl',
  'memories.vod.path' => '/var/www/html/custom_apps/memories/bin-ext/go-vod-amd64',
  'filesystem_check_changes' => 1,
);