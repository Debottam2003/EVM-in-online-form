<?php
include("conn.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <!-- <link rel="stylesheet" type="text/css" href="evm.css" /> -->
    <style>
              body{
            font-family: Arial, sans-serif;
            background-image: url("flag.jpg");
            background-repeat: no-repeat;
            background-size: 1500px 900px;
        }
        .space{
            border:7px solid rgb(3, 44, 156);
            border-radius: 15px;
            width: 500px;
            height: 700px;
            /* background: linear-gradient(to top, rgb(243, 240, 246),rgb(172, 172, 174)); */
            background-color: rgb(179, 184, 187);
            box-shadow: 12px 12px 5px rgb(63, 62, 62);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .con{
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 0.8rem;
            width: 99%;
            color: rgb(3, 44, 156);
            background: linear-gradient(to top, rgb(248, 248, 248),rgb(153, 153, 155));
            padding: 1.5px;
            border-radius: 10px;
            font-weight: bold;
        }
        .img1{
            width: 125px;
            height: 125px;
            padding-bottom: 0.8rem;
        }
        .b{
            border: none;
            border-radius: 25px;
            width: 100px;
            height: 50px;
            background: linear-gradient(to bottom, rgb(2, 27, 110),rgb(40, 94, 241));
            box-shadow: 2.5px 2.5px 2px black;
            color: #fff;
            font-weight: bold;
        }
        .blink{
            width: 30px;
            height: 30px;
            border-radius: 25px;
            border: none;
            background-color: rgb(246, 98, 98);
            border: 1px solid brown;
        }
        </style>
    <script>
        function handleVote(buttonId) {
    let votebuttons = document.querySelectorAll('.b');
    let blinkButtons = document.querySelectorAll('.blink');
    for (let i = 0; i < votebuttons.length; i++) {
        if (votebuttons[i].id === buttonId) {
            blinkButtons[i].style.backgroundColor = '#8CE44C';
            votebuttons[i].textContent = 'Voted';
        }       
    }
}
        </script>
</head>
<body>
    <center>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="space">
            <div class="con">
                <img src="bjp.png" class="img1">
                B. J. P
                <button type="submit" class="blink" id="bl1"></button>
                <button type="submit" name="v1" value="bjp"  class="b" id="b1" onclick="handleVote('b1')">Vote</button>
            </div>
            <div class="con">
                <img src="congress.png" class="img1">
                CONGRESS
                <button type="submit" class="blink" id="bl2"></button>
                <button type="submit" name="v1" value="congress" class="b" id="b2" onclick="handleVote('b2')">Vote</button>
            </div>
            <div class="con">
                <img src="tmcp.png" class="img1">
                T. M. C. P
                <button type="submit" class="blink" id="bl3"></button>
                <button type="submit" name="v1" value="tmcp" class="b" id="b3" onclick="handleVote('b3')">Vote</button>
            </div>
            <div class="con">
                <img src="bam.jpg" class="img1">
                BAM FRONT
                <button type="submit" class="blink" id="bl4"></button>
                <button type="submit" name="v1" value="bamfront" class="b" id="b4" onclick="handleVote('b4')">Vote</button>
            </div>
            <div class="con">
                <h1>NOTA</h1>
                NONE OF THE ABOVE  
                <button type="submit" class="blink" id="bl5"></button>
                <button type="submit" name="v1" value="nota" class="b" id="b5" onclick="handleVote('b5')">Vote</button>
            </div>
        </div>
</form>
    </center> 
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["v1"])) {
        $value = $_POST["v1"];
        $sql = "UPDATE evm
        SET no_of_votes = no_of_votes + 1
        WHERE party_name = '$value'";
        $res = mysqli_query($conn,$sql);       
         echo "<script>
        document.getElementById('b1').disabled = true;
        document.getElementById('b2').disabled = true;
        document.getElementById('b3').disabled = true;
        document.getElementById('b4').disabled = true;
        document.getElementById('b5').disabled = true;
        // window.alert('Your vote has been registered');
        </script>";
    }
    ?>

</body>
</html>



