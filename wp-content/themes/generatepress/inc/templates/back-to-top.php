<html>
    <div id="progress">
        <span id="progress-value">Voltar ao topo</span>
    </div>
</html>

<style>
    #progress{
        font-size: 14px;
        position: fixed;
        display: block;
        cursor: pointer;
        right: 90px;
        bottom: 90px;
        transition: 300ms;
        font-weight: bold;
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
                backToTopButton.style.display = "block";
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
