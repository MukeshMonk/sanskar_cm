<?php

			$sbv=$app->getPostVar('year');
			$adm_sum=array();
			$clsenq_sum=array();
			$clsreg_sum=array();
			$clscnf_sum=array();
			$clsenq_sum1=array();
			$clsreg_sum1=array();
			$clscnf_sum1=array();
			$adm_sum[0]="No. of Form";
			$enq_sql = "SELECT * from cm_enquiries where acd_year = '".$sbv."' AND status!='Deleted'";
			$obj_enq=$app->load_model('cm_enquiries');
	  		$rs_enq=$obj_enq->execute("SELECT",false,$enq_sql);
			$adm_sum[1]=count($rs_enq);
			$reg_sql = "SELECT * from cm_register where cm_academic_year = '".$sbv."' AND status!='Deleted'";
			$obj_reg=$app->load_model('cm_register');
	  		$rs_reg=$obj_reg->execute("SELECT",false,$reg_sql);
			$adm_sum[2]=count($rs_reg);
			$cnf_sql = "SELECT * from cm_confirmation where acd_year = '".$sbv."' and status='Admission Granted'";
			$obj_cnf=$app->load_model('cm_confirmation');
	  		$rs_cnf=$obj_cnf->execute("SELECT",false,$cnf_sql);
			$adm_sum[3]=count($rs_cnf);
			$sql_classenq="SELECT cm_classes.name,count(*) as cont_enq from cm_enquiries LEFT JOIN  cm_classes  ON cm_enquiries.enq_class=cm_classes.id where cm_enquiries.acd_year = '".$sbv."' AND cm_enquiries.status!='Deleted' GROUP BY cm_classes.course_id ";
			$obj_clsenq=$app->load_model('cm_enquiries');
	  		$rs_clsenq=$obj_clsenq->execute("SELECT",false,$sql_classenq);
			$clsenq_sum[]='Enquiry Form';
			if(count($rs_clsenq)>0)
			{
				for($i=0;$i<3;$i++)
				{
					if($rs_clsenq[$i]['cont_enq']!='')
					{
						$clsenq_sum[] = $rs_clsenq[$i]['cont_enq'];
						$clsenq_sum1[] = $rs_clsenq[$i]['cont_enq'];
					}
					else
					{
						$clsenq_sum[] = 0;
						$clsenq_sum1[] = 0;
					}
					
				}
			}
			else
			{
				for($i=0;$i<3;$i++)
				{
					$clsenq_sum[] = 0;
					$clsenq_sum1[] = 0;
				}
			}
			//exit;
			
			$sql_classreg="SELECT count(*) as cont_reg from cm_register LEFT JOIN  cm_classes  ON cm_register.enq_class=cm_classes.id where cm_register.cm_academic_year = '".$sbv."' AND cm_register.status!='Deleted' GROUP BY cm_classes.course_id";
			$obj_clsreg=$app->load_model('cm_register');
	  		$rs_clsreg=$obj_clsreg->execute("SELECT",false,$sql_classreg);
			$clsreg_sum[]='Registration Form';
			if(count($rs_clsreg)>0)
			{
				for($i=0;$i<3;$i++)
				{
					if($rs_clsreg[$i]['cont_reg']!='')
					{
						$clsreg_sum[] = $rs_clsreg[$i]['cont_reg'];
						$clsreg_sum1[] = $rs_clsreg[$i]['cont_reg'];
					}
					else
					{
						$clsreg_sum[] = 0;
						$clsreg_sum1[] = 0;
					}
					
				}
			}
			else
			{
				for($i=0;$i<3;$i++)
				{
					$clsreg_sum[] = 0;
					$clsreg_sum1[] = 0;
				}
			}
			
			$sql_classcnf="SELECT count(*) as cont_cnf from cm_confirmation LEFT JOIN  cm_classes  ON cm_confirmation.class_no=cm_classes.id where cm_confirmation.acd_year = '".$sbv."' and cm_confirmation.status='Admission Granted' GROUP BY cm_classes.course_id";
			$obj_clscnf=$app->load_model('cm_confirmation');
	  		$rs_clscnf=$obj_clscnf->execute("SELECT",false,$sql_classcnf);
			$clscnf_sum[]='Admission Selected';
			if(count($rs_clscnf)>0)
			{
				for($i=0;$i<3;$i++)
				{
					if($rs_clscnf[$i]['cont_cnf']!='')
					{
						$clscnf_sum[] = $rs_clscnf[$i]['cont_cnf'];
						$clscnf_sum1[] = $rs_clscnf[$i]['cont_cnf'];
					}
					else
					{
						$clscnf_sum[] = 0;
						$clscnf_sum1[] = 0;
					}
					
				}
			}
			else
			{
				for($i=0;$i<3;$i++)
				{
					$clscnf_sum[] = 0;
					$clscnf_sum1[] = 0;
				}
			}
			
			
			echo json_encode(array("adm_sum"=>$adm_sum,"clsenq_sum"=>$clsenq_sum,"clsreg_sum"=>$clsreg_sum,"clscnf_sum"=>$clscnf_sum,"clsenq_sum1"=>$clsenq_sum1,"clsreg_sum1"=>$clsreg_sum1,"clscnf_sum1"=>$clscnf_sum1));

?>