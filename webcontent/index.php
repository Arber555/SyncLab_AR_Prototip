<html>
<script src="../ARjs/aframe.min.js"></script>
<!-- include ar.js for A-Frame -->
<script src="../ARjs/aframe-ar.js"></script>
<body style='margin : 0px; overflow: hidden;'>
    <div style='position: absolute; top: 10px; width:100%; text-align: center; z-index: 1;'>
        <input type="button" value="Sphere" onclick="trupat('reth');" />
        <input type="button" value="Box" onclick="trupat('kub');" />
    </div>
    <a-scene embedded arjs='trackingMethod: best;' id="scene">
        <a-marker preset='hiro' id="marker">
            <!-- here define the content to display on top of the marker -->
           <!-- <a-box position='0 0.5 0' material='color: red; opacity: 0.5;' id="object"></a-box>-->
            <!--<a-sphere position='0 0.5 0' material='color: red; opacity: 0.5;'s></a-sphere>-->

        </a-marker>

        <!-- define your gltf asset -->
            <a-assets>
                <a-asset-item id="tree" src="../3D_Models/busterDrone/busterDrone.gltf"></a-asset-item>
            </a-assets>
                <!-- use your gltf model -->
            <a-entity gltf-model="#tree"></a-entity>

            <!-- define a simple camera -->
        <a-entity camera></a-entity>
    </a-scene>
  <script>
        //var elements = document.getElementsByTagName('a-marker');
        var elements = document.getElementById("marker");
        function remove()
        {
            //var elements = document.getElementsByTagName('a-marker');

            /*while (elements[0]) {
                elements[0].parentNode.removeChild(elements[0]);  //qetu osht gabimi kqyre edhe nihere
            }*/

            elements.removeChild(document.getElementById("object"));
        }

        function trupat(x)
        {
            if(x == "reth")
            {
                remove();
                
                var mycontent = document.createElement("a-sphere");
                mycontent.setAttribute("position", "0 0.5 0");
                mycontent.setAttribute("material", "color: red; opacity: 0.5;");
                mycontent.setAttribute("id", "object");
                elements.appendChild(mycontent);
            } else if(x == "kub") {
                remove();
                
                var mycontent = document.createElement("a-box");
                mycontent.setAttribute("position", "0 0.5 0");
                mycontent.setAttribute("material", "color: red; opacity: 0.5;");
                mycontent.setAttribute("id", "object");
                elements.appendChild(mycontent);
            }
        }

  </script>
  <?php
    include "BL/SQLConnection.php";
    include "BL/useri.php";
    /*$u = new Useri("Test", "test123", "passtest", "email@email.com");
    $u->insert($u);*/
    ?>
</body>
</html>