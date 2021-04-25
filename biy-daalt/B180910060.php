<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>LAB1</title>
</head>
<body style="background: black;">
    <nav class="navbar navbar-expand-lg navbar-light navbar sticky-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link disabled" href="#">IT301 <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Лаб ажил</a>
            <a class="nav-item nav-link" href="#">Лекц</a>
            <a class="nav-item nav-link" href="#">Жишээ</a>
        </div>
        </div>
        <span class="navbar-text">
            search
          </span>
          <span class="navbar-text">
            weird rubic 
          </span>
          <span class="navbar-text">
            pro pic 
          </span>  
      </nav>
      <div class="container-fluid">
        <H4>Форм</H4>
        <p><li>randomstuff</li> <li>also</li></p>
        <div class="row">
            <div class="col-12">
                <!-- dasgaliin kod ehlel-->
               <div class="container" style="border-radius: 4px; background:white">
                <form class="px-4 py-3" action="B180910060.php" method='POST'>
                    <div class="row">
                        <div class="col">
                           <p>Утга хөрвүүлэх</p>
                          </div>
                          <div class="col">
                            <input class="btn btn-primary btn" style="float: right;" value="Бүх лаборатори ажил" disabled>
                          </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-6">
                        <label>Хувиргах утга:</label>
                        <input type="text" name="item" class="form-control">
                        <span class="text-muted":>
                            Нэгжийн утга <p id="result"> </p>
                          </span>    
                    </div>
                      <div class="col-sm-6">
                        <label>Хувиргах төрөл:</label>
                        <select class="custom-select" name="selected" required>
                          <option value="0">--Сонго--</option>
                          <option value="1">инч-см</option>
                          <option value="2">бээр-км</option>
                          <option value="3">морины хүч-ватт</option>
                          <option value="4">Паунд-грамм</option>
                          <option value="5">Баррелийг-литр</option>
                        </select>
                      </div>
                    </div>
                    <hr>
                    <div class="row mt-4">
                      <div class="col-sm-12">
                        <input type="submit" class="btn btn-primary" value="Хувиргах">
                        <input type="reset" class="btn btn-light" value="Цуцлах">
                      </div>
                    </div>
                  </form>
               </div>
               <span class="text-muted">
               Sessions
                    <div id='his'></div>
               </span>
            </div>
          </div>
      </div>
                        <?php
                        
                          class Conversion {
                            private $input;
                            private $output;
                            private $description;
                            function __construct($input, $output,$description) {
                              $this->input = $input;
                              $this->output = $output;
                              $this->description = $description;
                            }
                            function get_input() {
                              return $this->input;
                            }
                            function get_output() {
                              return $this->output;
                            }
                            function get_description() {
                              return $this->description;
                            }
                            }
                          $size = 5;
                          if(isset( $_REQUEST["item"]))
                          {
                            $input = floatval($_REQUEST["item"]);
                            if(isset($_REQUEST["selected"]) && $_REQUEST["selected"]>"0" && $input>=0)
                            {
                              $historys=array();
                              if(isset($_SESSION['history']))
                              {
                                $historys=$_SESSION['history'];
                              }
                              $discription="";
                              switch($_REQUEST["selected"])
                              {
                                case "1":
                                  $discription="инч-см";
                                  $result=$input*2.54;
                                  break;
                                case "2":
                                  $discription="бээр-км";
                                  $result=$input/1.6;
                                  break;
                                case "3":
                                  $discription="морины хүч-ватт";
                                  $result=$input/746;
                                  break;
                                case "4":
                                  $discription="Паунд-грамм";
                                  $result=$input/453;
                                  break;
                                case "5":
                                  $discription="Баррелийг-литр";
                                  $result=$input/158;
                                  break;
                              }
                                  $converted = new Conversion($input,$result,$discription);

                                  if(count($historys)<$size)
                                  {
                                    array_push($historys,$converted);

                                  }
                                  elseif(count($historys)>=$size) 
                                  {
                                    array_shift($historys);
                                    array_push($historys,$converted);
                                  }
                                  $_SESSION['history']=$historys;
                                  echo " <script >document.getElementById('result').innerHTML=";
                                  echo $result;
                                  echo ";</script>";
                                  
                            }
                            else
                            {
                              echo " <script >document.getElementById('result').innerHTML='Талбарт утга сонго нуу';</script>";
                            }
                         
                          }else
                          {
                            echo " <script >document.getElementById('result').innerHTML='Талбарт утга сонго нуу';</script>";
                          }
                         
                          if(isset($_SESSION['history']))
                          {
                            $ress=$_SESSION['history'];
                            echo '<table class="table table-sm table-dark" style="width: 50%;">';
                          echo '<thead>
                          <tr>
                            <th scope="col">input</th>
                            <th scope="col">output</th>
                            <th scope="col">Description</th>
                          </tr>
                        </thead>';
                        echo "<tbody>";
                          foreach($ress as $res)
                          {
                            echo "<tr>";
                            echo "<td>";
                            echo $res->get_input();
                            echo "</td>";
                            echo "<td>";
                            echo $res->get_output();
                            echo "</td>";
                            echo "<td>";
                            echo $res->get_description();
                            echo "</td>";
                            echo "</tr>";
                          }
                          echo "</tbody>";
                          echo '</table>';
                          echo count($ress);
                          }
                        ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>