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
		return '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-box zero-padding">
        	<ul class="nav nav-list-main">
      <li class=""><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> Folder 1</label>
            <ul class="nav nav-list nav-left-ml">
                <li><a  class="color" href="#">Link</a></li>
                <li><a  class="color" href="#">Link</a></li>
                <li><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> Folder1.1</label>
                    <ul class="nav nav-list nav-left-ml">
                        <li><a class="color" href="#">Link</a></li>
                        <li><a class="color" href="#">Link</a></li>
                        <li><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> Folder 1.1.1</label>
                            <ul class="nav nav-list nav-left-ml">
                                <li><a class="color" href="#">Link</a></li>
                                <li><a class="color" href="#">Link</a></li>
                            </ul><!--nav-left-ml-->
                        </li><!--li blank-->
                    </ul><!--nav-left-ml-->
                </li><!--li blank-->
            </ul><!--nav-left-ml-->
        </li><!--li class-""-->
        
        
    </ul><!--nav-list-main-->
        </div>';
	}
	
