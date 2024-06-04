<ul class="navigation">
    <li><a href="http://localhost/thinkerhouse.co/">HOME</a>
        <ul></ul>
    </li>
    <li><a href="http://localhost/thinkerhouse.co/service">SERVICE</a>
    <ul>
        <li><a href="http://localhost/thinkerhouse.co/web">WEB DEVELOPMENT</a></li>
        <li><a href="http://localhost/thinkerhouse.co/software">SOFTWARE DEVELOPMENT</a></li>
        <li><a href="http://localhost/thinkerhouse.co/app">MOBILE APPLICATION DEVELOPMENT</a></li>
    </ul>
</li>
<li><a href="http://localhost/thinkerhouse.co/career">CAREER</a>
    <ul></ul>
</li>

<li><a href="http://localhost/thinkerhouse.co/aboutus">ABOUT US</a>
    <ul></ul>
</li>
<li><a href="http://localhost/thinkerhouse.co/contactus">CONTACT US</a>
    <ul></ul>
</li>
</ul>                    
<!-- ./navigation -->

<!-- -------------------------------- -->
<!-- navigation -->
<ul class="navigation">
    <li><a href="http://localhost/thinkerhouse.co/">HOME</a>
        <ul></ul>
    </li>
    <li><a href="http://localhost/thinkerhouse.co/service">SERVICE</a><ul></ul></li>
</li></li></li><li><a href="http://localhost/thinkerhouse.co/career">CAREER</a><ul></ul></li><li><a href="http://localhost/thinkerhouse.co/aboutus">ABOUT US</a><ul></ul></li><li><a href="http://localhost/thinkerhouse.co/contactus">CONTACT US</a><ul></ul></li></ul>
                    <!-- ./navigation -->                        
                    


<!-- -------------------------- -->

<div class="navigation-toggle-button"><span class="fa fa-bars"></span></div>
                    </div>
                    <!-- ./nav mobile bars -->
                    
                    <!-- navigation -->
<?php
                    $sql = "SELECT id, menu_name, url, parant_id FROM navbar WHERE status =1";
$result = $conn->query($sql);

// Step 3: Generate HTML for the navigation menu
echo '<ul class="navigation">';
// echo $result;
while($row = $result->fetch_assoc()) {
    if ($row['parant_id'] == 0) {
        echo '<li><a href="' . BASE_URL . $row['url'] . '">' . $row['menu_name'] . '</a></li>';
        // Check if the menu item has child items
        $parant_id = $row['id'];
        $childSql = "SELECT id, menu_name, url FROM navbar WHERE parant_id = $parant_id AND status = 1";
        $childResult = $conn->query($childSql);
        while($childRow = $childResult->fetch_assoc()) {
            echo '<ul>';
            echo '<li><a href="' . BASE_URL . $childRow['url'] . '">' . $childRow['menu_name'] . '</a></li>';
        }
        echo '</ul>';
        echo '</li>';
    }
}
echo '</ul>';