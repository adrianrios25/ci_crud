<?php 
if(isset($article)){
foreach($article as $row){
$id = $row->id;
$title = htmlspecialchars($row->title);
$content = htmlspecialchars($row->content);
}
}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CI + Codeigniter CRUD Sample</title>

<!-- Bootstrap -->
<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
	<div class="container-fluid theme-showcase" role="main">
	<div class="row">	
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="page-header">
				<h1>CI + Bootstrap CRUD Sample</h1>
			</div>
		</div>
	</div>
	<div class="row">
	<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
	<div class="panel panel-primary">
		<div class="panel-heading">Edit Article</div>
		<div class="panel-body">
			<?php if(isset($_SESSION['update_message'])){?>
				<div class="alert alert-danger">
				<?php echo $_SESSION['update_message']?>	
				</div>
			<?php }?>
			<?php $this->session->unset_userdata('update_message');?>
			<?php echo form_open('home/update')?>
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" id="title" class="form-control" required="required" value="<?php if(isset($title)) echo $title?>" />
				</div>
				<div class="form-group">
					<label for="content">Content</label>
					<textarea name="content" id="" cols="20" rows="5" class="form-control" required="required"><?php if(isset($content)) echo $content; ?></textarea>
				</div>
				<input type="hidden" name="id" value="<?php if(isset($id)) echo $id?>" readonly="readonly" />			
				<input type="submit" value="Save" class="btn btn-primary"/>
				<?php echo anchor('home', 'Cancel', array('class'=>'btn btn-danger'))?>
			<?php form_close();?>
		</div>
	</div>
	</div>
	</div>
	</div>
</body>
</html>