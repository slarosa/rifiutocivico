<?php

/******************************************************************************
 *
 * Purpose: create User Interface HTML elelemnts
 * Author:  Salvatore Larosa
 *
 ******************************************************************************/

class Ui {
	/**
	 * North element
	 */
	public static function headerElement() {
		if (!isMobile()) {
			$html = "<div class=\"header\">
				<div class=\"heading\">
					<img class=\"centered\" width=\"50px\" src=\"images/logo.jpg\" /><span>&nbsp;#</span><span style=\"font-style: italic; font-weight:bold; color: #000000;\">rifiuto</span><span style=\"font-style: italic; font-weight:lighter; color: #000;\">civico</span><span style=\"font-style: italic; font-weight:lighter; color: #000;\">, contro una città indifferenziata.</span>
				</div>";
		} else {
			$html = "<div class=\"header\">
				<div class=\"heading_mobile\">
					<img class=\"centered\" width=\"50px\" src=\"images/logo.jpg\" /><span>&nbsp;#</span><span style=\"font-style: italic; font-weight:bold; color: #000000;\">rifiuto</span><span style=\"font-style: italic; font-weight:lighter; color: #000;\">civico</span> 
				</div>";
		}

		return $html;
	}

	/**
	 * West element
	 */
	public static function westElement() {
		$html = "<div id=\"info-box\">
					<div id=\"title-box\">
						Informazioni
					</div>
					<div id=\"accordion\">
					<h3 id=\"info\"><a href=\"#\"></a></h3>
						<div>
							<p style=\"text-align: left;\">
								
							</p>
						</div>
					<h3 id=\"dati\"><a href=\"#\">Informazioni sui dati</a></h3>
						<div>
							<p style=\"text-align: left;\">
								
							</p>
						</div>	
					</div>
				</div>";
		return $html;
	}

	/**
	 * Footer element
	 */
	public static function footerElement() {
		$html = '';
		return $html;
	}

	/**
	 * Sidebar element
	 */
	public static function sidebar() {
		$html = '<div id="sidebar" class="sidebar collapsed">
			<!-- Nav tabs -->
			<div class="sidebar-tabs">
				<ul role="tablist">
					<li>
						<a href="#table" role="tab"><i class="fa fa-table"></i></a>
					</li>
					<li>
						<a href="#home" role="tab"><i class="fa fa-info"></i></a>
					</li>
					<li>
						<a href="#risorse" role="tab"><i class="fa fa-download"></i></a>
					</li>
					<li>
						<a href="#telegram" role="tab"><i class="fa fa-telegram"></i></a>
					</li>
					<li>
						<a href="#github" role="tab"><i class="fa fa-github"></i></a>
					</li>
					
					<li class="disabled">
						<a href="mailto:rifiutocivico@gmail.com?subject=#rifiutocivico" role="tab"><i class="fa fa-envelope"></i></a>
					</li>
					
					
				</ul>

				<!--<ul role="tablist">
					<li>
						<a href="#settings" role="tab"><i class="fa fa-gear"></i></a>
					</li>
				</ul>-->
			</div>

			<!-- Tab panes -->
			<div class="sidebar-content">
				<div class="sidebar-pane" id="home">
					<h1 class="sidebar-header"> Informazioni <span class="sidebar-close"><i class="fa fa-caret-right"></i></span></h1>
					<!-- <p style="float: left;"><img class="centered" width="80px" src="images/logo.jpg" /></p> -->
					<p>
						Un modo semplice per localizzare discariche urbane a cielo aperto al fine di coadiuvare la Pubblica Amministrazione ad affrontare 
						il problema sul degrado urbano dovuto all’abbandono di rifiuti in luoghi pubblici.<br><br>
						
						<!--Disponibile per la consultazione anche una versione <a href="http://lrssvt.ns0.it/storyamaremio/">storymap</a> dell\'applicazione.<br /><br />-->
						<img class="centered" width="380px" src="images/rifiutocivico.jpg" />
					</p>
					<h3>Come contribuire?</h3>
					<p>
						E\' possibile contribuire caricando le foto attraverso il bot Telegram <a href="https://t.me/rifiutocivicobot" target="_blank">t.me/rifiutocivicobot</a>.
						Il bot consente di caricare foto geotaggate e descrizione automaticamente all\'interno dell\'album presente su <a href="https://www.flickr.com/photos/155620944@N07/" target="_blank">Flickr</a>.
						Esiste anche la possibilità di caricare le foto direttamente su Flickr, senza passare dal bot.
						Per condividere foto su Flickr è necessario però avere un account.
						Dopo essersi registrati a flickr, 
						per condividere foto e mostrarle sulla mappa bisogna caricare le immagini ed aggiungere
						almeno un tag che riporta il seguente testo: #rifiutocivico.<br>
					</p>
					<p class="lorem">
						L\'applicazione è basata su <a href="http://leafletjs.com/">leaflet</a>, una libreria JavaScript opensource per pubblicare informazioni geografiche interattive sul Web.
					</p>
				</div>

				<div class="sidebar-pane" id="risorse">
					<h1 class="sidebar-header">Risorse<span class="sidebar-close"><i class="fa fa-caret-right"></i></span></h1>
					<p>
						Tutte le informazioni caricate sulla mappa sono disponibili e scaricabili in due formati: 
						<ul>
							<li>
								<a href="http://lrssvt.ns0.it/rifiutocivico/data.json" target="_blank">JSON</a>
							</li>
							<li>
								<a href="http://lrssvt.ns0.it/rifiutocivico/data.geojson" target="_blank">GeoJSON</a>
							</li>
						</ul>
					</p>
				</div>

				<div class="sidebar-pane" id="messages">
					<h1 class="sidebar-header">Messages<span class="sidebar-close"><i class="fa fa-caret-right"></i></span></h1>
				</div>
				
				<div class="sidebar-pane" id="telegram">
					<h1 class="sidebar-header">Bot Telegram<span class="sidebar-close"><i class="fa fa-caret-right"></i></span></h1>
					<p>
						L\'indirizzo del bot Telegram è <a href="https://t.me/rifiutocivicobot" target="_blank">t.me/rifiutocivicobot</a>.<br><br>
						Il funzionamento è molto semplice, basta inviare la posizione, utilizzando la grafetta, inserire una descrizione
						sintetica ed infine allegare/scattare la foto.<br><br>
						<img class="centered" width="380px" src="images/telegram.jpg" />
					</p>
				</div>
				
				<div class="sidebar-pane" id="github">
					<h1 class="sidebar-header">Repository GitHub<span class="sidebar-close"><i class="fa fa-caret-right"></i></span></h1>
					<p>
						Il progetto è disponibile sulla piattaforma Github e chiunque può contribuire a migliorare il sistema.
						<br><br>
						Progetto su Github: <a href="https://github.com/slarosa/rifiutocivico_repo" target="_blank">https://github.com/slarosa/rifiutocivico_repo</a>
					</p>
				
				</div>
				
				<div class="sidebar-pane" id="table">
					<h1 class="sidebar-header">Dati<span class="sidebar-close"><i class="fa fa-caret-right"></i></span></h1>
					<p>
						<table id="example" class="display" cellspacing="0" width="100%">
					        <thead>
					            <tr>
					                <th>Foto</th>
					                <th>Descrizione</th>
					                <th>Vai al sito</th>
					            </tr>
					        </thead>
					        <tfoot>
					            <tr>
					                <th>Foto</th>
					                <th>Descrizione</th>
					                <th>Vai al sito</th>
					            </tr>
					        </tfoot>
					    </table>
					</p>
				</div>

				<div class="sidebar-pane" id="settings">
					<h1 class="sidebar-header">Settings<span class="sidebar-close"><i class="fa fa-caret-right"></i></span></h1>
				</div>
			</div>
		</div>';
		return $html;
	}

}
?>