<?php
/**
 * DokuWiki Arctic Template
 *
 * This is the template you need to change for the overall look
 * of DokuWiki.
 *
 * You should leave the doctype at the very top - It should
 * always be the very first line of a document.
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 * @author Michael Klier <chi@chimeric.de>
 * @link   http://wiki.splitbrain.org/template:arctic
 * @link   http://chimeric.de/projects/dokuwiki/template/arctic
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

// include custom arctic template functions
require_once(dirname(__FILE__).'/tpl_functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
 lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>
    <?php tpl_pagetitle()?> – <?php echo strip_tags($conf['title'])?>
  </title>

  <?php tpl_metaheaders()?>

  <link rel="shortcut icon" href="<?php echo DOKU_TPL?>images/favicon.ico" />

  <?php /*old includehook*/ @include(dirname(__FILE__).'/meta.html')?>

</head>
<body class="dw-<?php print tpl_getConf('sidebar'); ?>">
<?php /*old includehook*/ @include(dirname(__FILE__).'/topheader.html')?>


<div id="menubar" class="dokuwiki">   
   
		<?php tpl_link(wl(),$conf['title'],'name="dokuwiki__top" accesskey="h" title="[ALT+H]" id="wikititle"')?>
		<?php tpl_searchform() ?>		 
      <?php if(!tpl_getConf('hideactions') || tpl_getConf('hideactions') && isset($_SERVER['REMOTE_USER'])) { ?>
      <div class="action-menus">
        <div class="action-menu">
			<div class="action-menu-title unicode">
				⚙
			</div>
			<div class="action-menu-content">
          <?php 
            if(!tpl_getConf('closedwiki') || (tpl_getConf('closedwiki') && isset($_SERVER['REMOTE_USER']))) {
                    if(!plugin_isdisabled('npd') && ($npd =& plugin_load('helper', 'npd'))) {
                      $npd->html_new_page_button();
                    }
                    tpl_actionlink('edit');
                    tpl_actionlink('history');
                    tpl_actionlink('backlink');
            }
          ?>
			</div>
        </div>
        <div class="action-menu">
        <div class="action-menu-title unicode">
			⚒
		</div>
		<div class="action-menu-content"><?php
                if(!tpl_getConf('closedwiki') || (tpl_getConf('closedwiki') && isset($_SERVER['REMOTE_USER']))) {
                  tpl_actionlink('admin');
                  tpl_actionlink('revert');
                  tpl_actionlink('profile');
                  tpl_actionlink('recent');
                  tpl_actionlink('index');
                  tpl_actionlink('login');

                } else {
                  tpl_actionlink('login');
                }
          ?></div>
        </div>
    </div>
    <?php } ?>









</div>







<div id="wrapper" class="dokuwiki">

    <?php html_msgarea()?>	


    


      <?php /*old includehook*/ @include(dirname(__FILE__).'/header.html')?>


    <?php /*old includehook*/ @include(dirname(__FILE__).'/pageheader.html')?>

    <?php flush()?>

    <?php if(tpl_getConf('sidebar') == 'left') { ?>

      <?php if(!tpl_sidebar_hide()) { ?>
        <div class="left-sidebar">
			<div class="menu">
		  		<?php render_navigation(":menu");?>
			</div>
          <?php tpl_sidebar('left') ?>
        </div>
        <div class="right-page">
          <div id="page"><?php ($notoc) ? tpl_content(false) : tpl_content() ?>
	
	
			<div class="meta">
			  <div class="user">
			  <?php tpl_userinfo()?>
			  </div>
			  <div class="doc">
			  <?php tpl_pageinfo()?>
			  </div>
			</div>
	
	</div>
        </div>
      <?php } else { ?>
        <div  id="page" class="page">
          <?php tpl_content()?> 
        </div> 
      <?php } ?>

    <?php } elseif(tpl_getConf('sidebar') == 'right') { ?>

      <?php if(!tpl_sidebar_hide()) { ?>
        <div class="left-page">
 <div id="page"><?php ($notoc) ? tpl_content(false) : tpl_content() ?></div>
        </div>
        <div class="right-sidebar">
			<div class="menu">
		  		<?php render_navigation(":menu");?>
			</div>
          <?php tpl_sidebar('right') ?>
        </div>
      <?php } else { ?>
        <div id="page" class="page">
          <?php tpl_content() ?> 

		<div class="meta">
		  <div class="user">
		  <?php tpl_userinfo()?>
		  </div>
		  <div class="doc">
		  <?php tpl_pageinfo()?>
		  </div>
		</div>
        </div> 
      <?php }?>


   

    <?php } elseif(tpl_getConf('sidebar') == 'none') { ?>
      <div id="page" class="page">
        <?php tpl_content() ?>

		<div class="meta">
		  <div class="user">
		  <?php tpl_userinfo()?>
		  </div>
		  <div class="doc">
		  <?php tpl_pageinfo()?>
		  </div>
		</div>
      </div>
    <?php } ?>



    <?php if(tpl_getConf('trace')) {?> 
    <div id="trail">
      <?php ($conf['youarehere'] != 1) ? tpl_breadcrumbs('') : tpl_youarehere('');?>
    </div>
    <?php } ?>


</div>










    <?php flush()?>


<div align="center" class="footerinc">
  <?php tpl_license('button', true)?>

  <a target="_blank" href="http://jigsaw.w3.org/css-validator/check/referer" title="Valid CSS"><img src="<?php echo DOKU_TPL?>images/button-css.png" width="80" height="15" alt="Valid CSS" border="0" /></a>
  
  <a target="_blank" href="http://wiki.splitbrain.org/wiki:dokuwiki" title="Driven by DokuWiki"><img src="<?php echo DOKU_TPL?>images/button-dw.png" width="80" height="15" alt="Driven by DokuWiki" border="0" /></a>
  
  <a target="_blank" href="<?php echo DOKU_BASE?>feed.php" title="Recent changes RSS feed"><img src="<?php echo DOKU_TPL?>images/button-rss.png" width="80" height="15" alt="Recent changes RSS feed" border="0" /></a>
  
  <a target="_blank" href="http://validator.w3.org/check/referer" title="Valid XHTML 1.0"><img src="<?php echo DOKU_TPL?>images/button-xhtml.png" width="80" height="15" alt="Valid XHTML 1.0" border="0" /></a>
  
  <?php if(tpl_getConf('showuserbottom')){ ?>
  
  <?php if(isset($_SERVER['REMOTE_USER'])) { ?>
  
  <a href="<?php echo tpl_make_url('login'); ?>" title="Logout"><img src="<?php echo DOKU_TPL?>images/button-logout.png" width="80" height="15" alt="Logout" border="0" /></a>
  
  <?php } else { ?>
  
  <a href="<?php echo tpl_make_url('login'); ?>" title="Login"><img src="<?php echo DOKU_TPL?>images/button-login.png" width="80" height="15" alt="Login" border="0" /></a>
  
  <?php } ?>
  
  <?php } ?>

</div>

<div class="no"><?php /* provide DokuWiki housekeeping, required in all templates */ tpl_indexerWebBug()?></div>
</body>
</html>
