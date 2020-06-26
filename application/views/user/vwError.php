<section class="content">
<?php
//lets have the flashdata overright "$message" if it exists
if($this->session->flashdata('message'))
{
$message    = $this->session->flashdata('message');
}

if($this->session->flashdata('error'))
{
$error  = $this->session->flashdata('error');
}

if(function_exists('validation_errors') && validation_errors() != '')
{
$error  = validation_errors();
}
?>

<div id="js_error_container" class="alert alert-danger" style="display:none;"> 
<p id="js_error"></p>
</div>

<div id="js_note_container" class="alert alert-info" style="display:none;">

</div>

<?php if (!empty($message)): ?>
<div class="alert alert-success">
<a class="close" data-dismiss="alert">×</a>
<?php echo $message; ?>
</div>
<?php endif; ?>

<?php if (!empty($error) && gettype($error) == 'string'): ?>
<div class="alert alert-danger">
<a class="close" data-dismiss="alert">×</a>
<?php echo $error; ?>
</div>
<?php endif; ?>

<?php if (!empty($error) && gettype($error) == 'array'): ?>
<div class="alert alert-danger">
<a class="close" data-dismiss="alert">×</a>
<?php foreach($error as $err){
	echo $err; 
} ?>
</div>
<?php endif; ?>

</section>
