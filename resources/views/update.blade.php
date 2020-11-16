<!DOCTYPE html>
<html>
<head>
<title>Student Management | Edit</title>
</head>
<body>
<form action = "/edit/<?php echo $users[0]->id; ?>" method = "post">
<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
<table>
<tr>
<td>First Name</td>
<td>
<input type = 'text' name = 'name'
value = '<?php echo$users[0]->first_name; ?>'/> </td>
</tr>

<td>First Name</td>
<td>
<input type = 'text' name = 'description'
value = '<?php echo$users[0]->description; ?>'/> </td>
</tr>

</table>
</form>
</body>
</html>