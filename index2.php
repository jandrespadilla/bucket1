<?php
require_once './vendor/autoload.php';

use Aws\S3\S3Client;
use Awd\S3\Exception\S3Exception;

if (isset($_FILES['file'])) {
  
    
    s3_upload_put_object($_FILES['file']);
} 
function s3_upload_put_object($file){

    $option = [
        'region' => 'us-east-1',
        'version' => '2006-03-01',
        'credentials' => [
            'key' => '',
            'secret' => '',
        ]

        ];
        $file_name = $file['name'];
        $file_path = $file['tmp_name'];
        try {
            $s3Client = new S3Client($option);
            $result = $s3Client->putObject([
                    'Bucket' => 'bucket1-test-siam',
                    'Key' => 'abc/'.$file_name,
                    'SourceFile' => $file_path

            ]);
            echo "<pre>".print_r($result)."</pre>";
        } catch (S3Exception $e) {
            echo "<pre>".print_r($e)."</pre>";
             echo $e->getMessage().'\n';
        }
}
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload S3
    </title>
</head>
<body>
    <form action="" method='post' enctype='multipart/form-data' >
        <label for="file"> Subir archivo</label>
        <input type="file" name='file' id='file'>
        <button type='submit'> Subir archivo </button>
    </form>
   
</body>
</html>
