<?php if (!defined('CREXO')) exit('No Trespassing!');

/**
 * Update a last modification date (e.g. when you update existing content)
 * Each URL in the sitemap has an MD5 attribute so uniquely reference it
 *
 * $_sitemap = new sitemap;
 * $_sitemap->load();
 * $_sitemap->editrow(md5($urls[1]));
 *
 *
 * Delete a URL from the sitemap (e.g. when a URL is no longer available on your site)
 *
 * $_sitemap = new sitemap;
 * $_sitemap->load();
 * $_sitemap->deleterow(md5($urls[2]));
 *
 */

class Sitemap {

	public function load() {
		global $dom;

		$dom = new DOMDocument;
		$dom->preserveWhiteSpace = true;
		$dom->loadXML(file_get_contents('sitemap.xml'));
	}

	public function generate() {
		global $dom,$urlset;
		$dom = new DOMDocument();
		$dom->loadXML('<?xml version="1.0" encoding="UTF-8"?>
						<urlset
						xml:ns="http://www.sitemaps.org/schemas/sitemap/0.9"
						xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
						xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
						http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
						</urlset>');
		$dom->save('sitemap.xml');
	}

	public function addrow($vars) {
		global $dom,$urlset;

		if(!isset($urlset)) $urlset = $dom->getElementsByTagName('urlset')->item(0);

		$node = $dom->createElement('url');
		$node->setAttribute('id',md5($vars['loc']));

		foreach($vars as $key => $var) {
			$node2 = $dom->createElement($key);
			$node3 = $dom->createTextNode($var);
			$node2->appendChild($node3);
			$node->appendChild($node2);
		}

		$newnode = $urlset->appendChild($node);
		$vars['md5'] = md5($vars['loc']);
	}

	// public function editrow($id) {
	// 	global $dom;

	// 	$xpath = new DOMXPath($dom);
	// 	$mod = $xpath->query("/urlset/url[@id='$id']/lastmod");

	// Using a fictional "last modified" date for each URL of 2010-01-01, otherwise
	// Use strftime("%Y-%m-%d",$unix_timestamp) for actual last modification dates of URLs or Use strftime("%Y-%m-%d",time()) to set the last modification date for today
	// 	//$mod->item(0)->nodeValue = strftime("%Y-%m-%d",time() - gmmktime() + mktime());
	// 	$dom->save('sitemap.xml');
	// }

	// public function deleterow($id) {
	// 	global $dom;

	// 	$xpath = new DOMXPath($dom);
	// 	$urlset = $dom->getElementsByTagName('urlset')->item(0);
	// 	$row = $xpath->query("/urlset/url[@id='$id']")->item(0);
	// 	if($row) $row->parentNode->removeChild($row);
	// 	$dom->save('sitemap.xml');
	// }
}