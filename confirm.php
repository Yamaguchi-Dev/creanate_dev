<?php
require_once("form.php");
if ($form_mode == 'confirm') {
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>お問い合わせフォーム（入力確認）</title>

	<meta name="robots" content="INDEX,FOLLOW">

<script type="text/javascript">
<!--
function goNext()
{
    document.getElementById('regist_btn').disabled = true;
    document.form1.submit();
}

function goBack()
{
    document.form1.action = "form.php";
    document.getElementById("form_mode").value = "input";
    document.form1.submit();
}

function dummy()
{
}
-->
</script>
</head>
<body>
			<h2 class="heading02">お問い合わせフォーム</h2>
			<form action="done.php" name="form1" method="post">
			<input type="hidden" name="form_mode" id="form_mode" value="done" />
			<input type="hidden" name="token" value="<?php echo output_data($token); ?>" />
<?php foreach ($input as $key1 => $value1) { ?>
<?php if (is_array($value1)) { ?>
<?php foreach ($value1 as $key2 => $value2) { ?>
<input type="hidden" name="input[<?php echo output_data($key1); ?>][<?php echo output_data($key2); ?>]" value="<?php echo output_data($value2); ?>" />
<?php } ?>
<?php } else { ?>
<input type="hidden" name="input[<?php echo output_data($key1); ?>]" value="<?php echo output_data($value1); ?>" />
<?php } ?>
<?php } ?>
御社名
<?php echo output_data($data["company"]); ?>
<br>
担当者名
<?php echo output_data($data["name"]); ?>
<br>
ふりがな
<?php echo output_data($data["kana"]); ?>
<br>
電話番号
<?php echo output_data($data["tel"]); ?>
<br>
メールアドレス（半角）
<?php echo output_data($data["email"]); ?>
<br>
お問い合わせ内容
<?php echo nl2br(output_data($data["message"])); ?>
				<div class="btn_area">
				<p>上記内容でよろしければ、下記の送信ボタンを押してください。</p>
				<div class="col2wrap">
					<button class="btn_radius is_back" onclick="javascript:goBack(); return false;"><div>戻る</div></button>
					<button class="btn_radius" id="regist_btn" onclick="javascript:goNext(); return false;"><div>送信</div></button>
				</div>
				</div>
				
			</form>
</body>
</html>
<?php
}
?>
