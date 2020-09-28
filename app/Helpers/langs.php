<?php 
	// function site_lang(){
	// 	$langs = \App\Languages::where('id' , '2')->first();
	// 	// dd($langs);

	// 	// App::setLocale($langs->shortname);
	// 	// dd(App::getLocale(););
	// 	// config(['app.locale' => $langs->shortname ])
	// 	// dd($raw_locale);
	// 	return $langs;
	// }
	
	function url_site($url){
		$rmspace = trim($url);
		$slug00 = str_replace('&quot;', "-", $rmspace);
		$slug0 = str_replace("/", "-", $slug00);
		$slug1 = str_replace("\\", "-", $slug0);
		$slug2 = str_replace(":", "-", $slug1);
		$slug3 = str_replace(",", "-", $slug2);
		$slug3 = str_replace("،", "-", $slug2);
		$slug = str_replace(" ", "-", $slug3);
		$slug = str_replace('--', "-", $slug);
		$slug = str_replace('---', "-", $slug);
		$slug = str_replace('(', "-", $slug);
		$slug = str_replace(')', "-", $slug);
		return $slug;
	}
