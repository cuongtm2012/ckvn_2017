<?php 

// Object Oriented Way
// Create a DOM object
$html = new simple_html_dom();

// Load HTML from a string
$html->load('<html><body>Hello!</body></html>');

// Load HTML from a URL 
$html->load_file('http://www.google.com/');

// Load HTML from a HTML file 
$html->load_file('test.htm');


// Find all images 
foreach($html->find('img') as $element) 
       echo $element->src . '<br>';

// Find all links 
foreach($html->find('a') as $element) 
       echo $element->href . '<br>';


// Find all article blocks
foreach($html->find('div.article') as $article) {
    $item['title']     = $article->find('div.title', 0)->plaintext;
    $item['intro']    = $article->find('div.intro', 0)->plaintext;
    $item['details'] = $article->find('div.details', 0)->plaintext;
    $articles[] = $item;
}

?>
