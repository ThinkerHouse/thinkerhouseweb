<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>ThinkerHouse</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- END META SECTION -->
        
        <link rel="stylesheet" type="text/css" href="css/revolution-slider/extralayers.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/revolution-slider/settings.css" media="screen" />
        
        <link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />                  

<?php
define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/thinkerhouse.co/index.php?page=');
//echo '<a href="' . BASE_URL . 'page.php">Link</a>';
?>

    </head>

    <body>
        <!-- page container -->
        <div class="page-container">
            
            <!-- page header -->
            <div class="page-header">
                
                <!-- page header holder -->
                <div class="page-header-holder">
                    
                    <!-- page logo -->
                    <div class="logo">
                        <?php 
                        include "db/db.php";
                        $sql = "SELECT detail_text from company_info where content_type like 'name'";
                        $result = $conn->query($sql); ?>
                        <?php
                        
                        echo '<a href="' . BASE_URL . '">';
                        //echo "ThinkerHouse";
if($result->num_rows >0) {
    while($row = $result->fetch_assoc()){
        echo $row["detail_text"];
    }
}
                        echo "</a>";
                    ?>
                        </div>
                    <!-- ./page logo -->
                    

                    <!-- search -->
                    <div class="search">
                        <div class="search-button"><span class="fa fa-search"></span></div>
                        <div class="search-container animated fadeInDown">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..."/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><span class="fa fa-search"></span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- ./search -->
                    <!-- nav mobile bars -->
                    <div class="navigation-toggle">
                        <div class="navigation-toggle-button"><span class="fa fa-bars"></span></div>
                    </div>
                    <!-- ./nav mobile bars -->
                    
                    <!-- navigation -->
                    <?php
// 1. Perform database query
$sql = "SELECT id, menu_name, url, parant_id FROM navbar WHERE status = 1";
$result = $conn->query($sql);

// 2. Check for errors
if (!$result) {
    die("Database query failed: " . $conn->error);
}

// 3. Generate HTML for the navigation menu
echo '<ul class="navigation">';
while ($row = $result->fetch_assoc()) {
    if ($row['parant_id'] == 0) {
        echo '<li><a href="' . BASE_URL . $row['url'] . '">' . $row['menu_name'] . '</a>';
        // Check if the menu item has child items
        $parant_id = $row['id'];
        $childSql = "SELECT id, menu_name, url FROM navbar WHERE parant_id = $parant_id AND status = 1";
        $childResult = $conn->query($childSql);

        if ($childResult->num_rows > 0) {
            echo '<ul>';
            while ($childRow = $childResult->fetch_assoc()) {
                echo '<li><a href="' . BASE_URL . $childRow['url'] . '">' . $childRow['menu_name'] . '</a></li>';
            }
            echo '</ul>';
        }
        echo '</li>';
    }
}
echo '</ul>';

?>

                    <!-- ./navigation -->                        

                    
                </div>
                <!-- ./page header holder -->
                
            </div>
            <!-- ./page header -->

            <!-- page content -->
            <div class="page-content">