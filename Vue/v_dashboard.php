<?php include('v_header.php');?>
<h5>Ma Dashboard :</h5>
    <section class="tabs">
	            <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
		        <label for="tab-1" class="tab-label-1">Mes jeux :</label>
		
	            <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
		        <label for="tab-2" class="tab-label-2">Mes prêts :</label>
		
	            <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
		        <label for="tab-3" class="tab-label-3">Mes emprunts :</label>
			
	            <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" />
		        <label for="tab-4" class="tab-label-4">Mes demandes en cours :</label>
            
			    <div class="clear-shadow"></div>
			
		        <div class="content">
			        <div class="content-1">
						<h2>About us</h2>
                        <p>You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don't know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now. We said we'd say it was the snow that killed the other two, but it wasn't. Nature is lethal but it doesn't hold a candle to man.</p>
						<h3>How we work</h3>
						<p>Like you, I used to think the world was this great place where everybody lived by the same standards I did, then some kid with a nail showed me I was living in his world, a world where chaos rules not order, a world where righteousness is not rewarded. That's Cesar's world, and if you're not willing to play by his rules, then you're gonna have to pay the price. </p>
				    </div>
			        <div class="content-2">
						<h2>Services</h2>
                        <p>Do you see any Teletubbies in here? Do you see a slender plastic tag clipped to my shirt with my name printed on it? Do you see a little Asian child with a blank expression on his face sitting outside on a mechanical helicopter that shakes when you put quarters in it? No? Well, that's what you see at a toy store. And you must think you're in a toy store, because you're here shopping for an infant named Jeb.</p>
						<h3>Excellence</h3>
						<p>Like you, 
                                                    aaaaaaaaaaaaaaaaaaaa
                                                    aaaaaaaaaaaaaaaaaaaaa
                                                    </br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa
                                                    </br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa</br>aaaaaaaaaaaaaaaaa
                                                    aaaaaaaaaaaaaaI used to think the world was this great place where everybody lived by the same standards I did, then some kid with a nail showed me I was living in his world, a world where chaos rules not order, a world where righteousness is not rewarded. That's Cesar's world, and if you're not willing to play by his rules, then you're gonna have to pay the price. </p>
				    </div>
			        <div class="content-3">
						<h2>Mes emprunts</h2>
                                                    <p>  <?php
                                                        require_once('DAO/EmpruntDAO.php');
                                                        $emprunts = new EmpruntDAO();
                                                        $mesEmprunts = $emprunts->getMesEmprunts($_SESSION['id']);
                                                        var_dump($mesEmprunts);
                                                        ?>  
                                                    </p>
				</div>
                            
				    <div class="content-4">
						<h2>Contact</h2>
                                                        <p>You see? It's curious. Ted did figure it out - time travel. And when we get back, we gonna tell everyone. How it's possible, how it's done, what the dangers are. But then why fifty years in the future when the spacecraft encounters a black hole does the computer call it an 'unknown entry event'? Why don't they know? If they don't know, that means we never told anyone. And if we never told anyone it means we never made it back. Hence we die down here. Just as a matter of deductive logic.</p>
						<h3>Get in touch</h3>
						<p>Well, the way they make shows is, they make one show. That show's called a pilot. Then they show that show to the people who make shows, and on the strength of that one show they decide if they're going to make more shows. Some pilots get picked and become television programs. Some don't, become nothing. She starred in one of the ones that became nothing. </p>
				    </div>
		        </div>
			</section>
    
    
    
    
    <?php include('v_footer.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

