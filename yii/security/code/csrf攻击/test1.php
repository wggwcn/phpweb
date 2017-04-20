<form method='post'>
	<input type='text' name='title' value='hello world'/>
	<input type='hidden' name='_csrf' value='<?=$csrfToken;?>'/>
	<input type='submit' value='提交'/>
</form>