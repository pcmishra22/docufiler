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
	//left panel
	function LeftPanel()
	{
		$CI = & get_instance();
		$userid = $CI->session->userdata('userid');
		$CI->load->model('users/users_model');
		$result= $CI->users_model->dynamicMenu($userid);

		if(count($result)>0)
		{
			$str= '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-box zero-padding">';
			$str.='<ul class="nav nav-list-main">';
			foreach($result as $menu)
			{
				$str.='<li class=""><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> '.$menu['label'].'</label>';
				$str.='<ul class="nav nav-list nav-left-ml">';
				//fetch submenu of a menu
				$submenu= $CI->users_model->dynamicSubMenu($menu['menuid']);
				foreach($submenu as $menudata)
				{
					$str.='<li><a  class="color" href="#">'.$menudata['label'].'</a></li>';	
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
	
