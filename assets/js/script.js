$(document).ready(function(){
    //First Sub Menu Show
    $("#first").click(function(){
        if($(".menu-first").css("display") == "none"){
            $(".menu-first").css("display","block");
        }
        else {
            $(".menu-first").css("display","none");
        }
        
    });

    //Second Sub Menu Show
    $("#second").click(function(){
        if($(".menu-second").css("display") == "none"){
            $(".menu-second").css("display","block");
        }
        else {
            $(".menu-second").css("display","none");
        }
        
    });

    //Third Sub Menu Show
    $("#third").click(function(){
        if($(".menu-third").css("display") == "none"){
            $(".menu-third").css("display","block");
        }
        else {
            $(".menu-third").css("display","none");
        }
        
    });

    //Fourth Sub Menu Show
    $("#fourth").click(function(){
        if($(".menu-fourth").css("display") == "none"){
            $(".menu-fourth").css("display","block");
        }
        else {
            $(".menu-fourth").css("display","none");
        }
        
    });

    //Fifth Sub Menu Show
    $("#fifth").click(function(){
        if($(".menu-fifth").css("display") == "none"){
            $(".menu-fifth").css("display","block");
        }
        else {
            $(".menu-fifth").css("display","none");
        }
        
    });

    //Sixth Sub Menu Show
    $("#sixth").click(function(){
        if($(".menu-sixth").css("display") == "none"){
            $(".menu-sixth").css("display","block");
        }
        else {
            $(".menu-sixth").css("display","none");
        }
        
    });

    //Konfirmasi Delete Aktifitas
    $('.konfirmDeleteActivity').click(function(){
        var id = $(this).attr("data-id");
        swal({
            title: "Confirmation",
            text: "Are you sure you want to delete ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            closeOnConfirm: false,
            closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    window.location.href = "delete-activity-"+id;
                }
                else {
                    window.location.href = "";
                }
        });
    });

    //Konfirmasi Delete To Do List
    $('.konfirmDeleteTDL').click(function(){
        var id = $(this).attr("data-id");
        swal({
            title: "Confirmation",
            text: "Are you sure you want to delete ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            closeOnConfirm: false,
            closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    window.location.href = "delete-to-do-list-"+id;
                }
                else {
                    window.location.href = "";
                }
        });
    });

    //Konfirmasi Delete Assignment
    $('.konfirmDeleteAssignment').click(function(){
        var id = $(this).attr("data-id");
        swal({
            title: "Confirmation",
            text: "Are you sure you want to delete ?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Delete",
            cancelButtonText: "Cancel",
            closeOnConfirm: false,
            closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    window.location.href = "delete-assignment-"+id;
                }
                else {
                    window.location.href = "";
                }
        });
    });

    
});