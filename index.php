<pre>
<?php
error_reporting(0);
include_once 'load.php';

#### Folder Creation Properties #####
$folder_creating_path = $_SERVER['DOCUMENT_ROOT'].'/$_images_automated';
$nested_folder = ['cover', 'about', 'gallery'];

#### Folder List Properties #####
$dir = $_SERVER['DOCUMENT_ROOT']."/storage_unit";

#### ImageCompression Properties #####
$source = $_SERVER['DOCUMENT_ROOT']."/pressure/Autoclave/cover/Autoclave-cover.png";
$dest = $_SERVER['DOCUMENT_ROOT'].'/$_images_automated';
$quality = 20;


function getMenus(){
    $config_json = file_get_contents('../range/nav.json');
    $config = json_decode($config_json, true);
    return $config;
}

try{
    // $fcreate = new FCreate($folder_creating_path, $nested_folder, getMenus());
    $list_folder = new Folder_list($dir);
    // print_r($list_folder);
    // $image_compression = new ImgCompression($source, $dest, $quality);

}
catch(Exception $e){
    echo $e->getMessage();
}





// foreach ($iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::SELF_FIRST) as $item) {
//     // Note SELF_FIRST, so array keys are in place before values are pushed.
//         // echo $item."<br/>";
//         $subPath = $iterator->getSubPathName();
//         // echo $subPath."<br/>";
//             if($item->isDir()) {
//                 // Create a new array key of the current directory name.
//                 // $array[$subPath] = array();
//                 // echo $item;
//                 $path = explode("/", $item);
//                 // $path2 = explode("\\", $path[count($path)-1]);
//                 mkdir($dest."/".$path[count($path)-1]);
//                 $target = scandir($dest);

//                 // foreach($path2 as $sub){
//                 //    foreach($target as $trgt){
//                 //     if($trgt != $sub){
//                 //         mkdir($dest."/".$sub);
//                 //     }
//                 //     else{
//                 //         echo "Folder Already Exists ...<br/>";
//                 //     }
//                 //    }
//                 // }
//                 // mkdir($dest."/".$path[count($path)-1]);
//                 // echo "Done ...";
//             }
//             else {
//                 // Add a new element to the array of the current file name.
//                 // $array[$subPath][] = $subPath;
//                 $file = explode("/", $item);
//                 copy($item, $dest."/".$file[count($file)-1]);
//                 echo $dest."/".$file[count($file)-1]."<br/>";
//             }
//     }















// $projectName = "range";
// $dir = $_SERVER['DOCUMENT_ROOT']."/pressure";
// // $dest = $_SERVER['DOCUMENT_ROOT']."/$_images_automated";

// function compressImage($source, $destination, $quality) { 

//     // echo $source;
//     $name = explode("/", $source);
//     print_r($name);
//     $format = explode(".", $name[count($name)-1]);

//     echo $format[0]."<br/>";


//     // Get image info 
//     $imgInfo = getimagesize($source); 
//     $mime = $imgInfo['mime']; 

//     // Create a new image from file 
//     switch($mime){ 
//         case 'image/jpeg': 
//             $image = imagecreatefromjpeg($source);
//             break; 
//         case 'image/png': 
//             $image = imagecreatefrompng($source); 
//             break; 
//         case 'image/gif': 
//             $image = imagecreatefromgif($source); 
//             break; 
//         case 'image/jpg': 
//             $image = imagecreatefromjpg($source); 
//             break; 
//         default: 
//             $image = imagecreatefromjpeg($source); 
//     } 
     
//     // Save image 

//     // if(!imagejpeg($image, $destination."/".$name[count($name)-1], $quality)){
//     //     throw new Exception("Image Compression Something wromg ...");
//     // }

//     // Return compressed image 
//     return $destination; 
// }



// // function getFiles($path){
// //     $fName = array();
// //     $folders = scandir($path);
// //     foreach($folders as $files){
// //         if($files != "." and $files != ".."){
// //             if(count($files)){
// //                 $fName[] = $files;
// //             }
// //             else{
// //                 throw new Exception("File or Folder Not Here ...");
// //             }
// //         }
// //     }
// //     return $fName;
// // }

// // function compressImg($src, $dest, $qulity){
// //     if(preg_match("/\.(gif|png|jpg)$/", $src)){
// //         if(compressImage($src, $dest, $qulity)){
// //             if(unlink($src)){
// //                 return "All Of Done";
// //             }
// //             else{
// //                 throw new Exception("Unlink File Something Wrong Pls Check");
// //             }
// //         }
// //         else{
// //             throw new Exception("Image Compression Process Something wrong...");
// //         }
// //     }
// //     else{
// //         throw new Exception("File Not a Image Format pls Check");
// //     }
// // }

// function createFolder($path, $nested){
//     $menus = getMenus();
//     $flag = 0;
//     $dir = scandir($path);

//     foreach($menus as $key => $val){
//         foreach($dir as $folder){
//             if($folder == $key){
//                 if(is_dir($folder)){
//                     foreach($val as $value){
//                         $subFolder = strtolower(str_replace(" ", "-", $value));
//                         mkdir($path."/".$folder."/".$subFolder);
//                         if(is_dir($path."/".$folder."/".$subFolder)){
//                             foreach($nested as $nstfolder){

//                                 mkdir($path."/".$folder."/".$subFolder."/".$nstfolder);
//                                 $flag = 1;
//                             }
//                         }
//                         else{
//                             throw new Exception("Is Not a Folder");
//                         }
                    
//                     }
//                 }
//                 else{
//                     throw new Exception("Is Not a Folder");
//                 }
//             }
//             else{
//                 mkdir($key);
//             }
//         }
//     }
//     if($flag == 1){
//         echo "Folders Created Done ...";
//     }
// }

// function listFolderFiles($dir){
//     $ffs = scandir($dir);

//     unset($ffs[array_search('.', $ffs, true)]);
//     unset($ffs[array_search('..', $ffs, true)]);

//     // prevent empty ordered elements
//     if (count($ffs) < 1)
//         return;

//     // echo '<ol>';
//     foreach($ffs as $ff){
//         // echo '<li>';
//         if(is_dir($dir.'/'.$ff)){
//             listFolderFiles($dir.'/'.$ff);
//         }        
//         elseif(is_file($dir.'/'.$ff)){
//             if(preg_match("/\.(gif|png|jpg|jpeg)$/", $dir.'/'.$ff)){
//                 if(compressImage($dir.'/'.$ff, $_SERVER['DOCUMENT_ROOT']."/$_images_automated", 20)){
//                     // echo "Done ...<br/>";
//                 }
//                 else{
//                     throw new Excrption("Image Compression Something Wrongs ...");
//                 }
//             }
//             else{
//                 throw new Exception("File Not Image Formate pls Check ...");
//             }
//         }
//         // echo '</li>';
//     }
//     // echo '</ol>';
// }



// try{
//     // createFolder(".", ['cover', 'body', 'gallery']);
//     listFolderFiles($dir);    
// }
// catch(Exception $e){
//     echo $e->getMessage();
// }

// function nstFolder($folder){
//     $files = scandir($folder);
//     $dest = $_SERVER['DOCUMENT_ROOT']."/output-folder";

//     foreach($files as $file){
//         if($file != "." and $file != ".."){
//             if(count($file) > 0){
//                 if(filetype($folder."/".$file) == "dir"){
//                     if(nstFolder($folder."/".$file)){
//                         throw new Exception("Directory Itrative Somethig Wrong");
//                     }
//                     else{
//                         if(compressImage($folder."/".$file, $dest, 20)){
//                         echo "Done";
//                         }
//                         else{
//                             echo "Fail";
//                         }
//                     }
//                 }
//                 else{   
//                     // echo "1ST FILE $file<br/>";
//                 }
//             }
//             else{
//                 throw new Exception("$folder No More Files Here");
//             }
//         }

//     }
//     echo "<br/>===============================<br/>";

// }


?>
</pre>

