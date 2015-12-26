/* AJAX */
// Fix for Internet explorer
if (!window.location.origin) {
    window.location.origin = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port : '');
}
// In order that it works both on local and production site
var locationOrigin;
if (document.domain === "localhost") {
    locationOrigin = window.location.origin + "/stephane-roche.fr/";
} else {
    locationOrigin = window.location.origin + "/";
}


function breadcrumbs(urlController) {
    var bcHome = '<ul class="breadcrumbs small-centered columns"><li class="current">Accueil</li></ul>';
    var bcBlog = '<ul class="breadcrumbs small-centered columns"><li><a href="home">Accueil</a> </li><li class="current">Blog</li></ul>';
    var bcBlogJS = '<ul class="breadcrumbs small-centered columns"><li><a href="home">Accueil</a> </li><li>Blog</li><li class="current">Javascript</li></ul>';
    var bcBlogCrypto = '<ul class="breadcrumbs small-centered columns"><li><a href="home">Accueil</a> </li><li>Blog</li><li class="current">Crypto-monnaies</li></ul>';
    var bcBlogTools = '<ul class="breadcrumbs small-centered columns"><li><a href="home">Accueil</a> </li><li>Blog</li><li class="current">Outils</li></ul>';
    var bcReal = '<ul class="breadcrumbs small-centered columns"><li><a href="home">Accueil</a> </li><li class="current">Réalisations</li></ul>';
    var bcCV = '<ul class="breadcrumbs small-centered columns"><li><a href="home">Accueil</a></li><li class="current">CV</li></ul>';
    var bcContact = '<ul class="breadcrumbs small-centered columns"><li><a href="home">Accueil</a> </li><li class="current">Contact</li></ul>';
    var bcAdmin = '<ul class="breadcrumbs small-centered columns"><li><a href="home">Accueil</a> </li><li class="current">Admin</li></ul>';


    switch (urlController) {
        case "home":
            $(".breadcrumbs").remove();
            $("#breadcrumbs").append(bcHome);
            break;

        case "blog":
            $(".breadcrumbs").remove();
            $("#breadcrumbs").append(bcBlog);
            break;
        case "blog/javascript":
            $(".breadcrumbs").remove();
            $("#breadcrumbs").append(bcBlogJS);
            break;
        case "blog/crypto":
            $(".breadcrumbs").remove();
            $("#breadcrumbs").append(bcBlogCrypto);
            break;
        case "blog/outils":
            $(".breadcrumbs").remove();
            $("#breadcrumbs").append(bcBlogTools);
            break;

        case "realisations":
            $(".breadcrumbs").remove();
            $("#breadcrumbs").append(bcReal);
            break;

        case "curriculum":
            $(".breadcrumbs").remove();
            $("#breadcrumbs").append(bcCV);
            break;

        case "contact":
            $(".breadcrumbs").remove();
            $("#breadcrumbs").append(bcContact);
            break;
            
        case "admin":
            $(".breadcrumbs").remove();
            $("#breadcrumbs").append(bcAdmin);
            break;    

        default:
            $(".breadcrumbs").remove();
            $("#breadcrumbs").append(bcHome);
    }

}

var ajaxrequest = function(idTrigger, idViewContainer, urlController, sendMethod) {
    $(document).ready(function() {
        $(idTrigger).click(function(e) {
            //if (event.defaultPrevented) return;
            e.preventDefault();
            e.stopPropagation();
            $.ajax({
                //url: window.location.origin+"/stephane-roche.fr/"+urlController,
                url: locationOrigin + urlController,
                type: sendMethod,
                success: function(data, statut, jqXHR) {
                    //console.log(locationOrigin);
                    //console.log("window.location :");console.log(window.location);
                    //console.log("window.location.origin :");console.log(window.location.origin);
                    //console.log("history :");console.log(history);

                    $("#content").remove();
                    breadcrumbs(urlController);
                    $(data).hide().insertAfter("#breadcrumbs").fadeIn(500);
                    $(idViewContainer).wrap("<div id='content' class='row small-10'></div>");
                    $('html, body').animate({scrollTop: 0}, 0);
                },
                error: function(jqXHR, statut, erreur) {
                    alert("Sorry bro, an error occurs");
                },
                statusCode: {
                    404: function() {
                        alert("page not found");
                    },
                    400: function() {
                        alert('bad request');
                    }
                }
            });
            history.pushState({
                idTrigger: idTrigger,
                idViewContainer: idViewContainer,
                urlController: locationOrigin + urlController,
                sendMethod: sendMethod},
            'titre', locationOrigin + urlController);
        });
    });
};

window.onpopstate = function(event) {
    //console.log(event.state.idTrigger);
    //console.log(event.state.idViewContainer);
    //console.log("event.state.urlController :");
    //console.log(event.state.urlController);
    //console.log(event.state.sendMethod);
    $.ajax({
        url: event.state.urlController,
        type: event.state.sendMethod,
        success: function(data, statut, jqXHR) {
            /*if(event.state === null){
             $("#content").remove();
             $(data).hide().insertAfter(".breadcrumbs").fadeIn(500);
             $("#home-container").wrap("<div id='content' class='row small-9'></div>");
             
             }else{*/
            $("#content").remove();
            $(data).hide().insertAfter(".breadcrumbs").fadeIn(500);
            $(event.state.idViewContainer).wrap("<div id='content' class='row small-10'></div>"); /*}*/
        },
        error: function(jqXHR, statut, erreur) {
            alert("Sorry bro, an error occurs");
        },
        statusCode: {
            404: function() {
                alert("page not found");
            },
            400: function() {
                alert('bad request');
            }
        }
    });
    
    //ajaxrequest(event.state.idTrigger,event.state.idViewContainer,event.state.urlController,event.state.sendMethod);	
    // Set properties dynamically to the marker when user use back and forward navigation browser
    var ele = event.state.idTrigger;
    
    // Hack Marker Ajax menu - Remplace les classes par les id pour que la fonction css() de jquery fonctionne
    switch (ele) {
		case ".ajaxAcceuil":
            ele = '#accueil-menu';
			break;
		case ".ajaxBlog":
            ele = '#blog-menu';
			break;
        case ".ajaxRealisations":
            ele = '#realisations-menu';
            break;
		case ".ajaxCurriculum":
            ele = '#curriculum-menu';
            break;
        case ".ajaxContact":
            ele = '#contact-menu';
            break;
       default:
            ele = '#accueil-menu';
    }

    var width = $(ele).css("width");
    var position = $(ele).position();
    $("#marker").width(width);
    $("#marker").css("left", position.left);
};


/*
 *	Ajax Menu
 *	function(idTrigger, idViewContainer, urlController, sendMethod)
 */

// Call Home
ajaxrequest(".ajaxAcceuil", "#home-container", "home", "POST");
// Call Blog
ajaxrequest(".ajaxBlog", "#liste-article", "blog", "POST");
ajaxrequest(".ajaxBlogJavascript", "#liste-article", "blog/javascript", "POST");
ajaxrequest(".ajaxBlogCrypto", "#liste-article", "blog/crypto", "POST");
ajaxrequest(".ajaxBlogTools", "#liste-article", "blog/outils", "POST");
// Call Réalisations
ajaxrequest(".ajaxRealisations", "#realisations-container", "realisations", "POST");
// Call CV
ajaxrequest(".ajaxCurriculum", "#cv-container", "curriculum", "POST");
// Call Contact
ajaxrequest(".ajaxContact", "#contact-container", "contact", "GET");
// // Call Admin
ajaxrequest(".ajaxAdmin", "#admin-container", "auth/index", "GET");

// Call Article - Suite button
$(document).on('click', '.suitelink', function(e) {
//$(".suitelink").click(function(e) {
    e.preventDefault();
    var href_article = $(this).attr('href');
    //console.log(href_article);

    $.ajax({
        url: locationOrigin + href_article,
        type: "POST",
        success: function(data, statut, jqXHR) {
            $("#content").remove();
            $(data).hide().insertAfter("#breadcrumbs").fadeIn(500);
            $("#article-container").wrap("<div id='content' class='row small-10'></div>");
            $('html, body').animate({scrollTop: 0}, 0);
        },
        error: function(jqXHR, statut, erreur) {
            alert("Sorry bro, an error occurs");
        },
        statusCode: {
            404: function() {
                alert("page not found");
            },
            400: function() {
                alert('bad request');
            }
        }
    });

    history.pushState({idTrigger: ".suitelink", idViewContainer: "article-container", urlController: href_article, sendMethod: "POST"}, 'titre', locationOrigin + href_article);
});