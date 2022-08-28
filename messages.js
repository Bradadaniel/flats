$(document).ready(function () {
    $("div[data-messagebox='1']").each(function (){
        $(this).on('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            $('#message_text').val('');
            $.ajax({
                type: "POST",
                url: 'messages.php',
                cache: false,
                data: 'openmessages='+$(this).data('messagebox_id'),
                dataType: 'text',
                success: function (data) {
                    $('#message-container').html(JSON.parse(data).message);
                    window.history.replaceState(null, null, "?conversation="+JSON.parse(data).conversation+"&target="+JSON.parse(data).target+"&product="+JSON.parse(data).product);
                    $("#reload_parameters").load(location.href+" #reload_parameters>*","");
                    $('#message-container').scrollTop($('#message-container')[0].scrollHeight - $('#message-container')[0].clientHeight);
                }
            });
        });
    });
    $("#send_message").on("submit", function (e){
        e.preventDefault();
        e.stopImmediatePropagation();
        e.stopPropagation();
        $.ajax({
            type: "POST",
            url: 'messages.php',
            cache: false,
            data: $(this).serialize(),
            dataType: 'html',
            success: function (data) {
                if ($.trim(data) == 'reload')
                    window.location = window.location.href.split("?")[0];
                else {
                    $('#message-container').html(JSON.parse(data).message);
                    $('#message-container').scrollTop($('#message-container')[0].scrollHeight - $('#message-container')[0].clientHeight);
                }
            }
        });
    })
});