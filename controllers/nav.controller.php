<?php


class NavController{
 
    public function __construct() {

    }


    function getNav() {
        // Create a new PDO instance (replace with your actual connection)
        $db = new PDO('mysql:host=localhost;dbname=Carmel-California', 'root', '');
    
        // Write the query
        $query = "SELECT * FROM navbar WHERE name NOT IN ('Dashboard', 'Logout', 'Sign in')";
    
        // Prepare and execute the query
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        // Fetch all results
        $navItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $navItems;
    }
    
    //get Logout
    function getLogout() {
        // Create a new PDO instance (replace with your actual connection)
        $db = new PDO('mysql:host=localhost;dbname=Carmel-California', 'root', '');
    
        // Write the query
        $query = "SELECT * FROM navbar WHERE name = 'Logout'";
    
        // Prepare and execute the query
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        // Fetch all results
        $navItems = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $navItems;
    }
    
    //get Sign in 
    function getSignin() {
        // Create a new PDO instance (replace with your actual connection)
        $db = new PDO('mysql:host=localhost;dbname=Carmel-California', 'root', '');
    
        // Write the query
        $query = "SELECT * FROM navbar WHERE name = 'Sign in'";
    
        // Prepare and execute the query
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        // Fetch all results
        $navItems = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $navItems;
    }
    
    //get Dashboard
    function getDashboard() {
        // Create a new PDO instance (replace with your actual connection)
        $db = new PDO('mysql:host=localhost;dbname=Carmel-California', 'root', '');
    
        // Write the query
        $query = "SELECT * FROM navbar WHERE name = 'Dashboard'";
    
        // Prepare and execute the query
        $stmt = $db->prepare($query);
        $stmt->execute();
    
        // Fetch all results
        $navItems = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $navItems;
    }
    

}

?>