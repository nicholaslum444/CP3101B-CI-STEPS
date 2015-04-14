
<?php

class DatabaseT extends CI_Controller {

	public $STUDENT = 3;
	public $PROFESSOR = 2;

	public $VEGE = 1;
	public $NON_VEGE = 2;
	public $MUSLIM = 3;
	public $NON_MUSLIM = 4;


	public function index() {
		$this -> load -> model('Dbadmin');
        $this -> load -> model('Dbquery');
		$this -> load -> model('Dbinsert');
		$qqq = $this->Dbquery->getLatestIterationInfo();
		echo json_encode($qqq)."<br>";
		echo gettype(strtotime($qqq['endTime']));
		echo strtotime($qqq['endTime']);
		echo password_verify("munaw",'$2y$10$ot03u.TUWEIztwB1NrwSEOUc5qESTtFpcLSp2smk7L49GFANId6k.');
		echo "<br>".password_hash("munaaw",PASSWORD_DEFAULT)."<br>";
		 echo "<br>";
		$myt =  password_hash("weiming",PASSWORD_DEFAULT);
		echo "<br>".(password_verify("weiming", $myt))."<br>";
		echo "<br>".(password_verify("weiming", $myt))."<br>";
		 echo password_hash("munaw",PASSWORD_DEFAULT);
		 echo "<br>";
		echo password_hash("weiming",PASSWORD_DEFAULT);
		echo "<br>";
		echo password_hash("sharmine",PASSWORD_DEFAULT);
		echo "<br>";
		echo password_hash("nicholas",PASSWORD_DEFAULT);
  		echo "<br>";
		$resultAA = $this -> Dbadmin -> getAllModulesByIteration(6);
		echo count($resultAA);
		echo "<table style='border: solid 1px;'>";
		echo "<tr  style='border: solid 1px;'><td>ID</td><td>Code</td><td>Name</td><td>Description</td><td>Prof</td><td>ID</td><td>title</td>";
		for($i = 0; $i < count($resultAA); ++$i) {
			$supervisor = $resultAA[$i]['supervisor'][0];
			$code = $resultAA[$i]['moduleCode'];
			$id = $resultAA[$i]['moduleID'];
			$name = $resultAA[$i]['moduleName'];
			$desc = $resultAA[$i]['moduleDescription'];
			$first = true;
			foreach($resultAA[$i]['projectList'] as $project) {
				echo "<tr>";	
				if($first) {
					echo "<td style='border: solid 1px;'>".$id."</td>";
					echo "<td style='border: solid 1px;'>".$code."</td>";
					echo "<td style='border: solid 1px;'>".$name."</td>";
					echo "<td style='border: solid 1px;'>".$desc."</td>";
					echo "<td style='border: solid 1px;'>".json_encode($supervisor)."</td>";
					echo "<td style='border: solid 1px;'>".$project['projectID']."</td>";
					echo "<td style='border: solid 1px;'>".$project['title']."</td>";
					$first = false;
				} else {
					echo "<td style='border: solid 1px;'></td>";
					echo "<td style='border: solid 1px;'></td>";
					echo "<td style='border: solid 1px;'></td>";
					echo "<td style='border: solid 1px;'></td>";
					echo "<td style='border: solid 1px;'></td>";
					echo "<td style='border: solid 1px;'>".$project['projectID']."</td>";
					echo "<td style='border: solid 1px;'>".$project['title']."</td>";

				}
					
			}
		}
		echo "</table>";

		$resultBB = $this -> Dbquery -> getSupervisedModuleByID("A0101075B",6);
		echo json_encode($resultBB);
		if($this->Dbadmin->isAdmin("munaw","munaw")) echo "trueTT"; else echo "falseFF";
		if($this->Dbadmin->isAdmin("ngicholas","nicholas")) echo "taarueTT"; else echo "falseFF";
		if($this->Dbadmin->isAdmin("shagrmine","sharmine")) echo "trueTfvdfT"; else echo "falseFF";
		if($this->Dbadmin->isAdmin("wegiming","weiming")) echo "trueqqqTT"; else echo "falseFF";
		
		 $res1 = $this->Dbadmin->addAdminToStep("anewuser","pass","II","jjj@gmail.com",77665544);
		 if($res1) echo "ADDED<br>";
		  $res2 = $this->Dbadmin->editAdminInfo("anewuser","pass","Special","ggg.gmail",73564343);
		 if($res2) echo "changed<br>";
		 $res3 = $this->Dbadmin->changeAdminPassword("newuser","pass","passwd");
		 if($res3) echo "W changed<br>";
		 $res4 = $this->Dbadmin->isAdmin("newuser","passwd");
		 if($res4) echo json_encode($res4."dddd");


		$this-> Dbinsert->setLeaderForProject("A0201314B", 1201);
        if($this-> Dbquery->isLeader("A0201314B", 1201)) {
        	echo "TRUE";
        } else if(!$this-> Dbquery->isLeader("A0201314B", 1201)) {
        	echo "FALSE";
        } else {
        	echo "ZZZ";
        }

		$resZZ = $this-> Dbquery -> getModuleProjectForStudent("A0123456B",6);
		echo json_encode($resZZ);

		echo "<br><br><br>";
        $resCC = $this-> Dbquery -> getProjectListWithNoMemberByModule("aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa");
        echo json_encode($resCC);

        $resMM = $this->Dbquery-> getProjectDetailsByProjectID(1001);
        echo json_encode($resMM);
		$res225 = $this->Dbquery->getStudentsNotInProjectGroupByModule("aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa");
		for($i = 0; $i < count($res225); ++$i) {
			echo $res225[$i]['name']."  ".$res225[$i]['userID']."  ".$res225[$i]['contact']."  ".$res225[$i]['email']."  ".$res225[$i]['foodPref']."<br>";
		}
		$resabc = $this->Dbadmin->getAdminDetails("munaw","munaw");
		echo $resabc['name'].$resabc['contact'].$resabc['email'];
		
		$this->Dbadmin->dropSteps("munaw","munaw",5);
		$this->Dbadmin->dropSteps("munaw","munaw",8);
		$this->Dbadmin->openSteps("munaw","munaw","myste5p","2012-02-05","2012-02-06","2012-02-07","2012-02-08");

		$this->Dbadmin->editIteration("munaw","munaw",14,17,null,null,null,null);
		// $this->Dbadmin->openSteps("munaw","munaw","aaagrtgaaa");
		$test = $this -> Dbquery->getModuleDetailByModuleID("aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa");
		echo JSON_encode($test);
		echo "************************";
		$result1 =  $this->Dbinsert->insertStudentBaseInfo("A999B","Testing me");
		$result2 =  $this->Dbinsert
		->updateStudentDetail("A999B","hahaha@gmail.com",333644,$this->MUSLIM);
		$result3 =  $this->Dbinsert->insertProfBasicDetail("A0090003N","Prof ABC");
		$result4 =  $this->Dbinsert
		->updateProfDetail("A0101095B", "Prof ABC", "profA@nus.edu",$this->VEGE,87654237);
		 $result5 =  $this->Dbinsert->createModule("CS4321","TESTING MOD","gggggggg-gggg-gggg-gggg-gggggggggggg",4,"A0101075B");
		$result31 =  $this->Dbinsert
		->createProject("PLAY game","gggggggg-gggg-gggg-gggg-gggggggggggg");
		$resultzz = $this->Dbquery->getProjectListWithNoMemberByModule("gggggggg-gggg-gggg-gggg-gggggggggggg");
		$myID = "";
		for($i = 0; $i < count($resultzz); ++$i) {
			if(strcmp($resultzz[$i]['title'],"PLAY game") == 0) {
				$myID = $resultzz[$i]['projectID'];
				break;
			}
		}
		echo $myID . " is HERER                  g bf<br>";
		$result32 =  $this->Dbinsert
		->updateProject($myID,"Play another game","play play play","www.post.com/abs","www.video.com/fjdb");
		 $result61 = $this->Dbinsert
		 ->updateModuleDescription("gggggggg-gggg-gggg-gggg-gggggggggggg",null,null,null);
		 echo json_encode($result61);
		$result63 = $this->Dbquery
		->getModuleDetailByModuleID("aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa");
		echo json_encode($result63)."<br><br>";

		$result32 =  $this->Dbinsert
		->setLeaderForProject("A999B",$myID);

		$result34 =  $this->Dbinsert
		->checkParticipatedProjectInModule("gggggggg-gggg-gggg-gggg-gggggggggggg","A999B");

		$result35 =  $this->Dbinsert
		->insertStudentToProject($myID,"A999B");
		$result36 =  $this->Dbinsert
		->checkParticipatedProjectInModule("gggggggg-gggg-gggg-gggg-gggggggggggg","A999B");
		

		$result37 =  $this->Dbinsert
		->deleteStudentFromProject($myID,"A999B");
		 $result33 =  $this->Dbinsert
		 ->deleteProject($myID);

		 $result38 =  $this->Dbinsert
		->insertModuleSupervision("A999B","gggggggg-gggg-gggg-gggg-gggggggggggg");
		$result39 =  $this->Dbinsert
		->dropSupervising("A999B","gggggggg-gggg-gggg-gggg-gggggggggggg");

		$result39 =  $this->Dbinsert
		->dropSupervising("A0101075B","gggggggg-gggg-gggg-gggg-gggggggggggg");

		$result40 =  $this->Dbinsert
		->dropParticipatingModule("gggggggg-gggg-gggg-gggg-gggggggggggg");


		$result = $this->Dbquery->getLatestIteration();
		echo json_encode($result);
		$result50 = $this->Dbquery->getModuleDetailByModuleID("aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa");
		echo json_encode($result50);
		$result =  $this->Dbquery->getStudentByModule("aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa");
		$result6 =  $this->Dbquery->getStudentDetailByProject(1001);
		$result7 =  $this->Dbquery->getProjectListByModule("aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa");
		$result8 =  $this->Dbquery->getModuleListByIteration(6);
		$result9 =  $this->Dbquery->getSupervisedModuleByID("A0101095B", 6);
		$result0 =  $this->Dbquery->getFoodPrefByIteration(6);


		$qwe = $this->Dbinsert->rankProjectInModule("aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa",1000,1);
		$qwe = $this->Dbinsert->rankProjectInModule("aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa",1001,2);
		$qwe = $this->Dbinsert->rankProjectInModule("aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa",1002,3);
		$qwe = $this->Dbinsert->rankProjectInModule("aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa",1003,3);
		$qwe = $this->Dbinsert->rankProjectInModule("aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa",1004,3);
		$qwe = $this->Dbinsert->dropRanking(1004);
		$qwe = $this->Dbquery->getRankingByModule("aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa");

		echo json_encode($qwe);

		$this->Dbinsert->addMediaToModule("aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa", "gg", "game over");
		$wer = $this->Dbquery->getModuleDetailByModuleID("aaaaaaaa-aaaa-aaaa-aaaa-aaaaaaaaaaaa");

		echo json_encode($wer['poster']." ".$wer['video']);

		// echo "<table style='border: solid 1px;'>";
		// echo "<tr  style='border: solid 1px;'><td>Matric No</td><td>Name</td><td>Contact</td><td>FoodPref</td>";
		// for($i = 0; $i < count($result); ++$i) {

		// 	echo "<tr>";	
		// 	echo "<td style='border: solid 1px;'>".$result[$i]['userID']."</td>";
		// 	echo "<td style='border: solid 1px;'>".$result[$i]['name']."</td>";
		// 	echo "<td style='border: solid 1px;'>".$result[$i]['contact']."</td>";
		// 	echo "<td style='border: solid 1px;'>".$result[$i]['foodPref']."</td>";	
		// 	echo "</tr>";
		// }
		// echo "</table>";


	}
}
?>
