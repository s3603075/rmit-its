@extends('layouts.default')
@section('content')
    <div class="container top-spacing">
        <div class="col-md-8 col-md-offset-2">
            <div>
                <h2>Enter your email to check the status of your tickets</h2>
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email Address') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
            <button type="button" id="btn-find" name="btn-find" class="btn btn-primary">Submit</button>
        </div>
        <div id="tickets" class="col-md-8 col-md-offset-2" style="padding-top:20px;">
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#email").keydown(function(e){
               if(event.which == 13)   {
                   $("#btn-find").trigger('click');
               }
            });

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
                       $('#tickets').empty();
                       if(tickets.length === 0) {
                           $('#tickets').addClass("text-center");
                           $("#tickets").append('<h2>No results found</h2>');
                       }else    {
                           $('#tickets').removeClass("text-center");
                           $.each(tickets, function(i, ticket)  {
                               var ticketView = '<div class="panel panel-primary"> <div class="panel-heading">Ticket #'+ ticket.id +'</div>';
                               ticketView += '<div class="panel-body"> <div>'+ticket.issue +'</div></div>';
                               ticketView += '<div class="panel-footer"> <div class="container-fluid">';
                               ticketView += '<div class="col-sm-3 text-center"><a href="/userticket/'+ ticket.id +'" class="btn btn-default btn-lg">';
                               ticketView += 'More info</a></div>';
                               ticketView += '<div class="col-sm-3 col-sm-offset-6"> <div class="text-center"> <h4>'+ ticket.status + '</h4></div>';
                               ticketView += '</div></div></div>';

                               $("#tickets").append(ticketView);
                           });
                       }
                    },
                    error: function()   {
                       console.log("error");
                    }
                });
            });
        });
    </script>
@stop