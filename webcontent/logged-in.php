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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>

<body>
    <?php session_start(); ?>
    <header>

        <div id="wrapper">

            <div id="logo">
                <div class="main-logo">
                    <img src="images/logo.png" alt="Logo">
                </div>
            </div>
 
            <div id="account">
                <h1> <?php echo $_SESSION['name']; ?> </h1>
                <!--<h1 id="loggedin-user"></h1>-->
            </div>

        </div>

    </header>

    <div id="wrapper">
        <div id="projects">

            <div id="projects-title">

                <h1>Projects</h1>


            </div>


            <div id="createproject">

                <input type="button" class="createproject" id="create-acc" value="Create Project">

            </div>

        </div>
    </div>

    <div id="wrapper">
        <hr>

        <div id="find">
            <div class="sort">
                <h4>Sort:
                    <input type="text" id="sort" placeholder="Name">
                </h4>
            </div>

            <div class="search">

                <i class="fa fa-search"></i>
                <input type="text" id="search" placeholder="Search">

            </div>

        </div>
    </div>

    <div id="wrapper">

        <article>
            <div id="article">
                <div class="article-info">
                    <img src="img/background.jpg" alt="Image1">

                    <h1>Building AR, V2.4</h1>
                    <p>Elvis Maddox</p>
                </div>
            </div>
        </article>
        <article>
            <div id="article">
                <div class="article-info">
                    <img src="img/background.jpg" alt="Image1">

                    <h1>Logo AR, Sticker Style</h1>
                    <p>Marisa Ayala</p>
                </div>
            </div>
        </article>
        <article>
            <div id="article">
                <div class="article-info">
                    <img src="img/background.jpg" alt="Image1">

                    <h1>Book Cover, Number Counter</h1>
                    <p>Kasey Morton</p>
                </div>
            </div>
        </article>
        <article>
            <div id="article">
                <div class="article-info">
                    <img src="img/background.jpg" alt="Image1">

                    <h1>Logo AR, Book Style</h1>
                    <p>Marisa Ayala</p>
                </div>
            </div>
        </article>

    </div>

    <div id="create-project" class="create-project">
        <div class="create-project-content">
            <span class="close-project">
                <i class="fa fa-close"></i>
            </span>
            <img src="images/logo.png" />
            <form name="createproject" action="createProject.php" method="post">
                <input type="text" id="project-name" name="projectname" placeholder="Your Project Name">
                <div id="createproject-error"></div>
                <div class="upload-image">
                    <h1>Drop or upload an image</h1>

                    <label for="upload">Upload image</label>
                    <input type="file" class="upload" id="upload" name="img" value="Upload image" onchange="PreviewImg(event)">

                    <div id="uploadimage-error"></div>


                </div>
                <input type="submit" id="createproject-button" name="btcCreate" value="Create Project" onclick="Validation()">

            </form>


        </div>
    </div>
    <!--
        <div id="upload-image" class="upload-image">
            <div class="upload-image-content">
                <span class="close-upload">
                    <i class="fa fa-close"></i>
                </span>
                <img src="images/image.svg"/>
                <h1>Drop or upload an image</h1>
                <form name="uploadimage">
                    <label for="upload">Upload image</label>
                    <input type="file" class="upload" name="upload" id="upload" value="Upload image" onchange="PreviewImg(event)">

                    <div id="uploadimage-error"></div>
                    <input type="button" id="next-button" value="Next" onclick="Upload()">
                </form>

            </div>
        </div>
    -->

<!--
    <script>

        function Upload() {

            if (document.uploadimage.upload.value == "") {
                document.uploadimage.upload.focus();
                document.getElementById("uploadimage-error").innerHTML = "*Please upload an image before you continue.";

            }
            else
                if (document.uploadimage.upload.value != "") {

                    window.location = "AR_Drag_and_Drop.html";
                }
        }

    </script>
-->
    <script>

        $('#upload').change(function () {
            var i = $(this).prev('label').clone();
            var file = $('#upload')[0].files[0].name;
            $(this).prev('label').text(file);
        });

    </script>
    <script>

        var createproject = document.getElementById("create-project");
        var btn = document.getElementById("createproject");
        var exit = document.getElementsByClassName("close-project")[0];


        btn.onclick = function () {
            createproject.style.display = "block";
        }
        exit.onclick = function () {
            createproject.style.display = "none";
        }

    </script>

    <script>

    </script>
    <script>

        function Validation() {

            if (document.createproject.projectname.value != "" && document.createproject.upload.value != "") {

                document.getElementById("createproject-error").innerHTML = "";
                document.getElementById("uploadimage-error").innerHTML = "";
                window.location = "AR_Drag_and_Drop.html";

            }
            else
                if (document.createproject.projectname.value == "") {
                    document.createproject.projectname.focus();
                    document.getElementById("createproject-error").innerHTML = "*Please type the project name.";
                }
            else
                if(document.createproject.upload.value == ""){
                    document.getElementById("uploadimage-error").innerHTML = "*Please upload an image.";
                }
        }

    </script>
    <script>

        document.getElementById("loggedin-user").innerHTML = localStorage.username;


    </script>


</body>

</html>