<?php
require_once('../config.php');
Class Content extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
	public function update(){
		extract($_POST);
		$content_file="../".$file.".html";
		$update = file_put_contents($content_file, $content);
		if($update){
			return json_encode(array("status"=>"success"));
			$this->settings->set_flashdata("success",ucfirst($file)." content is successuly updated");
			exit;
		}
	}
	public function education(){
	extract($_POST);
	$resp = [];

	// Sanitize inputs
	$school = trim($school);
	$degree = trim($degree);
	$month = trim($month);
	$year = trim($year);
	$description = addslashes(htmlentities($description));

	if(empty($school) || empty($degree) || empty($month) || empty($year)){
		$resp['status'] = 'failed';
		$resp['message'] = 'Please fill all required fields.';
		return json_encode($resp);
		exit;
	}

	if(empty($id)){ 
		// Insert new record
		$stmt = $this->conn->prepare("INSERT INTO education (school, degree, month, year, description) VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $school, $degree, $month, $year, $description);
		$action = "added";
	} else {
		// Update existing record
		$stmt = $this->conn->prepare("UPDATE education SET school=?, degree=?, month=?, year=?, description=? WHERE id=?");
		$stmt->bind_param("sssssi", $school, $degree, $month, $year, $description, $id);
		$action = "updated";
	}

	if($stmt->execute()){
		$resp['status'] = 'success';
		$resp['message'] = "Educational attainment successfully $action.";
		$this->settings->set_flashdata('success', $resp['message']);
	} else {
		$resp['status'] = 'failed';
		$resp['message'] = 'Database error: ' . $stmt->error;
	}

	$stmt->close();
	return json_encode($resp);
	exit;
}

public function education_delete(){
	// Prevent any output before JSON
	if (ob_get_level()) ob_end_clean();
	header('Content-Type: application/json');
	extract($_POST);
	$resp = [];

	if(empty($id)){
		$resp['status'] = 'failed';
		$resp['message'] = 'Invalid ID.';
		echo json_encode($resp);
		exit;
	}

	$stmt = $this->conn->prepare("DELETE FROM education WHERE id = ?");
	$stmt->bind_param("i", $id);

	if($stmt->execute()){
		$resp['status'] = 'success';
		$resp['message'] = "Educational attainment successfully deleted.";
		$this->settings->set_flashdata('success', $resp['message']);
	} else {
		$resp['status'] = 'failed';
		$resp['message'] = 'Database error: ' . $stmt->error;
	}

	$stmt->close();
	echo json_encode($resp);
	exit;
}


	public function work(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k,array('id','description','s_month','s_year','e_month','e_year'))){
				if(!empty($data)) $data .= ", ";
				$data .= "`$k` = '$v'";
			}
		}
				if(!empty($data)) $data .= ", ";
				$data .= "`description` = '".addslashes(htmlentities($description))."'";

				$data .= ",`started` = '{$s_month}_{$s_year}'";
				if(isset($present) && $present =='on'){
					$data .= ",`started` = 'Present";
				}else{
					$data .= ",`ended` = '{$e_month}_{$e_year}'";
				}

		if(empty($id)){
			$sql ="INSERT INTO work set $data";
		}else{
			$sql ="UPDATE work set $data where id = {$id}";
		}
		$save = $this->conn->query($sql);
		$action = empty($id) ? "added":"updated";
		if($save){
			$resp['status']='success';
			$resp['message']= " Work Details successfully ".$action;
			$this->settings->set_flashdata('success',$resp['message']);
			
		}else{
			$resp['status']='failed';
			$resp['message']= " error:".$sql;
		}
		return json_encode($resp);
		exit;
	}

	public function work_delete(){
		extract($_POST);
		$qry = $this->conn->query("DELETE FROM work where id = $id");
		if($qry){
			$resp['status']='success';
			$resp['message']= " Work Details successfully deleted";
			$this->settings->set_flashdata('success',$resp['message']);
		}
	}

	public function project(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k => $v){
			if(!in_array($k,array('id','description','summary'))){
				if(!empty($data)) $data .= ", ";
				$data .= "`$k` = '$v'";
			}
		}
				if(!empty($data)) $data .= ", ";
				$data .= "`description` = '".addslashes(htmlentities($description))."'";
				$data .= ",`summary` = '".addslashes($summary)."'";

		if(isset($_FILES['img']) && $_FILES['img']['tmp_name'] != ''){
				$fname = 'uploads/'.strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
				$move = move_uploaded_file($_FILES['img']['tmp_name'],'../'. $fname);
				if($move){
					$data .=" , banner = '{$fname}' ";
				}
		}	

		if(empty($id)){
			$sql ="INSERT INTO project set $data";
		}else{
			$sql ="UPDATE project set $data where id = {$id}";
		}
		$save = $this->conn->query($sql);
		$action = empty($id) ? "added":"updated";
		if($save){
			$resp['status']='success';
			$resp['message']= " Project Details successfully ".$action;
			$this->settings->set_flashdata('success',$resp['message']);
			
		}else{
			$resp['status']='failed';
			$resp['message']= " error:".$sql;
		}
		return json_encode($resp);
		exit;
	}

	public function project_delete(){
		extract($_POST);
		$qry = $this->conn->query("DELETE FROM project where id = $id");
		if($qry){
			$resp['status']='success';
			$resp['message']= " Project Details successfully deleted";
			$this->settings->set_flashdata('success',$resp['message']);
		}
	}
	public function contact(){
		extract($_POST);
		$data = "";
		foreach ($_POST as $key => $value) {
			if(!empty($data)) $data .= ", ";
				$data .= "('{$key}','{$value}')";
		}
		$this->conn->query("TRUNCATE `contacts`");
		$sql = "INSERT INTO `contacts` (meta_field, meta_value) Values $data";
		$qry = $this->conn->query($sql);
		if($qry){
			$resp['status']='success';
			$resp['message']= " Contact Details successfully updated";
			$this->settings->set_flashdata('success',$resp['message']);
		}else{
			$resp['status']='error';
			$resp['message']= $sql;
		}
		return json_encode($resp);
		exit;
	}
}

$Content = new Content();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'update':
		echo $Content->update();
	break;
	case 'education':
		echo $Content->education();
	break;
	case 'education_delete':
		echo $Content->education_delete();
	break;
	case 'work':
		echo $Content->work();
	break;
	case 'work_delete':
		echo $Content->work_delete();
	break;
	case 'project':
		echo $Content->project();
	break;
	case 'project_delete':
		echo $Content->project_delete();
	break;
	case 'contact':
		echo $Content->contact();
	break;
	default:
		// echo $sysset->index();
		break;
}