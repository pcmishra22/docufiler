<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function getquestionbyid($id)
	{
	     $CI =& get_instance();
	     $CI->load->model('users/users_model');
		 $result= $CI->users_model->getQuestionById($id);
		 return $result;
	}
	function updateMarksofUser($subject,$roll,$marks)
	{
		 $CI =& get_instance();
	     $CI->load->model('users/users_model');
		 $result= $CI->users_model->updateMarksofUser($subject,$roll,$marks);
		 return $result;	
	}
	//subtitle 
	function subTitleDisplay()
	{
		return '<ul class="tab-blue">
            	<li><a href="#">Main</a></li>
                <li><a href="#">Date</a></li>
                <li><a href="#">Search</a></li>
                <li><a href="#">Automobiles</a></li>
                <li><a href="#">Utilities</a></li>
                <li><a href="#">Finance</a></li>
                <li><a href="#">Automobile</a></li>
             </ul> ';
	}
	//built tree
	function buildtree($src_arr, $parent_id = 0, $tree = array())
	{
		foreach($src_arr as $idx => $row)
		{
			if($row['parent_id'] == $parent_id)
			{
				foreach($row as $k => $v)
					$tree[$row['menuid']][$k] = $v;
				unset($src_arr[$idx]);
				$tree[$row['menuid']]['children'] = buildtree($src_arr, $row['menuid']);
			}
		}
		ksort($tree);
		return $tree;
	}	
    //to get recursive data of a node
	function fetch_recursive($src_arr, $currentid, $parentfound = false, $cats = array())
	{
		foreach($src_arr as $row)
		{
			if((!$parentfound && $row['menuid'] == $currentid) || $row['parent_id'] == $currentid)
			{
				$rowdata = array();
				foreach($row as $k => $v)
					$rowdata[$k] = $v;
				$cats[] = $rowdata;
				if($row['parent_id'] == $currentid)
					$cats = array_merge($cats, fetch_recursive($src_arr, $row['menuid'], true));
			}
		}
		return $cats;
	}
	//print list of an array
	function printList($array = null) {
        if (count($array)) {
            echo "<ul>";

            foreach ($array as $item) {
                echo "<li>";
                echo $item['label'];
                if (count($item['children'])) {
                    echo '&nbsp;&nbsp;'.count($item['children']);
					printList($item['children']);
                }
                echo "</li>";
            }

            echo "</ul>";
        }
    }
	//get all the children
	function getChildren($parent)
	{
		$CI = & get_instance();
		$userid = $CI->session->userdata('userid');
		$CI->load->model('users/users_model');
		$result= $CI->users_model->dynamicMenuSQL($parent);

		$children = array();
		for($i=0;$i<count($result);$i++)
			{
			$children[$i] = array();
			$children[$i]['label'] = $result[$i]['label'];
			$children[$i]['children'] = getChildren($result[$i]['menuid']);
			$i++;
			}
			return $children;
	}
	//left panel
	function LeftPanel()
	{
		/*
		$CI = & get_instance();
		$userid = $CI->session->userdata('userid');
		$CI->load->model('users/users_model');
		$result= $CI->users_model->dynamicMenuSQL();
		
		$getdata=buildtree($result);
		$printdata=printList($getdata);
		
		
		$getdata=fetch_recursive($result,6);
		echo '<pre>';
		print_r($getdata);
		print_r($printdata);
		echo '</pre>';
		die('stopper.........');
		*/
		
		$CI = & get_instance();
		$userid = $CI->session->userdata('userid');
		$CI->load->model('users/users_model');
		//$userid=23;
        $userid = $CI->session->userdata('userid');
		$result= $CI->users_model->dynamicMenu($userid);

		if(count($result)>0)
		{
			$str= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-box zero-padding">';
			$str.='<ul class="nav nav-list-main">';
			foreach($result as $menu)
			{
                $submenu= $CI->users_model->dynamicSubMenu($menu['menuid']);
                $str.='<li class="	"><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> '.$menu['label'].'('.count($submenu).')</label>';
				$str.='<ul class="nav nav-list nav-left-ml">';
				//fetch submenu of a menu

				foreach($submenu as $menudata)
				{
                    $submenuid= $CI->users_model->dynamicSubMenu($menudata['menuid']);
					$str.='<li><a onclick="submenu('.$menudata['menuid'].');" class="color" href="javascript:void(0);">'.$menudata['label'].'('.count($submenuid).')</a><span id="'.$menudata['menuid'].'"></span></li>';
				}
				//fetch submenu
				$str.='</ul>';
				$str.='</li>';
			}
			$str.='</ul>';
			$str.='</div>';
		}
		else
		{
			$str= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-box zero-padding">
        	<ul class="nav nav-list-main">
			<li class=""><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> Date</label>
            <ul class="nav nav-list nav-left-ml">
                <li><a  class="color" href="#">Today</a></li>
                <li><a  class="color" href="#">Yesterday</a></li>
				<li><a  class="color" href="#">Last Week</a></li>
                <li><a  class="color" href="#">Last Month</a></li>
            </ul><!--nav-left-ml-->
			</li><!--li class-""-->
			<li class=""><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> Docufiler</label>
			</li><!--li class-""-->
			<li class=""><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> Miscellaneous</label>
			</li><!--li class-""-->
			</ul><!--nav-list-main-->
			</div>';
		}
		return $str;
	}
	
