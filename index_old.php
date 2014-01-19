<?php include('functions/functions.php'); ?>
<?php connect(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Mogul | Where You Find What To Eat</title>
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
</head>

<body>
<div id="TOP_HEADER">
  <div class="logo"></div>
  <div id="top_ad">
    <div class="leaderboard"><img src="images/ad_space/468x60.gif" width="468" height="60" />dork!!</div>
  </div>
  <div class="menu_area">
    <div class="buttons">Home</div>
    <div class="buttons">Coupons</div>
    <div class="buttons">Critique</div>
    <div class="buttons">Button_4</div>
    <div class="buttons">Sign Up</div>
  </div>
</div>
<div id="search_area">
  <div class="search_cuisine">
    <form name="Cuisines" id="Cuisines">
      <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
        <option>Afghan</option>
        <option>African</option>
        <option>American (New)</option>
        <option>American (Traditional)</option>
        <option>Argentinean</option>
        <option>Asian</option>
        <option>Australian</option>
        <option>Austrian</option>
        <option>Bagels</option>
        <option>Bakeries</option>
        <option>Bar Food</option>
        <option>Barbecue</option>
        <option>Belgian</option>
        <option>Bistro</option>
        <option>Brazilian</option>
        <option>British (Modern)</option>
        <option>British (Traditional)</option>
        <option>Burgers</option>
        <option>Burmese</option>
        <option>Cajun &amp; Creole</option>
        <option>Californian</option>
        <option>Caribbean</option>
        <option>Central American</option>
        <option>Central Asian</option>
        <option>Cheesesteaks</option>
        <option>Chicken</option>
        <option>Chinese</option>
        <option>Coffeehouses</option>
        <option>Cuban</option>
        <option>Delis</option>
        <option>Desserts</option>
        <option>Dim Sum</option>
        <option>Diners &amp; Coffee Shops</option>
        <option>Dutch</option>
        <option>Eastern European</option>
        <option>Eclectic &amp; International</option>
        <option>Ethiopian</option>
        <option>Filipino</option>
        <option>Fish &amp; Chips</option>
        <option>French</option>
        <option>Gastropub</option>
        <option>German</option>
        <option>Greek</option>
        <option>Haitian</option>
        <option>Hawaiian</option>
        <option>Health Food</option>
        <option>Hot Dogs</option>
        <option>Indian</option>
        <option>Indonesian</option>
        <option>Irish</option>
        <option>Italian</option>
        <option>Jamaican</option>
        <option>Japanese</option>
        <option>Korean</option>
        <option>Kosher</option>
        <option>Latin American</option>
        <option>Local/Organic</option>
        <option>Malaysian</option>
        <option>Mediterranean</option>
        <option>Mexican</option>
        <option>Middle Eastern</option>
        <option>Moroccan</option>
        <option>New England</option>
        <option>Noodle Shops</option>
        <option>Nuevo Latino</option>
        <option>Other</option>
        <option>Pakistani</option>
        <option>Pan-Asian</option>
        <option>Persian</option>
        <option>Peruvian</option>
        <option>Pizza</option>
        <option>Polish</option>
        <option>Portuguese</option>
        <option>Russian</option>
        <option>Salads</option>
        <option>Sandwiches</option>
        <option>Scandinavian</option>
        <option>Seafood</option>
        <option>Small Plates/Tapas</option>
        <option>Smoothies/Juice Bar</option>
        <option>Soups</option>
        <option>South American</option>
        <option>Southern &amp; Soul</option>
        <option>Southwestern</option>
        <option>Spanish</option>
        <option>Sri Lankan</option>
        <option>Steakhouses</option>
        <option>Sushi</option>
        <option>Swiss</option>
        <option>Teahouses</option>
        <option>Thai</option>
        <option>Tibetan</option>
        <option>Turkish</option>
        <option>Vegan</option>
        <option>Vegetarian</option>
        <option>Venezuelan</option>
        <option>Vietnamese</option>
        <option>Wild Game</option>
        <option>Wine Bar</option>
      </select>
    </form>
  </div>
  <div class="search_specific"><img src="images/entree.png" width="125" height="25" /></div>
  <div class="search_image"><img src="images/cuisine.png" width="125" height="25" alt="Cuisine | Menu Mogul where you find what to eat" /></div>
  <div class="search_image_spec">
    <form id="entree2" name="entree" method="post" action="">
      <label for="search_keyword2"></label>
      <input type="text" name="search_keyword2" id="search_keyword2" />
      <input type="submit" name="Search2" id="Search2" value="Search" />
    </form>
  </div>
</div>
<div id="main_area">
  <div id="left">
    <div class="left_nav"><img src="images/advancedsearch.png" width="125" height="25" alt="Advance Search Menu Mogul Where You Find What To Ear" /></div>
    <div class="left_adspace"><img src="images/ad_space/youradhere_left_bottom.png" width="250" height="250" /></div>
  </div>
  <div id="content">
    <div class="main_ad">This area wi ll hold featured restaraunts in your local area. This section will be populated by PHP.</div>
    <div class="top_list">This area will contain a list of top restaraunts and top entrees in your area. This section will be populated by php.</div>
  </div>
  <div id="right"><img src="images/ad_space/youradhere_right_side.png" width="100" height="500" /></div>
</div>
<div id="footer">
  <div id="footer_container">
    <div class="footer">
      <div class="footer_title">About</div>
      About Menu Mogul<br />
    Blog<br />
    Terms Of Service<br />
    Privacy Policy
    </div>
    <div class="footer">
      <div class="footer_title">Help</div>
      F.A.Q.'s<br />
      Contact Us<br />
    </div>
    <div class="footer">
      <div class="footer_title">More</div>
      Carreers<br />
      Advertising<br />
      Menu Mogul App
    </div>
    <div class="footer">
      <div class="footer_title">Languages</div>
  </div></div>
</div>
</body>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20964627-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</html>
