<html>
<script src="../ARjs/aframe.min.js"></script>
<!-- include ar.js for A-Frame -->
<script src="../ARjs/aframe-ar.js"></script>
<body style='margin : 0px; overflow: hidden;'>
  <a-scene embedded arjs='trackingMethod: best;'>
        <a-marker preset='hiro'>
            <!-- here define the content to display on top of the marker -->
            <a-box position='0 0.5 0' material='color: red; opacity: 0.5;'></a-box>
        </a-marker>
            <!-- define a simple camera -->
        <a-entity camera></a-entity>
  </a-scene>
</body>
</html>