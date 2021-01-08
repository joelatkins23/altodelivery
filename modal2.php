<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Intento de 2 modal box</title>
    <link rel="stylesheet" href="estilo.css" type="text/css" media="screen" />
    <style type="text/css">
#backgroundPopup{
    display: none;
    position: fixed;
    _position: absolute; /* necesario para internet explorer 6 */
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    background: #ccc;
    border: 1px solid #cecece;
    z-index: 1;
}
#popupContact1{
    display: none;
    position: fixed;
    _position: fixed; /* necesario para internet explorer 6*/
    width: 420px;
    height: 370px;
    margin-top: -205px;
    margin-left: -210px;
    top: 50%;
    left: 50%;
    background: #FFFFFF;
    border: 12px solid #cecece;
    z-index: 2;
    padding: 12px;
    font-size: 13px;
}
.popupContactClose {
    font-size: 14px;
    line-height: 14px;
    right: 6px;
    top: 4px;
    position: absolute;
    color: #800000;
    font-weight: 700;
    display: block;
}
#button1{
    text-align: left;
    font-size: 13px;
    cursor: pointer;
    width: 100px;
    margin: 0 auto;
    margin-top: 10px;
}


#backgroundPopup{
    display: none;
    position: fixed;
    _position: absolute; /* necesario para internet explorer 6 */
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    background: #ccc;
    border: 1px solid #cecece;
    z-index: 1;
}
#popupContact1{
    display: none;
    position: fixed;
    _position: fixed; /* necesario para internet explorer 6*/
    width: 420px;
    height: 370px;
    margin-top: -205px;
    margin-left: -210px;
    top: 50%;
    left: 50%;
    background: #FFFFFF;
    border: 12px solid #cecece;
    z-index: 2;
    padding: 12px;
    font-size: 13px;
}
.popupContactClose {
    font-size: 14px;
    line-height: 14px;
    right: 6px;
    top: 4px;
    position: absolute;
    color: #800000;
    font-weight: 700;
    display: block;
}
#button1{
    text-align: left;
    font-size: 13px;
    cursor: pointer;
    width: 100px;
    margin: 0 auto;
    margin-top: 10px;
}</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
 
<script type="text/javascript"> 
    var popupStatus = 0;
    function loadPopup(ventana) {
    if (popupStatus == 0) {
        $("#backgroundPopup").css({
            "opacity": "0.7"
        });
        $("#backgroundPopup").fadeIn("slow");
        $("#popupContact1").fadeIn("slow");
        popupStatus = 1;
    }
};
 
function disablePopup() {
    if (popupStatus == 1) {
        $("#backgroundPopup").fadeOut("slow");
        $("#popupContact1").fadeOut("slow");
        popupStatus = 0;
    }
};
 
$(document).ready(function () {
    $("#button1").click(function () {
        loadPopup(1);
    });
    $(".popupContactClose").click(function () {
        disablePopup();
    });
    $("#backgroundPopup").click(function () {
        disablePopup();
    });
    $(document).keypress(function (e) {
        if (e.keyCode == 27 && popupStatus == 1) {
            disablePopup();
        }
    });
});
</script>
</head>
<body>
        
    <a href="#" id="button1">MODAL BOX #1</a>
    
    <div id="popupContact1">
    <a class="popupContactClose">x</a>
        <!-- Contenido POP-UP #1 -->
    </div>
    
    <div id="backgroundPopup"></div>
</body>
</html>