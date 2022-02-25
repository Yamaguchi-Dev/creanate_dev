<?php
function get_user_mail_data($input)
{
$mail_data_arr = array();
$mail_data_arr["to"] = $input["email"];
$mail_data_arr["subject"] = "【クレアネイト株式会社】お問い合わせを受け付けました。";
$headers = "From: クレアネイト株式会社 お問い合わせ窓口<do_not_reply@creanate.co.jp>";

$mail_data_arr["headers"] = $headers;

$mail_data_arr["body"] =
output_data($input["name"])."様


この度はクレアネイト株式会社にお問い合わせ頂き、誠にありがとうございます。
下記の内容にて承りましたのでご連絡申し上げます。

担当者より折り返しご連絡させて頂きますので、今しばらくお待ちくださいませ。

【 御社名 】
".output_data($input["company"])."

【 ご担当者名 】
".output_data($input["name"])."

【 ご担当者名（ふりがな） 】
".output_data($input["kana"])."

【 お電話番号 】
".output_data($input["tel"])."

【 メールアドレス 】
".output_data($input["email"])."

【 お問い合わせ内容 】
".$input["message"]."


なお、お急ぎの場合であれば、お手数をお掛けしますが、
下記まで直接お電話を頂けますと幸いです。

TEL：03-3474-1580


今後とも、クレアネイト株式会社をご愛顧の程、よろしくお願い申し上げます。


/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/ _/_/_/ _/
クレアネイト株式会社（CREANATE Inc.）

〒140-8611
東京都品川区東品川3-20-17(株式会社サンゲツ東京支社内)
TEL：03-3474-1580
FAX：03-3474-1581
http://www.creanate.co.jp/
/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/_/ _/_/_/_/_/

";

return $mail_data_arr;
}
