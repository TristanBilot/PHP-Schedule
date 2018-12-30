<?php  
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    

    
        if (isset($_GET['controle']) && isset($_GET['action'])) {
                $controle = $_GET['controle'];
                $action = $_GET['action'];
        }
    
	else {
		$controle = "utilisateur";
        $action = "ident";
	}

    if (isset($_GET['parametre'])) {
        $parametre = $_GET['parametre'];
    }
    else {
        $parametre = "";
    }
    
        require ("./C/" . $controle . ".php"); 
        $action($parametre);
        
?>
<head >
    <meta charset="UTF-8">
</head>

<html>
<link rel = "stylesheet" href="https://bootswatch.com/4/slate/bootstrap.min.css"/>
<link rel = "stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">        
<link rel = "stylesheet" href="./V/styleCSS/style.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>