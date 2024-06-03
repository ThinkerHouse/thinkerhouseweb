</div>
            <!-- ./page content -->
<!-- page footer -->
<div class="page-footer">
                
                <!-- page footer wrap -->
                <div class="page-footer-wrap bg-dark-gray">
                    <!-- page footer holder -->
                    <div class="page-footer-holder page-footer-holder-main">
                                                
                        <div class="row">
                            
                            <!-- about -->
                            <div class="col-md-3">
                                <h3>About Us</h3>
                                <p>Today we cant thing without technologies, cause automation and globalization are century-old stories. And now technology is advancing with each other. As if we have a technology menu card in our hands, we are constantly thinking about which one to leave and which one to take. In this case, we are here to assist you with the services that we believe will accelerate your business management. </p>
                            </div>
                            <!-- ./about -->
                            
                            <!-- quick links -->
                            <div class="col-md-3">
                                <h3>Quick links</h3>
                                
                                <?php
include "db/db.php";
$sql = "SELECT id, menu_name, url, parant_id FROM navbar WHERE status =1";
$result = $conn->query($sql);
echo '<div class="list-links">';
while($row = $result->fetch_assoc()) {
    if ($row['parant_id'] == 0) {
        echo '<a href="' . $row['url'] . '">' . $row['menu_name'] . '</a>';
        // Check if the menu item has child items
        $parent_id = $row['id'];
        $childSql = "SELECT id, menu_name, url FROM navbar WHERE parant_id = $parant_id AND status = 1";
        $childResult = $conn->query($childSql);
        while($childRow = $childResult->fetch_assoc()) {
            echo '<a href="' . $childRow['url'] . '">' . $childRow['menu_name'] . '</a>';
        }
    }
}
echo '</div>';

                                ?>                       
                            </div>
                            <!-- ./quick links -->
                            
                            <!-- recent tweets -->
                            <div class="col-md-3">
                                <h3>Recent News</h3>
                                
                                <div class="list-with-icon small">
                                    <div class="item">
                                        <div class="icon">
                                            
                                        </div>
                                        <div class="text">
                                            
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="icon">
                                            
                                        </div>
                                        <div class="text">
                                            
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="icon">
                                            
                                        </div>
                                        <div class="text">
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- ./recent tweets -->
                            
                            <!-- contacts -->
                            <div class="col-md-3">
                                <h3>Contacts</h3>
                                
                                <div class="footer-contacts">
                                    <div class="fc-row">
                                        <span class="fa fa-home"></span>
                                        80/2, West Rampura, Rampura<br/> 
                                        Dhaka 1219, Bangladesh.
                                    </div>
                                    <div class="fc-row">
                                        <span class="fa fa-phone"></span>
                                        +880 1816-537164
                                    </div>
                                    <div class="fc-row">
                                        <span class="fa fa-envelope"></span>
                                        <a href="mailto:#">info@thinkerhouse.net</a>
                                    </div>                                    
                                </div>                                
                            </div>
                            <!-- ./contacts -->
                            
                        </div>
                        
                    </div>
                    <!-- ./page footer holder -->
                </div>
                <!-- ./page footer wrap -->
                
                <!-- page footer wrap -->
                <div class="page-footer-wrap bg-darken-gray">
                    <!-- page footer holder -->
                    <div class="page-footer-holder">
                        
                        <!-- copyright -->
                        <div class="copyright">
                            &copy; 2016 thinkerhouse.net - All Rights Reserved                            
                        </div>
                        <!-- ./copyright -->
                        
                        <!-- social links -->
                        <div class="social-links">
                            <a href="#"><span class="fa fa-facebook"></span></a>
                            <a href="#"><span class="fa fa-google-plus"></span></a>
                            <a href="#"><span class="fa fa-linkedin"></span></a>
                        </div>                        
                        <!-- ./social links -->
                        
                    </div>
                    <!-- ./page footer holder -->
                </div>
                <!-- ./page footer wrap -->
                
            </div>
            <!-- ./page footer -->
            
        </div>        
        <!-- ./page container -->
        
        <!-- page scripts -->
        <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
        
        <script type="text/javascript" src="js/plugins/mixitup/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/plugins/appear/jquery.appear.js"></script>
        
        <script type="text/javascript" src="js/plugins/revolution-slider/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="js/plugins/revolution-slider/jquery.themepunch.revolution.min.js"></script>
        
        <script type="text/javascript" src="js/actions.js"></script>
        <script type="text/javascript" src="js/slider.js"></script>
        <!-- ./page scripts -->
    </body>
</html>
<?php
$conn->close();
?>