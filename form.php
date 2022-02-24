<?php
require_once("define.php");
require_once("config.php");
require_once("function.php");
require_once("validation.php");

// sessionを開始する
session_start();

// DBクラスのインスタンスを生成する
$form_mode = "input";

// 文字整形を行う
if (isset($_POST["input"])) $input = makeup($_POST["input"]);
// POSTからとんできた場合、form_modeの値を上書きする
if (isset($_POST["form_mode"])) $form_mode = $_POST["form_mode"];
// confirmのページでform_modeがconfirm以外の時、formにリダイレクトさせる
if ($_SERVER["REQUEST_URI"] == "/contact/confirm.php" && $form_mode != "confirm") {
    header("Location: form.php");
    exit;
}
// confirmのページでform_modeがdone以外の時、formにリダイレクトさせる
if ($_SERVER["REQUEST_URI"] == "/contact/done.php" && $form_mode != "done") {
    header("Location: form.php");
    exit;
}

// 入力モードの切り替え
switch ($form_mode) {
    case "confirm":
        // 入力情報のバリデーションチェック
        // ・form_modeを"entry"に上書きする
        if ($error_message = check_error($input)) {
            $master = extract_master();
            $form_mode = "input";
            require_once("input.php");
            exit;
        }

        // 選択結果の数値を文字列に変換して新しい配列に代入する
        $data = get_input($input);

        // トークンを作成しセッションに挿入
        $token = uniqid("INFOTOKEN_");
        $_SESSION["token"] = $token;

        break;

    case "done":
        // トークンチェック 異なる場合は入力画面に戻す
        $post_token = "dummy_post_token";
        if (isset($_REQUEST["token"])) $post_token = $_REQUEST["token"];
        $sess_token = "dummy_sess_token";
        if (isset($_SESSION["token"])) $sess_token = $_SESSION["token"];
        unset($_SESSION["token"]);

        if ($sess_token != $post_token) {
            sleep(2);
            if ($post_token != $_SESSION["form_token"]) {
                header("Location: form.php");
                break;
            }
        } else {
            // 入力情報のバリデーションチェック
            // エラーメッセージがあった場合以下の処理を行う
            // ・DBからマスタデータを取り出し、配列に追加する
            // ・form_modeを"entry"に上書きする
            if ($error_message = check_error($input)) {
                $master = extract_master();
                $form_mode = "input";
                require_once("input.php");
                exit;
            }
            $_SESSION["form_token"] = $post_token;
            require_once("mail_user.php");
            $mail_user_data = get_user_mail_data($input);
            mb_send_mail($mail_user_data["to"], $mail_user_data["subject"], $mail_user_data["body"], $mail_user_data["headers"]);
            // 問合せ先用メール
            require_once("mail_admin.php");
            $mail_admin_data = get_admin_mail_data($input);
            mb_send_mail($mail_admin_data["to"], $mail_admin_data["subject"], $mail_admin_data["body"], $mail_admin_data["headers"]);
        }
        unset($_SESSION["form_token"]);
        break;

    case "input":
    default:
        // マスタデータを配列に追加し、form_modeを"input"に上書きし、ファイルを呼び出す
        $master = extract_master();
        $form_mode = "input";
        require_once("input.php");
        break;
}
// 各マスタデータの配列を作成する関数
function extract_master()
{
    $master = array();

    return $master;
}

// POSTされた値を表示用に整形する関数
function get_input($input)
{
    $data_arr = array();
    // 入力結果を配列に追加する
    foreach ($input as $key => $value) {
        $data_arr[$key] = $value;
    }

    return $data_arr;
}

// 文字整形を行う関数
function makeup($input)
{
    //ふりがなで全角ひらがなに変換する
    if (!cempty($input['kana'])) {
        $input['kana'] = mb_convert_kana(mb_convert_kana(str_replace(' ', '', str_replace('　', '', $input['kana'])), 'KV', ENC_TYPE), 'c', ENC_TYPE);
    }

    //メールアドレスで全角英数字を半角英数字に変換する
    if (!cempty($input["email"])) {
        $input["email"] = mb_convert_kana($input["email"], "a", ENC_TYPE);
    }
    if (!cempty($input["email_conf"])) {
        $input["email_conf"] = mb_convert_kana($input["email_conf"], "a", ENC_TYPE);
    }


    // 電話番号で全角数字を半角数字に変換する
    if (!cempty($input["tel"])) {
        $input["tel"] = mb_convert_kana($input["tel"], "n", ENC_TYPE);
    }

    return $input;
}
