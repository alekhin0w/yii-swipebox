<script src="<?php echo $this->assetsUrl; ?>/source/jquery.swipebox.min"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/source/swipebox.css" />
<div class="clear"></div>
<div id="swipebox">
<?php 
    foreach($medias as $media)
    {
        ?>
        <div class="box" style="float:left;width:150px;height:auto; padding: 5px 5px 5px 5px;">
            <a href="<?php echo $media['url'];?>" class="swipebox" title="<?php echo $media['name'];?>">
                <?php if(isset($media['thumb'])) { ?>
                <img width="150px" height="auto" src="<?php echo $media['thumb'];?>" alt="<?php echo $media['name']; ?>">
                <?php } else { ?>
                <img width="150px" height="auto" src="<?php echo $media['url'];?>" alt="<?php echo $media['name']; ?>">
                <?php } ?>
            </a>    
        </div>
        <?
    }
    ?>
    <div style="clear:both"></div>
</div>    

            

