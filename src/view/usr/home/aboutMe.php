<?php
$pageTitleIcon = '<i class="fas fa-cat"></i>';
$pageTitle = "INFO";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<?php require_once __DIR__ . "/../../part/toastUiSetup.php"; ?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>


    <!-- 제이쿼리 불러오기 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- 폰트어썸 불러오기 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- 테일윈드 불러오기 -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1/dist/tailwind.min.css" rel="stylesheet" type="text/css"/>
    <!-- 데이지UI 불러오기, 테일윈드 필요 -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.3.2/dist/full.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="/resource/common.css">

<section class="section-about-me align-center ">
  <div class="container mx-auto">
    <div class="cont-1">

    <img src="https://raw.githubusercontent.com/xio810/image_repo/d53dc79d6b396ee3b669fdf445125b510d14142d/satou_avantgarde.PNG" alt="" class="satou">
    CONTACT : xio810@kakao.com <br>
    INSTAGRAM : <a href="https://www.instagram.com/xio_or_satou/" target="_blank">@xio_or_satou</a><br>
    Linux(CentOS) / Html&Css&Js / MySQL(Workbench) / STS / Languages <br>
    <i class="fab fa-apple"></i> 모든 게시물은 맥 기준 <i class="fab fa-apple"></i><br>
    <br>
    <br>
    8냥이와 2기니 집사

  </div>
  </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>
