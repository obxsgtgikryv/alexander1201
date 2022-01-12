<?php
	require_once 'employee.php';
	require_once 'database.php';

	$employee = new Employee();
	$database = new Database();

	if(isset($_REQUEST['action'])) {
		switch($_REQUEST['action']) {
			case 'create':
				$employee->__set('Nombre',   $_REQUEST['Nombre']);
				$employee->__set('Apellido', $_REQUEST['Apellido']);
				$employee->__set('Correo',   $_REQUEST['Correo']);

				$database->create($employee);
				header('Location: index.php');
				break;

			case 'edit':
				$employee = $database->read($_REQUEST['id']);
				break;

			case 'update':
				$employee->__set('id',       $_REQUEST['id']);
				$employee->__set('Nombre',   $_REQUEST['Nombre']);
				$employee->__set('Apellido', $_REQUEST['Apellido']);
				$employee->__set('Correo',   $_REQUEST['Correo']);

				$database->update($employee);
				header('Location: index.php');
				break;

			case 'delete':
				$database->delete($_REQUEST['id']);
				header('Location: index.php');
				break;
		}
	}

	$unique = $database->read(912345678);
	$exists = $unique!=null ? true : false;
	$unique = $exists ? $unique : new Employee();
	$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
	$editing = !$exists || $action=='edit';

	// echo "exists : "; echo $exists ? 1 : 0; echo ";<br/>";
	// echo "action : "; echo $action; echo ";<br/>";
	// echo "editing : "; echo $editing ? 1 : 0; echo ";<br/>";
	// echo "id : "; echo $unique->__get('id'); echo ";<br/>";
	// echo "Nombre : "; echo $unique->__get('Nombre'); echo ";<br/>";
	// echo "Apellido : "; echo $unique->__get('Apellido'); echo ";<br/>";
	// echo "Correo : "; echo $unique->__get('Correo'); echo ";<br/>";
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Unidad 1201</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="padding:15px;">

	<!-- Form -->
	<?php if ($editing): ?>
		<form action="?action=<?php echo $employee->id > 0 ? 'update' : 'create'; ?>" method="post" style="margin-bottom:30px;">
			<input type="hidden" name="id" value="<?php echo $employee->__get('id'); ?>" />
			<table style="width:500px;">
				<tr>
					<th style="text-align:left;">Nombre</th>
					<td><input type="text" name="Nombre" value="<?php echo $employee->__get('Nombre'); ?>" style="width:100%;" /></td>
				</tr>
				<tr>
					<th style="text-align:left;">Apellido</th>
					<td><input type="text" name="Apellido" value="<?php echo $employee->__get('Apellido'); ?>" style="width:100%;" /></td>
				</tr>
				<tr>
					<th style="text-align:left;">Correo</th>
					<td><input type="text" name="Correo" value="<?php echo $employee->__get('Correo'); ?>" style="width:100%;" /></td>
				</tr>
				<tr>
					<td colspan="2">
						<button type="submit">Guardar</button>
					</td>
				</tr>
			</table>
		</form>
	<?php endif; ?>

	<!-- Table -->
	<?php if (!$editing): ?>
		<table>
			<thead>
				<tr>
					<th style="text-align:left;">Nombre</th>
					<th style="text-align:left;">Apellido</th>
					<th style="text-align:left;">Correo</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
				<tr>
					<td><?php echo $unique->__get('Nombre'); ?></td>
					<td><?php echo $unique->__get('Apellido'); ?></td>
					<td><?php echo $unique->__get('Correo'); ?></td>
					<td>
						<a href="?action=edit&id=<?php echo $unique->id; ?>">Editar</a>
					</td>
					<td>
						<a href="?action=delete&id=<?php echo $unique->id; ?>">Eliminar</a>
					</td>
				</tr>
		</table>
	<?php endif; ?>

</body>
</html>