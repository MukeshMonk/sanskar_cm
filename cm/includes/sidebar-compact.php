<?php 

$link_dashbord=CMX_ROOT.'/';

$link_configuration=CMX_ROOT.'/configuration/';

$link_studententry=CMX_ROOT.'/studententry/';

$link_examinationrequirements=CMX_ROOT.'/examination/';



$link_staffinformation=CMX_ROOT.'/staffentry/';

$link_support=CMX_ROOT.'/support/';

$link_settings=CMX_ROOT.'/settings/';

$link_admissioninfo=CMX_ROOT.'/admissionentry/';
 if($_SESSION['Role']==3)
 {
$array_scmenu=array(

	"dashboard"=>array("name"=>"Dashboard","icon_class"=>"font-icon font-icon-home","color"=>"gold","link"=>$link_dashbord),
	"examination"=>array("name"=>"Examination requirements","icon_class"=>"font-icon font-icon-pen-square","color"=>"green","link"=>$link_examinationrequirements),
);
} 
else 
{
$array_scmenu=array(

"dashboard"=>array("name"=>"Dashboard","icon_class"=>"font-icon font-icon-home","color"=>"gold","link"=>$link_dashbord),

"configuration"=>array("name"=>"Configuration","icon_class"=>"font-icon font-icon-cogwheel","color"=>"coral","link"=>$link_configuration),

"studententry"=>array("name"=>"Student Entry","icon_class"=>"font-icon font-icon-user","color"=>"gold","link"=>$link_studententry),

"examination"=>array("name"=>"Examination requirements","icon_class"=>"font-icon font-icon-pen-square","color"=>"green","link"=>$link_examinationrequirements),
"admissionentry"=>array("name"=>"Admission Module","icon_class"=>"font-icon font-icon-plus","color"=>"coral","link"=>$link_admissioninfo),
"staffentry"=>array("name"=>"Staff information","icon_class"=>"font-icon font-icon-home","color"=>"purple","link"=>$link_staffinformation),
/*
"support"=>array("name"=>"Support","icon_class"=>"font-icon font-icon-help","color"=>"orange-red","link"=>$link_support),

"settings"=>array("name"=>"Settings","icon_class"=>"font-icon font-icon-home","color"=>"coral","link"=>$link_settings),
*/
);
}
?>











<nav class="side-menu side-menu-compact">





<ul class="side-menu-list">

<?php 
$view=$this->getGetVar("view");

foreach($array_scmenu as $k=>$menu)

{

	if($view==$k)	

	{

		$active_class="active";

		$opened_class="opened";

	}

	else

	{

		if(($view==""  || $view=="home") && $k=='dashboard')

		{

		$active_class="active";

		$opened_class="opened";

		}

		else

		{

		$active_class="";

		$opened_class="";

		}



	

	

}

?>



 <li class="<?php echo $menu['color']?> <?php echo $opened_class;?>">

	            <a href="<?php echo $menu['link']?>">

	                <i class="<?php echo $menu['icon_class']?> <?php echo $active_class;?>"></i>

	                <span class="lbl"><?php echo $menu['name']?></span>

	            </a>

	        </li>



<?php
} ?>

	       

	    </ul>

	</nav><!--.side-menu-->

