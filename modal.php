<style type="text/css">
#backgroundPopup<?php echo $extraido2['id']; ?>{
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
#popupContact<?php echo $extraido2['id']; ?>{
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
.popupContactClose<?php echo $extraido2['id']; ?> {
    font-size: 14px;
    line-height: 14px;
    right: 6px;
    top: 4px;
    position: absolute;
    color: #800000;
    font-weight: 700;
    display: block;
}
#button<?php echo $extraido2['id']; ?>{
    text-align: left;
    font-size: 13px;
    cursor: pointer;
    width: 100px;
    margin: 0 auto;
    margin-top: 10px;
}


#backgroundPopup<?php echo $extraido2['id']; ?>{
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
#popupContact<?php echo $extraido2['id']; ?>{
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
.popupContactClose<?php echo $extraido2['id']; ?> {
    font-size: 14px;
    line-height: 14px;
    right: 6px;
    top: 4px;
    position: absolute;
    color: #800000;
    font-weight: 700;
    display: block;
}
#button<?php echo $extraido2['id']; ?>{
    text-align: left;
    font-size: 13px;
    cursor: pointer;
    width: 100px;
    margin: 0 auto;
    margin-top: 10px;
}</style>
 
<script type="text/javascript"> 
    var popupStatus<?php echo $extraido2['id']; ?> = 0;
    function loadPopup<?php echo $extraido2['id']; ?>(ventana) {
    if (popupStatus<?php echo $extraido2['id']; ?> == 0) {
        $("#backgroundPopup<?php echo $extraido2['id']; ?>").css({
            "opacity": "0.7"
        });
        $("#backgroundPopup<?php echo $extraido2['id']; ?>").fadeIn("slow");
        $("#popupContact<?php echo $extraido2['id']; ?>").fadeIn("slow");
        popupStatus<?php echo $extraido2['id']; ?> = 1;
    }
};
 
function disablePopup<?php echo $extraido2['id']; ?>() {
    if (popupStatus<?php echo $extraido2['id']; ?> == 1) {
        $("#backgroundPopup<?php echo $extraido2['id']; ?>").fadeOut("slow");
        $("#popupContact<?php echo $extraido2['id']; ?>").fadeOut("slow");
        popupStatus<?php echo $extraido2['id']; ?> = 0;
    }
};
 
$(document).ready(function () {
    $("#button<?php echo $extraido2['id']; ?>").click(function () {
        loadPopup<?php echo $extraido2['id']; ?>(1);
    });
    $(".popupContactClose<?php echo $extraido2['id']; ?>").click(function () {
        disablePopup<?php echo $extraido2['id']; ?>();
    });
    $("#backgroundPopup<?php echo $extraido2['id']; ?>").click(function () {
        disablePopup<?php echo $extraido2['id']; ?>();
    });
    $(document).keypress(function (e) {
        if (e.keyCode == 27 && popupStatus<?php echo $extraido2['id']; ?> == 1) {
            disablePopup<?php echo $extraido2['id']; ?>();
        }
    });
});
</script>


<a href="#" id="button<?php echo $extraido2['id']; ?>"><img class="img-lista" src="<?php echo $extraido2['imagen']; ?>" alt="" /></a>

<div id="popupContact<?php echo $extraido2['id']; ?>">
    <a class="popupContactClose<?php echo $extraido2['id']; ?>">x</a>
        <?php echo $extraido2['nombre']; ?>
        <p style=""><?php echo $extraido2['informacion']; ?></p>
    </div>
    
    <div id="backgroundPopup<?php echo $extraido2['id']; ?>"></div>