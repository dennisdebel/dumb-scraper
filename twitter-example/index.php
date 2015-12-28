<?
//
//
// twitter ('dumb cron job') scraper
//
//
//
// concept: scrape twitter > save as txt file with scraping date as name
// when page gets requested check how old txt file is
// if txt file is < 24 hours: serve 'cached' text.
// if txt file is older than 24 hours, scrape twitter, save new text file and serve
//
// 2015 ccby dennisdebel.nl
//

include_once('simple_html_dom.php');
?>

<style>
.AdaptiveMedia-singlePhoto{ /*html/css style when looking for twitter timeline 'li' tags (those include images)*/
	width:100px;
}
</style>


<?
$filename = "cache.txt"; // define cache file
$useragent = 'UserAgent/1.0'; //define user agent
$interval = rand(72000,100800);//define random scrape time (between 20  and 28 hours)

if (time()-filemtime($filename) > $interval) {  // if cache file is older than 20 hours, fetch new data
	
	$context = stream_context_create(); // setup options
	stream_context_set_params($context, array('user_agent' => $useragent)); // fake user agent as option
	$html = file_get_html('http://twitter.com/ruruhuis',0,$context);
	$fp = fopen($filename,"w"); //open or create cache file
	foreach($html->find('p') as $element){
    	echo $element->innertext."<br><br>"; // echo the content in all the p tags on screen
		fwrite($fp, $element->innertext."<br><br>");  // write elements to static 'cache' file
	}
	fclose($fp); //close cache file
} else { // if cache file is younger than 20 hours, fetch new data
  
 echo file_get_contents($filename); 
}
?>