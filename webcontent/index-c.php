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
            <!--<a-entity 
                obj-model="obj: url(../3D_Models/test/crane-for-poly.obj); 
                mtl: url(../3D_Models/test/crane-for-poly.mtl)">
            </a-entity>-->
            <!--<a-box position='0 0.5 0' material='color: red; opacity: 0.5;' id="object"></a-box>-->
            <!--<a-text value="50K!!!"></a-text>
            <a-image src="51J6wcvKoYL.jpg"></a-image>-->
            <!--<a-sphere position='0 0.5 0' material='color: red; opacity: 0.5;'s></a-sphere>-->

            <a-assets>
                <a-asset-item id="tree" src="../3D_Models/busterDrone/busterDrone.gltf"></a-asset-item>
            </a-assets>
            
            <a-entity gltf-model="#tree"></a-entity>
        </a-marker>

        <!-- define your gltf asset -->
            <!--<a-assets>
                <a-asset-item id="tree" src="../3D_Models/busterDrone/busterDrone.gltf"></a-asset-item>
            </a-assets>-->
                <!-- use your gltf model -->
            <!--<a-entity gltf-model="#tree"></a-entity>-->

            <!-- define a simple camera -->
        <a-entity camera></a-entity>
    </a-scene>
  <script>
        function removeSyzat()
        {
           /* var ele = document.getElementById("arjsDebugUIContainer");
            ele.remove();*/

            var elec = document.getElementsByClassName("a-enter-vr")[0];
            elec.remove();
        }      
        setTimeout(removeSyzat, 500);
        

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
    /*include "BL/SQLConnection.php";
    include "BL/useri.php";
    include "BL/projektet.php";
    /*$u = new Useri("Test", "test123", "passtest", "email@email.com");
    $u->insert($u);
    $p = new Projektet("TestProjekti1", "BL/projects/", 1); arjsDebugUIContainer
    $p->insert($p);*/
       /* $projekti1 = new Projektet("EmriTest", "SyncLab_AR_Prototip/webcontent/BL/projects/", 1);
        $projekti1->insert($projekti1);*/
    ?>
</body>
</html>