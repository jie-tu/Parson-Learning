﻿<!DOCTYPE html>
<html>
<head>
	<title>Exercice</title>
	<meta charset="utf-8" />
	<link type="text/css" rel="stylesheet" media="all" href="style.css" />
	<style type="text/css">
	body {  padding:20px; width:820px; margin:20px auto; border:solid 1px black; }
	h1 { font-size:16pt; }
	h2 { font-size:13pt; }
	ul { margin:0px; padding:0px; margin-left:20px; }
	#list1, #list2{ float:left; width:80%; height:auto; margin:10px;padding:20px;border:1px solid #aaaaaa; }
	.area { float:left; width:40%; height:auto;padding:20px; }
	#list1 li, #list2 li {list-style-type: none;float:left; padding:5px; width:200px; height:20px;}
	#list1  div, #list2  div { width:180px; height:auto; border:solid 1px black; background-color:#E0E0E0; text-align:center; padding-top:0px; }
	#list2 { float:right; }
	</style>
</head>
<body>
	<h1>enonce :<?= $post['enonce'] ?></h1>
	<div class="id_exo">id exo :<?= $post['id_exo'] ?></div>
	<div class="id_cours">id cours :<?= $post['id_cours'] ?></div>

	<?php
		if (isset($_SESSION['username']) && isset($_SESSION['role'])  &&  $_SESSION['role']==1 ){
			print("<div class='reponse'> reponse :".$post['reponse']."</div>");
			foreach ($etudiants as $etudiant) {
				if ($etudiant['status']==1){
					print("<li>
							<a href='/detailUser?id=".$etudiant['id_user']."'>
									".$etudiant['username']."
							</a> a reussi
					</li>");
				}else{
					print("<li>
							<a href='/detailUser?id=".$etudiant['id_user']."'>
									".$etudiant['username']."
							</a>
					</li>");
				}
			}
		}
	 ?>

<h2>Deposer gauche a droit</h2>
<div class="area">Indice <br>
	<ul id="list1" class="draglist" data-groupid="gid-1">
		<?php
		$indice =$post['indice'];
		$tab =explode("\n",$indice);
		$len =count ($tab);
		for ($i=0;$i<$len;$i++){
			print('<li data-id='.$i.' data-groupid="gid-1"><input type ="hidden"  name= t['.$i.'] value='.$tab[$i].'><div>'.$tab[$i].'</div></li>');
		}
		 ?>
	</ul>
</div>

		<div class="area">Propsez votre solution ici <br>
			<form class="" action="/getExo" method="POST">
			<ul id="list2" class="draglist"  data-groupid="gid-2">
			</ul>
			<input type="hidden" name="id_exo" value="<?= $post['id_exo'] ?>" >
			<input type="submit" value="Submit">
		</form>
		</div>

<script src="Sortable.min.js"></script>
<script>

new Sortable(document.getElementById('list1'), {
group: {
 name:"words",
 pull: true,
 put: true
 },
animation: 150,
onAdd: function (evt){
 console.log('onAdd.list1:', [evt.item, evt.from]);
},
onUpdate: function (evt){
 console.log('onUpdate.list1:', [evt.item, evt.from]);
},
onRemove: function (evt){
 console.log('onRemove.list1:', [evt.item, evt.from]);
},
onStart:function(evt){
 console.log('onStart.list1:', [evt.item, evt.from]);
 document.getElementById("list1").style.backgroundColor="rgb(236,219,201)";
 document.getElementById("list2").style.backgroundColor="rgb(252,243,180)";
 document.getElementById("list2").style.border="1px dashed #aaaaaa";
 document.getElementById("list1").style.border="1px dashed #aaaaaa";
},
onSort:function(evt){
 console.log('onSort.list1:', [evt.item, evt.from]);
},
onEnd: function(evt){
 console.log('onEnd.list1:', [evt.item, evt.from]);
 document.getElementById("list2").style.backgroundColor="#FFFFFF";
 document.getElementById("list1").style.backgroundColor="#FFFFFF";
 document.getElementById("list1").style.border="1px solid #aaaaaa";
 document.getElementById("list2").style.border="1px solid #aaaaaa";
}
});


new Sortable(document.getElementById('list2'), {
 group: {
 name:"words",
 pull: true,
 put: true
 },
animation: 150,
onAdd: function (evt){
 console.log('onAdd.list2:', [evt.item, evt.from]);
},
onUpdate: function (evt){
 console.log('onUpdate.list2:', [evt.item, evt.from]);
},
onRemove: function (evt){
 console.log('onRemove.list2:', [evt.item, evt.from]);
},
onStart:function(evt){
 console.log('onStart.list1:', [evt.item, evt.from]);
 document.getElementById("list2").style.backgroundColor="rgb(236,219,201)";
 document.getElementById("list1").style.backgroundColor="rgb(252,243,180)";
 document.getElementById("list1").style.border="1px dashed #aaaaaa";
 document.getElementById("list2").style.border="1px dashed #aaaaaa";
},
onSort:function(evt){
 console.log('onSort.list1:', [evt.item, evt.from]);
},
onEnd: function(evt){
 console.log('onEnd.list1:', [evt.item, evt.from]);
 document.getElementById("list1").style.backgroundColor="#FFFFFF";
 document.getElementById("list1").style.backgroundColor="#FFFFFF";
 document.getElementById("list2").style.border="1px solid #aaaaaa";
 document.getElementById("list1").style.border="1px solid #aaaaaa";
}
});
</script>
</body>
<footer> <p><a href='/'>Accueil</a></p></footer>
</html>
