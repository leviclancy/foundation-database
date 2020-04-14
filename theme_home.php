<? 

$tap_temp = implode(",", [
	"begin-image.hide",
	"sidebar-navigation.open",
	]);

echo "<amp-img src='begin.png' id='begin-image' width='375' height='273' layout='intrinsic' alt='Begin' role='button' tabindex='0' on='tap:".$tap_temp."'></amp-img>";

footer();

echo "<h1>&#x2742;</h1>";

echo "<amp-carousel id='home-carousel' type='slides' width='auto' height='400' layout='fixed-height' loop autoplay delay='2000'>";

echo "<span class='home-carousel-slide'>".count($information_array)." entries</span>";

foreach ($header_array as $header_backend => $header_frontend):
	if (empty($type_counts_array[$header_backend])): continue; endif;
	echo "<span class='home-carousel-slide'>".$type_counts_array[$header_backend]." ".$header_frontend."</span>";
	endforeach;

if (!(empty($coordinate_counts))):
	echo "<span class='home-carousel-slide'>".$coordinate_counts." map points</span>";
	endif;

echo "</amp-carousel>"; ?>
