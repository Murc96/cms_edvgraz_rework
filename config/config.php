<?php
const DEV_MODE = true;
const DOC_ROOT = '/public';
const ROOT_FOLDER= '/public';

$type = 'mysql';
$host = 'localhost';
$port = '3306';
$dbname = 'cms_edvgraz';
$user_name = 'cms_edvgraz';
$password = '';
$dsn = "$type:host=$host:$port;dbname=$dbname";

const MEDIA_TYPES = [ 'image/jpeg', 'image/png'];
const FILE_EXTENSIONS = ['jpg', 'jpeg', 'png'];
const MAX_FILE_SIZE = 1024*1024*2;
define("UPLOAD_DIR", dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . ROOT_FOLDER . DIRECTORY_SEPARATOR . 
        '/uploads');