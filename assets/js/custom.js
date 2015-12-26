/*function _(x) {
 return document.getElementById(x);
 }*/
function initCustom() {

    // In order that it works both on local and production site
    var locationOrigin;
    if (document.domain == "omar.local") {
        locationOrigin = window.location.origin + "/stephane-roche.fr/";
    } else if (document.domain == "localhost") {
        locationOrigin = window.location.origin + "/stephane-roche.fr/";
    } else {
        locationOrigin = window.location.origin + "/";
    }

    // Fix TinyMCE empty p
    //$("article.accroche-article > p:nth-child(3)").remove();


    /**
     * Go to top button
     */
        // Toggle visibility of go-top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.go-top').fadeIn(200);
        } else {
            $('.go-top').fadeOut(200);
        }
    });
    // Animate the scroll to top
    $('.go-top').click(function (event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 300);
    });

    /* LOGO */
    function SplitText(node) {
        var text = node.nodeValue.replace(/^\s*|\s(?=\s)|\s*$/g, "");
        for (var i = 0; i < text.length; i++) {
            var letter = document.createElement("span");
            letter.style.display = "inline-block";
            letter.style.position = "absolute";
            letter.appendChild(document.createTextNode(text.charAt(i)));
            node.parentNode.insertBefore(letter, node);
            var positionRatio = i / (text.length - 1);
            var textWidth = letter.clientWidth;
            var indent = 100 * positionRatio;
            var offset = -textWidth * positionRatio;
            letter.style.left = indent + "%";
            letter.style.marginLeft = offset + "px";
            //console.log("Letter ", text[i], ", Index ", i, ", Width ", textWidth, ", Indent ", indent, ", Offset ", offset);
        }
        node.parentNode.removeChild(node);
    }

    function Justify() {
        var TEXT_NODE = 3;
        var elem = document.getElementById("logo");
        elem = elem.firstChild;
        while (elem) {
            var nextElem = elem.nextSibling;
            if (elem.nodeType == TEXT_NODE) SplitText(elem);
            elem = nextElem;
        }
    }

    //window.onload = Justify;
    Justify();

    /* Countdown Form Success page */
    if ($("#formsuccess-container").length > 0) {
        $(document).ready(function () {
            var number = 10;
            var url = locationOrigin + "/home";

            function countdown() {
                setTimeout(countdown, 1000);
                $('#count').html("Vous allez être redirigé vers la page d'accueil dans " + number + " secondes");
                number--;
                if (number < 0) {
                    window.location = url;
                    number = 0;
                }
            }

            countdown();
        });
    }


    // Menu Marker
    // Init - Marker on first menu item

    function initMarker() {
        //Get
        var homemenu = $("#accueil-menu");
        var width = homemenu.width();
        var position = homemenu.position();
        //Set
        $("#marker").width(width);
        $("#marker").css("left", position.left);
        $("#marker").css("display", "block");
    }

    initMarker();

    // Set properties dynamically to the marker
    /*
     * Fonctionne avec le menu et les liens du footer
     * Récupère la premiere classe de l'élément cliqué et attribue l'id correspondant
     * pour que css() et position() puisse fonctionner
     */
    function loadContent() {
        var classFooterMenu = $(this).attr("class");
        var elFooter = classFooterMenu.split(" ")[0];
        switch (elFooter) {
            case "ajaxAcceuil":
                elFooter = '#accueil-menu';
                break;
            case "ajaxBlog":
                elFooter = '#blog-menu';
                break;
            case "ajaxRealisations":
                elFooter = '#realisations-menu';
                break;
            case "ajaxCurriculum":
                elFooter = '#curriculum-menu';
                break;
            case "ajaxContact":
                elFooter = '#contact-menu';
                break;
        }

        var width = $(elFooter).css("width");
        var position = $(elFooter).position();
        $("#marker").width(width);
        $("#marker").css("left", position.left);
        // Store id of $(this) for onresize function
        $("#marker").data('ele', $(this).attr("id"));
    }

    $('.ajax-trigger').click(loadContent);


    /* Menu Marker - Adapt on resize */
    // Refresh page on browser resize
    $(window).bind('resize', function () {
        // Init - Set to Accueil
        var homemenu = $("#accueil-menu");
        var width = homemenu.width();
        var posInit = homemenu.position();
        $("#marker").width(width);
        $("#marker").css("left", posInit.left);
        // Tracking when menu link change
        var ele = $("#marker").data('ele');
        var position = $("#" + ele).position();
        var widthEle = $("#" + ele).width();
        $("#marker").css("left", position.left);
        $("#marker").width(widthEle);
    });


    // Close offcanvas with Ajax mode
    $('.right-off-canvas-toggleLink').click(function (e) {
        $('.right-off-canvas-toggleLink').parents('.off-canvas-wrap').toggleClass("move-left");
    });
}
window.onload = initCustom;