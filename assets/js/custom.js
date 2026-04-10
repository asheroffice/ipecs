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

/**
 * Home page: preloader + section reveal.
 */
(function () {
    if (!document.body || !document.body.classList.contains("home-page")) {
        return;
    }

    // ---- Preloader ----
    var pre = document.getElementById("home-preloader");
    if (pre) {
        var start = Date.now();
        var MIN_MS = 900; // feels modern without feeling slow

        document.body.classList.add("home-preloading");

        function hidePreloader() {
            var elapsed = Date.now() - start;
            var wait = Math.max(0, MIN_MS - elapsed);
            window.setTimeout(function () {
                pre.classList.add("is-hiding");
                window.setTimeout(function () {
                    pre.parentNode && pre.parentNode.removeChild(pre);
                    document.body.classList.remove("home-preloading");
                }, 520);
            }, wait);
        }

        if (document.readyState === "complete") {
            hidePreloader();
        } else {
            window.addEventListener("load", hidePreloader, { once: true });
        }
    }

    // ---- Section reveal (first home page) ----
    var reduceMotion = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    if (reduceMotion) {
        return;
    }

    var nodes = [];
    document.querySelectorAll("body.home-page > section, body.home-page .home-hero, body.home-page footer.home-footer").forEach(function (el) {
        if (!el) return;
        nodes.push(el);
        el.classList.add("reveal-init");
    });

    if (!("IntersectionObserver" in window)) {
        nodes.forEach(function (el) { el.classList.add("reveal-in"); });
        return;
    }

    var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (!entry.isIntersecting) return;
            entry.target.classList.add("reveal-in");
            io.unobserve(entry.target);
        });
    }, { threshold: 0.12, rootMargin: "0px 0px -10% 0px" });

    nodes.forEach(function (el) { io.observe(el); });
})();
