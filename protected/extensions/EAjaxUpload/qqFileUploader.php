<?php
/**
 * Handle file uploads via XMLHttpRequest
 */
class qqUploadedFileXhr {
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path, $file) {
        $input = fopen("php://input", "r");
        $temp = tmpfile();
        $realSize = stream_copy_to_stream($input, $temp);
        fclose($input);

        if ($realSize != $this->getSize()){
            return false;
        }


        $target = fopen($path.$file, "w");
        fseek($temp, 0, SEEK_SET);
        stream_copy_to_stream($temp, $target);
        fclose($target);

            // создать миниатюру
        $image = new SimpleImage();
        $image->load($path.$file);
        $image->resizeToHeight(200);
        $image->save($path.'small/small_'.$file);
                    ;

        return true;
    }
    function getName() {
        return $_GET['qqfile'];
    }
    function getSize() {
        if (isset($_SERVER["CONTENT_LENGTH"])){
            return (int)$_SERVER["CONTENT_LENGTH"];
        } else {
            throw new Exception('Getting content length is not supported.');
        }
    }
}

/**
 * Handle file uploads via regular form post (uses the $_FILES array)
 */
class qqUploadedFileForm {
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path, $file) {
            // сохраняем миниатюру]
            // создать миниатюру
         // if (!move_uploaded_file($_FILES['qqfile']['tmp_name'], $path.'small/small_'.$file)) {
         //     return false;
         // }
            // если всё нормально, то
            // сохраняем оригинальный файл
        if(!move_uploaded_file($_FILES['qqfile']['tmp_name'], $path.$file)){
            return false;
        }

          // создать миниатюру
        $image = new SimpleImage();
        $image->load($path.$file);
        $image->resize(400, 200);
        $image->save($path.'small/small_'.$file);

        return true;
    }


    function getName() {
        return $_FILES['qqfile']['name'];
    }
    function getSize() {
        return $_FILES['qqfile']['size'];
    }
}

class qqFileUploader {
    private $allowedExtensions = array();
    private $sizeLimit = 10485760;
    private $file;

    function __construct(array $allowedExtensions = array(), $sizeLimit = 10485760){
        $allowedExtensions = array_map("strtolower", $allowedExtensions);

        $this->allowedExtensions = $allowedExtensions;
        $this->sizeLimit = $sizeLimit;

        $this->checkServerSettings();

        if (isset($_GET['qqfile'])) {
            $this->file = new qqUploadedFileXhr();
        } elseif (isset($_FILES['qqfile'])) {
            $this->file = new qqUploadedFileForm();
        } else {
            $this->file = false;
        }
    }

    private function checkServerSettings(){
        $postSize = $this->toBytes(ini_get('post_max_size'));
        $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));

        if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit){
            $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';
            die("{'error':'Увеличьте post_max_size и upload_max_filesize до $size'}");
        }
    }

    private function toBytes($str){
        $val = trim($str);
        $last = strtolower($str[strlen($str)-1]);
        switch($last) {
            case 'g': $val *= 1024;
            case 'm': $val *= 1024;
            case 'k': $val *= 1024;
        }
        return $val;
    }

    /**
     * Returns array('success'=>true) or array('error'=>'error message')
     */
    function handleUpload($uploadDirectory, $replaceOldFile = FALSE){
        if (!is_writable($uploadDirectory)){
            return array('error' => "Ошибка сервера. Нет прав на запись в диреторию загрузки.");
        }

        if (!$this->file){
            return array('error' => 'Файл не был загружен.');
        }

        $size = $this->file->getSize();

        if ($size == 0) {
            return array('error' => 'Файл пустой');
        }

        if ($size > $this->sizeLimit) {
            return array('error' => 'Файл слишком большой');
        }

        $pathinfo = pathinfo($this->file->getName());
        $filename=preg_replace("/[^\w\x7F-\xFF\s]/i", "", $pathinfo['filename']);
        if(!isset($filename) or empty($filename)) $filename=uniqid();
        $ext = $pathinfo['extension'];

        if($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)){
            $these = implode(', ', $this->allowedExtensions);
            return array('error' => 'Неверный формат файла. Подходят следующие форматы: '. $these . '.');
        }

        if(!$replaceOldFile){
            /// don't overwrite previous files that were uploaded
            while (file_exists($uploadDirectory . $filename . '.' . $ext)) {
                $filename .= '_'.rand(10, 99);
            }
        }


        if ($this->file->save($uploadDirectory , $filename . '.' . $ext)){
            return array('success'=>true,'filename'=>$filename.'.'.$ext);
        } else {
                   // в случае ошибки
            return array('error'=> 'Не получилось загрузить файл.' .
                'Загрузка была отменена или на сервере произошла ошибка');
        }

    }
}


/*--------------------------------------------------------------*/
/*--------------------------------------------------------------*/
/*--------------------------------------------------------------*/
