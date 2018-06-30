<?php

require_once ('../autoload.php');
require_once('../commons/config.php');
require_once ('../commons/session.php');
require_once('../commons/utils.php');

if(empty($_GET['id'])){
    AlertMsgAndRedirectTo('/board/list.php', '잘못된 접근입니다.');
    exit;
}

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();
$id=getDataByGet('id');
$query="select * from `cms_board_qna` where `id`=$id";
$rows = $db->query($query);
$db=null;

if(count($rows) == 0){
    AlertMsgAndRedirectTo('/board/list.php', '잘못된 접근입니다.');
    exit;
}

if($_SESSION['role'] !=='A'){
    if($rows[0]['public'] == 0){
        AlertMsgAndRedirectTo('/board/check_password2.php?id='.$id, '비밀번호가 필요합니다.');
        exit;
    }
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

    .btn-modify-cancel{
        padding: 5px 10px;
        color: #444;
        background: #fff;
        border-radius: 10px;
        font-size: 14px;
        margin-right: 10px;
        border: 1px solid #444;
    }

    .btn-reply-delete,.btn-writing-delete{
        padding: 5px 10px;
        color: #fff;
        background: #d43735;
        border-radius: 10px;
        font-size: 14px;
        margin-right: 10px;
    }

    .btn-writing-delete{
        margin-right: 0;
    }

</style>


<div class="board-wrapper">
    <table class="table tb_board_qna">
        <colgroup>
            <col width="25%" />
            <col width="*" />
        </colgroup>
        <tr>
            <th>제목</th>
            <td>
                <?php echo $rows[0]['title']; ?>
            </td>
        </tr>
        <tr>
            <th>공개여부</th>
            <td>
                <?php if($rows[0]['public'] == 1){ echo '공개';}else{ echo '비공개';}; ?>
            </td>
        </tr>
        <tr>
            <th>첨부파일</th>
            <td>
                <?php
                    if($rows[0]['attached'] == null){
                        echo '첨부된 파일이 없습니다.';
                    }else{
                       ?>
                        <a href="/upload/<?php echo $rows[0]['attached']; ?>" download><?php echo $rows[0]['origin_attached']; ?></a>
                        <?php
                    }
                ?>
            </td>
        </tr>
        <tr>
            <th>닉네임</th>
            <td>
                <?php echo $rows[0]['nickname']; ?>
            </td>
        </tr>
        <tr>
            <th>문의내용</th>
            <td>
                <div style="-webkit-overflow-scrolling: touch;white-space: pre-line;line-height: 24px;max-height: 200px;overflow-y:scroll;"><?php echo $rows[0]['question']; ?></div>
            </td>
        </tr>
        <tr>
            <th>관리자 답변</th>
            <td>
                <div style="-webkit-overflow-scrolling: touch;white-space: pre-line;line-height: 24px;max-height: 200px;overflow-y:scroll;"><?php if($rows[0]['answer'] == null){ echo '아직 등록된 답변이 없습니다.'; }else{ echo $rows[0]['answer']; } ?></div>
            </td>
        </tr>

    </table>

    <div class="clearfix board-bottom">
        <span style="float: right;">

            <?php if($_SESSION['role'] == 'A'){ ?>
                <?php if($rows[0]['answer'] == null){ ?>
                    <a href="./reply.php?id=<?php echo $id;?>" class="btn-modify-cancel">
                        관리자 답변
                    </a>
                <?php }else{ ?>
                    <a href="./modify_reply.php?id=<?php echo $id;?>" class="btn-modify-cancel">
                        <i class="fa fa-pencil"></i>
                        답변 수정
                    </a>
                    <a href="./delete_reply.php?id=<?php echo $id;?>" class="btn-reply-delete">
                        <i class="fa fa-eraser"></i>
                        답변 삭제
                    </a>
                <?php } ?>
                    <a href="./res_delete_writing.php?id=<?php echo $id;?>" class="btn-writing-delete">
                        글삭제
                    </a>
            <?php }else{ ?>
                <a href="./check_password.php?id=<?php echo $id; ?>" class="btn-write-reg">
                    <i class="fa fa-pencil"></i>
                    수정하기
                </a>
            <?php } ?>
        </span>

        <span style="float: left">
            <a href="list.php" class="btn-write-qna">
                <i class="fa fa-list"></i>
                목록
            </a>
        </span>

    </div>
</div>
