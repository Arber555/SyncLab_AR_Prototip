<html>
<script src="../ARjs/aframe.min.js"></script>
<!-- include ar.js for A-Frame -->
<script src="../ARjs/aframe-ar.js"></script>
<body style='margin : 0px; overflow: hidden;'>
    
    <a-scene embedded arjs>
        <!-- create your content here. just a box for now -->
        
        <!-- define a camera which will move according to the marker position -->
        <a-marker-camera preset='hiro'>
        <!--<a-box position='0 0.5 0' material='opacity: 0.5;'></a-box>-->
        
        </a-marker-camera>
        <a-assets>
                <a-asset-item id="tree" src="../3D_Models/busterDrone/busterDrone.gltf"></a-asset-item>
            </a-assets>
            
            <a-entity gltf-model="#tree"></a-entity>
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
</body>
</html>