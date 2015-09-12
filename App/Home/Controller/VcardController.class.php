<?php
namespace Home\Controller;
use Think\Controller;

class VcardController extends BaseController {
    
    public function index(){
        $this->display();
    }

    public function createVcard(){
        $name       = I('post.userName','0','string');
        $phone      = I('post.phone','0','string');
        $isMobile = check_str($phone,array('strtype'=>'mobile'));
        if(is_array($isMobile)){
            $this->ajaxReturn($isMobile);
            exit;
        }
        $company    = I('post.company','0','string');
        $option     = I('post.option','0','string');
        $email      = I('post.email','0','string');
        $note       = I('post.note','0','string');
        
        $str = '';
        $str = "BEGIN:VCARD\r\nFN:" . $name;
        $str .= "\r\nTEL;CELL:" . $phone;
        $str .= $this->_makeString($company,'ORG:');
        $str .= $this->_makeString($option,'ROLE:');
        $str .= $this->_makeString($email,'EMAIL;INTERNET:');
        $str .= $this->_makeString($note,'NOTE:');
        $str .= "\r\nEND:VCARD";
        
        /*
        if (!is_dir(APP_PATH . 'Upload')) {
            mkdir(APP_PATH . 'Upload');
        }
        
        if (!is_dir(APP_PATH . 'Upload/VisualCode')) {
            mkdir(APP_PATH . 'Upload/VisualCode');
        }
        if(!is_dir(C('DOWN_TEMP'))){
            mkdir(C('DOWN_TEMP'));
        }*/
        if (!is_dir(APP_PATH . 'Upload/VisualCode/'.date('Ym'))) {
            mkdir(APP_PATH . 'Upload/VisualCode/'.date('Ym'));
        }
        $tempfile = C('DOWN_TEMP').$_FILES['bgPhoto']['name'];
        copy($_FILES['bgPhoto']['tmp_name'],$tempfile);
        $outFileName = APP_PATH . 'Upload/VisualCode'.date('Ym').time().'.png';
        $dazzleCodeModel = A('Api2/DazzleCode');
        $dazzleCodeModel->createQrImg($str, $tempfile, $outFileName, 600, 600, 600, 600);
    }
    
    private function _makeString($data,$type){
        $str = '';
        if (is_array($data)) {
            foreach ($data as $key => $val) {
                $str .= "\r\n" . $type . $val;
            }
        } else {
            $str .= "\r\n" . $type . $data;
        }
        return $str;
    }
}