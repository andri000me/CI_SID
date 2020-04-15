<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('resizecrop_image'))
{		
	function resizecrop_image($ImageFile,$quality){
		############ Configuration ##############
		$thumb_square_size 		= 100; //Thumbnails will be cropped to 200x200 pixels
		$max_image_size 		= 300; //Maximum image size (height and width)
		$thumb_prefix			= "thumb_"; //Normal thumb Prefix
		$destination_folder		= "__temp/"; //upload directory ends with / (slash)
		$thumb_folder			= "thumb/"; //upload thumbaldirectory ends with / (slash)
		$jpeg_quality 			= $quality; //jpeg quality
		#########################################
		$CI =& get_instance();
		$npm = $CI->session->userdata('cmbsii_set_npm');
		
		$image_name = $ImageFile['name']; //file name
		$image_size = $ImageFile['size']; //file size
		$image_temp = $ImageFile['tmp_name']; //file temp
	
		$image_size_info 	= getimagesize($image_temp); //get image size
		
		if($image_size_info){
			$image_width = $image_size_info[0]; //image width
			$image_height = $image_size_info[1]; //image height
			$image_type = $image_size_info['mime']; //image type
		}else{
			$new_file_name = false;
		}
		
		switch($image_type){
			case 'image/png':
				$image_res =  imagecreatefrompng($image_temp); break;
			case 'image/gif':
				$image_res =  imagecreatefromgif($image_temp); break;			
			case 'image/jpeg': case 'image/pjpeg':
				$image_res = imagecreatefromjpeg($image_temp); break;
			default:
				$image_res = false;
		}
		
		if($image_res){
			//Get file extension and name to construct new file name 
			$image_info = pathinfo($image_name);
			$image_extension = strtolower($image_info["extension"]); //image extension
			$image_name_only = strtolower($image_info["filename"]);//file name only, no extension
			
			//create a random name for new image (Eg: fileName_293749.jpg) ;
			$new_file_name = 'cmbsii_img_'. $npm . '_' .  rand(0, 9999999999) . '.' . $image_extension;
			
			//folder path to save resized images and thumbnails
			$thumb_save_folder 	= $destination_folder . $thumb_folder . $thumb_prefix . $new_file_name; 
			$image_save_folder 	= $destination_folder . $new_file_name;
			
			//call normal_resize_image() function to proportionally resize image
			if(normal_resize_image($image_res, $image_save_folder, $image_type, $max_image_size, $image_width, $image_height, $jpeg_quality))
			{
				//call crop_image_square() function to create square thumbnails
				if(!crop_image_square($image_res, $thumb_save_folder, $image_type, $thumb_square_size, $image_width, $image_height, $jpeg_quality))
				{
					$new_file_name = false;
				}
				
				//Message when success upload->Grasm
				echo 's|<img src="'.base_url($image_save_folder).'" alt="..." class="img-usr img-thumbnail">|'.$new_file_name;
			}
			
			imagedestroy($image_res); //freeup memory
		}else exit('e|Info!|Format File Tidak Benar! Hanya JPEG/GIF/PNG');	
	}
}


if ( ! function_exists('normal_resize_image'))
{	
	function normal_resize_image($source, $destination, $image_type, $max_size, $image_width, $image_height, $quality){
		
		if($image_width <= 0 || $image_height <= 0){return false;} //return false if nothing to resize
		
		//do not resize if image is smaller than max size
		if($image_width <= $max_size && $image_height <= $max_size){
			if(save_image($source, $destination, $image_type, $quality)){
	
				return true;
			}
		}
		
		//Construct a proportional size of new image
		$image_scale	= min($max_size/$image_width, $max_size/$image_height);
		$new_width		= ceil($image_scale * $image_width);
		$new_height		= ceil($image_scale * $image_height);
		
		$new_canvas		= imagecreatetruecolor( $new_width, $new_height ); //Create a new true color image
		
		//Copy and resize part of an image with resampling
		if(imagecopyresampled($new_canvas, $source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height)){
			save_image($new_canvas, $destination, $image_type, $quality); //save resized image
		}
	
		return true;
	}
}


if ( ! function_exists('crop_image_square'))
{	
	function crop_image_square($source, $destination, $image_type, $square_size, $image_width, $image_height, $quality){
		if($image_width <= 0 || $image_height <= 0){return false;} //return false if nothing to resize
		
		if( $image_width > $image_height )
		{
			$y_offset = 0;
			$x_offset = ($image_width - $image_height) / 2;
			$s_size 	= $image_width - ($x_offset * 2);
		}else{
			$x_offset = 0;
			$y_offset = ($image_height - $image_width) / 2;
			$s_size = $image_height - ($y_offset * 2);
		}
		$new_canvas	= imagecreatetruecolor( $square_size, $square_size); //Create a new true color image
		
		//Copy and resize part of an image with resampling
		if(imagecopyresampled($new_canvas, $source, 0, 0, $x_offset, $y_offset, $square_size, $square_size, $s_size, $s_size)){
			save_image($new_canvas, $destination, $image_type, $quality);
		}
	
		return true;
	}
}

if ( ! function_exists('save_image'))
{
	function save_image($source, $destination, $image_type, $quality){
		switch(strtolower($image_type)){//determine mime type
			case 'image/png': 
				imagepng($source, $destination); return true; //save png file
				break;
			case 'image/gif': 
				imagegif($source, $destination); return true; //save gif file
				break;          
			case 'image/jpeg': case 'image/pjpeg': 
				imagejpeg($source, $destination, $quality); return true; //save jpeg file
				break;
			default: return false;
		}
	}
}