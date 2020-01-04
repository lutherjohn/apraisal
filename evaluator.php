<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Evaluator Page</title>

</head>
<body>
<?php 
$evaluator = '';
$evaluator = $this->session->userdata('username');
if(!$evaluator){
	redirect('Mainx/login');
}
$fname = '';
$midname = '';
$lastname = '';
$emp_id = '';

$sql = $this->db->select("*")->from("tb_employee")->where("username",$evaluator)->get();
foreach($sql->result() as $r){
    $emp_id = $r->employee_id;
    $fname = $r->firstname;
    $midname = $r->mi;
    $lastname = $r->lastname;
}

$sql2 = $this->db->select("*")->from("tb_employee")->get();
?>
<p><?php echo $fname. ' ' .$midname. ' ' .$lastname; ?></p>
<a href = '<?php echo base_url(). "mainx/logout" ?>' ><i class="fa fa-sign-out fa-fw"></i> Logout</a>

<div class="message">The message has successfully been sent.<br />
<a href="list.php">List of my personnal messages</a></div>
<div class="content">
	<h1>New Personnal Message</h1>
        <?php echo validation_errors(); ?>
    	<?php echo form_open('mainx/evaluator_form'); ?>
		Please fill the following form to send a personnal message.<br />
		<input type="hidden" id="subject" name="sender" value = "<?php echo $emp_id; ?>" />
        <label for="title">Title</label><input type="text" value="" id="subject" name="subject" /><br />
        <label for="recip">Recipient</label>
        
        <select name = "recipient">
        	<?php foreach($sql2->result() as $raw):?>
        		<option value = <?php echo $raw->username;?> ><?php echo $raw->username;?></option>
        	<?php endforeach;?>
        </select>
        
        <br />
        <label for="message">Message</label><textarea cols="40" rows="5" id="message" name="message"></textarea><br />
        <input type="submit" value="Send" />
    </form>
</div>
<footer>
    <p>Desmark Corporation &copy; 2016</p>
</footer>
</body>
</html>
