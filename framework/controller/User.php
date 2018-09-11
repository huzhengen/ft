<?php
namespace FangFrame\Controller;

class User {
    public function login(){
        $data['title'] = "用户登录";
        // echo get_render_content($data);
        render($data);
    }

    public function login_check(){
        $email = trim(v('email'));
        $password = trim(v('password'));

        if(strlen($email) < 1) e("邮箱地址不能为空");
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) e("邮箱地址错误");
        if(mb_strlen($password) < 6) e("密码不能短于6个字符");
        if(mb_strlen($password) > 12) e("密码不能长于12个字符");

        if( $user_list = get_data("SELECT * FROM `user` WHERE `email`=? LIMIT 1", [$email]) ){
            $user = $user_list[0];
        }
       
        if(!password_verify($password, $user['password'])){
            e($user . "错误的邮箱或者密码");
        }

        session_start();
        $_SESSION['email'] = $eamil;
        $_SESSION['uid'] = $user['id'];

        die("用户登录成功<script>location='resume_list.php'</script>");
    }
}