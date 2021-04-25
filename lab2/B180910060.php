<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>LAB1</title>
</head>
<body style="background: rgb(19, 18, 18);">
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
                <form class="px-4 py-3" action="B180910060.php" method="GET">
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

            </div>
          </div>
      </div>
                        <?php
                          if(isset( $_REQUEST["item"]))
                          {
                            $result = floatval($_REQUEST["item"]);
                            if(isset($_REQUEST["selected"]) && $_REQUEST["selected"]!="0")
                            {
                              switch($_REQUEST["selected"])
                              {
                                case "1":
                                  $result=$result*2.54;
                                  break;
                                case "2":
                                  $result=$result/1.6;
                                  break;
                                case "3":
                                  $result=$result/746;
                                  break;
                                case "4":
                                  $result=$result/453;
                                  break;
                                case "5":
                                  $result=$result/158;
                                  break;
                              }
                            }
                            
                          echo " <script >document.getElementById('result').innerHTML=";
                          echo $result;
                          echo ";</script>";
                          }
                        ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>