<? if (empty($background_color)): $background_color = "rgba(255,255,255,1)"; endif;
if (empty($font_color)): $font_color = "rgba(20,20,20,1)"; endif;

$style_array = [
	
	"body"	=> [
		"text-align" 	=> "left",
		"font-family"	=> "Times, Serif",
		"font-size"	=> "17px",
		"line-height"	=> "1.3",
		"background"	=> $background_color,
		"margin"	=> "0",
		"padding"	=> "0",
		],
	];

output_css($style_array)

function output_css ($array, $container=null) {
	
	
	
	}

?>


a, a:link, a:visited, a:hover {
	text-decoration: none;
	color: #000;
	white-space: break-spaces; }

.studies { 
	box-shadow: 0 0 40px -5px rgba(30,30,30,0.15);
	background: rgba(255,255,255,1);
	padding: 50px 0;
	margin: 150px 0;}
	
.float_left {
	float: left; }
	
.float_right {
	float: right; }


/* HEADER */

#navigation-header {
	box-sizing: border-box;
	width: 100%;
	background: rgba(255,255,255,0);
	padding: 10px;
	z-index: 100;
	margin: 0 0 50px 0;
	}

.navigation-header-item, .sidebar-back {
	font-size: 85%;
	line-height: 1em;
	margin: 5px 10px;
	padding: 8px 10px;
	border-radius: 100px;
	background: rgba(255,255,255,0);
	display: inline-block;
	cursor: pointer;
	text-align: center;
	color: rgba(0,0,0,1);
	font-weight: 400;
	font-family: Arial, Helvetica, 'Sans Serif';
	}

.navigation-header-item::first-letter, .sidebar-back::first-letter {
	vertical-align: top;
	}

#entries-list-alphabetical .navigation-header-item, #entries-list-hierarchical .navigation-header-item {
	top: 0;
	right: 0;
	position: absolute;
	}

amp-lightbox {
	margin: 0;
	padding: 80px 20px 20px;
	background: rgba(255,255,255,1);
	box-shadow: 0 0 30px 0 rgba(30,30,30,0.3);
	text-align: left;
	box-sizing: border-box;
	position: relative;
	width: auto;
	}


.sidebar-back {
	display: block;
	cursor: pointer;
	text-align: right;
	padding: 3px 15px;
	margin: 10px 0 20px 0;
	}

.sidebar-back:before {
	content: '\293A';
	font-size: 1.3em;
	margin: 0 5px 0 0;
	display: inline-block; }

amp-lightbox, amp-sidebar {
	margin: 0;
	padding: 10px 5px 10px 0;
	background: rgba(255,255,255,1);
	text-align: left;
	box-sizing: border-box;
	position: relative;
	white-space: normal;
	}

amp-sidebar {
	width: 650px;
	}

div.sidebar-navigation-item {
	display: block;
	}
	

amp-sidebar label {
	padding-top: 10px;
	}

#login-popover-submit, #logout-popover-submit, #new-popover-submit, #delete-popover-submit, #search-submit {
	display: table;
	max-width: 300px;
	margin: 30px 50px;
	padding: 10px 60px;
	border: 0;
	border-radius: 100px;
	background-image: linear-gradient(80deg, rgba(50,50,50,0.5), rgba(20,20,20,0.5));
	color: rgba(255,255,255,1);
	box-shadow: none;
	box-sizing: border-box;
	}

#search-submit {
	margin: 20px auto;
	}

.form-feedback {
	margin: 15px auto 15px;
	padding: 10px;
	text-align: center;
	}

@media only screen and (min-width: 650px)  {
	.categories-item-button { display: inline-block; }
	}


.categories-item-indent-wrapper {
	display: inline;
	max-width: 400px;
	overflow: hidden;
	}
	

.categories-item-indent {
	float: left;
	display: inline;
	height: 100%;
	width: 30px;
	height: 30px;
	}

.categories-item-indent::before {
	content: ' ';
	}


/* FORMS */

*:focus {
	outline: none;
	outline-width: 0;
	}


form {
	display: inline;
	}


/* MISCELLANEOUS */

.material-icons {
	vertical-align: middle; }

.fadeout { 
	opacity: 0.25; }



/* ARTICLE */

header {
	display: contents;
	}

h1, h2, h3, h4, h5, h6 {
	width: auto;
	max-width: 850px; 
	border: 0;
	display: block;
	clear: both;
	vertical-align: top;
	margin: 30px 0;
	padding: 20px;
	text-align: left;
	word-break: normal;
	font-family: Times, Serif;
	}

h1 span {
	display: block;
	margin: 10px auto;
	}

h1 {
	margin: 130px 0 30px;
	font-size: 2em;
	line-height: 140%;
	text-align: left;
	font-weight: 400;
	}

h2 {
	font-size: 1.5em;
	line-height: 120%;
	font-weight: 400; }

h3 {
	font-size: 1.3em;
	font-weight: 400;
	}

h4, h5, h6 {
	font-size: 1.1em;
	font-weight: 400;
	text-align: left;
	font-style: italic; }

#edit-entry {
	float: right;
	border: 1px solid #333;
	padding: 8px 12px;
	}

body, article {
	position: relative;
	}

span, div {
	background: inherit; }

article a {
	color: <? echo $color ?>; }

article a:hover {
	color: <? echo $color ?>; }

hr {
	display: block;
	clear: both;
	text-align: center;
	margin: 60px 20px 70px;
	height: 2px;
	background: rgba(200,200,200,0.5);
	border: 0; }

hr + hr {
	display: none; }

p, summary, ul, ol, blockquote {
	width: auto;
	max-width: 850px; 
	border: 0;
	display: block;
	clear: both;
	vertical-align: top;
	margin: 0;
	padding: 20px;
	text-align: left;
	position: relative;
	}
	
article, article th, article td,
p, summary, blockquote {
	font-weight: 400;
	text-align: left;
	font-family: Times, Serif;
	}

blockquote {
	background: rgba(255,255,255,1);
	border-width: 2px;
	border-style: dotted;
	border-color: rgba(50,50,50,1);
	border-radius: 15px;
	padding: 20px;
	margin: 50px 20px;
	max-width: 700px;
	}

blockquote cite {
	text-align: left;
	display: block;
	width: 60%;
	max-width: 750px; }

blockquote cite, blockquote cite a {
	color: rgba(0,0,0,0.7);
	font-style: normal; }

blockquote blockquote {
	margin: 20px; }

blockquote:before {
	content: '”';
	font-weight: 700;
	position: absolute;
	top: -13px;
	box-sizing: border-box;
	left: 50%;
	font-size: 50px;
	line-height: 20px;
	vertical-align: middle;
	text-align: center;
	font-family: Times;
	background: rgba(255,255,255,1);
	border: 2px dotted rgba(50,50,50,1);
	color: rgba(50,50,50,1);
	padding: 25px 0 0;
	width: 50px;
	height: 50px;
	margin: -15px;
	border-radius: 100px;
	}

p {
	text-overflow: ellipsis;
	overflow: hidden;
	}

article table {
	margin: 20px auto;
	box-sizing: border-box;
	table-layout: auto;
	border-collapse: collapse;
	overflow: auto;
	border: 2px solid rgba(245,245,245,1);
	}

article table table {
	margin: 20px 0; }

article tbody tr:nth-child(odd) td {
	background: rgba(255,255,255,1); }

article tbody tr:nth-child(even) td {
	background: rgba(250,250,250,1); }

article thead {
	}

article tbody {
	}

article th, article td {
	padding: 10px;
	vertical-align: top;
	font-weight: 400;
	text-align: left;
	margin: 0;
	border: 2px solid rgba(245,245,245,1);
	}

article th {
	font-style: italic; }

article th p, article td p, article li p {
	margin: 0;
	padding: 0;
	}

article th p + p, article td p + p, article li p + p {
	margin-top: 10px; }

.entry-metadata-wrapper {
	display: block;
	text-align: left;
	margin: 0 0 100px;
	opacity: 0.8;
	}

.entry-metadata, .entry-metadata-more {
	display: inline-block;
	font-style: normal;
	margin: 0;
	font-size: 1em;
	padding: 6px 20px;
	background: rgba(255,255,255,0.3);
	border: 1px solid rgba(100,100,100,0);
	border-radius: 100px;
	}

.entry-metadata-more {
	font-style: normal;
	margin: 8px 20px;
	border: 1px solid rgba(100,100,100,0.8);
	cursor: pointer;
	}

/* EDIT */

label, input, textarea, amp-selector, .input-button-wrapper {
	display: block;
	margin: 5px 8px;
	padding: 8px;
	width: 95%;
	text-align: left;
	border: 0;
	border-radius: 6px;
	box-sizing: border-box;
	font-size: 0.9em;
	line-height: inherit;
	outline: 0 none rgba(255,255,255,0);
	}

input + .input-button-wrapper, textarea + .input-button-wrapper, amp-selector + .input-button-wrapper {
	text-align: right;
	max-width: 850px;
	}

input, textarea, amp-selector {
	font-family: Arial, Helvetica, 'Sans Serif';
	margin: 5px 13px;
	border-radius: 10px;
	color: rgba(0,0,0,1);
	padding: 15px;
	max-width: 850px;
	background: rgba(255,255,255,1);
	border: 1px solid rgba(100,100,100,0.5);
	box-shadow: 3px 12px 15px -9px rgba(50,50,50,0.1);
	}

input[type="date"] {
	max-width: 300px;
	}

label {
	font-style: italic;
	color: rgba(100,100,100,0.8);
	padding: 40px 16px 5px;
	}

.admin-page-input {
	display: container;
	}

.input-button {
	cursor: pointer;
	color: rgba(100,100,100,0.8);
	padding: 7px 16px;
	border: 1px solid rgba(100,100,100,0.8);
	border-radius: 100px;
	display: inline-block;
	}

textarea {
	height: 600px;
	max-height: none;
	}

amp-selector {
	padding: 0;
	max-height: 365px;
	overflow-y: auto;
	overflow-x: hidden;
	position: relative;
	outline: 0 none rgba(255,255,255,0);
	}

amp-selector span {
	padding: 7px 10px;
	margin: 0;
	display: block;
	text-overflow: ellipsis;
	white-space: nowrap;
	overflow: hidden;
	border-radius: 0;
	border: 0 none rgba(255,255,255,0);
	outline: 0 none rgba(255,255,255,0);
	border-radius: 0;
	}

amp-selector span[selected], amp-selector span[aria-selected="true"] {
	background: rgba(100,100,100,1);
	color: rgba(255,255,255,1);
	border: 0 none rgba(255,255,255,0);
	outline: 0 none rgba(255,255,255,0);
	}

amp-selector span[disabled] {
	font-weight: 400;
	color: rgba(200,200,200,1);
	opacity: 0.9;
	}

#admin-page-form-snackbar {
	position: fixed;
	font-family: Arial, Helvetica, 'San Serif';
	bottom: 0;
	left: 0;
	right: 0;
	padding: 10px 90px 10px 10px;
	vertical-align: middle;
	background: rgba(255,255,255,1);
	color: rgba(0,0,0,1);
	box-shadow: 0 -5px 35px -12px rgba(30,30,30,0.3);
	}

#admin-page-form-save {
	position: fixed;
	bottom: 0;
	right: 0;
	background: rgba(150,150,150,1);
	color: rgba(255,255,255,1);
	padding: 10px 25px;
	vertical-align: middle;
	border-radius: 0;
	}

#footer-formula {
	display: none;
	text-direction: rtl;
	margin: 20px 0 50px;
	}


/* Table breaks for mobile */

@media only screen and (max-width: 500px)  {
	blockquote cite { width: 100%; }
	article th, article td { display: block;}
	article th + th, article td + td, article th + td, article td + th { border-left: none; border-top: 2px solid rgba(200,200,200,0.12); }
	}

@media print { 
	#navigation-header, #footer-formula {
		display: none;
		}
	}



/* Lists ... ul, ol, amp-list */

ul, ol, amp-list {
	position: relative;
	text-align: left;
	vertical-align: top;
	clear: both;
	width: auto;
	max-width: 850px;
	margin: 30px;
	padding: 0;
	list-style-position: inside;
	line-height: 1.4;
	border-left: 2px solid rgba(200,200,200,0.5);
	box-sizing: border-box; }

ul ul, ul ol, ul amp-list,
ol ul, ol ol, ol amp-list,
amp-list ul, amp-list ol, amp-list amp-list {
	width: auto;
	max-width: none;
	margin: 3px 5px 3px 1px;
	padding: 0;
	}

li {
	padding: 5px 5px 5px 6px;
	margin: 0;
	border-bottom: 2px dotted rgba(200,200,200,0.5);
	position: relative; }

li:first-child {
	padding: 4px 5px 5px 6px;
	}

li:last-child {
	border-bottom: 2px solid rgba(200,200,200,0.5);
	}

ul > li, amp-list li {
	list-style-type: none; }

ol {
	list-style-type: decimal; }

ol ol {
	list-style-type: lower-roman; }

ol ol ol {
	list-style-type: lower-alpha; }

amp-sidebar ul, amp-sidebar ol, amp-sidebar amp-list {
	font-family: Arial, Helvetica, 'Sans Serif';
	font-size: 0.9em;
	}

amp-sidebar ul ul, amp-sidebar ol ul, amp-sidebar amp-list ul,
amp-sidebar ul ol, amp-sidebar ol ol, amp-sidebar amp-list ol,
amp-sidebar ul amp-list, amp-sidebar ol amp-list, amp-sidebar amp-list amp-list {
	font-size: 1em;
	}

amp-sidebar ul li, amp-sidebar ol li, amp-sidebar amp-list li {
	text-overflow: ellipsis;
	white-space: nowrap;
	overflow: hidden;
	}

.unnested-list {
	border: 0;
	}

.unnested-list li {
	margin: 0;
	padding: 10px;
	border-bottom: 2px solid rgba(200,200,200,0.8);
	border-left: 0;
	text-overflow: ellipsis;
	white-space: nowrap;
	overflow: hidden;
	}

.unnested-list li:before {
	display: none;
	}

/* Toggle classes */

.hide {
	display: none;
	}

.show {
	display: inline-block;
	}
