<html>
<script src="../ARjs/aframe.min.js"></script>
<!-- include ar.js for A-Frame -->
<script src="../ARjs/aframe-ar.js"></script>
<body style='margin : 0px; overflow: hidden;'>
    <div style='position: absolute; top: 10px; width:100%; text-align: center; z-index: 1;'>
        <input type="button" value="Remove" onclick="trupat();" />
    </div>
  <a-scene embedded arjs='trackingMethod: best;'>
        <a-marker preset='hiro'>
            <!-- here define the content to display on top of the marker -->
            <a-box position='0 0.5 0' material='color: red; opacity: 0.5;'></a-box>
            <!--<a-sphere position='0 0.5 0' material='color: red; opacity: 0.5;'s></a-sphere>-->
        </a-marker>
            <!-- define a simple camera -->
        <a-entity camera></a-entity>

  </a-scene>
  <script>
        var elements = document.getElementsByTagName('a-marker');
        function remove()
        {
            //var elements = document.getElementsByTagName('a-marker');

            while (elements[0]) {
                elements[0].parentNode.removeChild(elements[0]);  //qetu osht gabimi kqyre edhe nihere
            }
        }

        function trupat()
        {
            //if(x == "reth")
            //{
                //remove();
                
                var mycontent = document.createElement("a-sphere");
                mycontent.setAttribute("position", "0 0.5 0");
                mycontent.setAttribute("material", "color: red; opacity: 0.5;");
                //mycontent.appendChild(document.createTextNode("This is a paragraph"));
                elements[0].appendChild(mycontent);
                //elements.innerHTML = "<a-sphere position='0 0.5 0' material='color: red; opacity: 0.5;'s></a-sphere>";
            //}
        }

  </script>
</body>
</html>