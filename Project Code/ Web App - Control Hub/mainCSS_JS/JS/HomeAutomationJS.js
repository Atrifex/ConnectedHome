function lightStatusUpdater(){
    $( ".lightButtons" ).flipswitch( "disable" );

    var TVLightStatus = 0;
    var sofaFacingTableStatus = 0;
    var clockLightStatus = 0;

    if(document.getElementById("TVLight").checked == true)
    {
            TVLightStatus = 1;
     }else{
            TVLightStatus =0;
    }
    if(document.getElementById("sofaFacingTable").checked == true)
    {
            sofaFacingTableStatus = 1;
     }else{
            sofaFacingTableStatus =0;
    }
    if(document.getElementById("clockLight").checked == true)
    {
            clockLightStatus = 1;
     }else{
            clockLightStatus =0;
    }

    var status="TVLightStatus="+TVLightStatus+"&sofaFacingTableStatus="+sofaFacingTableStatus+"&clockLightStatus="+clockLightStatus;

    $.ajax({
        type:"post",
        url:"../mainCSS_JS/Uploader/lightStatusChanger.php",
        data: status,
        cache:false,
         success: function(){
            $( ".lightButtons" ).flipswitch( "enable" );
        },
    });

    $.ajax({
        type:"post",
        url:"../mainCSS_JS/Uploader/lightStatusDBUploader.php",
        data: status,
        cache:false,

    });

    return false;
}



function turnOnAll(){
    $( ".lightButtons" ).flipswitch( "disable" );
    $( ".buttonsAll" ).button( "disable" );

    var TVLightStatus = 1;
    var sofaFacingTableStatus = 1;
    var clockLightStatus = 1;

    document.getElementById("TVLight").checked = true;
    document.getElementById("sofaFacingTable").checked = true;
    document.getElementById("clockLight").checked = true;

    var status="TVLightStatus="+TVLightStatus+"&sofaFacingTableStatus="+sofaFacingTableStatus+"&clockLightStatus="+clockLightStatus;

    $.ajax({
        type:"post",
        url:"../mainCSS_JS/Uploader/lightStatusChanger.php",
        data: status,
        cache:false,
         success: function(){
            $( ".lightButtons" ).flipswitch( "enable" );
            $( ".buttonsAll" ).button( "enable" );

        },
    });

    $.ajax({
        type:"post",
        url:"../mainCSS_JS/Uploader/lightStatusDBUploader.php",
        data: status,
        cache:false,

    });

    return false;
}


function turnOffAll(){
    $( ".lightButtons" ).flipswitch( "disable" );
    $( ".buttonsAll" ).button( "disable" );

    var TVLightStatus = 0;
    var sofaFacingTableStatus = 0;
    var clockLightStatus = 0;

    document.getElementById("TVLight").checked = false;
    document.getElementById("sofaFacingTable").checked = false;
    document.getElementById("clockLight").checked = false;

    var status="TVLightStatus="+TVLightStatus+"&sofaFacingTableStatus="+sofaFacingTableStatus+"&clockLightStatus="+clockLightStatus;

    $.ajax({
        type:"post",
        url:"../mainCSS_JS/Uploader/lightStatusChanger.php",
        data: status,
        cache:false,
         success: function(){
            $( ".lightButtons" ).flipswitch( "enable" );
            $( ".buttonsAll" ).button( "enable" );
        },
    });

    $.ajax({
        type:"post",
        url:"../mainCSS_JS/Uploader/lightStatusDBUploader.php",
        data: status,
        cache:false,

    });

    return false;
}