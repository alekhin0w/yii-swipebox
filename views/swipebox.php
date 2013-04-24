<script src="<?php echo $this->assetsUrl; ?>/source/jquery.swipebox.min"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/source/swipebox.css" />
<div class="clear"></div>
<div id="swipebox">
<?php 
    foreach($images as $image)
    {
        ?>
        <div class="box" style="float:left;width:150px;height:auto; padding: 5px 5px 5px 5px;">
            <a href="<?php echo $image['url'];?>" class="swipebox" title="<?php echo $image['name'];?>">
                <img width="150px" height="auto" src="<?php echo $image['url'];?>" alt="<?php echo $image['name']; ?>">
            </a>
        </div>
        <?
    }
    ?>
    <div style="clear:both"></div>
</div>    

            

