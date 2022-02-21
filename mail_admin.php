<?php
function get_admin_mail_data($input)
{
$mail_data_arr = array();
$mail_data_arr["to"] = "horibe@favor.co.jp";
//$mail_data_arr["to"] = "kei.yamaguchi.0104@gmail.com";
//$mail_data_arr["to"] = "inquiry@creanate.co.jp";
$mail_data_arr["subject"] = "クレアネイト株式会社お問い合わせフォームより";
$headers = "From: クレアネイト株式会社 お問い合わせフォーム<inquiry@creanate.co.jp>";

$mail_data_arr["headers"] = $headers;

$mail_data_arr["body"] =
"
クレアネイト株式会社お問い合わせフォーム受付

下記、問い合わせ内容となります。

------------------------------------

【 会社名 】
".output_data($input["company"])."

【 ご担当者名 】
".output_data($input["name"])."

【 担当者名（ふりがな） 】
".output_data($input["kana"])."

【 お電話番号 】
".output_data($input["tel"])."

【 メールアドレス 】
".output_data($input["email"])."

【 お問い合わせ内容 】
".$input["message"]."

------------------------------------

※このメールは クレアネイト株式会社 のお問い合わせフォームから送信されました
";

return $mail_data_arr;
}
