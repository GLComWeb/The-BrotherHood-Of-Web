$(function()
{
	$("#pseudo").on("fcusout",checkPseudo);
});
	function checkPseudo()
	{
		if($("#pseudo").val()!="")
		{
			$.ajax({
					url: 'exotest.php'
					type:'POST' // Le type de la requete http ici devenu POST
					data : 'pseudo='+$("#pseudo").val()
			}).done(function(reponse){
				$("#reponse").html(reponse);
			}).fail(function(){
				console.log("petit probleme");
			});
		}else
		{
			$("#reponse").html("entrer un pseudo");
		}
}
