<?php
    require_once PATH_LIBRARY_EXT . 'XML.php';
    $data   = XML::getContentXML('categories.xml');
    $cateID = '';

    if(isset($this->arrParam['category_id'])){
        $cateID     = $this->arrParam['category_id'];
    }

    $xhtml      = '';
    if(!empty($data)){
        foreach($data as $key => $value){
            $name    = $value->name;
            $id             = $value->id;
            $nameURL        = URL::filterURL($name);
            $link   = URL::createLink('default', 'book', 'list', array('category_id' => $value->id), "$nameURL-$id.html");
            if($cateID == $value->id){
                $xhtml  .= '<li><a class="active" title="'.$name.'" href="'.$link.'">'.$name.'</a></li>';
            }else{
                $xhtml  .= '<li><a title="'.$name.'" href="'.$link.'">'.$name.'</a></li>';
            }
        }
    }
?>

<div class="right_box">
    <div class="title">
        <span class="title_icon"><img src="<?php echo $imageURL; ?>/bullet5.gif" alt="" title="" /></span>Categories
    </div> 

    <ul class="list">
        <?php echo $xhtml;?>                                            
    </ul>
</div>   