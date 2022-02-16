<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>お問い合わせフォーム（入力）</title>

	<meta name="robots" content="INDEX,FOLLOW">
<script> 
  var verifyCallback = function(response) { //コールバック関数の定義
    //#warning の p 要素のテキストを空にf
    document.getElementById("warning").textContent = '';
    //#send の button 要素の disabled 属性を解除
    document.getElementById("send").disabled = false;
  };
  var expiredCallback = function() { //コールバック関数の定義
    //#warning の p 要素のテキストに文字列を設定
    document.getElementById("warning").textContent = '送信するにはチェックを・・・';
    //#send の button 要素に disabled 属性を設定
    document.getElementById("send").disabled = true;
  };
</script>
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
								<p class="txt_error"><?php echo output_data($error_message["tel"]); ?></p>
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
    <div class="g-recaptcha" data-sitekey="6LexlGgeAAAAADfanQWBiB_Ix6ZjalBs598JQHFQ" data-callback="verifyCallback" data-expired-callback="expiredCallback"></div>
    <p id="warning">送信するにはチェックを入れてください。</p>
<button class="btn_radius" id="send" disabled><div>確認画面へ</div></button>
			</form>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
