<?php
  // load count.php
  require_once "count.php";

  // Check if the id was set in the URL.
  if (isset($_GET['id'])) {

    // Id was set. Sanitize input.
    $input = sanitizeString($_GET['id']);

    // Check to see if the input was a number or "latest"
    if (filter_var($input, FILTER_VALIDATE_INT) || ($input === "latest")) {
      // Input is valid. Set Id.
      $id = $input;
    } else {
      // Input isn't valid. Set Id to "latest" as default.
      $id = "latest";
    }
  } else {
    // Id was NOT set in URL. Set to "latest" as default.
    $id = "latest";
  }

  // Set the comic number.
  $comicNum = $id;
  if ($id === "latest") {
    $comicNum = $newest;
  }

  // Logic for making the "last" and "next" links.
  if (($id === "latest") || ($id == $newest)) {
    // This is the latest comic.
    $lastLink = "cda.php?id=" . ($comicNum -1);
    $nextLink = "cda.php?id=latest";
  } elseif ($id == 1) {
    // This is the first comic.
    $lastLink = "cda.php?id=1";
    $nextLink = "cda.php?id=2";
  } else {
    // Comic is not first or last.
    $lastLink = "cda.php?id=" . ($comicNum -1);
    $nextLink = "cda.php?id=" . ($comicNum +1);
  }

  // Create page source.
  $pageImage = "images/pages/caldera" . $comicNum . ".png";

  // Create counter image source.
  $counterImage =  "images/counter" . $comicNum . ".gif";

  // A function to sanitize the user input.
  function sanitizeString($var) {
    $var = strip_tags($var);
    $var = htmlentities($var);
    return stripslashes($var);
  }


  /* Editing instructions for cda.php:
    Edit the html/css as normal, but replace the following:

      First comic link:  cda.php?id=1
      Last comic (previous) link: <?php echo $lastLink;?>
      Next comic link: <?php echo $nextLink;?>
      Latest comic link: cda.php?id=latest

      Image of comic <?php echo $pageImage;?>
      Image of counter <?php echo $counterImage;?>

      Example link:
      <a href="<?php echo $nextLink;?>">Next comic</a>

      Example image:
      <img src="<?php echo $counterImage; ?> width="100" height="50" />

    To update the comic:
      1. Put a new comic .png into the pages folder.
      2. Put a new counter .gif into the images folder.
      3. Update counter.php with the number of the current comic.

  */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="CSS/mainbody.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Caldera latest</title>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
</style>
</head>

<body>
<div id="Container">
<div id="Header"><img src="images/Backer.gif" width="1280" height="250" /></div>
<div id="Menu">
<div id="Homebutton"><a href="index.html"><img src="images/Home.gif" width="129" height="50" /></a></div>
<div id="Latestpagebutton"><a href="cda.php?id=latest"><img src="images/Latestpage.gif" width="271" height="50" /></a></div>
<div id="Archivebutton"><a href="archive.html"><img src="images/Archive.gif" width="190" height="50" /></a></div>
<div id="Linksbutton"><a href="links.html"><img src="images/Links.gif" width="137" height="50" /></a></div>
</div>
<div id="Menustripe"></div>
<div id="Mainbody">
<div id="Pagebar">
<div id="Beginning"><a href="cda.php?id=1"><img src="images/Beginning.gif" alt="First Page" width="120" height="50" /></a></div>
<div id="Last"><a href="<?php echo $lastLink;?>"><img src="images/Last.gif" alt="Last Page" width="120" height="50" /></a></div>
<div id="Counter"><img src="<?php echo $counterImage; ?>" width="100" height="50" /></div>
<div id="Next"><a href="<?php echo $nextLink;?>"><img src="images/Next.gif" alt="Next Page" width="120" height="50" /></a></div>
<div id="Latest"><a href="cda.php?id=latest"><img src="images/Latest.gif" alt="Latest Page" width="120" height="50" /></a></div>
</div>
<div id="Comicboarder">
<div id="Comic"><img src="<?php echo $pageImage; ?>" width="1000" height="1500" /></div></div>
<div id="Pagebar">
<div id="Beginning"><a href="cda.php?id=1"><img src="images/Beginning.gif" alt="First Page" width="120" height="50" /></a></div>
<div id="Last"><a href="<?php echo $lastLink;?>"><img src="images/Last.gif" alt="Last Page" width="120" height="50" /></a></div>
<div id="Counter"><img src="<?php echo $counterImage; ?>" width="100" height="50" /></div>
<div id="Next"><a href="<?php echo $nextLink;?>"><img src="images/Next.gif" alt="Next Page" width="120" height="50" /></a></div>
<div id="Latest"><a href="cda.php?id=latest"><img src="images/Latest.gif" alt="Latest Page" width="120" height="50" /></a></div>
</div>
<div id="Footerstripe"></div>
<div id="Footer"></div>
</div>
</div>

</body>
</html>
