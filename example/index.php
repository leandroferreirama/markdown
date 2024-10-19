<?php

require 'vendor/autoload.php';

use LeandroFerreiraMa\Markdown\HtmlToMarkdown;

$converter = new HtmlToMarkdown();
$html = '<h1>Título</h1><p>Este é um <strong>parágrafo</strong> com <em>ênfase</em> e um <a href="http://exemplo.com">link</a>.</p>';
$markdown = $converter->convert($html);

echo $markdown;
