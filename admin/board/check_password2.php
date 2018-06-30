<?php

require_once ('../autoload.php');
require_once('../commons/config.php');
require_once ('../commons/session.php');
require_once('../commons/utils.php');




if(empty($_GET['id'])){
    AlertMsgAndRedirectTo('/board/list.php', '잘못된 접근입니다.');
    exit;
}

$id=getDataByGet('id');

if($_SESSION['role'] == 'A'){
    Redirect('view.php?id='.$id);
    exit;
}


use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

$query="select * from `cms_board_qna` where `id`=$id";
$rows = $db->query($query);
$db=null;

if(count($rows) == 0){
    AlertMsgAndRedirectTo('/board/list.php', '잘못된 접근입니다.');
    exit;
}


?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<style>
    *{
        margin: 0;
        padding: 0;
    }

    a{
        text-decoration: none;
    }

    table{
        border-collapse: collapse;
    }

    .tb_board_qna{
        width: 100%;
        border-top: 1px solid #a0a0a0;
        border-bottom: 1px solid #a0a0a0;
    }

    .tb_board_qna th{
        background: #333;
        font-size: 12px;
        color: #fff;
        text-align: center;
        border-bottom: 1px dotted #a0a0a0;
    }

    .tb_board_qna td{
        font-size: 12px;
        border-bottom: 1px dotted #a0a0a0;
        padding-left: 10px !important;
        padding-right: 10px !important;
    }

    .tb_board_qna td,
    .tb_board_qna th{

        word-wrap:break-word;
        padding: 8px 3px;
        font-family: Arial;
    }
    .tb_board_qna .link{
        text-align: left;
        word-break: break-all;
        color: #010101;
        text-decoration: none;
    }

    .clearfix{
        content: "";
        clear: both;
        display: block;
    }

    .btn-board-prev,.btn-board-next{
        color: #fff;
        background: #323232;
        border-radius: 100px;
        width: 30px;
        display: inline-block;
        font-weight: bold;
        text-align: center;
        font-size: 25px;
    }

    .btn-write-qna{
        /*float: right;*/
        position: relative;
        top: -1px;
        display: inline-block;
        padding: 5px 8px;
        border-radius: 100px;
        background: #323232;
        color: #fff;
        font-size: 14px;
    }

    body{
        background: #fff;
    }

    /* mobile */
    @media (max-width:583px) {
        .board-wrapper{
            padding: 10px 10px 30px 10px;
        }

        .board-bottom{
            margin: 15px 0 10px 0;
        }

        .tb_board_qna i{

        }
    }

    /* pc */
    @media (min-width:583px) {
        .board-wrapper{
            padding: 10px 10px 30px 10px;
        }
        .tb_board_qna td,
        .tb_board_qna th{
            font-size: 14px;
            padding: 13px 5px;
        }

        .board-bottom{
            margin: 15px 10px 10px 10px;
        }

        .tb_board_qna i{
            font-size: 30px;
        }
    }

    .paging{
        position: relative;
        top: -3px;
        display: inline-block;
        margin: 0 10px;
        color: #333;
        font-family: Arial;
    }

    .tb_board_qna .fa-check{
        color: #34C68A;
    }

    .tb_board_qna .fa-question{
        color: #fdcd00;
    }

    .btn-write-reg{
        padding: 5px 10px;
        color: #fff;
        background: #038dd4;
        border-radius: 10px;
        font-size: 14px;
        border: none;
    }

    .txt_input{
        width: 100%;
        background: #fff;
        border: 1px solid #848484;
        font-size: 14px;
        color: #5b5b5b;
        height: 40px;
        line-height: 40px;
        padding: 0 10px;
    }

    .txt_textarea{
        border: 1px solid #848484;
        padding: 10px;
        font-size: 14px;
        color: #5b5b5b;
        width: 100%;
        height: 200px;
        resize: none;
    }

    .input_password{
        width: 100%;
        text-align: center;
        font-size: 20px;
        color: #444;
        padding: 10px 0;
        display: block;
        border-radius: 20px;
        border: none;
        box-shadow: 3px 3px 5px rgba(0, 1, 1, 0.26);
        height: 62px;
    }

    .btn-close-pass{
        position: absolute;
        top: 20px;
        right: 0;
        display: inline-block;

    }

    .pass-wrp{
        background:url('../images/bg_check_password.png') no-repeat center center;
        width:300px;
        height: 300px;
        position: relative;
        left: 50%;
        margin-left: -150px;
        background-size: cover;
    }

</style>

<form action="./view2.php" method="post">
    <div class="board-wrapper">
        <div style="text-align: center;margin-top: 100px;">
            <div style="" class="pass-wrp">
                <div style="padding: 144px 20px 0 20px;">
                    <input type="password" name="password" placeholder="비밀번호를 입력하세요." required class="input_password" autofocus />
                </div>

                <div>
                    <button type="submit" class="btn-write-reg" style="font-size: 20px;margin-top: 20px;cursor:pointer;">
                        <i class="fa fa-check"></i>
                        비밀번호 확인
                    </button>
                </div>
                <a href="./list.php" class="btn-close-pass">
                    <img src="../images/btn_close_pass.png" alt="닫기" />
                </a>
            </div>
        </div>


        <input type="hidden" name="board_id" value="<?php echo $id; ?>" />

    </div>
</form>