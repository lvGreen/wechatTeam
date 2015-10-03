<?php

namespace Store\Service;

use Think\Controller;

class UpimgService extends Controller {

    /**
     * 
     * @param array $fileArray
     */
    public function upImg($fileArray) {
        $date = date("Ymd");
        $uploadImgDir = C('uploadPath') . $_SESSION['unique_code'] . '/';
        if (!is_dir($uploadImgDir)) {
            mkdir($uploadImgDir);
        }
        $uploadImgDir .= $date . '/';
        if (!is_dir($uploadImgDir)) {
            mkdir($uploadImgDir);
        }
        
        $uploadImgMaxSize = C('allowedUploadSize');
        if ($fileArray['size'] >= $uploadImgMaxSize) {
            $this->error('上传图片不能大于4M');
            exit;
        }

        $uploadImg = C('allowedUploadImg');
        
        if (in_array($fileArray['type'], $uploadImg)) {
            $file = explode('/', $fileArray['type']);
            $fileName = time() . '.' . array_pop($file);
            $filePath = $uploadImgDir . $fileName;
            $savePath = $date . '/' . $fileName;
        } else {
            $this->error('文件格式不对！');
            exit;
        }

        $result = move_uploaded_file($fileArray['tmp_name'], $filePath);
        if ($result) {
            return $savePath;
        } else {
            $this->error('文件上传失败！');
            exit;
        }
    }

}
