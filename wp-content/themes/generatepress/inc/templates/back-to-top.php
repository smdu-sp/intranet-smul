<html>
    <div id="progress">
        <span id="progress-value">&#x1F815;</span>
    </div>
</html>

<style>
    #progress{
        background-color: rgb(0, 0, 0, 0.1);
        border: 4px solid #395AAD;
        bottom: 30px;
        height: 40px;
        width: 40px;
        font-size: 30px;
        position: fixed;
        display: grid;
        place-items: center;
        border-radius: 50%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        right: 40px;
        transition: 300ms;
    }
</style>


<script>
    window.onscroll = function() {

        var backToTopButton = document.getElementById("progress");
        var text_voltar_topo = document.getElementById("text_voltar_topo");
        var menu = document.getElementById("primary-menu");

        function isElementInViewport(el) {
            var rect = el.getBoundingClientRect();
            return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        window.addEventListener("scroll", function() {
            if (isElementInViewport(menu) || isElementInViewport(text_voltar_topo)) {
                backToTopButton.style.display = "none";
            } else{
                backToTopButton.style.display = "grid";
            }
        });

        backToTopButton.addEventListener("click", function() {
            window.scrollTo({
            top: 0,
            behavior: "smooth"
            });
        });

    };
</script>
