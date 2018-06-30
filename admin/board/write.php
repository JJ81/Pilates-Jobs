<?php

require_once ('../autoload.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();

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


</style>

<form action="./res_write.php" method="post" class="form-board-write" enctype="multipart/form-data">
    <div class="board-wrapper">
    <table class="table tb_board_qna">
        <colgroup>
            <col width="25%" />
            <col width="*" />
        </colgroup>
        <tr>
            <th>제목</th>
            <td>
                <input type="text" name="title" placeholder="제목을 입력하세요." required class="txt_input" autofocus />
            </td>
        </tr>
        <tr>
            <th>공개여부</th>
            <td>
                <input type="radio" name="expose" id="radio_show" value="true" checked />
                <label for="radio_show">공개</label>
                &nbsp;

                <input type="radio" name="expose" id="radio_hidden" value="false" />
                <label for="radio_hidden">비공개</label>
            </td>
        </tr>
        <tr>
            <th>첨부파일</th>
            <td>
                <input type="file" name="thumbnail" accept="image/jpg, image/jpeg, image/png" />
            </td>
        </tr>
        <tr>
            <th>닉네임</th>
            <td>
                <input type="text" name="nickname" placeholder="닉네임" required class="txt_input" />
            </td>
        </tr>
        <tr>
            <th>비밀번호</th>
            <td>
                <input type="password" name="password" placeholder="비밀번호" class="txt_input" />
            </td>
        </tr>
        <tr>
            <th>문의내용</th>
            <td>
                <textarea name="question" cols="30" rows="10" class="txt_textarea" placeholder="문의내용을 입력해주세요." required></textarea>
            </td>
        </tr>

    </table>

    <div class="clearfix board-bottom">
        <span style="float: right;">
            <button type="submit" class="btn-write-reg">
                <i class="fa fa-pencil"></i>
                등록
            </button>
        </span>

        <span style="float: left">
            <a href="list.php" class="btn-write-qna">
                <i class="fa fa-list"></i>
                목록
            </a>
        </span>

    </div>
</div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    (function ($) {
        var btnForm = $('.btn-write-reg'),
            form = $('.form-board-write');


        btnForm.bind('click', function (e){
            e.preventDefault();

            if($('input[name="title"]').val().trim() === ''){
                alert('제목을 입력하세요.');
                $('input[name="title"]').focus();
                return;
            }

            if($('input[name="nickname"]').val().trim() === ''){
                alert('닉네임을 입력하세요.');
                $('input[name="nickname"]').focus();
                return;
            }

            if($('textarea[name="question"]').val().trim() === ''){
                alert('문의내용을 입력하세요.');
                $('textarea[name="question"]').focus();
                return;
            }

            if($('input[type="password"]').val().trim() === ''){
                alert('비밀번호를 입력하세요.');
                $('input[type="password"]').focus();
                return;
            }

            form.submit();
        });


    }(jQuery));
</script>