# plearnu-online
Like watching movies do a movie information stand

Project depends on the yaf3 php7, nginx, mongo
Project goals, can in the configuration on the low side of stable and rapid operation of the system

Basic data fetching in python3

<hr/>
<h4>表单验证</h4>
<p>表单验证利用的工厂模式设计出来的。只需要传入一个表单类型名字，之后调用验证方法就可以实现，验证数据类型，是否有默认值，错误返回的信息。</p>
<p>$userSignUpForm = new Form('user_sign_up_form');</p>
<p>$userSignUpForm->validation();</p>
