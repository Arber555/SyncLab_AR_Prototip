<html>
        <script src='../ARjs/aframe.min.js'></script>
        <!-- include ar.js for A-Frame -->
        <script src='../ARjs/aframe-ar.js'></script>
        <body style='margin : 0px; overflow: hidden;'>
            <a-scene embedded arjs='trackingMethod: best;' id='scene'>
                <a-marker preset='hiro' id='marker'>
                   
                </a-marker>
                <a-entity camera></a-entity>
            </a-scene>
        </body>
        </html>