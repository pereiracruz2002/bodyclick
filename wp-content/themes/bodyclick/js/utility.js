 $(document).ready(function(){
   $('body').on('click', '.filtro', function(e){
      e.preventDefault();
      palavra = $(this).val();
      window.location=base_url+'/?s='+palavra;

    })
})




