$(document).ready(function() {
    $("#email").keydown(function(e){
        if(event.which == 13)   {
            $("#btn-find").trigger('click');
        }
    });

    $(".table-responsive").hide();
    $("#not-found").hide();

    $("#btn-find").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        e.preventDefault();

        var formData = {
            email: $('#email').val()
        }

        console.log(formData);

        $.ajax({
            type:"POST",
            url: "search",
            data: formData,
            dataType:'json',
            success: function(tickets)  {
                console.log(tickets);
                if(tickets.length != 0) {
                    $(".table-responsive").show();
                    $("#not-found").hide();
                    $('#ticketlist').empty();
                    $.each(tickets, function(i, ticket)  {
                        var ticketView = '<tr><td>' + ticket.id + '</td>';
                        ticketView += '<td>' + ticket.firstname + '</td>';
                        ticketView += '<td>' + ticket.lastname + '</td>';
                        ticketView += '<td>' + ticket.os + '</td>';
                        ticketView += '<td>' + ticket.status + '</td>';
                        ticketView += '<td><div class="text-center"><a href="/userticket/' + ticket.id + '" class="btn btn-default">View Details</a></div>'

                        $("#ticketlist").append(ticketView);
                    });
                } else  {
                    $(".table-responsive").hide();
                    $("#not-found").show();
                }

            },
            error: function()   {
                $(".table-responsive").hide();
                $("#not-found").show();
            }
        });
    });
});