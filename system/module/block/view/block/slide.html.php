<?php
/**
 * The about front view file of block module of chanzhiEPS.
 *
 * @copyright   Copyright 2013-2013 青岛息壤网络信息有限公司 (QingDao XiRang Network Infomation Co,LTD www.xirangit.com)
 * @license     LGPL (http://www.gnu.org/licenses/lgpl.html)
 * @author      Yidong wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.chanzhi.org
*/
?>
<?php $slides = $this->loadModel('slide')->getList();?>
<?php 
a($slides);
if($slides):?>
<div id='slide' class='carousel slide' data-ride='carousel'>
  <div class='carousel-inner'>
    <?php foreach($slides as $slide):?>
    <div class='item' style="background:<?php echo $slide->backgroundColor?>">
      <?php 
      !empty($slide->imageUrl) ? print(html::a($slide->imageUrl, html::image($slide->image))) : print(html::image($slide->image));
      ?>
      <div class='carousel-caption'>
        <h2><?php echo $slide->title;?></h2>
        <div><?php echo $slide->summary;?></div>
        <?php
        foreach($slide->label as $key => $label):
        if(trim($label) != '') echo html::a($slide->buttonUrl[$key], $label, "class='btn btn-lg btn-primary'");
        endforeach;
        ?>
      </div>
    </div>
    <?php endforeach;?>
  </div>
  <a class='left carousel-control' href='#slide' data-slide='prev'>
    <i class='icon-prev'></i>
  </a>
  <a class='right carousel-control' href='#slide' data-slide='next'>
    <i class='icon-next'></i>
  </a>
</div>
<?php endif;?>
