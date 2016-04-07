<?php
// Get the page name from the URL and sanitize the input
$page = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['page']);

// Check if the page and meta file exists
if (file_exists('pages/' . $page . '.page.php') && file_exists('pages/' . $page . '.meta.php'))
{
  $page_404 = false;
}
else 
{
  $page_404 = true;
  $page = '404';
}

// If the page exists, load the meta data
if (!$page_404)
{
  require('pages/' . $page . '.meta.php');
}

// Load the page header
require('template/head.php');

// Load the page content
require('pages/' . $page . '.page.php');

// Load the page footer
require('template/foot.php');