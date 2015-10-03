<?php

namespace Api\Controller;

use Think\Controller;

class MailController extends BaseController {            
    function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @param string $to          收件人
     * @param string $subject     邮件主题
     * @param string $content     邮件内容
     */
    function sendmail($to, $subject, $content) {
        $mailConfig = C('mail');
        $result = array();
        
        Vendor("Phpmailer.phpmailer#class");
        $mail = new \PHPMailer();                               //实例化
        $mail->IsSMTP();                                        // 启用SMTP
        $mail->SMTPAuth     = $mailConfig['MAIL_SMTPAUTH'];     //启用smtp认证
        $mail->Host         = $mailConfig['MAIL_HOST'];         //smtp服务器的名称（这里以126邮箱为例）
        $mail->Username     = $mailConfig['MAIL_USERNAME'];     //你的邮箱名
        $mail->Password     = $mailConfig['MAIL_PASSWORD'];     //邮箱密码
        $mail->Port         = $mailConfig['MAIL_PORT'];         //端口号
        $mail->CharSet      = $mailConfig['MAIL_CHARSET'];      //设置邮件编码
        $mail->From         = $mailConfig['MAIL_FROM'];         //发件人地址（也就是你的邮箱地址）
        $mail->FromName     = $mailConfig['MAIL_FROMNAME'];     //发件人姓名
        $mail->AddAddress($to, "name");
        $mail->WordWrap     = $mailConfig['MAIL_LENGTH'];       //设置每行字符长度
        $mail->IsHTML($mailConfig['MAIL_ISHTML']);              // 是否HTML格式邮件
        $mail->Subject      = $subject;                         //邮件主题
        $mail->Body         = $content;                         //邮件内容
        $mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //邮件正文不支持HTML的备用显示
        if (!$mail->Send()) {
            $result['error']    = '10001';
            $result['msg']      = $mail->ErrorInfo;
        } else {
            $result['error']    = '0';
            $result['msg']      = "Message has been sent";
        }
        return $result;
    }
}
