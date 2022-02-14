<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>お問い合わせフォーム（入力）</title>

	<meta name="robots" content="INDEX,FOLLOW">

</head>
<body>
<form action="confirm.php" method="post">
<input type="hidden" name="form_mode" value="confirm" />
御社名
<input type="text" name="input[company]" value="<?php echo output_data($input["company"]); ?>">
<?php if (!cempty($error_message["company"])) { ?>
								<p class="txt_error"><?php echo output_data($error_message["company"]); ?></p>
<?php } ?>
<br>
担当者名
<input type="text" name="input[name]" value="<?php echo output_data($input["name"]); ?>">
<?php if (!cempty($error_message["name"])) { ?>
								<p class="txt_error"><?php echo output_data($error_message["name"]); ?></p>
<?php } ?>
<br>
ふりがな
<input type="text" name="input[kana]" value="<?php echo output_data($input["kana"]); ?>">
<?php if (!cempty($error_message["kana"])) { ?>
								<p class="txt_error"><?php echo output_data($error_message["kana"]); ?></p>
<?php } ?>
<br>
電話番号
<input type="text" name="input[tel]" value="<?php echo output_data($input["tel"]); ?>">
<?php if (!cempty($error_message["tel"])) { ?>
								<p class="txt_error"><?php echo output_data($error_message["kana"]); ?></p>
<?php } ?>
<br>
メールアドレス（半角）
<input type="text" name="input[email]" value="<?php echo output_data($input["email"]); ?>">
<?php if (!cempty($error_message["email"])) { ?>
								<p class="txt_error"><?php echo output_data($error_message["email"]); ?></p>
<?php } ?>
<br>
メールアドレス確認（半角）
<input type="text" name="input[email_conf]" value="<?php echo output_data($input["email_conf"]); ?>">
<?php if (!cempty($error_message["email_conf"])) { ?>
								<p class="txt_error"><?php echo output_data($error_message["email_conf"]); ?></p>
<?php } ?>
<br>
お問い合わせ内容
<textarea name="input[message]" id="#" cols="30" rows="10"><?php echo output_data($input["message"]); ?></textarea>
<?php if (!cempty($error_message["message"])) { ?>
								<p class="txt_error"><?php echo output_data($error_message["message"]); ?></p>
<?php } ?>
<button class="btn_radius"><div>確認画面へ</div></button>
			</form>
</body>
</html>
