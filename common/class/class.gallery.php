<?php


class Gallery{
          

     // Validate allowed file types //
     // $file_type = $FILES[][type].
     // Need to fetch this from database in the future
     public function val_type($file_type){
          $allowed = array(
               					"jpg" 	=> "image/jpeg",
               					"pjpg" 	=> "image/pjpeg",
               					"png" 	=> "image/png",
               					"xpng" 	=> "image/xpng",
               					"gif" 	=> "image/gif"
               				);
          
          if(in_array($file_type, $allowed) ){
               return(true);
          }else{
               return(false);
          }
     }





     // Calculate new image dimentions
     // $old_x = ImageSX($source);
     // $old_y = ImageSY($source);
     // $new_x = Max new width
     // $new_y = Max new height
     public function calc_dim($old_x, $old_y, $new_x, $new_y){
          if($old_x >= $new_x){
               if($old_x > $old_y){
                    $t_new_x = $new_x;
                    $t_new_y = $old_y * ($new_y / $old_x);
               }
               if($old_x < $old_y){
                    $t_new_x = $old_x * ($new_x / $old_y);
                    $t_new_y = $new_y;
               }
               if($old_x == $old_y){
                    $t_new_x = $new_x;
                    $t_new_y = $new_y;
               }
          }elseif($old_y >= $new_y){
               if($old_x > $old_y){
                    $t_new_x = $new_x;
                    $t_new_y = $old_y * ($new_y / $old_x);
               }
               if($old_x < $old_y){
                    $t_new_x = $old_x * ($new_x / $old_y);
                    $t_new_y = $new_y;
               }
               if($old_x == $old_y){
                    $t_new_x = $new_x;
                    $t_new_y = $new_y;
               }
          }else{
               $t_new_x = $old_x;
               $t_new_y = $old_y;
          }
          $size = array ('width' => $t_new_x, 'height' => $t_new_y);
          return($size); 
     }




     // Get Upload and return all data inc thump source
     // $files = $_FILES global
     // $thump_x = required thump_width
     // $thump_y = required thump_height
     // $source_x = required source_width
     // $source_y = required source_height
     public function get_upload($files, $thump_x, $thump_y, $source_x, $source_y){
          if(is_uploaded_file($files['userfile']['tmp_name']) ){
               if(is_file($files['userfile']['tmp_name']) ){
                    $file_var['source'] = $this->create_thumb($files['userfile']['tmp_name'], $source_x, $source_y, $files['userfile']['type']);
                    $file_var['thumb'] = $this->create_thumb($files['userfile']['tmp_name'], $thump_x, $thump_y, $files['userfile']['type']);
                    $file_var['size'] = $files['userfile']['size'];
                    $file_var['type'] = $files['userfile']['type'];
                    return($file_var);
               }else{
                    return(false);
               }
          }else{
               return(false);
          }
     }



     // Create a new thumbed image cropping source and thump
     // $source = Image Source
     // $type = Image Type from the Files superglobal
     // $new_x = New image Width
     // $new_y = New image Height
     public function create_thumb($source, $new_x, $new_y, $type){
          // Start Output Buffering //
          ob_start();
          
          // Create a source pointer
               switch($type){
                    case "image/jpeg" :
                         $pointer = ImageCreateFromJpeg($source);
                         $trigger = "1";
                         break;
                    case "image/pjpeg" :
                         $pointer = ImageCreateFromJpeg($source);
                         $trigger = "1";
                         break;
                    case "image/png" :
                         $pointer = ImageCreateFromPng($source);
                         $trigger = "1";
                         break;
                    case "image/xpng" :
                         $pointer = ImageCreateFromPng($source);
                         $trigger = "1";
                         break;
                    case "image/gif" :
                         $pointer = imagecreatefromgif($source);
                         $trigger = "2";
                         break;     
               }
          
          if($trigger = "1"){
               $old_x = imageSX($pointer);
               $old_y = imageSY($pointer);
          
               // Compute size //
               $size = $this->calc_dim($old_x, $old_y, $new_x, $new_y);
               
               if($thump_canvas = ImageCreateTrueColor($size['width'], $size['height'])){
                    if(ImageCopyResampled($thump_canvas, $pointer, 0, 0, 0, 0, $size['width'], $size['height'], $old_x, $old_y)){
                         Imagejpeg($thump_canvas, "", 100);
                         Imagedestroy($thump_canvas);
                         $source = ob_get_contents();
                         ob_end_clean();
                         $source = $this->convert_to_hex($source);
                         return($source);
                    }else{
                         return(false);
                    }
               }else{
                    return(false);
               }
          }else{     
               $old_x = imageSX($pointer);
               $old_y = imageSY($pointer);
               $size = compute_thump_size($old_x, $old_y, $new_x, $new_y);
          
               if($thump_canvas =imagecreatetruecolor($size['width'], $size['height'])){
                    $clr['red']=255;
                      $clr['green']=255;
                      $clr['blue']=255;
                      if($pallet =imagecolorallocate($thump_canvas, $clr['red'],$clr['green'],$clr['blue'])){
                      imagefill($thump_canvas,0,0,$pallet);
                           if(ImageCopyResampled($thump_canvas, $pointer, 0, 0, 0, 0, $size['width'], $size['height'], $old_x, $old_y)){
                                   Imagejpeg($thump_canvas, "", 100);
                                   Imagedestroy($thump_canvas);
                                   $source = ob_get_contents();
                                   ob_end_clean();
                                   $source = $this->convert_to_hex($source);
                                   return($source);
                         }else{
                              return(false);
                         }
                      }else{
                           return(false);
                      }
               }else{
                    return(false);
               }
          }     
     }




     // Create Hex code from binairy source //
     public function convert_to_hex($source){
          // Little pass on by rabiddog 
          // The inserted hex in the blob will be converted to binairy by mysql
          // So the read out should be fine :D
          if($imageHex = "0x" . bin2hex($source)){
               return($imageHex);
          }else{
               return(false);
          }
     }



} // end Class

?>
