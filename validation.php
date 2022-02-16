<?php
// バリデーションチェックする関数 エラーがある場合はerror_message配列に項目をキーとしてメッセージを代入する
function check_error($input)
{
    $error_message = array();

    // 御社名のバリデーションチェック
    if (cempty($input["company"])) {
        $error_message["company"] = "入力されていません";
    } elseif (!check_strlength($input["company"], 100)) {
        $error_message["company"] = "正しく入力してください";
    }

    // ご担当者名のバリデーションチェック
    if (cempty($input["name"])) {
        $error_message["name"] = "入力されていません";
    } elseif (!check_strlength($input["name"], 100)) {
        $error_message["name"] = "正しく入力してください";
    }

    // ご担当者名(ふりがな)のバリデーションチェック
    if (cempty($input["kana"])) {
        $error_message["kana"] = "入力されていません";
    } elseif (!check_strlength($input["kana"], 100)) {
        $error_message["kana"] = "正しく入力してください";
    } elseif (!check_hiragana($input["kana"])) {
        $error_message["kana"] = "正しく入力してください";
    }

    // 電話番号のバリデーションチェック
    if (cempty($input["tel"])) {
        $error_message["tel"] = "入力されていません";
    } elseif (!check_tel($input["tel"])) {
        $error_message["tel"] = "正しく入力してください";
    }

    // メールアドレスのバリデーションチェック
    if (cempty($input["email"])) {
        $error_message["email"] = "入力されていません";
    } elseif (!check_strlength($input["email"], 500)) {
        $error_message["email"] = "正しく入力してください";
    } elseif ($input["email"] == $input["email_conf"] && !check_email($input["email"])) {
        $error_message["email"] = "メールアドレスを正しく入力してください";
    } elseif (!check_email($input["email"])) {
        $error_message["email"] = "正しく入力してください";
    }

    // メールアドレス(確認用)のバリデーションチェック
    if (cempty($input["email_conf"])) {
        $error_message["email_conf"] = "入力されていません";
    } elseif (!check_strlength($input["email_conf"], 500)) {
        $error_message["email_conf"] = "正しく入力してください";
    } elseif ($input["email"] != $input["email_conf"]) {
        $error_message["email_conf"] = "同じメールアドレスを入力してください";
    }

    // お問い合わせ内容のバリデーションチェック
    if (cempty($input["message"])) {
        $error_message["message"] = "入力されていません";
    }

    return $error_message;
}

// ひらがなをチェックする関数 正当性があればtrueを、不正がある場合はfalseを返す
function check_hiragana($str)
{
    if (cempty($str)) return true;
    if (mb_ereg("[^ぁ-んー]", $str)) return false;
    return true;
}

// 文字の長さをチェックする関数 第2引数で指定した長さより第1引数の文字列の長さが長い場合はfalseを、長さ以内であればtrueを返す
function check_strlength($str, $max_length)
{

    $str_length = mb_strlen($str);

    if ($str_length > $max_length) return false;
    return true;
}

// メールアドレスの正当性をチェックする関数 正当性があればtrueを、不正がある場合はfalseを返す
function check_email($input)
{
    // ユーザ(@より前)の正当性をチェックする正規表現を変数に代入する
    $user   = "[a-zA-Z0-9_\-\.\+\^!#\$%&*+\/\=\?\`\|\{\}~\']+";
    // ドメイン名(@より後ろ)の正当性をチェックする正規表現を変数に代入する
    $domain = "(?:(?:[a-zA-Z0-9]|[a-zA-Z0-9_\-][a-zA-Z0-9_\-]*[a-zA-Z0-9_\-])\.?)+";
    if (!preg_match("/^$user@$domain$/", $input) || !preg_match("/^.*@.*\..*$/", $input) || !preg_match("/^".$user."@[\w\-]+([\.][\w\-]+)+$/", $input)){
        return false;
    }
    return true;
}

// チェックボックスの必須チェックを行う関数 引数の変数に値がセットされていないまたは要素数が0だった場合falseを返しそれ以外の場合trueを返す
function check_empty_array($input, $contents)
{
    if (!isset($input[$contents])) return false;
    if (count($input[$contents]) == 0) return false;
    return true;
}

// 電話番号の正当性をチェックする関数
function check_tel($input)
{
    // 入力した電話番号の中に「-(ハイフン)」の個数が2つない場合、falseを返す
    if (substr_count($input, "-") != 2) return false;

    // 電話番号を「-(ハイフン)」区切りで配列に代入する
    $tel_ary = explode("-", $input);
    $tel = "";
    // foreachでループし、「-」無しの電話番号に整形する
    foreach ($tel_ary as $v) {
        $tel .= $v;
    }

    // 「-」無しの電話番号の桁数(文字数)を取得
    $len = strlen($tel);

    // 電話番号の正当性を正規表現でチェックする
    // 以下の条件に当てはまらない場合、falseを返し、それ以外はtrueを返す
    // ・すべて半角数字
    // ・上3桁が携帯電話の市外局番で且つ電話番号の桁数が11桁の場合
    // ・携帯電話以外の市外局番で且つ電話番号の桁数が10桁の場合
    if (!preg_match("/^[0-9]*$/", $tel)) return false;
    if (preg_match("/^0[5789]0/", $tel) && $len != 11) return false;
    if (!preg_match("/^0[5789]0/", $tel) && $len != 10) return false;
    return true;
}

