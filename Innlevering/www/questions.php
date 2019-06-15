<?php
session_start();
?>

<?php
require 'db-tilkobling.php';
$category='';
if(!empty($_POST['name'])){
    $name=$_POST['name'];
    $category=$_POST['category'];
    mysqli_query($con,"INSERT INTO users (id, user_name,score,category_id)VALUES (NULL,'$name',0,'$category');");
    $_SESSION['name']= $name;
    $_SESSION['id'] = mysqli_insert_id($con);
}
$category=$_POST['category'];
if(!empty($_SESSION['name'])){
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>E-Learning</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="css/style.css" rel="stylesheet" media="screen">
    </head>
    <body>
    <header>
        <p class="text-center">
            Velkommen : <?php if(!empty($_SESSION['name'])){echo $_SESSION['name'];}?>
        </p>
    </header>


    <div class="container">

            <div class="container col-md-6">
                <img src="image/dreamstime_xs_25805545.jpg" alt="explanation">
            </div>

            <div class="container col-md-6">
                <p>Matematikk for barn</p>
                <hr>
                <form class="form-horizontal" role="form" id='login' method="post" action="result.php">
                    <?php
                    $res = mysqli_query($con,"select * from questions where category_id=$category ORDER BY RAND();") or die("3");
                    $rows = mysqli_num_rows($res);
                    $i=1;
                    while($result=mysqli_fetch_array($res)){?>
                        <?php if($i==1){?>
                            <div id='question<?php echo $i;?>' class='cont'>
                                <p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo $result['question_name'];?></p>
                                <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer1'];?>
                                <br/>
                                <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer2'];?>
                                <br/>
                                <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer3'];?>
                                <br/>
                                <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer4'];?>
                                <br/>
                                <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                                <br/>
                                <button id='<?php echo $i;?>' class='next btn btn-success' type='button'>Neste</button>
                            </div>
                        <?php }elseif($i<1 || $i<$rows){?>
                            <div id='question<?php echo $i;?>' class='cont'>
                                <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['question_name'];?></p>
                                <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer1'];?>
                                <br/>
                                <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer2'];?>
                                <br/>
                                <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer3'];?>
                                <br/>
                                <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer4'];?>
                                <br/>
                                <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                                <br/>
                                <button id='<?php echo $i;?>' class='previous btn btn-success' type='button'>Tilbake</button>
                                <button id='<?php echo $i;?>' class='next btn btn-success' type='button' >Neste</button>
                            </div>
                        <?php }elseif($i==$rows){?>
                            <div id='question<?php echo $i;?>' class='cont'>
                                <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $result['question_name'];?></p>
                                <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer1'];?>
                                <br/>
                                <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer2'];?>
                                <br/>
                                <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer3'];?>
                                <br/>
                                <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer4'];?>
                                <br/>
                                <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>
                                <br/>
                                <button id='<?php echo $i;?>' class='previous btn btn-success' type='button'>Tilbake</button>
                                <button id='<?php echo $i;?>' class='next btn btn-success' type='submit'>Ferdig</button>
                            </div>
                        <?php } $i++;} ?>
                </form>
            </div>

    </div>
    <div class="footer navbar-fixed-bottom">
        <footer>
            <p class="text-center" id="foot">
                &copy; <a>E-Learning </a>2016
            </p>
        </footer>
    </div>
    <?php
    if(isset($_POST[1])){
        $keys=array_keys($_POST);
        $order=join(",",$keys);
        $response=mysqli_query($con, "select id,answer from questions where id IN($order) ORDER BY FIELD(id,$order);") or die("4");
        $right_answer=0;
        $wrong_answer=0;
        $unanswered=0;
        while($result=mysqli_fetch_array($response)){
            if($result['answer']==$_POST[$result['id']]){
                $right_answer++;
            }else if($_POST[$result['id']]==5){
                $unanswered++;
            }
            else{
                $wrong_answer++;
            }
        }
        echo "right_answer : ". $right_answer."<br>";
        echo "wrong_answer : ". $wrong_answer."<br>";
        echo "unanswered : ". $unanswered."<br>";
    }
    ?>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script>
        $('.cont').addClass('hide');
        count=$('.questions').length;
        $('#question'+1).removeClass('hide');
        $(document).on('click','.next',function(){
            last=parseInt($(this).attr('id'));
            nex=last+1;
            $('#question'+last).addClass('hide');
            $('#question'+nex).removeClass('hide');
        });
        $(document).on('click','.previous',function(){
            last=parseInt($(this).attr('id'));
            pre=last-1;
            $('#question'+last).addClass('hide');
            $('#question'+pre).removeClass('hide');
        });
    </script>
    </body>
    </html>
<?php }else{
    header( 'Location: index.php' ) ;
}
?>
