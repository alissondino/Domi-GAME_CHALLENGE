<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="row">
	<div class="col-6 mx-auto mt-5">
		<h1 class="text-center">Teste de conteúdo</h1>
		<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam officiis autem maxime dolores aspernatur accusamus provident cumque voluptatibus, dolorum, architecto quis error porro iste rerum quam consectetur numquam fugiat aliquid!
		</p>
		<ul>
		    <li>Meu nome é: <?php echo htmlspecialchars( $nome, ENT_COMPAT, 'UTF-8', FALSE ); ?>;</li>
		    <li>Eu tenho: <?php echo htmlspecialchars( $idade, ENT_COMPAT, 'UTF-8', FALSE ); ?> anos;</li>
		</ul>
	</div>
</div>