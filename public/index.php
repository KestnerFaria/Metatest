<?php
require_once __DIR__ . '/../src/config.php';
require_once __DIR__ . '/../src/PetController.php';


$ctrl = new PetController($pdo);
$action = $_GET['action'] ?? 'home';

switch ($action) {
    case 'list':
        $pets = $ctrl->all();
        include __DIR__ . '/../src/views/list.php';
        break;

    case 'new':
    case 'edit':
        $pet = $action === 'edit' 
            ? $ctrl->find((int) $_GET['id']) 
            : null;
        include __DIR__ . '/../src/views/form.php';
        break;

    case 'save':
        $id = $_POST['id'] ?? null;
        if ($id) {
            $ctrl->update((int)$id, $_POST);
        } else {
            $ctrl->create($_POST);
        }
        header('Location: ?action=list');
        break;

    case 'delete':
        $ctrl->delete((int) $_GET['id']);
        header('Location: ?action=list');
        break;

    default:
        include __DIR__ . '/../src/views/home.php';
}
