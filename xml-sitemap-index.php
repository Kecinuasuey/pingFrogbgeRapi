<?php
date_default_timezone_set('America/Los_Angeles');
header('Content-Type: text/xml');
if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protokol = 'https://';
}
else {
  $protokol = 'http://';
}

echo '<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="/css-sitemap-index.xsl"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

foreach(glob('city/*.txt') as $file) {
$file = str_replace(array('city/','.txt'), '', $file);

$as = $protokol.$_SERVER["SERVER_NAME"].'/hotel/'.$file.'.xml';
echo '
<sitemap>
<loc>
'.$as.'
</loc>
<lastmod>'.date('c').'</lastmod>
</sitemap>
';

}

echo '</sitemapindex>';
?>