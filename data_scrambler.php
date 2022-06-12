<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
     
  </head>
  <body>
    <?php
        include 'helper.php';
        $task = 'encode';

        if(isset($_GET['task']) && $_GET['task'] != ''){
            $task = $_GET['task'];
        }

        $key = 'abcdefghijklmnopqrstuvwxyz123456789';
        if('key' == $task){
            // converts array to key
            $key_original = str_split($key);
            shuffle($key_original);

            //array to string 
            $key = join('',$key_original);
        }else if(isset($_POST['key']) && $_POST['key'] != ''){
          echo  $key = $_POST['key'];
        }

        $fullUrl = $_SERVER['REQUEST_URI'];


        $scrambledData = '';
        if('encode' == $task){
            $data = $_POST['data']?? '';
            if($data != ''){
            $scrambledData = scrambleData($data,$key);
            }
        }

        if('decode' == $task){
            $data = $_POST['data']?? '';
            if($data != ''){
            $scrambledData = decodeData($data,$key_data);
            }
        }
        echo $task;

    ?>
         <div class="container">
     
            <br>
            <div class="row mx-5 my-3">
            <div class="text-center mb-3">
                <p>Data Scrambler Form:</p>
                <a href="/dataScrambler/data_scrambler.php?task=encode" class="btn btn-primary btn-floating mx-1">
                Encode
                </a>

                <a href="/dataScrambler/data_scrambler.php?task=decode" class="btn btn-primary btn-floating mx-1">
                Decode
                </a> 
                
                <a href="/dataScrambler/data_scrambler.php?task=key" class="btn btn-primary btn-floating mx-1">
                Generate Key
                </a>
            </div>
                <form method="POST" action="/dataScrambler/data_scrambler.php<?php if('decode'==$task){ echo "/?task=decode"; } ?>">
                    <!-- Name input -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example1">key</label>
                    <input type="text" id="form4Example1" name="key" class="form-control" <?php getKey($key) ?>/> 
                    </div> 

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example3">Data</label>
                    <textarea class="form-control" id="form4Example3" name="data" rows="4"><?php if(isset($_POST['data'])){ echo $_POST['data']; } ?></textarea> 
                    </div> 

                    <!-- Message input -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form4Example3">Output</label>
                    <textarea class="form-control" id="form4Example3" rows="4"><?php echo $scrambledData; ?></textarea> 
                    </div> 

                    <!-- Submit button -->
                    <div class="form-outline mb-4">
                        <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
                    </div>
              </form>
            </div>
        </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>