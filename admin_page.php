<? $entry_info = nesty_page($page_temp);
$entry_info = $entry_info[$page_temp];

$retrieve_page->execute(["page_id"=>$page_temp]);
$result = $retrieve_page->fetchAll();
foreach ($result as $row):
	$entry_info['summary']		= json_decode($row['summary'], true);
	$entry_info['body']		= json_decode($row['body'], true);
	$entry_info['studies']		= $row['studies'];
	endforeach;

$appendix_array = [];
if ($entry_info['type'] == "place"): $appendix_array = ["latitude"=>"string", "longitude"=>"string" ]; endif;
if ($entry_info['type'] == "village"): $appendix_array = ["latitude"=>"string", "longitude"=>"string"]; endif;
if ($entry_info['type'] == "person"): $appendix_array = [ "birthday"=>"date", "email"=>"string", "telephone"=>"string", "website"=>"string", "facebook"=>"string", "twitter"=>"string" ]; endif;

$new_page = null;
if ($page_temp == "new"): $new_page = "yes"; endif;

// When tap, then also close the amp-lightbox

echo "<div id='admin-page-actions' amp-fx='parallax' data-parallax-factor='1.2'>";
	echo "<div id='admin-page-delete' on='tap:delete-popover'>&#x2B19; Delete entry</div>";
	echo "</div>";

// Do a delete popover ... redirect if deletion works ...
echo "<amp-lightbox id='delete-popover' layout='nodisplay'>";

	echo "<form action-xhr='/delete-xhr/' method='post' id='delete' target='_top' class='admin-page-form' on=\"
		submit:
			delete-popover-submit.hide;
		submit-error:
			delete-popover-submit.show
		\">";

	echo "<input type='hidden' name='entry_id' value='".$page_temp."'>";

	echo "<p>Do you really want to delete this entry?</p>";

	// Submit button ...
	echo "<br><span id='delete-popover-submit' role='button' tabindex='0' on='tap:delete.submit'>Delete</span>";

	echo "<div class='form-feedback' submitting>Submitting...</div>";
	echo "<div class='form-feedback' submit-error><template type='amp-mustache'>Error. {{{message}}}</template></div>";
	echo "<div class='form-feedback' submit-success><template type='amp-mustache'>{{{message}}}</template></div>";

	echo "</form>";

	echo "</amp-lightbox>";

echo "<form action-xhr='/edit-xhr/' method='post' class='admin-page-form' id='save' on=\"
		submit:
			admin-page-form-snackbar-ready.hide,
			admin-page-form-save.hide;
		submit-error:
			admin-page-form-save.show;
		submit-success:
			admin-page-form-save.show
		\">";

echo "<input type='hidden' name='entry_id' value='$page_temp'>";

echo "<h1 amp-fx='parallax' data-parallax-factor='1.05'><a href='https://".$domain."/".$page_temp."/' target='_blank'>".$domain."/".$page_temp."/</a></h1>";

function create_inputs($entry_info, $input_backend, $input_descriptor, $input_type = "input-text", $language_toggle = "on") {
	
	global $site_info;
		
	$languages_array_temp = [ "placeholder" ];
	if ($language_toggle == "on"):
		if (!(isset($entry_info[$input_backend])) || empty($entry_info[$input_backend])):
			$entry_info[$input_backend] = [];
//			$entry_info[$input_backend] = [ "english" => " ", ]; // Make this open by default for all
			if ($input_backend == "name"): // Make the "name" open by default
				$entry_info[$input_backend] = [ "english" => " ", ];
				endif;
		endif;
		$languages_array_temp = array_keys($entry_info[$input_backend]);
		$languages_array_temp = array_merge($site_info['languages'], $languages_array_temp);
		$languages_array_temp = array_unique($languages_array_temp);
		endif;
	
//	$echo_section = null;

	foreach ($languages_array_temp as $language_temp):

		$echo_temp = $button_hidden_temp = $input_hidden_temp = $value_temp = null;
		
		if ($language_toggle == "on"):
			$placeholder_temp = ucfirst($input_descriptor)." / ". ucfirst($language_temp);
			$id_temp = $input_backend."-".$language_temp;
			$name_temp = $input_backend."[".$language_temp."]";
			if (isset($entry_info[$input_backend][$language_temp])): $value_temp = trim($entry_info[$input_backend][$language_temp]); endif;
		else:
			$placeholder_temp = ucfirst($input_descriptor);
			$id_temp = $input_backend;
			$name_temp = $input_backend;
			if (isset($entry_info[$input_backend])): $value_temp = trim($entry_info[$input_backend]); endif;
			endif;
			
		if (!(empty($value_temp))):
			$button_hidden_temp = "hidden";
			$input_hidden_temp = null;
		elseif (empty($value_temp)):
			$button_hidden_temp = null;
			$input_hidden_temp = "hidden";
			endif;

		$echo_temp .= "<div class='input-button-wrapper'><span role='button' tabindex='0' class='input-button' id='admin-page-".$id_temp."-button' on='tap:admin-page-".$id_temp.".show,admin-page-".$id_temp."-button.hide' ".$button_hidden_temp.">Show:  ".$placeholder_temp."</span></div>";

		$echo_temp .= "<div class='admin-page-input' id='admin-page-".$id_temp."' ".$input_hidden_temp.">";
			$echo_temp .= "<label for='".$name_temp."'>". $placeholder_temp ."</label>";
	
			if ($input_type == "textarea"):
				$echo_temp .= "<textarea name='".$name_temp."' placeholder='". $placeholder_temp ."' class='admin-page-form-".$input_backend."'>".$value_temp."</textarea>";
			else:
				$echo_temp .= "<input id='".$id_temp."' name='".$name_temp."' placeholder='". $placeholder_temp ."' value='".htmlspecialchars($value_temp, ENT_QUOTES)."' maxlength='150'>";
				endif;	

			$echo_temp .= "<div class='input-button-wrapper'><span class='input-button' role='button' tabindex='0' on='tap:admin-page-".$id_temp.".hide,admin-page-".$id_temp."-button.show'>Hide: ".$placeholder_temp."</span></div>";
			
			$echo_temp .= "</div>";

//		$echo_temp .= "<div class='input-button-wrapper'><span class='input-button' role='button' tabindex='0' on='tap:admin-page-".$id_temp.".toggleVisibility'>Toggle: ".$placeholder_temp."</span></div>";
	
		echo $echo_temp; // Because it's stored as a string, we can also use this format to prepend or append onto $echo_section

		if ($language_toggle !== "on"): break; endif; // If no more languages, stop there
	
		endforeach;
	
	}
	
create_inputs($entry_info, "name", "title");
// create_inputs($entry_info['alternate_name'], "alternate_name", "full name");
create_inputs($entry_info, "summary", "headline");
create_inputs($entry_info, "body", "body", "textarea");
create_inputs($entry_info, "studies", "studies", "textarea", "off");

function hierarchy_selector ($entry_id, $relationship_name, $possible_array) {

	global $site_info;
	global $information_array;

	echo "<label for='". $relationship_name ."[]'>".ucwords($relationship_name)."</label>";
	echo "<amp-selector layout='container' name='". $relationship_name ."[]' multiple>";

	if (!(empty($information_array[$entry_id]['hierarchy'][$relationship_name]))): echo "<span option='clear_selection' style='font-style: italic;'>Clear selection</span>";
	else: $information_array[$entry_id]['hierarchy'][$relationship_name] = []; endif;

	$information_array[$entry_id][$relationship_name]['hierarchy'] = array_intersect($possible_array, $information_array[$entry_id][$relationship_name]['hierarchy']);
	
	if (!(is_array($information_array[$entry_id][$relationship_name]['hierarchy']))): $information_array[$entry_id][$relationship_name]['hierarchy'] = []; endif;
	
	foreach ($information_array[$entry_id][$relationship_name]['hierarchy'] as $entry_id_temp):
		if (!(in_array($entry_id_temp, $possible_array))): continue; endif;
		if (empty($information_array[$entry_id_temp]['header'])): continue; endif;
		if ($entry_id == $entry_id_temp): continue; endif;
		echo "<span option='".$entry_id_temp."' selected>";
		echo $information_array[$entry_id_temp]['header'] . " • ". $site_info['category_array'][$information_array[$entry_id_temp]['type']];
		echo "</span>"; endforeach;
	foreach ($possible_array as $entry_id_temp):
		if (in_array($entry_id_temp, $information_array[$entry_id][$relationship_name]['hierarchy'])): continue; endif;
		if (empty($information_array[$entry_id_temp]['header'])): continue; endif;
		if ($entry_id == $entry_id_temp): continue; endif;
		echo "<span option='".$entry_id_temp."'>";
		echo $information_array[$entry_id_temp]['header'] . " • ". $site_info['category_array'][$information_array[$entry_id_temp]['type']];
		echo "</span>";
		endforeach;
	echo "</amp-selector>"; }

echo "<input type='hidden' name='parents[]'>";
echo "<input type='hidden' name='children[]'>";
hierarchy_selector($page_temp, "parents", array_keys($information_array));
hierarchy_selector($page_temp, "children", array_keys($information_array));

echo "<p>An entry's type is its most important organizational component. Types are largely self-explanatory, except for 'articles' which are intended to be less research-oriented and more consumption-oriented.</p>";

echo "<label for='type'>Type</label>";
echo "<amp-selector layout='container' name='type'>";
if (isset($site_info['category_array'][$entry_info['type']])):
	echo "<span option='".$entry_info['type']."' selected>".$site_info['category_array'][$entry_info['type']]."</span>";
	endif;
foreach ($site_info['category_array'] as $header_backend => $header_frontend):
	if ($header_backend == $entry_info['type']): continue; endif;
	echo "<span option='".$header_backend."'>".$header_frontend."</span>";
	endforeach;
echo "</amp-selector>";

echo "<p>Directly edit its published time here,</p>";

echo "<label for='date_published'>Published date (YYYY-MM-DD, e.g. 2020-01-25).</label>";
echo "<input type='date' id='date_published' name='date_published' value='".$entry_info['date_published']."'>";

if (!(empty($appendix_array))):
	foreach ($appendix_array as $appendix_key => $appendix_type):
		$placeholder_temp = str_replace("_", " ", $appendix_key);
		echo "<label for='appendix[".$appendix_key."]'>". $placeholder_temp ."</label>";
		if ($appendix_type == "string"):
			echo "<input type='text' name='appendix[".$appendix_key."]' placeholder='". $placeholder_temp ."' value='".htmlspecialchars($entry_info['appendix'][$appendix_key], ENT_QUOTES)."'>";
		elseif ($appendix_type == "checkbox"):
			$checked_temp = null;
			if ($entry_info['appendix'][$appendix_key] == $appendix_key): $checked_temp = "checked"; endif;
			echo "<input type='checkbox' name='appendix[".$appendix_key."].' value='".$appendix_key."' $checked_temp>";
			endif;
		endforeach;
	endif;

echo "<br><br><br><br><br>";

echo "<div id='admin-page-form-snackbar'>";
	echo "<div id='admin-page-form-snackbar-ready'>Ready...</div>";
	echo "<div submitting>Submitting...</div>";
	echo "<div submit-error><template type='amp-mustache'>Error. {{{message}}}</template></div>";
	echo "<div submit-success><template type='amp-mustache'>{{{message}}}</template></div>";
	echo "</div>";

echo "<div id='admin-page-form-save' role='button' tabindex='0' on='tap:pageState.refresh,save.submit'>Save</div>";

echo "</form>"; ?>
