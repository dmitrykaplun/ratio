<?РНР
require ( $ _SERVER ["DOCUMENT_ROOT"]. "/bitrix / modules / main / include/prolog_before.php");
требуется ("класс / resenderforgotproducts / resenderforgotproducts.php");
//рассылка писем

ReSenderForgotProducts :: выполнить();
Эхо  'ок, все сообщения электронной почты отправить'; 