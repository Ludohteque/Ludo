<?php include('v_header.php');
require_once('DAO/MessageDAO.php');?>
<h5>Ma Dashboard :</h5>
    <section class="tabs">
	            <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
		        <label for="tab-1" class="tab-label-1">Signalements :</label>
		
	            <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
		        <label for="tab-2" class="tab-label-2">Demande d'ajout(s) :</label>
		
	          
            
			    <div class="clear-shadow"></div>
			
		        <div class="content">
			        <div class="content-1">
						<h2></h2>
                        
				    </div>
                        <?php    $monMessage=new MessageDAO();
                            $unmessage = $monMessage->getMessagesSignalement();
                            echo $unmessage; ?>
			        <div class="content-2">
						<h2>Demande d'ajouts de jeu à traiter</h2>
						<h3>Excellence</h3>
						, 
                                                    
                                                    
				    </div>
			        
		        </div>
			</section>
    
    
    
    
    <?php include('v_footer.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


