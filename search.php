<?php
    require_once 'autoload.php';
    
    $names = array();

    $dao = new UserDAO(); 
    $organizations = $dao -> getAllOrganizations();
    
    foreach ($organizations as $organization) {
        
        $name = $organization;
        array_push($names,$name);    
        }
 
    //get query parameter from URL
    $query = $_GET["query"];
    $hint = "<ul>";
    // lookup all hints from array if $query is not "" 
    if($query != "") {
        $query = strtolower($query);
        $len = strlen($query);

        foreach($names as $name) {
            // e.g. stristr('USER@EXAMPLE.com', 'e') --> ER@EXAMPLE.COM
            if (stristr($query, substr($name, 0, $len ))) {
                if ($hint == "") {
                    $hint .= "<li><a href='organization.html?Organization=$name' class='fs-3'>".$name."</a></li>";
                } else {
                    $hint .= "<li><a href='organization.html?Organization=$name'>".$name."</a></li>";
                }
            }
        }
    }
    // return the hint if found or "no suggestion" if no hint found 
    echo $hint== "" ? "no suggestion" : $hint."</ul>";
?>