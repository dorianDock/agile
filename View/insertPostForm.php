<form role="form" action="/insertPost" method="post">
	<input type="text" class="form-control" name="title" placeholder="Titre"><br/>
	<input type="hidden" class="form-control" name="idUser">
	<input type="hidden" class="form-control" name="idPostParent">
	<textarea class="form-control" name="message" rows="3"></textarea><br/>
	<button type="submit" class="btn btn-default">Submit</button>
</form>