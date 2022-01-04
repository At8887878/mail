<?php

namespace app\campusAPI\controller;
use think\Controller;
use phpmailer\PHPMailer;



class Mail extends Controller
{
	//发送邮箱验证码
		public function email()
		{
			$toemail = '755772152@qq.com';//定义收件人的邮箱
 
			$mail = new PHPMailer();
			 
			$mail->isSMTP();// 使用SMTP服务
			$mail->CharSet = "utf8";// 编码格式为utf8
			$mail->Host = "smtp.qq.com";// 发送方的SMTP服务器地址
			$mail->SMTPAuth = true;// 是否使用身份验证
			$mail->Username = "755772152@qq.com";// 发送方的邮箱用户名，
			$mail->Password = "yhyzmultorcdbbjj";//发送方客户端的授权密码,而不是邮箱的登录密码！
			$mail->SMTPSecure = "ssl";// 使用ssl协议方式
			$mail->Port = 465;// 163邮箱的ssl协议方式端口号是465/994 qq邮箱的是465/587
			$mail->setFrom("755772152@qq.com","At");// 设置发件人信息，如邮件格式说明中的发件人，
			$mail->addAddress($toemail,'Wang');// 设置收件人信息，如邮件格式说明中的收件人，
			$mail->addReplyTo("755772152@qq.com","Reply");// 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址
			$mail->Subject = "At来了";// 邮件标题
			$mail->Body = "您的验证码为：10011";// 邮件正文内容
			if(!$mail->send()){// 发送邮件
				echo "Message could not be sent.";
				echo "Mailer Error: ".$mail->ErrorInfo;// 输出错误信息
			}else{
				echo '发送成功';
			}
						  
		}
}

?>