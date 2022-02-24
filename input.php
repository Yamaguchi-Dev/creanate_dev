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
<div class="h3_area"><h3 class="h301">お問い合わせ</h3></div>
<!-- お問い合わせ -->
<p class="lead">各種お問い合わせにつきましては、下記フォームに必要情報をご入力いただき、ご送信ください。</p>
<div class="form-area">
<form action="confirm.php" method="post">
<input type="hidden" name="form_mode" value="confirm" />
	<dl>
		<dt>御社名<span class="required">必須</span></dt>
		<dd><input type="text" name="input[company]" class="form-txt" value="<?php echo output_data($input["company"]); ?>"><?php if (!cempty($error_message["company"])) { ?><span class="error"><?php echo output_data($error_message["company"]); ?></span><?php } ?></dd>
	</dl>
	<dl>
		<dt>ご担当者名<span class="required">必須</span></dt>
		<dd><input type="text" name="input[name]" class="form-txt" value="<?php echo output_data($input["name"]); ?>"><?php if (!cempty($error_message["name"])) { ?><span class="error"><?php echo output_data($error_message["name"]); ?></span><?php } ?></dd>
	</dl>
	<dl>
		<dt>ご担当者名（ふりがな）<span class="required">必須</span></dt>
		<dd><input type="text" name="input[kana]" class="form-txt" value="<?php echo output_data($input["kana"]); ?>"><?php if (!cempty($error_message["kana"])) { ?><span class="error"><?php echo output_data($error_message["kana"]); ?></span><?php } ?></dd>
	</dl>
	<dl>
		<dt>お電話番号<span class="required">必須</span></dt>
		<dd><input type="text" name="input[tel]" class="form-txt" value="<?php echo output_data($input["tel"]); ?>"><?php if (!cempty($error_message["tel"])) { ?><span class="error"><?php echo output_data($error_message["tel"]); ?></span><?php } ?></dd>
	</dl>
	<dl>
		<dt>メールアドレス<span class="required">必須</span></dt>
		<dd><input type="text" name="input[email]" class="form-txt" value="<?php echo output_data($input["email"]); ?>"><?php if (!cempty($error_message["email"])) { ?><span class="error"><?php echo output_data($error_message["email"]); ?></span><?php } ?></dd>
	</dl>
	<dl>
		<dt>メールアドレス（確認）<span class="required">必須</span></dt>
		<dd><input type="text" name="input[email_conf]" class="form-txt" value="<?php echo output_data($input["email_conf"]); ?>"><?php if (!cempty($error_message["email_conf"])) { ?><span class="error"><?php echo output_data($error_message["email_conf"]); ?></span><?php } ?></dd>
	</dl>
	<dl>
		<dt>お問い合わせ内容<span class="required">必須</span></dt>
		<dd><textarea type="text" name="input[message]" class="form-textarea"><?php echo output_data($input["message"]); ?></textarea><?php if (!cempty($error_message["message"])) { ?><span class="error"><?php echo output_data($error_message["message"]); ?></span><?php } ?></dd>
	</dl>
	
    <div class="g-recaptcha" data-sitekey="6LexlGgeAAAAADfanQWBiB_Ix6ZjalBs598JQHFQ" data-callback="verifyCallback" data-expired-callback="expiredCallback"></div>
    <p id="warning">送信するにはチェックを入れてください。</p>
	<div class="form-btn arrow-r"><input class="contact-submit" type="submit" value="確認" id="send" disabled /></div>
</form>
</div>
	
<!--<div class="h4_area first"><h4 class="large" id="01"><span class="normal">■</span><strong>クレアネイト株式会社</strong></h4></div>
<div class="column">
<p>〒140-8611<br />東京都品川区東品川3-20-17(株式会社サンゲツ東京支社内) <br />
TEL：03-3474-1580　FAX：03-3474-1581</p>
</div>-->
	
	
	
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
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
