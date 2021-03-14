<?php

//Include the PHP functions to be used on the page 
include('common.php');

//Output header and navigation 
outputHeader("BagKart - Shop");

?>
<br><br><br>
<div id="wrap">
    <div class="search">
        <!--Button in searchbar and icon on search button-->
        <input type="text" class="searchTerm" id="searchIndex" placeholder="What are you looking for?">
        <button type="submit" class="searchButton" onclick="search()">
            <img src="../Images/search.png">
        </button>
    </div>
</div>

<!--Sorting button-->
<div style="float:right;margin-right:300px;margin-top:-30px;">
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sorting
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" onclick="sorting('Asc')">Price: Ascending</a>
            <a class="dropdown-item" onclick="sorting('Desc')">Price: Descending</a>

        </div>
    </div>
</div>





<br><br>
<div id="Products">

</div>
<script src="Js/shop.js" async></script>
<?php

//Output the footer

outputFooter("BagKart - Shop");

?>