<?php

//Include the PHP functions to be used on the page 
include('common.php');

//Output header and navigation 
outputHeader("BagKart - Home");

?>

<!--Attractive text for customer facing pages-->
<div id="bigText">PLAN YOUR ADVENTURE</div>
<div id="smallText">SHOP NOW</div>
<!--Direct link to section2-->
<a href="#index-section2"><img id="down-arrow" src="../Images/down-arrow.png"></a>

</div>



<!--Section2-->
<div id="index-section2">

    <div class="index-section2-shopNow">
        <div id="index-section2-bigText">NEW ARRIVALS</div>
        <!--Direct link to Shop-->
        <div id="index-section2-smallText"><a href="shop.php">SHOP NOW</a></div>
    </div>
    <!--Image for attractiveness-->
    <div class="index-section2-backpack">
        <img src="../Images/try.png">
    </div>


</div>


<!--Section3-->
<div id="index-section3">
    <!--Image link to shop-->
    <div class="index-section3-image1">
        <img src="../Images/backpack.png">
        <div class="overlay">

            <div class="text">TRAVEL PACKS</div>

        </div>

    </div>
    <div class="index-section3-image2">
        <img src="../Images/dufflebags.png">
        <div class="overlay">

            <div class="text">DUFFLE BAGS</div>

        </div>
    </div>
    <div class="index-section3-image3">
        <img src="../Images/travelpacks.png">
        <div class="overlay">

            <div class="text">BACKPACKS</div>

        </div>
    </div>

</div>

<!--Section4-->
<div id="index-section4">
    <!--Attractive text to beautify webpage content-->
    <div id="section4-bigText">NOW ON SALE</div>
    <div id="section4-smallText">UP TO 50% OFF</div>
    <br><br>
    <img id="backpacks" src="../Images/backpacks.png"><br><br>

    <div id="backpack-description">CANVAS BACKPACK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TECHNICAL PACK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CAMO
        BACKPACK
    </div><br><br>
    <!--Used space to manually set text on the screen-->
    <div id="backpack-price"><strike>Rs900</strike>&nbsp;&nbsp;Rs450 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strike>Rs1300</strike>&nbsp;&nbsp;Rs650&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strike>Rs1000</strike>&nbsp;&nbsp;Rs500</div>


</div>
<!--Section5 for an overview of the company-->
<div id="index-section5">
    <div id="index-section5-about">
        <div id="index-section5-about-bigText">
            ABOUT US
        </div>
        <!--Turkish text for the description of the company-->
        <div id="index-section5-about-smallText">Owog hyul sumha num sydou uiraga volek syrolmol nequem kyul thez, keseruen ezes ne en bel. Farad uos keseruen ezes volek, nym urodum kynaal ualmun kethwe engumet wylag nym wylag. Fyodum huztuzwa owog byuntelen leg kynaal. Urumemtuul niha sydou
            ezes.
        </div>
    </div>

</div>

<!--Section6 for customer queries-->
<div id="index-section6">
    <div id="index-section6-left">
        <!--validation process for the fom=rm-->
        <form id="contact-form" onsubmit="validateContactForm();return false;">

            <span class="headings">Enter Your Name</span><br>
            <!--Input textbox-->
            <input class="contact-input" type="text" id="name" name="name" placeholder="Name" autocomplete="off" size="55"><br>
            <br><span class="headings">Enter Your Email</span><br>
            <input class="contact-input" type="email" id="email" name="email" placeholder="Email" autocomplete="off" size="55"><br>
            <br><span class="headings">Enter Your Subject</span><br>
            <!--Password textbox-->
            <input class="contact-input" type="text" id="subject" name="subject" placeholder="Subject" autocomplete="off" size="55"><br>
            <br><span class="headings">Enter Your Message</span><br>
            <input class="contact-message-input" type="text" id="message" name="message" placeholder="Message" autocomplete="off" size="57"><br>
            <button type="submit" id="contact-submit">&nbsp;&nbsp;&nbsp;<span style="color:white;font-size: 18.5px;">Send</span>&nbsp;&nbsp;&nbsp;</button><br><br><br><br>
            <span class="submitting-text" style="margin-top:-10px;float:right;padding-right:33px;font-family:Helvetica;">Thanks for submitting!</span><br><br><br>




        </form>





    </div>
    <!--Get in touch image to beautify web content-->
    <div id="index-section6-right">
        <div id="index-section6-right-image">
            <img src="../Images/getintouch.jpg">
        </div>

    </div>



</div>
<!--Section7 for Mailing-->
<div id="index-section7">
    <div id="index-section7-bigText">
        <center>JOIN OUR MAILING LIST</center>
    </div><br>

    <div id="index-section7-smallText">
        <center>AND NEVER MISS AN UPDATE</center>
    </div>


    <!--Mailing form-->
    <form id="mail-form">
        <span style="color:#EEE6E6;font-size:17px;font-family:Georgia, 'Times New Roman', Times, serif">Enter your email here</span><br><br>
        <!--Mail input text box-->
        <input type="email" id="subscription-email" name="subscription-email" placeholder="Email" autocomplete="off" size="98"><br><br>
        <button type="submit" id="subscription-submit"><span style="color:white;font-size: 18.5px;font-family:verdana;">SUBSCRIBE NOW</span></button><br><br><br><br>



    </form>










</div>














<?php

//Output the footer

outputFooter("BagKart - Home");

?>