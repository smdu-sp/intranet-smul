
<!DOCTYPE html>
<html
<head>
<div id="back-to-top">^</div>
    <title>Exemplo de Back to Top</title>
    <style>
        /* Estilo do botão Back to Top */
        #back-to-top {
            display: none;
            position: fixed;
            bottom: 15px;
            right: 15px;
            width: 40px;
            height: 40px;
            background-color: gray;
            color: white;
            text-align: center;
            line-height: 50px;
            font-size: 20px;
            border-radius: 18%;
            cursor: pointer;

        }
    </style>
</head>
<body>
<div id="back-to-top">^</div>


<script>
         document.addEventListener("DOMContentLoaded", function() {
            var backToTopButton = document.getElementById("back-to-top");
            backToTopButton.style.display = "none";

        });
        window.onscroll = function() {
            var backToTopButton = document.getElementById("back-to-top");
            
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                backToTopButton.style.display = "block";
            } else {
                backToTopButton.style.display = "none";
            }
 
        };
        document.getElementById("back-to-top").addEventListener("click", function() {
            scrollToTop(350); //
        });

        function scrollToTop(scrollDuration) {
            var scrollStep = -window.scrollY / (scrollDuration / 15);
            var scrollInterval = setInterval(function() {
                if (window.scrollY !== 0) {
                    window.scrollBy(0, scrollStep);
                } else {
                    clearInterval(scrollInterval);
                }
            }, 15);
        }
    </script>
</body>
</html>
    </script>
    </body>