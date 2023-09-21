<html>
<head>
	<title><?php echo $pageTitle;?></title>
	
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
    <div class="header">
    <header>
        <h1>Drug Info Center</h1>
    </header>
    <nav>
        <ul>
            <li class="addDrug <?php if($section == "addDrug"){echo "on";}?>"><a href="addDrug.php?cat=addDrug">Add Drug</a></li>
            <li class="addDrug <?php if($section == "dashboard"){echo "on";}?>"><a href="dashboard.php?cat=addDrug">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</div>
    <div class="container">