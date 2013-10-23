<?php 
	if(isset($_SESSION['id'])){
	?>
	<form role="form" action="insertPost" method="post">
		<input type="text" class="form-control" name="titre" placeholder="Titre"><br/>
		<input type="hidden" class="form-control" name="idUser" value="<?php echo $_SESSION['id']; ?>">
		<input type="hidden" class="form-control" name="idPostParent">
		<textarea class="form-control" name="message" rows="3"></textarea><br/>
		<button type="submit" class="btn btn-default">Submit</button>
	</form>
	<?php 
	}
?>