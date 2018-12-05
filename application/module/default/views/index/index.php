
<!-- SPECIAL BOOKS -->
<div class="title">
	<span class="title_icon">
		<img src="<?php echo $imageURL;?>/bullet1.gif" alt="" title="">
	</span>Featured books
</div>
<?php 
	$xhtml = '';
	if(!empty($this->specialBooks)){
		foreach($this->specialBooks as $key => $value){
            $name    = $value['name'];
            $bookID         = $value['id'];
            $catID          = $value['category_id'];
            $bookNameURL    = URL::filterURL($name);
            $catNameURL     = URL::filterURL($value['category_name']);

            $link   = URL::createLink('default', 'book', 'detail', array('category_id' => $value['category_id'],'book_id' => $value['id']), "$catNameURL/$bookNameURL-$catID-$bookID.html");

			$description	= substr($value['description'], 0, 200);
			$picture = Helper::createImage('book', '98x150-', $value['picture']);
			$xhtml 	.= '<div class="feat_prod_box">
							<div class="prod_img"><a href="'.$link.'">'.$picture.'</a></div>
					
							<div class="prod_det_box">
								<div class="box_top"></div>
								<div class="box_center">
									<div class="prod_title">'.$name.'</div>
									<p class="details">'.$description.'</p>
									<a href="'.$link.'" class="more">- more details -</a>
									<div class="clear"></div>
								</div>
								<div class="box_bottom"></div>
							</div>
							<div class="clear"></div>
						</div>';
		}
	}
	echo $xhtml;
?>

<!-- NEW BOOKS -->
<div class="title">
	<span class="title_icon">
		<img src="<?php echo $imageURL;?>/bullet2.gif" alt="" title=""> 
	</span>New books
</div>

<div class="new_products">
<?php 
	$xhtmlNewBooks = '';
	if(!empty($this->newBooks)){
		foreach($this->newBooks as $key => $value){
            $name    = $value['name'];
            $bookID         = $value['id'];
            $catID          = $value['category_id'];
            $bookNameURL    = URL::filterURL($name);
            $catNameURL     = URL::filterURL($value['category_name']);

            $link   = URL::createLink('default', 'book', 'detail', array('category_id' => $value['category_id'],'book_id' => $value['id']), "$catNameURL/$bookNameURL-$catID-$bookID.html");
			$description	= substr($value['description'], 0, 200);
			

			$picture = Helper::createImage('book', '98x150-', $value['picture'], array('class' => 'thumb', 'width' => 60, 'height' => 90));
			$picturePath	= PATH_UPLOAD . 'book' . DS . '98x150-' . $value['picture'];
			if(file_exists($picturePath)==true){
				$picture	= '<img class="thumb" width="60" height="90" src="'. URL_UPLOAD . 'book' . DS . '98x150-' . $value['picture'].'">';
			}else{
				$picture	= '<img class="thumb" width="60" height="90" src="'.URL_UPLOAD . 'book' . DS . '98x150-default.jpg' .'">';
			}
			
			$xhtmlNewBooks 	.= '<div class="new_prod_box">
									<a href="'.$link.'">'.$name.'</a>
									<div class="new_prod_bg">'
										. '<span class="new_icon"><img src="' . $imageURL . '/new_icon.gif" alt="" title=""></span>'
										. '<a href="'.$link.'">'.$picture.'</a>
									</div>
								</div>';
		}
	}
	echo $xhtmlNewBooks;
?>
</div>
