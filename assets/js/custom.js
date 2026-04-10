/**
 * Shared site behaviors (loaded on all themed pages after footer).
 */
(function () {
    var btn = document.getElementById("btn-back-to-top");
    if (!btn) {
        return;
    }

    function updateVisibility() {
        var y = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
        btn.style.display = y > 1000 ? "block" : "none";
    }

    window.addEventListener("scroll", updateVisibility, { passive: true });
    updateVisibility();

    btn.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
})();
