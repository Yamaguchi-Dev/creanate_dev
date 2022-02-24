<?php
require_once("form.php");
if ($form_mode == 'confirm') {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=shift_jis" />
<meta name="viewport" content="width=device-width">
<meta name="description" content="ますます快適性と安全性が求められている住空間。クレアネイト株式会社では最新鋭の設備を有しており、環境に配慮された原材料を使用し、建築基準、防火壁装内装制限等をクリアした各種壁紙を提供しています。これからもユーザーニーズを先取りするとともに、センスあふれる製品の開発に努めてまいります。" />
<meta name="keywords" content="ビニル壁紙, 塩化ビニル壁紙, 壁紙, 壁装材, 内装材, 内装材製造, 壁紙製造メーカー, 製造メーカー, PVCベース, グラビアエンボス製品, グラビアエンボス, ロータリー製品, ロータリー, 機能性製品, 機能性壁紙, 消臭壁紙, 吸放湿壁紙, 結露防止, 調湿, 汚れ防止壁紙, マイナスイオン壁紙, マイナスイオン防塵壁紙, 防塵, グラビア印刷, グラビヤ印刷, リフォーム, インテリア" />
<title>お問い合わせ｜クレアネイト株式会社</title>
<link rel="stylesheet" type="text/css" href="common/css/import.css" media="all" />
<link rel="stylesheet" type="text/css"  href="css/etc.css" media="all" />
<script type="text/javascript" src="../common/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="common/js/heightLine.js"></script>
<script type="text/javascript" src="common/js/common.js"></script>
<!--[if IE 6]>
<script src="common/js/DD_belatedPNG.js"></script>
<script>
DD_belatedPNG.fix('*');
</script>
<![endif]-->
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

<body id="contact" class="second">
<a name="pagetop" id="pagetop"></a>
<div id="wrapper">
<!---------- Header ---------->
<div id="header">
  <h1><a href="index.html"><img src="common/images/h1-logo.jpg" alt="クレアネイト株式会社" /></a></h1>
  <nav id="gl-menu_sp">
  </nav>
</div>
<!---------- Header End ---------->
<!---------- Global menu ---------->
<hr />
<div id="gl-menu">
</div>
<hr />
<!---------- Global menu End ---------->
<!---------- Category title ---------->
<div id="category_tit">
<h2><span>お問い合わせ</span></h2>
</div>
<!---------- Category title End ---------->
<!---------- Contents ---------->
<div id="sec-contents">
<p class="pankuzu"><a href="index.html">ホｰム</a>&nbsp;&gt;&nbsp;お問い合わせ</p>
<div id="contact-main">
<div class="h3_area"><h3 class="h301">入力内容の確認</h3></div>
<!-- お問い合わせ -->
<p class="lead">この内容でよろしければ「送信」を押してください。</p>
<div class="form-area confirmation">
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
	<dl>
		<dt>御社名</dt>
		<dd><?php echo output_data($data["company"]); ?></dd>
	</dl>
	<dl>
		<dt>ご担当者名</dt>
		<dd><?php echo output_data($data["name"]); ?></dd>
	</dl>
	<dl>
		<dt>ご担当者名（ふりがな）</dt>
		<dd><?php echo output_data($data["kana"]); ?></dd>
	</dl>
	<dl>
		<dt>お電話番号</dt>
		<dd><?php echo output_data($data["tel"]); ?></dd>
	</dl>
	<dl>
		<dt>メールアドレス</dt>
		<dd><?php echo output_data($data["email"]); ?></dd>
	</dl>
	<dl>
		<dt>メールアドレス（確認）</dt>
		<dd><?php echo output_data($data["email_conf"]); ?></dd>
	</dl>
	<dl>
		<dt>お問い合わせ内容</dt>
		<dd><?php echo nl2br(output_data($data["message"])); ?></dd>
	</dl>
	
	<div class="supp-box">
		<p>お問い合わせへの回答は原則として上記に入力されたメールアドレス宛に送付させていただきます。</p>
		<p>お問い合わせは随時お受けしておりますが、土･日･祝日、年末年始などの特別休業日に頂いたお問合せは翌営業日以降の回答とさせていただきます。<br>また、お問い合わせの内容によっては、回答までお時間をいただく場合や、回答いたしかねる場合がありますのであらかじめご了承下さい。</p>
	</div>
	
	<ul class="btn-col">
		<li class="form-btn arrow-l"><input class="contact-back is_back" type="button" value="戻る" onclick="javascript:goBack(); return false;"/></li>
		<li class="form-btn arrow-r"><input class="contact-submit" id="regist_btn" type="submit" value="確認" onclick="javascript:goNext(); return false;"/></li>
	</ul>
</form>
</div>	
	
	
<!-- お問い合わせ End -->
</div>
</div>
<!---------- Contents End ---------->
<!---------- Footer ---------->
<hr />
<div id="footer">
</div>
<!---------- Footer End ---------->
</div>
<div class="overlay"></div>
</body>
</html>
<?php
}
?>
