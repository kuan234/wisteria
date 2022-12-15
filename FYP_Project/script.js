//password validation for registration
$('#password').on('focus',function()
{
    $('.password_required').slideDown();
})

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
