function bulkAction($action){
    if($(".bulk_action:checked").length >= 1){
        if(confirm("Are you sure that you want to perform this action ?")){
            document.getElementById("action").value = $action;
            document.getElementById("bulk_action").submit();
        }else{
            return false;
        }
    }else{
        alert("Please select at least one checkbox !");
        return;
    }
}


$(document).ready(function () {

    $('[data-toggle="tooltip"]').tooltip();

    $(".change_limit").change(function () {
        document.getElementById('perpage').value = $(this).val();
        document.getElementById("search_form").submit();
    });

    // check all
    $("#all_bulk_action").click(function () {
        if($(this).is(":checked")) {
            $(".bulk_action").prop("checked", true);
        } else {
            $(".bulk_action").prop("checked", false);
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $(".load_modal").click(function (e) {
        e.preventDefault();
        $.get($(this).attr("href")).then(function (res) {
            $("#modal_content").html(res);
            $("#common-modal").modal("show");
        });
    })

});
