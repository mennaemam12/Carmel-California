<?php
require_once 'models/User.php';
require_once 'models/Permission.php';
require_once 'models/UserType.php';
require_once 'controllers/user_type.controller.php';
require_once 'controllers/user.controller.php';

if (isset($_SESSION['user'])) {
    $user = new User;
    $user->unserialize($_SESSION['user']);
    $userType = $user->getType();

    // Check if the user is allowed to access this page
    if (!$userType->isAllowed('dashboard/users')) {
        include 'views/404.php';
        exit();
    }
}

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

        case 'edituser':
            if (!isset($_GET['id'])) {
                include 'views/404.php';
                exit();
            }

            $userID = $_GET['id'];

            // Check if the user exists
            $user = User::findUserByID($userID);
            if (!$user) {
                include 'views/404.php';
                exit();
            }

            $userTypes = UserType::getAllUserTypes();

            include 'views/dashboard/users/edituser.php';
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

        case 'edituser':
            $user = new UserController;
            $user->editUserType();
            exit();

        case 'deleteuser' :
            $user = new User;
            $userID = $_POST['id'];
            $user->delete($userID);
            redirect("/dashboard/users");
            exit();

        case 'deleteusertype' :
            $userType = new UserTypeController;
            $userType->delete();
            exit();

        default:
            include 'views/404.php';
            exit();
    }
}