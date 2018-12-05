<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->_metaHTTP;?>
    <?php echo $this->_metaName;?>
    <title><?php echo $this->_title;?></title>
    <?php echo $this->_cssFiles;?>
    <?php echo $this->_jsFiles;?>
</head>
<body>
<div id="wrap">
        <?php include_once 'html/header.php';?>
        <div class="center_content">
       	<div class="left_content">
            <?php 
                require_once PATH_MODULE . $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
            ?>
        </div>
        <div class="right_content">
        	<?php include_once PATH_BLOCK . 'language.php';?>   
            <?php include_once PATH_BLOCK . 'cart.php';?>
            <?php include_once PATH_BLOCK . 'category.php';?>
            <!-- Add start -->
            <div class="clear"></div>
            <!-- Add end -->
            <?php include_once PATH_BLOCK . 'promotion.php';?>
            <?php include_once PATH_BLOCK . 'special.php';?>
        </div><!--end of right content-->
        <div class="clear"></div>
        </div><!--end of center content-->   
        <?php include_once 'html/footer.php';?>
</div>
</body>
</html>