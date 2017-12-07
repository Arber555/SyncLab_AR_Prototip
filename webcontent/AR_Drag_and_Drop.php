<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SyncLab</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>

    <header style="background-color: rgb(247,247,247); z-index: 1; position: relative;">
        <div id="wrapper">
            <div id="logo">
                <div class="main-logo">
                    <img src="images/logo.png" alt="Logo">
                </div>
            </div>
            <div id="account">
                <h1 id="loggedin-user"></h1>
            </div>
        </div>
    </header>

    <div id="left-container">
        <div class="left-content">
            <h1>3D Model</h1>

            <input type="text" id="model-search" placeholder="Search on models">
            <input type="checkbox" class="read-more-state" id="post-1" />
            <label for="post-1" class="read-more-trigger">
                <div id="addmodel">
                    <img id="addmodel" src="images/Add.svg" alt="">
                    <p>3D Model</p>
                </div>
            </label>
            <div class="read-more-wrap">
                <span class="read-more-target">
                    <div class="first-models">
                      <ul>
                          <li>3D Model 1</li>
                          <li>3D Model 2</li>
                          <li>3D Model 3</li>
                          <li>3D Model 4</li>
                      </ul>
                    </div>
                    
                </span>
            </div>
            <!--
            <div id="model-wrapper">
                <div id="models">
                    <input type="checkbox" class="read-more-state" id="post-1" />
                    <label for="post-1" class="read-more-trigger">
                        <span class="addmodel">
                            <img id="addmodel" src="images/Add.svg" alt="">
                            <p>3D Model</p>
                        </span>
                    </label>
                    <div class="read-more-wrap">
                        <span class="read-more-target">
                          
                           
                        </span>
                    </div>
                </div>
            </div>
        -->
        </div>
        <div class="left-content">
            <input type="checkbox" class="read-more-state" id="post-2" />
            <label for="post-2" class="read-more-trigger">
                <div id="basic-model">
                    <img id="basic-model" src="images/Add.svg" alt="">
                    <p>Basic Model</p>
                </div>
            </label>
            <div class="read-more-wrap">
                <span class="read-more-target">
                    <div class="models">
                        <img class="model" src="images/Box.svg" alt="">
                        <p>Box</p>
                        <form name="hidden-form" action="AR_Drag_and_Drop.php" method="post">
                            <input type="hidden" name="Box" value="<a-box position='0 0.5 0' material='color: red; opacity: 0.5;' id='object'></a-box>">
                            <input name="submit" type="submit" value="Box" />
                        </form>
                    </div>
                    <div class="models">
                        <img class="model" src="images/Cylinder.svg" alt="">
                        <p>Cylinder</p>
                        <form name="hidden-form" action="AR_Drag_and_Drop.php" method="post">
                            <input type="hidden" name="Cylinder" value="Cylinder">
                            <input name="submit" type="submit" value="Cylinder" />
                        </form>
                    </div>
                    <div class="models">
                        <img class="model" src="images/Sphere.svg" alt="">
                        <p>Sphere</p>
                        <form name="hidden-form" action="AR_Drag_and_Drop.php" method="post">
                            <input type="hidden" name="Sphere" value="<a-sphere position='0 0.5 0' material='color: red; opacity: 0.5;'></a-sphere>">
                            <input name="submit" type="submit" value="Sphere" />
                        </form>
                    </div>
                </span>
            </div>
        </div>
        <hr>
        <div class="left-content">
            <h1>Visuals</h1>
            <input type="text" id="visual-search" placeholder="Search on visuals">
            <div id="visuals">
                <div class="visuals">
                    <img class="visual" src="images/text.svg" alt="">
                    <p>Lable</p>
                </div>
                <div class="visuals">
                    <img class="visual" src="images/image.svg" alt="">
                    <p>Image</p>
                </div>
            </div>
        </div>
    </div>

    <div id="right-container">
        <div class="right-content">
            <a href="http://localhost/SyncLab_AR_Prototip/webcontent/temp.php">Test</a>
            <!--<input id="test-button" type="button" value="Test">-->
            <input id="save-button" type="button" value="Save">
        </div>
    </div>

    <?php
        $basicModel = filter_input(INPUT_POST, 'submit');
        
        if(isset($basicModel))
        {
            $box = filter_input(INPUT_POST, 'Box');
            $sphere = filter_input(INPUT_POST, 'Sphere');

            if(isset($box))
            {
                $f = fopen("temp.php", "r+");
                
                $oldstr = file_get_contents("temp.php");
                //$str_to_insert = "Write the string to insert here";
                $specificLine = "<a-marker preset='hiro' id='marker'>";
                
                
                // read lines with fgets() until you have reached the right one
                //insert the line and than write in the file.
                
                
                while (($buffer = fgets($f)) !== false) {
                    if (strpos($buffer, $specificLine) !== false) {
                        $pos = ftell($f); 
                        $newstr = substr_replace($oldstr, $box, $pos, 0);
                        file_put_contents("temp.php", $newstr);
                        break;
                    }
                }
                fclose($f);
            }

            if(isset($sphere))
            {

            }
        }
    ?>

    <script>

        document.getElementById("loggedin-user").innerHTML = localStorage.username;

    </script>
</body>

</html>