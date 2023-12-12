<?php
require_once 'models/User.php';
require_once 'models/Permission.php';
require_once 'models/UserType.php';
require_once 'controllers/user_type.controller.php';
require_once 'controllers/user.controller.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['action'])) {
        include 'views/dashboard/users/users.php';
        exit();
    }

    $action = strtolower(trim($_GET['action']));

    switch ($action) {
        case 'viewusertypes':
            $userTypes = UserType::getAllUserTypes();
            include 'views/dashboard/users/usertypes.php';
            exit();

        case 'addtype':
            $permissions = Permission::getAllPermissions();
            include 'views/dashboard/users/addusertype.php';
            exit();

        case 'edittype':

            if (!isset($_GET['id'])) {
                include 'views/404.php';
                exit();
            }

            $userTypeID = $_GET['id'];

            // Check if the UserType exists
            if (!UserType::doesExistByID($userTypeID)) {
                include 'views/404.php';
                exit();
            }

            $userType = new UserType($userTypeID);
            $permissions = Permission::getAllPermissions();
            $selectedPermissions = $userType->getPermissions();

            $unselectedPermissions = [];

            foreach ($permissions as $permission) {
                $found = false;

                foreach ($selectedPermissions as $selectedPermission) {
                    if ($permission->getID() == $selectedPermission->getID()) {
                        $found = true;
                        break;
                    }
                }

                if (!$found)
                    $unselectedPermissions[] = $permission;
            }

            include 'views/dashboard/users/editusertype.php';
            exit();
        default:
            include 'views/404.php';
            exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_GET['action'])) {
        include 'views/404.php';
        exit();
    }

    $action = strtolower(trim($_GET['action']));

    switch ($action) {
        case 'addtype':
            $userType = new UserTypeController;
            $userType->add();
            exit();
        case 'edittype':
            $userType = new UserTypeController;
            $userType->edit();
            exit();
        case 'makeadmin' :
            $user = new User;
            $userID = $_POST['id'];
            $user->Makeadmin($userID);
            redirect($GLOBALS['projectFolder'] . "/dashboard/users");
            exit();
        case 'deleteuser' :
            $user = new User;
            $userID = $_POST['id'];
            $user->delete($userID);
            redirect($GLOBALS['projectFolder'] . "/dashboard/users");
            exit();
//        case 'deleteusertype' :
//            $userType = new UserType;
//            $userTypeID = $_POST['id'];
//            $userType->delete($userTypeID);
//            redirect($GLOBALS['projectFolder'] . "/dashboard/users?action=viewusertypes");
//            exit();

        default:
            include 'views/404.php';
            exit();
    }
}