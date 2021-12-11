 <!-- SETTINGS   -->

<?php
  // SITE SETTINGS
$margin      = 30;
$outermargin = 10;
$widthdiff   = 10;
$logoWidth   = 330;
$pageWidth   = 980;
$pageWidth   = $pageWidth - $outermargin;
$imageHeight = 206;
$imageWidth  = 970;
$controlPosition = 50 - 2500/$imageHeight;
$headerrightWidth = $pageWidth + $outermargin - $logoWidth - 110 - 60;
$leftColumnWidth = 160;
$contentWidth = $pageWidth - $leftColumnWidth - 2*$margin;
$logoTitle   = 'ОАО АБЗ-4 "КАПОТНЯ"';
$logoText    = 'АБЗ-4 "КАПОТНЯ"';
$slogan      = "продажа асфальта, бетона, битумных эмульсий";
$myAdres     = "г. Москва, ул. Верхние Поля, 54";
$myTel       = "тел.: (495)-359-75-25, (495)-359-72-00";
$myRights    = 'ОАО АБЗ-4 "КАПОТНЯ". Все права защищены.';


// SLIDER SETTINGS
$picDir      = "images/slider/";
$delay       = 3000;
$duration    = 600;


// MENUS SETTINGS
$topMenu1    = "ГЛАВНАЯ";
$topMenu2    = "КОНТАКТЫ";
$topMenu3    = "КЛИЕНТАМ";

       // TITLE OF PAGES
       if(!isset($_GET['page'])){
       $page = 'main';
            }
        else{
           $page = addslashes(strip_tags(trim($_GET['page'])));
        }
        switch ($page){
            case 'main':
                $title = $logoTitle;
                $meta_d = 'Описание страницы Главная';
                $meta_kw = 'Ключевые слова страницы Главная';
            break;
            case 'article':
                $title = 'Статья';
                $meta_d = 'Описание страницы Статья';
                $meta_kw = 'Ключевые слова страницы Статья';
            break;
            case 'contact':
                $title = 'Наши контакты';
                $meta_d = 'Описание страницы Наши контакты';
                $meta_kw = 'Ключевые слова страницы Наши контакты';
            break;

             }
        ?>

<html>
    <head >
          <meta http-equiv="content-type" content="text/html; charset=utf-8">

        <!-- TITLE OF CURRENT PAGE -->
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $meta_d; ?>" />
        <meta name="keywords" content="<?php echo $meta_kw; ?>" />

        <!-- STYLE CSS  -->
        <link rel="stylesheet" href="/css/system.css"    type="text/css" />
        <link rel="stylesheet" href="/css/general.css"   type="text/css" />
        <link rel="stylesheet" href="/css/template.css"  type="text/css" />
        <link rel="stylesheet" href="/css/grey.css"      type="text/css" />

        <link href="/images/favicon.ico" rel="shortcut icon" type="/image/vnd.microsoft.icon" />

        <link rel="stylesheet" href="/css/ie6.css" type="text/css" />
        <style type="text/css">
            img, div, a, input { behavior: url(/js/iepngfix.htc) }
        </style>
        <script src="/js/iepngfix_tilebg.js" type="text/javascript"></script>
        <link rel="stylesheet" href="/css/ie67.css" type="text/css" />

        <style type="text/css">
             #header {
                 border-bottom: 0;
                 background-image: url("/images/head.jpg");
                    }
             #logo {
                    width:<?php echo $logoWidth; ?>px;
                   }
             #headerright {
              width:<?php echo $headerrightWidth; ?>px;
                            }
             #slideshow-container {
                    width:<?php echo $pageWidth + $outermargin - $widthdiff; ?>px;
                    height:<?php echo $imageHeight; ?>px;
                                }
             #slideshow-container img {
                  width:<?php echo $imageWidth; ?>px;
                  height:<?php echo $imageHeight; ?>px;
                                }
             #slcontrol {
                  width:<?php echo $imageWidth; ?>px;
                  top:<?php echo $controlPosition; ?>%;
                         }
             a#slprev {
               background: url("/images/previous-white.png") no-repeat scroll left center transparent;;
                        }
             a#slnext {
              background: url("/images/next-white.png") no-repeat scroll right center transparent;
                        }
             #wrap {
               background-image: url("/images/fon.jpg");
                background-repeat: repeat;
                background-color: transparent
                }
    </style>

    <script src="/js/caption.js" type="text/javascript"></script>
    <script src="/js/mootools-more.js" type="text/javascript"></script>
    <script src="/js/mootools-core-1.4.5-full-compat.js" type="text/javascript"></script>
    <script src="/js/slider.js" type="text/javascript"></script>

    <script type="text/javascript">
        window.addEvent('domready',function() {
                var slideshow = new Slider({
                        container: 'slideshow-container',
                        elements: '#slideshow-container img',
                        showControls: true,
                        transDelay: <?php echo $delay; ?>,
                        transDuration: <?php echo $duration; ?>  });
                slideshow.start();
        });
    </script>
 </head>

  <body lang="ru-ru">
          <div id="allwrap"  class="gainlayout" style="width:<?php echo $pageWidth + $outermargin; ?>px;">
           <div id="header"  class="gainlayout" >
           <div id="logotip">
                </div><sup></sup>
                 <!-- LOGOTIP & NAME  -->
                <div id="logo" class="gainlayout">
                           <h2><a href="<?php echo $_SERVER['URI']; ?>" title="<?php echo htmlspecialchars($logoText); ?>"><?php echo htmlspecialchars($logoText); ?></a></h2>
                                  <h3><?php echo htmlspecialchars($slogan); ?></h3>
                </div>
                     <!-- ADRES & TELPHONES  -->
                    <div id="headerright" class="gainlayout">
                        <div id="headeradres" class="gainlayout">
                         <h4 style="background: transparent; text-align: right"><?php echo htmlspecialchars($myAdres); ?></h4>
                         <h3 style="background: transparent"><?php echo htmlspecialchars($myTel); ?></h3>
                        </div>
                             <!-- TOP MENU  -->
                            <div id="topmenu" class="gainlayout">
                                <div class="moduletable">
					                <h3>Верхнее меню</h3>
                                        <? include("menu/topmenu.php"); ?>
	                        	</div>
                             <div class="clr"></div>
                        </div>

                  <div class="clr"></div>
                </div>
                <div class="clr"></div>
            </div>

      <div id="wrap" class="gainlayout">

       <!-- SLIDE  SHOW  -->
                <div id="slideshow-container">
                      <?php
                                if (file_exists($picDir) && is_readable($picDir)) {
                                      $folder = opendir($picDir);
                              } else {
                                      echo '<div class="message">Error! Please check the parameter settings and make sure you have entered a valid image folder path!</div>';
                                      return;
                              }
                              $allowed_types = array("jpg","JPG","jpeg","JPEG","gif","GIF","png","PNG","bmp","BMP");
                              $index = array();
                              while ($file = readdir ($folder)) {
                                      if(in_array(substr(strtolower($file), strrpos($file,".") + 1),$allowed_types)) {array_push($index,$file);}
                              }
                              closedir($folder);
                              sort($index);

                              foreach ($index as $file) {
                                      $finalpath = $picDir.$file;
                                      // output
                                      echo '<img src="'.$finalpath.'" alt="'.$file.'" />';
                              }
                              echo '<div id="slcontrol"> </div>';
                      ?>
              </div>

        <div id="cbody" class="gainlayout">

       <!-- SIDE  MENU  -->
        <div id="sidebar" style="width:<?php echo $leftColumnWidth; ?>px;">
           <div class="moduletable_menu">
               <? include("menu/sidemenu.php"); ?>
               <div class="item-separator"></div>
		    </div>
           <div class="sidecontent">
               <? include("pages/sidecontent.php"); ?>
               <div class="item-separator"></div>
           </div>
        </div>

       <!-- CONTENT  -->
       <div id="content60" style="width:<?php echo $contentWidth; ?>px;">
            <div id="content" class="gainlayout">
               <div class="blog-featured">
                 <div class="items-leading">
                   <div class="leading-0">
                      <?php include ('pages/'.$page.'.php'); ?>
                  </div>
                </div>
              </div>
           </div>
        </div>

        <div class="clr"></div>
        </div>

      <!--end of wrap-->
      </div>

      <!--end of allwrap-->
      </div>

       <!-- FOOTER  -->
        <div id="footerwrap">
            <br>
          	<p><label>&#169;<?php echo date('Y');?> <?php echo htmlspecialchars($myRights); ?></label><br>
          	<label> <?php echo htmlspecialchars($myAdres);?> <?php echo htmlspecialchars($myTel);?></label></p>
        </div><!-- #footer -->

       </body>
</html>