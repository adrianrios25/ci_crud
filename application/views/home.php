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
		<div class="panel-heading">Add Article</div>
		<div class="panel-body">
			<?php if(validation_errors()){?>
				<div class="alert alert-danger">
				<?php echo validation_errors()?>	
				</div>
			<?php }?>
			<?php echo form_open('home/create', array('role'=>'form'))?>
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" id="title" class="form-control" required="required"/>
				</div>
				<div class="form-group">
					<label for="content">Content</label>
					<textarea name="content" id="" cols="20" rows="5" class="form-control" required="required"></textarea>
				</div>
				
				<input type="submit" value="Save" class="btn btn-primary"/>
			<?php form_close();?>			
		</div>
	</div>
	</div>
	</div>
	<hr />
	<div class="page-header">
	<h2>Articles</h2>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
			<div class="list-group">
				<?php if(isset($articles)){?>
				<?php foreach($articles as $art){?>
				<div class="list-group-item">
					<h3><?php echo htmlspecialchars($art->title)?></h3>
					<p><?php echo htmlspecialchars($art->content);?></p>
					<?php echo anchor('home/edit/'.$art->id,'Edit', array("class"=>"btn btn-success"));?>
					<?php echo anchor('home/delete/'.$art->id,'Delete', array("class"=>"btn btn-danger", "onClick"=>"return confirm('Do you want to delete this article?')"));?>
					
				</div>
				<?php }?>
				<?php }?>
			</div>
		</div>
	</div>
	</div> <!-- end container -->	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
	
</body>
</html>