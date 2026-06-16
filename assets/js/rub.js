
    $('#divrubprincipal').show();
    $('#divrubsecondaire').show();
    $('#acturubarticle').each(function(){
      $(this).on('click',function(){
        valrub = $(this).val();
        if(valrub==0)
        {
          $('#divrubprincipal').slideDown('fast');
          $('#divrubsecondaire').slideDown('fast');
        }
        if(valrub!=0)
        {
          $('#divrubprincipal').slideUp('fast');
          $('#divrubsecondaire').slideUp('fast');
        }
        // alert(valrub);
      });
    });
    
    $('.style-option-secondrub').hide();
    $('#rubprinarticle').each( function(){
      $(this).on('click',function(){
        parentval = $(this).val();
        $('#rubsecondarticle').val('0');
        $('.style-option-secondrub').hide();
        $('.style-option-secondrub.princrub'+parentval).show();
        $('#divrubprincipal').show();
        if(parentval==0)
        {
          $('#divrubactualite').slideDown('fast');
          $('#divstatactualite').slideDown('fast');
        }
        if(parentval!=0)
        {
          $('#divrubactualite').slideUp('fast');
          $('#divstatactualite').slideUp('fast');
        }
        // alert(parentval);
      });
     });