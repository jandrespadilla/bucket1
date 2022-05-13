<?php
require_once './vendor/autoload.php';

use Aws\S3\S3Client;
use Awd\Exception\S3Exception;


if (isset($_FILE['file'])) {
    s3_upload_put_object($_FILE['file']);
}

function s3_upload_put_object($file){

    $option = [
        'region' => 'us-west-2',
        'version' => '2006-03-01',
        'credential' => [
            'key' => '',
            'secret' => '',
        ]

        ];

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