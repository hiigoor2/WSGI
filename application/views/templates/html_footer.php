</div>
</div>
</div>
<div id="footer">
  <div class="container">
    <p class="text-muted credit">RODAPÉ DO SITE</p>
  </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<!--<script>
        $(function(){
            $(".envia").click(function() {
                if( $('#descricao').val() !== ""  ) { //se tiver com conteudo
                    $.ajax({
                        type: "POST", //tipo de registro
                        url: "<? base_url('Grupamento/Gravar')?>", //pagina de cadastro
                        data: { //envia a descricao
                            descricao : $("#descricao").val()
                        } ,
                        success: function(retorno) {
                            if(retorno === "fail") {
                                //falha
                            } else {
                                $("table#grupamentos tr:last").after(retorno); //exibe novo registro
                            }
                        }
                    });
                }
            });
        });
</script>-->
</body>
</html>