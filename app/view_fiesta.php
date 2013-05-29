<?php
	include "DAO/FunctionDAO.php";
	
	$action= new FunctionDAO();
	
	$action->view_fiesta();
	$pages = ceil($get_total_rows[0]/$per_item);  

	$pagination = '';
		if($pages > 1)
		{
		    $pagination .= '<ul class="paginate">';
		    for($i = 1; $i<$pages; $i++)
		    {
		        $pagination .= '<li><a href="#" class="paginate_click" id="'.$i.'-page">'.$i.'</a></li>';
		    }
		    $pagination .= '</ul>';
		}

?>