<?php

require_once ('../autoload.php');
require_once ('../commons/session.php');
require_once('../commons/config.php');
require_once('../commons/utils.php');

use Msg\Database\DBConnection as DBconn;
$db = new DBconn();


if(empty($_GET['page'])){
    $page=1;
}else{
    $page=getDataByGet('page');
}

if(empty($_GET['size'])){
    $size=10;
}else{
    $size=getDataByGet('size');
}

if($_GET['page'] <= 0 or $_GET['page'] == null){
    Redirect('/board/list.php?page=1&size=10');
    exit;
}

$current=$page;
$next=null;
$prev=null;

$total_query="select count(*) as total from `cms_board_qna`;";
$total=$db->query($total_query);
$totalCount = $total[0]['total'];
$totalPage=ceil($totalCount/$size);
$offset= ($page-1)*$size;

// 이전과 다음 페이지 계산
if($current < $totalPage){
    $next = $current+1;
} else {
    $next=$current;
}

if($current > 1){
    $prev = $current-1;
}else{
    $prev=$current;
}

$query="select * from `cms_board_qna` order by `id` desc limit $offset, $size;";
$rows = $db->query($query);
$db=null;

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
        border-bottom: 1px solid #a0a0a0;
    }

    .tb_board_qna th{
        background: #333;
        font-size: 12px;
        color: #fff;
    }

    .tb_board_qna td{
        font-size: 12px;
        border-bottom: 1px dotted #a0a0a0;

    }

    .tb_board_qna td,
    .tb_board_qna th{
        text-align: center;
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
        float: right;
        position: relative;
        top: -1px;
        display: inline-block;
        padding: 5px 8px;
        border-radius: 100px;
        color: #fff;
        background: #038dd4;
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
            font-size: 16px;
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

    .tb_board_qna .fa-lock{
        font-size: 16px;
    }

</style>

<div class="board-wrapper">
    <table class="table tb_board_qna">
        <colgroup>
            <col width="10%" />
            <col width="*" />
            <col width="15%" />
            <col width="15%" />
            <col width="10%" />
        </colgroup>
        <tr>
            <th style="border-top-left-radius: 10px;border-bottom-left-radius: 10px;">번호</th>
            <th>제목</th>
            <th>닉네임</th>
            <th>작성일</th>
            <th style="border-top-right-radius: 10px;border-bottom-right-radius: 10px;">상태</th>
        </tr>

        <?php if(count($rows) == 0){ ?>
        <tr>
            <td colspan="5" style="text-align: center;padding: 50px 0;">아직 등록된 문의사항이 없습니다.</td>
        </tr>
        <?php } ?>

        <?php for($i=0,$size=count($rows);$i<$size;$i++) { ?>
        <tr>
            <td><?php echo $rows[$i]['id'] ?></td>
            <td style="text-align: left;">
                <?php  if($rows[$i]['public'] == 1) { ?>
                <a href="./view.php?id=<?php echo $rows[$i]['id']; ?>" class="link">
                    <?php echo mb_strimwidth($rows[$i]['title'],0,50, '...', 'utf-8'); ?>
                    <?php if($rows[$i]['public'] == 0){?><i class="fa fa-lock"></i><?php } ?>
                </a>
                <?php }else{ ?>
                <a href="./check_password2.php?id=<?php echo $rows[$i]['id']; ?>" class="link">
                    <?php echo mb_strimwidth($rows[$i]['title'],0,50, '...', 'utf-8'); ?>
                    <i class="fa fa-lock"></i>
                </a>
                <?php } ?>

            </td>
            <td><?php echo $rows[$i]['nickname'] ?></td>
            <td>
                <?php echo conv_date_format('y.m.d', $rows[$i]['registered_dt']); ?>
            </td>

            <td>
                <?php
                    if($rows[$i]['answer'] == null){
                        ?><i class="fa fa-question"></i><?php
                    }else{
                        ?><i class="fa fa-check"></i><?php
                    }
                ?>
            </td>
        </tr>
        <?php } ?>
    </table>


    <div class="clearfix board-bottom">
        <?php if(count($rows) !== 0){ ?>
        <span style="float: left;">
            <a href="/board/list.php?size=10&page=<?php echo $prev;?>" class="btn-board-prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <span class="paging">
                <strong style="color: #1e91e4;"><?php echo $current; ?></strong> / <?php echo $totalPage; ?>
            </span>
            <a href="/board/list.php?size=10&page=<?php echo $next;?>" class="btn-board-next">
                <i class="fa fa-angle-right"></i>
            </a>
        </span>
        <?php } ?>
        <a href="write.php" class="btn-write-qna">
            <i class="fa fa-pencil"></i>
            글쓰기
        </a>
    </div>
</div>
