<?php
    require_once PATH_LIBRARY_EXT . 'XML.php';
    $model  = new Model();
    $query  = "SELECT `b`.`id`, `b`.`name`, `c`.`name` AS category_name, `b`.`picture`, `b`.`category_id` FROM `".TBL_BOOK."` AS `b` LEFT JOIN ". TBL_CATEGORY ." AS `c` ON `b`.`category_id` = `c`.`id` WHERE `b`.`status`  = 1 AND `b`.`sale_off` > 0 ORDER BY `b`.`ordering` ASC LIMIT 0,2";
    $listBooks  = $model->fetchAll($query);
    $xhtml      = '';
    if(!empty($listBooks)){
        foreach($listBooks as $key => $value){
            $name    = $value['name'];
            $bookID         = $value['id'];
            $catID          = $value['category_id'];
            $bookNameURL    = URL::filterURL($name);
            $catNameURL     = URL::filterURL($value['category_name']);

            $link   = URL::createLink('default', 'book', 'detail', array('category_id' => $value['category_id'],'book_id' => $value['id']), "$catNameURL/$bookNameURL-$catID-$bookID.html");

            $picture = Helper::createImage('book', '98x150-', $value['picture'], array('class' => 'thumb', 'width' => 60, 'height' => 90));
            $xhtml  .= '<div class="new_prod_box">
                            <a href="'.$link.'">'.$name.'</a>
                            <div class="new_prod_bg">
                            <span class="new_icon"><img src="'.$imageURL.'/promo_icon.png" alt="" title="" /></span>
                            <a href="'.$link.'">'.$picture.'</a>
                            </div>           
                        </div>';
        }
    }
?>

<div class="right_box">
    <div class="title">
        <span class="title_icon"><img src="<?php echo $imageURL; ?>/bullet4.gif" alt="" title="" /></span>Promotions
    </div>
    <?php echo $xhtml;?>
</div>


