function passwordvalidation()
{
    //password validation for registration
    $('.password_required').slideDown();
// $('#password').on('blur',function()
// {
//     $('.password_required').slideUp();
// })
$('#password').on('keyup',function()
{
    passValue = $(this).val();

    if(passValue.match(/[a-z]/g))
    {
        $('.lowercase').addClass('active');
    }
    else
    {
        $('.lowercase').removeClass('active');
    }

    if(passValue.match(/[A-Z]/g))
    {
        $('.uppercase').addClass('active');
    }
    else
    {
        $('.uppercase').removeClass('active');
    }

    if(passValue.match(/[0-9]/g))
    {
        $('.number').addClass('active');
    }
    else
    {
        $('.number').removeClass('active');
    }

    if(passValue.match(/[~!@#$%^&*_.]/g))
    {
        $('.special').addClass('active');
    }
    else
    {
        $('.special').removeClass('active');
    }

    if(passValue.length == 8 || passValue.length > 8)
    {
        $('.length').addClass('active');
    }
    else
    {
        $('.length').removeClass('active');
    }

    $('.password_required ul li').each(function(index,el){
        if(!$(this).hasClass('active'))
        {
            $('.input_submit').removeClass('active')
        }
        else
        {
            $('.input_submit').addClass('active')
        }
    });

})

$('#postcode').on('keyup',function(){
    postcode = $(this).val();

    if(postcode.length != 5)
    {
        
    }
    // else
    // {
    //     $('.length').removeClass('active');
    // }
})
}

function showhidepassword(){
    $(document).ready(function() {
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") == "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass( "fa-eye-slash" );
                $('#show_hide_password i').removeClass( "fa-eye" );
            }else if($('#show_hide_password input').attr("type") == "password"){
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass( "fa-eye-slash" );
                $('#show_hide_password i').addClass( "fa-eye" );
            }
        });
    });
}


function myFunction() {
    var x = document.getElementById("inputpassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }