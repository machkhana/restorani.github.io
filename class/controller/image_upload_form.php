<?php
	
//if(isset($_FILES['image'])){
//	if(is_file($_FILES['image']['tmp_name']))
//	{
//	require_once (CONTROLLER.'/image.class.php');
//	$image = new Image($_FILES['image']['tmp_name']);
//	$image->destination = $movefile.''.$datetime."-".$file_name.".".$extension;
//	$image->constraint = RESIZEBY_SMALL;
//	$image->size = RESIZETO_SMALL;
//	$image->quality = QUALITY_SMALL;
//	$image->render();
//	}
//}
if(isset($_FILES['image'])){
	if(is_file($_FILES['image']['tmp_name']))
	{
	require_once (CONTROLLER.'/image.class.php');
	$image = new Image($_FILES['image']['tmp_name']);
	$image->destination = $movefile.''.$datetime."-".$file_name.".".$extension;
	$image->constraint = RESIZEBY_LARGE;
	$image->size = RESIZETO_LARGE;
	$image->quality = QUALITY_LARGE;	
	$image->render();
	}
}
if(isset($_FILES['slideimage'])){
    if(is_file($_FILES['slideimage']['tmp_name']))
    {
        require_once (CONTROLLER.'/image.class.php');
        $image = new Image($_FILES['slideimage']['tmp_name']);
        $image->destination = $movefile.''.$datetime."-".$file_name.".".$extension;
        $image->constraint = RESIZEBY_EXLARGE;
        $image->size = RESIZETO_EXLARGE;
        $image->quality = QUALITY_EXLARGE;
        $image->render();
    }
}
/*$handle1 = new upload($_FILES['image']);
if ($handle1->uploaded) {
  $handle1->file_new_name_body   = $file_name;
  $handle1->image_resize         = true;
  $handle1->image_x              = 140;
  $handle1->image_y 				= 100;
  $handle1->image_ratio_y        = true;
  //$handle1->image_text 			= 'FORPC.GE';
  //$handle1->image_text_color 	= '#ffffff';
  //$handle1->image_text_opacity 	= 50;
  //$handle1->image_text_position  = 'BR';
  //$foo1->image_text_x          = -5;
  //$foo1->image_text_y          = -5;
  //$foo1->image_text_padding    = 5;
  $handle1->process('../images/small/');


  $handle1->file_new_name_body   = $file_name;
  $handle1->image_resize         = true;
  $handle1->image_x              = 500;
  $handle1->image_y 				= 400;
  $handle1->image_ratio_y        = true;
  //$handle1->image_text 			= 'FORPC.GE';
  //$handle1->image_text_color 	= '#ffffff';
  //$handle1->image_text_opacity 	= 50;
  //$handle1->image_text_font 		= 5;
  //$handle1->image_text_position  = 'BR';
  //$foo1->image_text_x          = -5;
  //$foo1->image_text_y          = -5;
  //$foo1->image_text_padding    = 5;
  $handle1->process('../images/big/');	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*$handle2 = new upload($_FILES['file2']);
if ($handle2->uploaded) {
  $handle2->file_new_name_body   = $file_name2;
  $handle2->image_resize         = true;
  $handle2->image_x              = 130;
  $handle2->image_y 				= 100;
  $handle2->image_ratio_y        = true;
  $handle2->image_text 			= 'FORPC.GE';
  $handle2->image_text_color 	= '#ffffff';
  $handle2->image_text_opacity 	= 50;
  $handle2->image_text_position  = 'BR';
  //$foo2->image_text_x          = -5;
  //$foo2->image_text_y          = -5;
  //$foo2->image_text_padding    = 5;
  $handle2->process('./images/small/');


  $handle2->file_new_name_body   = $file_name2;
  $handle2->image_resize         = true;
  $handle2->image_x              = 500;
  $handle2->image_y 				= 400;
  $handle2->image_ratio_y        = true;
  $handle2->image_text 			= 'FORPC.GE';
  $handle2->image_text_color 	= '#ffffff';
  $handle2->image_text_opacity 	= 50;
  $handle2->image_text_font 		= 5;
  $handle2->image_text_position  = 'BR';
  //$foo2->image_text_x          = -5;
  //$foo2->image_text_y          = -5;
  //$foo2->image_text_padding    = 5;
  $handle2->process('./images/big/');	
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////
$handle3 = new upload($_FILES['file3']);
if ($handle3->uploaded) {
  $handle3->file_new_name_body   = $file_name3;
  $handle3->image_resize         = true;
  $handle3->image_x              = 140;
  $handle3->image_y 				= 100;
  $handle3->image_ratio_y        = true;
  $handle3->image_text 			= 'FORPC.GE';
  $handle3->image_text_color 	= '#ffffff';
  $handle3->image_text_opacity 	= 50;
  $handle3->image_text_position  = 'BR';
  //$foo3->image_text_x          = -5;
  //$foo3->image_text_y          = -5;
  //$foo3->image_text_padding    = 5;
  $handle3->process('./images/small/');


  $handle3->file_new_name_body   = $file_name3;
  $handle3->image_resize         = true;
  $handle3->image_x              = 500;
  $handle3->image_y 				= 400;
  $handle3->image_ratio_y        = true;
  $handle3->image_text 			= 'FORPC.GE';
  $handle3->image_text_color 	= '#ffffff';
  $handle3->image_text_opacity 	= 50;
  $handle3->image_text_font 		= 5;
  $handle3->image_text_position  = 'BR';
  //$foo3->image_text_x          = -5;
  //$foo3->image_text_y          = -5;
  //$foo3->image_text_padding    = 5;
  $handle3->process('./images/big/');	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////
$handle4 = new upload($_FILES['file4']);
if ($handle4->uploaded) {
  $handle4->file_new_name_body   = $file_name4;
  $handle4->image_resize         = true;
  $handle4->image_x              = 130;
  $handle4->image_y 				= 100;
  $handle4->image_ratio_y        = true;
  $handle4->image_text 			= 'FORPC.GE';
  $handle4->image_text_color 	= '#ffffff';
  $handle4->image_text_opacity 	= 50;
  $handle4->image_text_position  = 'BR';
  //$foo4->image_text_x          = -5;
  //$foo4->image_text_y          = -5;
  //$foo4->image_text_padding    = 5;
  $handle4->process('./images/small/');


  $handle4->file_new_name_body   = $file_name4;
  $handle4->image_resize         = true;
  $handle4->image_x              = 500;
  $handle4->image_y 				= 400;
  $handle4->image_ratio_y        = true;
  $handle4->image_text 			= 'FORPC.GE';
  $handle4->image_text_color 	= '#ffffff';
  $handle4->image_text_opacity 	= 50;
  $handle4->image_text_font 		= 5;
  $handle4->image_text_position  = 'BR';
  //$foo4->image_text_x          = -5;
  //$foo4->image_text_y          = -5;
  //$foo4->image_text_padding    = 5;
  $handle4->process('./images/big/');	
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
$handle5 = new upload($_FILES['file5']);
if ($handle5->uploaded) {
  $handle5->file_new_name_body   = $file_name5;
  $handle5->image_resize         = true;
  $handle5->image_x              = 130;
  $handle5->image_y 				= 100;
  $handle5->image_ratio_y        = true;
  $handle5->image_text 			= 'FORPC.GE';
  $handle5->image_text_color 	= '#ffffff';
  $handle5->image_text_opacity 	= 50;
  $handle5->image_text_position  = 'BR';
  //$foo5->image_text_x          = -5;
  //$foo5->image_text_y          = -5;
  //$foo5->image_text_padding    = 5;
  $handle5->process('./images/small/');


  $handle5->file_new_name_body   = $file_name5;
  $handle5->image_resize         = true;
  $handle5->image_x              = 500;
  $handle5->image_y 				= 400;
  $handle5->image_ratio_y        = true;
  $handle5->image_text 			= 'FORPC.GE';
  $handle5->image_text_color 	= '#ffffff';
  $handle5->image_text_opacity 	= 50;
  $handle5->image_text_font 		= 5;
  $handle5->image_text_position  = 'BR';
  //$foo5->image_text_x          = -5;
  //$foo5->image_text_y          = -5;
  //$foo5->image_text_padding    = 5;
  $handle5->process('./images/big/');	
}*/
?>