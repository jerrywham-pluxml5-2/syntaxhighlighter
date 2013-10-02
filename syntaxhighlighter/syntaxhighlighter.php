<?php
/**
 * Plugin syntaxhighlighter
 *
 * @package	PLX
 * @version	1.1
 * @date	18/07/2011
 * @author	Stephane F.
 * @author	Maguire Cyril
 **/
class syntaxhighlighter extends plxPlugin {

	/**
	 * Constructeur de la classe syntaxhighlighter
	 *
	 * @param	default_lang	langue par défaut utilisée par PluXml
	 * @return	null
	 * @author	Maguire Cyril
	 **/
	public function __construct($default_lang) {

		# Appel du constructeur de la classe plxPlugin (obligatoire)
		parent::__construct($default_lang);
		
		# Déclarations des hooks
		$this->addHook('ThemeEndHead', 'addSyntaxhighlighter');
		$this->addHook('AdminTopEndHead', 'addSyntaxhighlighter');		
	}

	/**
	 * Méthode qui ajoute l'insertion du fichier javascript de syntaxhighlighter dans la partie <head> du site
	 *
	 * @return	stdio
	 * @author	Maguire Cyril
	 **/	
	public function addSyntaxhighlighter() {
		echo "\t".'<script type="text/javascript">
				if(typeof(jQuery) === "undefined") {document.write(\'<script  type="text/javascript" src="<?php echo PLX_PLUGINS; ?>syntaxhighlighter/jquery-1.8.0.min.js"><\/script>\');}
			</script>'."\n";
		?>
		
		<script type="text/javascript" src="<?php echo PLX_PLUGINS; ?>syntaxhighlighter/scripts/shCore.js"></script>
		<script type="text/javascript" src="<?php echo PLX_PLUGINS; ?>syntaxhighlighter/scripts/shBrushPhp.js"></script>
		<script type="text/javascript" src="<?php echo PLX_PLUGINS; ?>syntaxhighlighter/scripts/shBrushCss.js"></script>
		<script type="text/javascript" src="<?php echo PLX_PLUGINS; ?>syntaxhighlighter/scripts/shBrushPlain.js"></script>
		<script type="text/javascript" src="<?php echo PLX_PLUGINS; ?>syntaxhighlighter/scripts/shBrushJScript.js"></script>
		<script type="text/javascript" src="<?php echo PLX_PLUGINS; ?>syntaxhighlighter/scripts/shBrushXml.js"></script>

		<link rel="stylesheet" type="text/css" href="<?php echo PLX_PLUGINS; ?>syntaxhighlighter/styles/shCoreRDark.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php echo PLX_PLUGINS; ?>syntaxhighlighter/styles/shThemeRDark.css" media="screen" />

		<script type="text/javascript">
			$(jQuery(function($){
				var reg = RegExp('<br>','g');
				$('pre').each(function(i) { 
					var content = $(this).html();
					content = content.replace(reg,"\n");			
					$(this).html(content);
				});
			   }
			));
			SyntaxHighlighter.all();
		</script>
		
	<?php
	}

}
?>