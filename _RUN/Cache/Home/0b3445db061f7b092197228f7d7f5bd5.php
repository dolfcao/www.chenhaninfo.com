<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <script>(function(w){w.onerror=function(n,o,r){var i=encodeURIComponent;(new Image).src="/?s=watcher/js&error="+i(n)+"&file="+i(o)+"&line="+i(r)+"&url="+i(w.location.href)+'&agent='+i(navigator.userAgent)}})(window);</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="keywords" content="<?php echo ($page_keywords); ?>" />
    <meta name="description" content="<?php echo ($page_description); ?>" />
    <meta name="generator" content="宸瀚信息 V<?php echo (APP_VERSION); ?>" />
    <meta name="author" content="宸瀚信息 TecMZ" />
    <meta name="copyright" content="2015 TecMZ Inc." />
    <link rel="icon" href="/asserts/res/fav.ico?<?php echo (STATIC_RES_HASH); ?>" type="image/x-icon" />
    <link rel="shortcut icon" href="/asserts/res/fav.ico?<?php echo (STATIC_RES_HASH); ?>" type="image/x-icon" />
    <title><?php echo ($page_title); ?></title>
    <link rel="stylesheet" type="text/css" href="/asserts/bootstrap/css/bootstrap.yeti.min.css?<?php echo (STATIC_RES_HASH); ?>" />
    <link rel="stylesheet" type="text/css" href="/asserts/res/style-<?php echo tpx_config_get('theme_color','xxx'); ?>.css?<?php echo (STATIC_RES_HASH); ?>" />
    <!--[if lt IE 9]>
    <script src="/asserts/bootstrap/js/html5shiv.min.js?<?php echo (STATIC_RES_HASH); ?>"></script>
    <script src="/asserts/bootstrap/js/respond.min.js?<?php echo (STATIC_RES_HASH); ?>"></script>
    <![endif]-->
    <script type="text/javascript">
        var TPX={
            PATH_ROOT : '',
            PATH_ASSERTS:'/asserts',
            SUFFIX_JS:'.js?<?php echo (STATIC_RES_HASH); ?>',
            SUFFIX_CSS:'.css?<?php echo (STATIC_RES_HASH); ?>',
            LANG:'<?php echo LANG_SET; ?>',
            UEDITOR:[],
            REWRITE: <?php if(C('URL_MODEL')==2){echo 'true';}else{echo 'false';} ?>
        };
        var require = {
            baseUrl : '/asserts/js'
        };
    </script>
    <script src="/asserts/js/require.js?<?php echo (STATIC_RES_HASH); ?>"></script>
    <?php echo tpx_config_get('code_counter_position',0)?'':tpx_config_get('code_counter',''); ?>
</head>
<body>



    <header>

    <div class="container">
        <nav class="navbar" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#menu-main">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="/<?php echo tpx_config_get('image_logo', 'asserts/res/image/logo.png'); ?>"/></a>
                </div>

                <div class="collapse navbar-collapse" id="menu-main">
                    <ul class="nav navbar-nav">
                        <li <?php if(CONTROLLER_NAME == 'Index'): ?>class="active"<?php endif; ?>><a href="/">公司首页</a></li>
                        <li <?php if(CONTROLLER_NAME == 'Product'): ?>class="active"<?php endif; ?>><a href="<?php echo U('/Product');?>">产品中心</a></li>
                        <li <?php if(CONTROLLER_NAME == 'News'): ?>class="active"<?php endif; ?>><a href="<?php echo U('/News');?>">新闻动态</a></li>
                        <?php foreach(D('SinglePage','Service')->all(3600,array('where'=>array('show_in_nav'=>1))) as $v){ ?>
                        <li <?php if(CONTROLLER_NAME == ucwords($v['url'])): ?>class="active"<?php endif; ?>><a href="<?php echo U('/'.ucwords($v['url']));?>"><?php echo ($v["title"]); ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

    </div>

</header>

    <div id="box-slide">

        <?php $slides = D('Slide','Service')->all(); ?>
        <div class="container">
            <div id="box-slide-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php foreach($slides as $i=>&$v){ ?>
                        <li data-target="#box-slide-carousel" data-slide-to="<?php echo ($i); ?>" <?php if($i == 0): ?>class="active"<?php endif; ?>></li>
                    <?php } ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php foreach($slides as $i=>&$v){ ?>
                    <div class="item <?php if($i == 0): ?>active<?php endif; ?>">
                        <?php if($v['url']): ?><a href="<?php echo ($v["url"]); ?>" target="_blank"><?php endif; ?>
                            <?php if($i==0){ ?>
                                <img src="/<?php echo ($v["image"]); ?>" alt="<?php echo (htmlspecialchars($v["title"])); ?>" />
                            <?php }else{ ?>
                                <img src="/<?php echo ($v["image"]); ?>" alt="<?php echo (htmlspecialchars($v["title"])); ?>" />
                            <?php } ?>
                            <div class="carousel-caption">
                                <?php echo (htmlspecialchars($v["title"])); ?>
                            </div>
                        <?php if($v['url']): ?></a><?php endif; ?>
                    </div>
                    <?php } ?>
                </div>
                <a class="left carousel-control" href="#box-slide-carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#box-slide-carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="box-mod-about">
                    <h2>
                        公司介绍
                    </h2>

                    <div class="about">
                        <?php echo parse_res_url( tpx_config_get('home_about'), '/', '/'); ?>
                    </div>
                </div>

                <div class="box-mod-category">
                    <h2>
                        <a class="right" href="<?php echo U('/Product');?>">更多</a>
                        产品列表
                    </h2>

                    <div class="row">
                        <?php foreach(D('Product','Service')->recommend() as $v){ ?>
                        <div class="col-md-3 col-xs-6">
                            <div class="item">
                                <a class="cover" href="<?php echo U('/Product/'.$v['id']);?>">
                                    <img src="/<?php echo ($v["cover"]); ?>" alt="<?php echo (htmlspecialchars($v["title"])); ?>" />
                                </a>
                                <a class="title" href="<?php echo U('/Product/'.$v['id']);?>"><?php echo (htmlspecialchars($v["title"])); ?></a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
            <div class="col-md-4">

                <div class="box-mod-list">
    <h2>
        <a class="right" href="<?php echo U('/News');?>">更多</a>
        新闻动态
    </h2>

    <div class="list">
        <?php foreach(D('News','Service')->latest() as $v){ ?>
        <div class="item">
            <span><?php echo (date('Y-m-d',$v["posttime"])); ?></span>
            <a href="<?php echo U('/News/'.$v['id']);?>"><?php echo (htmlspecialchars($v["title"])); ?></a>
        </div>
        <?php } ?>
    </div>
</div>

                <div class="box-mod-qrcode">
    <h2>扫一扫</h2>
    <div class="image">
        <img src="/<?php echo tpx_config_get('image_qr', 'asserts/res/image/qr.jpg'); ?>"/>
    </div>
</div>

            </div>

            <div class="col-md-12">
    <div class="box-partner-list">
        <h2>
            合作伙伴
        </h2>
        <div class="partner-image">
            <?php foreach(D('Partner','Service')->list_by_type(1) as $v){ ?>
            <a href="<?php echo ($v["url"]); ?>" target="_blank"><img src="/<?php echo ($v["logo"]); ?>" alt="<?php echo (htmlspecialchars($v["name"])); ?>" /></a>
            <?php } ?>
        </div>
        <div class="partner-text">
            <?php foreach(D('Partner','Service')->list_by_type(2) as $v){ ?>
            <a href="<?php echo ($v["url"]); ?>" target="_blank">[<?php echo (htmlspecialchars($v["name"])); ?>]</a>
            <?php } ?>
        </div>
    </div>
</div>

        </div>

    </div>


    <footer>
    <div class="container">
        <div>
            公司地址：<?php echo tpx_config_get('contact_address','[公司地址]'); ?>
        </div>
        <div class="copyright">
            <?php echo tpx_config_get('basic_copyright','&copy; 湖南宸瀚信息科技有限公司 2016 All Rights Reserved. <a href="http://www.tecmz.com" target="_blank">Powered by 宸瀚信息</a>'); ?>
        </div>
    </div>
</footer>



<script src="/asserts/res/all.js?<?php echo (STATIC_RES_HASH); ?>"></script>
<?php echo tpx_config_get('code_counter_position',0)?tpx_config_get('code_counter',''):''; ?>
</body>
</html>