@extends('layouts.master')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" />
<div class="content mt-4">
	<div class="container-fluid ">

    <div class="mensaje" style="padding: 10px; overflow-y: scroll; height: 300px; background: #e1e3ef;">
        @foreach($data as $valor)
        <div class="container-fluid" style="padding-left: 0px!important; padding-right: 0px!important;">
        <div class="row" style="width: 100%;">
        <div class="col-lg-1 col-xs-3">
            <img width="60" class="img-circle img-fluid img-thumbnail" src="{{ $valor['avatar'] }}" alt="">
        </div>
        <div class="col-lg-11 col-xs-9">
            
            <div class="inbox bg-primary img-rounded" style="padding: 5px; margin: 10px;">
            <p><span style="font-weight:bold;">{{ ucwords($valor["user"]) }} Dice: </span> <?=toImage($valor["message"])?></p>
            @if(!empty($valor['image']))
            <a class="fancybox" data-fancybox="images" href="{{ $valor['image'] }}"><img width="100" src="{{ $valor['image'] }}" alt="" style="padding: 5px; border-radius: 12px;"></a>
            @endif
            </div>

        </div>
        </div> 
        </div>
        @endforeach
    </div>

		<div class="data">
            <?=$pdocrud->render("insertform");?>
            <?=$pdocrud->loadPluginJsCode("emojionearea",".pdocrud-textarea");?>
        </div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script>

       $(document).on("pdocrud_after_submission",function(event,obj,data){

        $('.alert-success').hide();
        $("div.emojionearea-editor").text("");
        $(".mensaje").load(location.href+" .mensaje>*","");
        $(".mensaje").animate({ scrollTop: $('.mensaje')[0].scrollHeight}, 1000);

          function send(){   

           $.ajax({
            url: "{{ route('messagechat') }}",
            type: "GET",
            dataType: "json",
            success: function(data){
            
               let mensaje = emojione.shortnameToImage($(".pdocrud-textarea").val());

               if(data[0].image != ""){
                $('.mensaje').append('<div class="container-fluid"><div class="row"><div class="col-xs-1"><img width="60" class="img-circle img-thumbnail" src="'+ data[0].avatar +'" alt=""></div><div class="col-xs-11"><div class="inbox bg-primary img-rounded" style="padding: 5px; margin: 10px;"> <p>' + data[0].user + ' <span>Dice: </span>' + mensaje + '</p> <a class="fancybox" data-fancybox="images" href="'+ data[0].image +'"><img width="100" src="'+ data[0].image +'" alt="" style="padding: 5px; border-radius: 12px;"></a></div></div></div></div></div>');
              } else {
                $('.mensaje').append('<div class="container-fluid"><div class="row"><div class="col-xs-1"><img width="60" class="img-circle img-thumbnail" src="'+ data[0].avatar +'" alt=""></div><div class="col-xs-11"><div class="inbox bg-primary img-rounded" style="padding: 5px; margin: 10px;"> <p>' + data[0].user + ' <span>Dice: </span>' + mensaje + '</p> </div></div></div></div></div>');
              }

                $('.emojionearea-editor').empty();
                $('.pdocrud-file').val(null);
                //$(".mensaje").animate({ scrollTop: $('.mensaje')[0].scrollHeight}, 1000);


              },

              error: function(){
                swal("Lo siento","error de carga","error");
              },

          
            
           });


          }
         
          setInterval(function(){
            $(".mensaje").load(location.href+" .mensaje>*","");
          }, 1000);

        });


       $(".pdocrud-cancel-btn").click(function(){
          $('.emojionearea-editor').empty();
       });
       $(".mensaje").animate({ scrollTop: $('.mensaje')[0].scrollHeight}, 1000);

       $(".fancybox").fancybox({
              openEffect  : 'none',
              closeEffect : 'none'
       });
  </script>
@endsection