<style>.pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus{background-color: #e81f27;border-color: #e81f27;}.pagination > li > a, .pagination > li > span{color: #e81f27;

    background-color: #fff;

    border: 1px solid #e81f27;}</style><?php



	class page {



		function fun_pagination($per_page, $current_page, $get_total_rows, $pages){



			$pagination = '';



			if($pages > 0 && $pages != 1 && $current_page <= $pages){



				$pagination .= '<ul class="pagination pagination-sm">';



				



				$right_links    = $current_page + 3; 



				$previous       = $current_page - 3; 



				$next           = $current_page + 1; 



				$first_link     = true; 



				



				if($current_page > 1){



					$previous_link = ($previous<=0)?1:$previous;



					$pagination .= '<li><a href="#" data-page="1" title="First">&laquo;</a></li>';



					$pagination .= '<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; 



						for($i = ($current_page-2); $i < $current_page; $i++){



							if($i > 0){



								$pagination .= '<li><a href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';



							}



						}   



					$first_link = false; 



				}



				if($first_link){ 



					$pagination .= '<li class="active"><a href="#" data-page="'.$current_page.'">'.$current_page.'</a></li>';



				}elseif($current_page == $pages){ 



					$pagination .= '<li class="active"><a href="#" data-page="'.$current_page.'">'.$current_page.'</a></li>';



				}else{



					$pagination .= '<li class="active"><a href="#" data-page="'.$current_page.'">'.$current_page.'</a></li>';



				}



						



				for($i = $current_page+1; $i < $right_links ; $i++){ 



					if($i<=$pages){



						$pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';



					}



				}



				if($current_page < $pages){ 



						$next_link = ($i > $pages)? $pages : $i;



						$pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next Page">&gt;</a></li>'; 



						$pagination .= '<li class="last"><a href="#" data-page="'.$pages.'" title="Last Page">&raquo;</a></li>'; 



				}



				



				$pagination .= '</ul>'; 



			}



			return $pagination;



		}



	}



?>