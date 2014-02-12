<!DOCTYPE HTML> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scott Vaudreuil Website Demo</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">
    	body{margin-left:20%;
    		 margin-right:20%;
    		 margin-top:5%;
             margin-bottom:5%;}

    	div.col-md-4, div.col-md-8 {border-top:2px solid;border-bottom:2px solid;border-left:2px solid;padding:10px;margin-bottom:10px;}
    	div.col-md-8 {border-right:2px solid;background-color:powderblue;}

    	div#result{border:5px solid powderblue;padding:20px;}

        table {border:5px solid powderblue !important;padding:20px;}

        td{padding:5px;}


    </style>

    <!-- Bootstrap Javascript-->
    <script src="js/bootstrap.min.js"></script>
    
<!-- jQuery-->
<script type="text/javascript" src="jfeed/jquery/jquery.js"></script>
<script type="text/javascript" src="jfeed/build/dist/jquery.jfeed.pack.js"></script>


<?php
//download the current weather RSS feed to the server
file_put_contents("feed.xml", file_get_contents("http://rss.wunderground.com/auto/rss_full/RI/Providence.xml?units=english"));

?>

<!-- The following is modified jFeed code which allows me to display the weather in a more eye-pleasing manner-->
<script type="text/javascript">

jQuery(function() {

    jQuery.getFeed({

        url: 'feed.xml',
        success: function(feed) {
        
            jQuery('#result').append('<h2>'
            + '<a href="'
            + feed.link
            + '">'
            + feed.title
            + '</a>'
            + '</h2>');
            
            var html = '';
            
            for(var i = 0; i < feed.items.length && i < 1; i++) {
            
                var item = feed.items[i];
                
                html += '<h3>'
                + '<a href="'
                + item.link
                + '">'
                + item.title
                + '</a>'
                + '</h3>';
                
              
                
                html += '<div><h4>';

                var text =  item.description;
    			text = text.replace("|", "<br>");
    			text = text.replace("|", "<br>");
    			text = text.replace("|", "<br>");
    			text = text.replace("|", "<br>");
    			text = text.replace("|", "<br>");
    			html += text
    

                + '</h4></div>';
            }
            
            jQuery('#result').append(html);
        }    
    });
});

</script>

</head>
<body>

        <!-- Header-->
	<div class="row">
		  <div class="col-md-4"><h1>Scott Vaudreuil</h1></div>
			  <div class="col-md-8"><h1>Website Demo</h1></div>

	</div>
        <!-- Introduction-->
	Welcome to my website!<br>
	This page has been tested using EasyPHP-DevServer-14.1VC11 running PHP 5.5.8. The HTML and CSS adhere to the <a href="http://getbootstrap.com/">Bootstrap</a> standards. 
	<br>

        <!-- Example 1-->
    <h2>Fetching and Displaying data from RSS XML feed</h2>
	I am using PHP to fetch an <a href="http://rss.wunderground.com/auto/rss_full/RI/Providence.xml?units=english">rss feed of the current weather</a> from <a href="http://wunderground.com">wunderground.com</a>.<br>
		Then I used <a href="https://github.com/jfhovinne/jFeed">jFeed</a> (a jQuery script by github user jfhovinne) to display the weather data once it has been downloaded to the server. I used jQuery to convert the format from single line to line-by-line for easier reading.<br>
	<h3>Source Code:</h3>
    <blockquote><pre>&#60;script type="text/javascript" src="jfeed/jquery/jquery.js">&#60;/script>

        &#60;script type="text/javascript" src="jfeed/build/dist/jquery.jfeed.pack.js">&#60;/script>


        &#60;?php
        file_put_contents("feed.xml", file_get_contents("http://rss.wunderground.com/auto/rss_full/RI/Providence.xml?units=english"));

        ?>

        &#60;script type="text/javascript">

        jQuery(function() {



            jQuery.getFeed({

                url: 'feed.xml',
                success: function(feed) {
                
                    jQuery('#result').append('&#60;h2>'
                    + '&#60;a href="'
                    + feed.link
                    + '">'
                    + feed.title
                    + '&#60;/a>'
                    + '&#60;/h2>');
                    
                    var html = '';
                    
                    for(var i = 0; i &#60; feed.items.length && i &#60; 1; i++) {
                    
                        var item = feed.items[i];
                        
                        html += '&#60;h3>'
                        + '&#60;a href="'
                        + item.link
                        + '">'
                        + item.title
                        + '&#60;/a>'
                        + '&#60;/h3>';
                        
                      
                        
                        html += '&#60;div>&#60;h4>';

                        var text =  item.description;
                        text = text.replace("|", "&#60;br>");
                        text = text.replace("|", "&#60;br>");
                        text = text.replace("|", "&#60;br>");
                        text = text.replace("|", "&#60;br>");
                        text = text.replace("|", "&#60;br>");
                        html += text
            

                        + '&#60;/h4>&#60;/div>';
                    }
                    
                    jQuery('#result').append(html);
                }    
            });
        });

        &#60;/script></pre>
    </blockquote>

    <h3>Final Output:</h3>
    <div id="result" /></div>

    <hr>
        <!-- Example 2-->
    <h2>Fetching external webpages and saving them to the server</h2>
    <br><br>
    Here is an example of fetching and saving data with php. I am going to fetch a scene from a <a href="http://shakespeare.mit.edu/allswell/allswell.1.1.html">Shakespeare play</a>, and then save it to the server as "fetch.html".

    <h3>Source Code:</h3>
    <blockquote><pre>       <&#63;php
        $upload = file_put_contents("fetch.html", file_get_contents("http://shakespeare.mit.edu/allswell/allswell.1.1.html"));
        if ($upload) echo 'the fetch was successful!<br>To view the fetched webpage, <&#97; href="fetch.html">click here&#60;/&#97;>';
        else {echo "The fetch failed!";}
    ></pre></blockquote>
    <h3>Final Output:</h3>
    <?php
        $upload = file_put_contents("fetch.html", file_get_contents("http://shakespeare.mit.edu/allswell/allswell.1.1.html"));
        if ($upload) echo 'the fetch was successful!<br>To view the fetched webpage, <a href="fetch.html">click here</a>';
        else {echo "The fetch failed!";}
    ?>
    <hr>

            <!-- Example 3-->

    <h2>Displaying a database table as an HTML table</h2>


    <br>To simulate a MySQL database table, I created a table of sport scores and saved it as a <a href="sportscore-dbtable.csv">CSV (Comma Seperated Values) file</a>.
    <br>I have experience with querying databases, and then displaying the information. To simulate displaying database information, I used php to read this CSV line by line and then display it as an HTML table.
    <br><br>

    <h3>Source Code:</h3>
    <blockquote><pre> &#60;table class="table-bordered">
            &#60;?php

                $handle = fopen("sportscore-dbtable.csv", "r");
                $lineNum = 0;
                while(($data = fgetcsv($handle)) != FALSE) {

        echo "&#60;tr>";
                
                    $numCol = count($data);
                    for($i=0;$i&#60;$numCol;$i++){


                        

                        echo "&#60;td>";
                        if ($lineNum==0) echo "&#60;b>";
                        echo $data[$i];
                     
                        if ($lineNum==0) echo "&#60;/b>";
                        echo "&#60;/td>";

                    }
                    $lineNum++;
               
        echo "&#60;/tr>";

                }

            ?>
    &#60;/table></pre></blockquote>

<h3>Final Output:</h3>
    <table class="table-bordered">
        <?php

            $handle = fopen("sportscore-dbtable.csv", "r");
            $lineNum = 0;
            while(($data = fgetcsv($handle)) != FALSE) {

echo "<tr>";
            
                $numCol = count($data);
                for($i=0;$i<$numCol;$i++){


                    

                    echo "<td>";
                    if ($lineNum==0) echo "<b>";
                    echo $data[$i];
                 
                    if ($lineNum==0) echo "</b>";
                    echo "</td>";

                }
                $lineNum++;

                
echo "</tr>";

            }

        ?>
    </table>

            <!-- Example 4-->

    <hr><h2>Inserting into a MySQL Database with PHP</h2>
    If the above table was a mysql table, and I needed to insert a new row of data, I would use PHP to execute a MySQL INSERT statement. The source code I would write to do that would be...
    <br>
    <h3>Source Code:</h3>
    <blockquote>
        <pre><&#63;php
        $db = new mysqli("example.com", "user", "password", "database");

        if ($db->connect_errno) {
            echo "Failed to connect to MySQL";
        }

        $sql = 'INSERT INTO SportScore VALUES("Volleyball","30-20",2014-05-39)';

        $db->query($sql);
        &#63;>
        </pre>
    </blockquote>


        <!-- Example 5-->

        <hr><h2>Styling an image link with CSS</h2>
        The following image links to this website demo. Thanks to the CSS box-shadow property, a:hover img is styled to show a drop shadow when the mouse hovers over the image.<br>


        <h3>Image link with CSS Styling:</h3>
        <style type="text/css">
            a:hover img { box-shadow: 10px 10px 5px powderblue;}
        </style>

        <a href="index.php" ><img src="img/grassypath.jpg" /></a>

        <h3>Source Code:</h3>
        <blockquote>
            <pre>&#60;style type="text/css">
            a:hover img { box-shadow: 10px 10px 5px powderblue;}
            &#60;/style>

            &#60;a href="index.php" >&#60;img src="img/grassypath.jpg" />&#60;/a>
            </pre>
        </blockquote>

        <!-- Conclusion-->
        <h3>I hope you enjoyed my Digital Portfolio. 
            <br>Contact me at <b>scott_vaudreuil&#64;my.uri.edu</b></h3>


        <!-- Footer-->
    <div id="footer"><hr>Powered by <a href="http://getbootstrap.com">Bootstrap</a>, 
                                    <a href="http://php.net">PHP</a>, 
                                    <a href="http://jquery.com/">jQuery</a>, 
                                    <a href="http://wunderground.com">wunderground</a>, and 
                                    <a href="https://github.com/jfhovinne/jFeed">jFeed</a>.
                     <br>(C)2014 Scott Vaudreuil. All code original unless otherwise noted.
    </div>

</body>
</html>
