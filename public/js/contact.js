$('.button').click(function(){
    var name = $('#name').val();
    var mail = $('#mail').val();
    var msg = $('#msg').val();
    console.log(name);
    console.log(mail);
    console.log(msg);

     
     $.ajax({
        url : '/sendmail',
        type : 'POST',
        dataType : 'html',
        data : 'name='+name+'&mail='+mail+'&msg='+msg,
        success : function(code_html, statut){ // success est toujours en place, bien sûr !
            
            $('.formulaire').html('Votre message à bien été envoyé !');
        },
 
        error : function(resultat, statut, erreur){
          alert('PAS OK');
        }
 
     });
 

  });