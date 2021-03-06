<?php 
  $p = PDF_new(); 
  PDF_open_file($p); 
  PDF_set_info($p,"Creator","coords.php"); 
  PDF_set_info($p,"Author","Rasmus Lerdorf"); 
  PDF_set_info($p,"Title","Coordinate Test (PHP)"); 
  PDF_begin_page($p,595,842); 
  $font = PDF_findfont($p,"Helvetica-Bold","host",0); 
  PDF_setfont($p,$font,38.0); 
  PDF_show_xy($p, "Bottom Left", 10, 10);
  PDF_show_xy($p, "Bottom Right", 350, 10);
  PDF_show_xy($p, "Top Left", 10, 802);
  PDF_show_xy($p, "Top Right", 410, 802);
  PDF_show_xy($p, "Center",595/2-60,842/2-20);
  PDF_end_page($p); 
  PDF_set_parameter($p, "openaction", "fitpage");
  PDF_close($p); 
  $buf = PDF_get_buffer($p); 
  $len = strlen($buf);
  Header("Content-type:application/pdf");
  Header("Content-Length:$len"); 
  Header("Content-Disposition:inline; filename=coords.pdf");
  echo $buf; 
  PDF_delete($p); 
?>
