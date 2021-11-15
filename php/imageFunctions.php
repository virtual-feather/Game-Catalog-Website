<?php
<<<<<<< Updated upstream
=======

    function getImgName($imgDir) {
        return substr($imgDir, 21);
    }

>>>>>>> Stashed changes
    // Compress image
    // https://makitweb.com/how-to-compress-image-size-while-uploading-with-php/#php
    function compressImage($source, $destination, $quality) {

        $info = getimagesize($source);
    
        if ($info['mime'] == 'image/jpeg') 
            $image = imagecreatefromjpeg($source);
    
        elseif ($info['mime'] == 'image/gif') 
            $image = imagecreatefromgif($source);
    
        elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source);
    
        imagejpeg($image, $destination, $quality);
    
    }

    // Upload images
    // https://www.w3schools.com/php/php_file_upload.asp
<<<<<<< Updated upstream
    function uploadImage($targetDir, $imageFile) {
        $targetFile = $targetDir . basename($imageFile["name"]);
        $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
        //$imgName = $_FILES[$imageFileName]['name'];

        // Check if file already exists
        if (file_exists($targetFile)) {
=======
    function uploadImage($targetDir, $imageFile, $newImageName=NULL) {
        $targetFile = $targetDir . basename($imageFile["name"]);
        $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
        
        // For profiles
        if($newImageName != NULL)
            $targetFile = $targetDir . $newImageName . "." . $imageFileType;

        // Check if file already exists (FOR ADDING GAMES)
        if (file_exists($targetFile) && $newImageName == NULL) {
>>>>>>> Stashed changes
            echo "
                <script type='text/javascript'>
                    alert('A file with that name already exists. Please ensure the game being entered is not already in the database, or change the name of the file.')
                    window.location.href = '../addGametoDBForm.php';
                </script>";
        }

        // Compress image 
        compressImage($imageFile['tmp_name'], $targetFile, 60);

        // Allow certain file formats
<<<<<<< Updated upstream
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
=======
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $newImageName == NULL) {
>>>>>>> Stashed changes
            echo "
            <script type='text/javascript'>
                alert('File type not supported, please ensure it is either JPG, PNG, or JPEG.')
                window.location.href = '../addGametoDBForm.php';
            </script>";            
        }

<<<<<<< Updated upstream
=======
        elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "
            <script type='text/javascript'>
                alert('File type not supported, please ensure it is either JPG, PNG, or JPEG.')
                window.location.href = '../updateProfilePage.php';
            </script>";  
        }

>>>>>>> Stashed changes
        // Upload image to server
        if (move_uploaded_file($imageFile["tmp_name"], $targetFile)) {
            //echo "The file ". htmlspecialchars( basename( $_FILES["imgPath"]["name"])). " has been uploaded.";
            // Image uploaded successfully, continue the program.
        } 
        else {
<<<<<<< Updated upstream
            echo "
            <script type='text/javascript'>
                alert('There was a problem uploading the image. Please try again or notify a server MOD to fix this issue.')
                window.location.href = '../addGametoDBForm.php';
            </script>";  
        }

        return $imageFile["name"];
=======
            if($newImageName == NULL) {
                echo "
                <script type='text/javascript'>
                    alert('There was a problem uploading the image. Please try again or notify a server MOD to fix this issue.')
                    window.location.href = '../addGametoDBForm.php';
                </script>";  
            }
            else {
                throw new Exception("There was an issue uploading the image.");
            }
        }

        return $imageFile["name"];

>>>>>>> Stashed changes
    }
?>