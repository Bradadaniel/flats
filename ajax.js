
$(document).ready(function () {
    $("#search_button").click(function (e) {
        let input=$("#search_input");
        // $("#product-search").preventDefault();
        $.post("search.php", {
                search: input
            // }, function (data, status) {
            //     alert("Data: " + data + "\nStatus: " + status);
            //     $("#test").html(data);
            },
            'html');
        e.preventDefault();
    });
});