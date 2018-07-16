<?php 
$respuesta=ControladorRecipients::ctrMostrarRecipients(null);

?>
<div class="progres"></div>
<div class="container-fluid fondo">
	<div class="row">		
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-4 ">
			<div class="jumbotron">
				<div class="container">
					<form method="POST" onsubmit="return registroRecipient()" enctype="multipart/form-data">
						<div class="form-group">
							<legend class="col-sm-12">Your Information:</legend>
						</div>
						<div class="row">
							<div class="col-sm-4 col-sm-offset-4">
								<div class="facebook" id="FacebookRegister">
									<p>
										<i class="fa fa-facebook"></i>
										Sign up with Facebook
									</p>
								</div>
							</div>						
						</div>
						<div class="or-wrapper"><div class="or-divider"> OR </div></div>
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<input type="text" name="firstName" id="firstName" placeholder="Firt Name" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<input type="text" name="lastName" id="lastName" placeholder="Last Name" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<input type="text" name="yourEmail" id="yourEmail" placeholder="Your Email" class="form-control" required>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="form-group">
									<input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" class="form-control" >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="col-sm-6 col-xs-12">
									
									<label >Is the gift for your use?</label>
									
								</div>
								<div class="col-sm-6 col-xs-12">
									<div class="form-group opciones">
										<label class="radio-inline">
											<input type="radio" id="optradio" name="optradio" value="Yes">Yes
										</label>
										<label class="radio-inline">
											<input type="radio" id="optradio" name="optradio" value="No" checked="true">No
										</label>
									</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="checkbox">
									<label>
										<input id="zone" type="checkbox" value="">
									I am aware that the services are only provided in the following cities:<strong> Austin, Pflugerville, Round Rock, Cedar Park, and Buda.</strong></label>



								</div>
							</div>
						</div>	
						<div class="gift">
							<legend>Who will receive the gift?</legend>
							<div class="form-group">
								<label class="">Please input information about the Recipient:</label>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">								
										<input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">							
										<input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">								
										<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" >
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2">
									<div class="form-gruoup">
										<span>Description:</span><br>
										<small>(Optional)</small>
									</div>
								</div>
								<div class="col-sm-10">
									<div class="form-gruoup">
										<textarea class="form-control descripcion" name="description" id="description" rows="3"></textarea>
									</div>
								</div>
							</div>
							<br>
						</div>
						<div class="checkBox">
							<label>
								<input id="regPoliticas" type="checkbox"/>
								<small>I agree to the<a data-toggle="modal" href="#modalTerminos"> Terms and Conditions and Privacy Policy</a>						
								</small>
							</label>
						</div>
						<hr/>
						<div class="form-group">
							<div class="text-right">
								<?php 						

								$regContri = new ControladorRecipients();
								$regContri -> ctrRegistroRecipient();							
								?>
								<button type="submit" name="send" id="sendGift" class="btn btn-primary btn-lg">Send</button>

							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 col-lg-pull-8 ">
			<div class="container-fluid">
				<div class="row well well-sm">
					<div class="col-xs-12 text-center">
						<h1><small>Send the gift of help</small></h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div id="testimonial-slider" class="owl-carousel">
							<?php  
							foreach ($respuesta as $key => $value) {
								if (!empty($value["bphoto"])) {
									$ruta=$value["bphoto"];
								}else{
									$ruta="vistas/img/recipients/user.png";
								}
								echo '
								<div class="testimonial">
								<p class="description">
								'.$value["bdescription"].'
								</p>
								<div class="testimonial-content">
								<div class="pic">
								<img src="'.$url.$ruta.'">
								</div>
								<h3 class="title">'.$value["bFname"].' '.$value["bLname"].'</h3>
								<div class="tBtn">
								<a class="btn btn-lg btn-warning" href="c3.php?id='.$value["id_recipient"].' " role="button">Send a gift</a>
								</div>
								</div>
								</div>
								';
							}?>
						</div>
					</div>
				</div>
				<div class="row banner text-center">
					<div class="col-sm-12">
						<h1>LIFE IS FOUND IN GIVING</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="bannerInfo text-center">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h1>Service provided in the following cities: Austin, Pflugerville, Round Rock, Cedar Park, and Buda.</h1>
			</div>
		</div>		
	</div>
</div>

<!--===============================================
=            Modal agregar contributor            =
================================================-->

<div class="modal fade modalTerminos" id="modalTerminos" role="dialog">

	<div class="modal-content modal-dialog">

		<div class="modal-body modalTitulo">

			<h3 class="backColor">Terms of Service</h3>

			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<div class="contenido">
				<h2>Welcome to KIKUPAL!</h2>
				<p>These Terms of Service constitute a legally binding agreement (the “Terms”) between you and KIKUPAL, LLC (“KIKUPAL,” “we,” “us” or “our”) governing your use of KIKUPAL applications, websites, contents, products, and/or services (the “Services”). We maintain that, by confirming your order, you have read and do unreservedly agree to be bound by	these Terms.</p>
				<p>KIKUPAL may amend the Terms and modify or update the Services from time to time. Your continued use of the Services after any such changes posted here will constitute your acceptance of the amended Terms.</p>
				<p>By agreeing to these Terms, you expressly acknowledge that you understand the Terms (including the dispute resolution and arbitration provisions contained herein) and accept all of them. If you do not agree to be bound by these Terms, you may not use or access the Services.</p>
				<h4>Access to the Website </h4>
				<p>We work hard to ensure the Website is always up and available, but we can't guarantee that the Website will not have downtime for any reason. We reserve the right to close the Website for short periods of time for general maintenance, but will attempt to keep this to a minimum. We will not be liable if for any reason all or any part of the Website is unavailable at any time, for any length of time.</p>

				<p>You may only access the Services using authorized means. You will not use the Services for any fraudulent purposes or to cause nuisance, annoyance or inconvenience. It is your responsibility to ensure you have the correct software and equipment for use with the Services. You will only use an access point or data account that you are authorized to use.
				KIKUPAL reserves the right to terminate your use of the Services if you use an incompatible or unauthorized device.</p>

				<p>KIKUPAL’S SERVICES MAY BE SUBJECT TO LIMITATIONS, DELAYS, AND OTHER
					PROBLEMS INHERENT IN THE USE OF THE INTERNET AND ELECTRONIC
					COMMUNICATIONS. KIKUPAL IS NOT RESPONSIBLE FOR ANY DELAYS, DELIVERY
				FAILURES, OR OTHER DAMAGE RESULTING FROM SUCH PROBLEMS.</p>
				<h4>Your Information.</h4>
				<p>All information that you provide to KIKUPAL or to our affiliates and partners is true and accurate, and you will maintain that information up-to-date. You will provide us with whatever proof of identity we may reasonably request. You will keep secure and confidential your account password or any identification we provide you which allows access to the Services.</p>
				<h4>Payment Terms</h4>
				<P>You understand that use of the Services will result in deductions of your account. Charges are final and non-refundable, unless otherwise determined by KIKUPAL. All charges are due immediately.</P>
				<h4>Secure payment</h4>
				<p>KIKUPAL currently offers one way to pay for your order, PayPal. These payment options use advanced SSL encryption to keep your transaction secure and do not cost you anything to use (KIKUPAL is charged as the seller, you are not charged as the buyer) so you will not pay any extra for your order. You do not need to hold an account with these Merchants to
				use these methods of payments. Please refer to PayPal for full terms and conditions of use.</p>
				<h4>Privacy and protection of personal data </h4>
				<p>The details you give us are essential for the processing and delivery of your orders, for billing and for the establishment of warranty contracts, therefore failure to provide these details will result in the cancellation of your order. By registering on KIKUPAL, you agree to	provide us with sincere and true information as it concerns you. </p>
				<p>Communicating false information is contrary to the present general Terms and Conditions. You have the permanent right to access and rectify all the information that concerns you. You can at any time make a request to us to find out what personal information we hold concerning you. You may at any time, and by request, modify this information.</p>
				<h4>Intellectual ownership</h4>
				<p>KIKUPAL alone (and its licensors, where applicable) shall own all of the right, title and interest (including all related intellectual property rights), in and to the past, present, and future versions of the Services and all content therein. This content shall include, but is not limited to all layout, text, illustrations, instructions, files, images, designs, software, scripts, graphics, photos, sounds, music, videos, information, materials, technology, interactive features, the “look and feel” of the Services, the compilation and arrangement of the	Services, KIKUPAL trademarks, all copyrightable material (including source code and object code) and derivative works or enhancements of any of the above. Any partial or total reproduction of this content, by any means and on any support, is subject to prior and express authorization by KIKUPAL.</p>

				<p>KIKUPAL alone (and its licensors, where applicable) shall also own all of the right, title, and interest (including all related intellectual property right), in and to any suggestions, ideas, enhancement requests, feedback, recommendations or other information provided by you or any other party relating to the Services.</p>
				<p>These Terms are not a sale and do not convey to you any rights of ownership in or related to the Services, or any intellectual property rights owned by KIKUPAL. The KIKUPAL name, KIKUPAL logo, and the product names associated with the Services are trademarks of KIKUPAL or third parties, and no right or license is granted to use them. </p>
				<p>KIKUPAL will not, under any circumstances, be held responsible if a user violates rights held by a third party through his activities on the site.</p>
				<h4>Third Party Interactions</h4>
				<p>During your use of the Services, you may enter into correspondence with, purchase goods and/or services from, or participate in promotions of other third party providers, advertisers or sponsors showing their goods and/or services through the Services. Any such activity, and any terms, conditions, warranties or representations associated with such activity, is solely between you and the applicable third-party. KIKUPAL and its licensors shall have no liability, obligation or responsibility for any such correspondence, purchase, transaction or promotion between you and any such third-party. KIKUPAL does not endorse any sites on the Internet that are linked through the Services that are not part of our Service Partners,	and in no event shall KIKUPAL or its licensors be responsible for any content, products, services or other materials on or available from such sites or third party providers. You recognize that certain third-party providers of goods and/or services may require your agreement to additional or different terms and conditions prior to your use of or access to	such goods or services, and KIKUPAL disclaims any and all responsibility or liability arising from such agreements between you and the third party providers.</p>
				<p>KIKUPAL may rely on third party advertising and marketing supplied through the Services and other mechanisms to subsidize the Services. By agreeing to these terms and conditions you agree to receive such advertising and marketing. If you do not want to receive such advertising you should notify us in writing. You agree that it is your responsibility to take reasonable precautions in all actions and interactions with any third party you interact with	through the Services.</p>
				<h4>Waiver and Severability</h4>
				<p>Any failure of KIKUPAL to exercise or enforce any right or provision of the Terms of Service shall not constitute a waiver of such right or provision. The Terms of Service constitutes the entire agreement between you and KIKUPAL, and governs your use of the service, superseding any prior agreements (including, but not limited to, any prior versions of the Terms of Service). If any provision of these Terms of Service is held by a court of competent jurisdiction to be invalid, illegal or unenforceable for any reason, such provision shall be	eliminated or limited to the minimum extent such that the remaining provisions of the Terms	of Service will continue in full force and effect.</p>
				<h4>Feedback & Comments</h4>
				<p>Any opinions left on the Website by KIKUPAL customers are screened and moderated by us. If the comments infringe on the law or are inappropriate (abusive publicity,	defamation, insults, out of context commentary…), KIKUPAL reserves the right to refuse or modify it.</p>
				<h4>Indemnification</h4>
				<p>By entering into these Terms and using the Services, you agree, to the fullest extent permitted by applicable law, that you shall defend, indemnify and hold KIKUPAL, its licensors and each such party's parent organizations, subsidiaries, affiliates, officers, directors, members, employees, attorneys, assigns and agents harmless from and against any and all claims, costs, damages, losses, liabilities and expenses (including attorneys' fees and costs) arising out of or in connection with:</p>
				<ul>
					<li>
						a. your violation or breach of any term of these Terms or any applicable law or
						regulation;
					</li>
					<li>
						b. your violation of any rights of any third party, including our Service Providers; or
					</li>
					<li>
						c. your use or misuse of the Services.
					</li>
				</ul>

				<h4>Disclaimer of Warranties</h4>
				<p>KIKUPAL MAKES NO REPRESENTATION, WARRANTY, OR GUARANTY AS TO THE
					RELIABILITY, TIMELINESS, QUALITY, SUITABILITY, AVAILABILITY, ACCURACY OR
					COMPLETENESS OF THE SERVICES. KIKUPAL DOES NOT REPRESENT OR WARRANT
				THAT:</p>
				<ul>
					<li> a. THE USE OF THE SERVICES WILL BE SECURE, TIMELY, UNINTERRUPTED OR
						ERROR-FREE OR OPERATE IN COMBINATION WITH ANY OTHER HARDWARE,
					SOFTWARE, SYSTEM OR DATA,</li>
					<li>b. THE SERVICES WILL MEET YOUR REQUIREMENTS OR EXPECTATIONS,</li>
					<li>c. ANY STORED DATA WILL BE ACCURATE OR RELIABLE,</li>
					<li>d. THE QUALITY OF ANY PRODUCTS, SERVICES, INFORMATION, OR OTHER MATERIAL PURCHASED OR OBTAINED BY YOU THROUGH THE SERVICES WILL MEET YOUR REQUIREMENTS OR EXPECTATIONS,</li>
					<li>e. ERRORS OR DEFECTS IN THE SERVICES WILL BE CORRECTED, OR</li>
					<li>f. THE SERVICE OR THE SERVER(S) THAT MAKE THE SERVICE AVAILABLE ARE FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS.</li>
				</ul>
				
				<p>THE SERVICES ARE PROVIDED TO YOU STRICTLY ON AN "AS IS" BASIS. ALL CONDITIONS, REPRESENTATIONS AND WARRANTIES, WHETHER EXPRESS, IMPLIED,	STATUTORY OR OTHERWISE, INCLUDING, WITHOUT LIMITATION, ANY IMPLIED WARRANTY OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NONINFRINGEMENT OF THIRD PARTY RIGHTS, ARE HEREBY DISCLAIMED TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW BY KIKUPAL. KIKUPAL MAKES NO REPRESENTATION, WARRANTY, OR GUARANTY AS TO THE RELIABILITY, SAFETY, TIMELINESS, QUALITY, SUITABILITY OR AVAILABILITY OF ANY SERVICES, PRODUCTS OR GOODS OBTAINED BY THIRD PARTIES THROUGH THE USE OF THE SERVICES. YOU ACKNOWLEDGE AND AGREE THAT THE ENTIRE RISK ARISING OUT OF YOUR USE OF THE SERVICES, AND ANY THIRD PARTY SERVICES OR PRODUCTS REMAINS SOLELY WITH YOU, TO THE MAXIMUM EXTENT PERMITTED BY LAW.</p>
				<h4>Limitation of Liability</h4>

				<p>KIKUPAL SHALL NOT BE LIABLE FOR INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY,	PUNITIVE, OR CONSEQUENTIAL DAMAGES, INCLUDING LOST PROFITS, LOST DATA,				PERSONAL INJURY, OR PROPERTY DAMAGE RELATED TO, IN CONNECTION WITH, OR OTHERWISE RESULTING FROM ANY USE OF THE SERVICES, EVEN IF KIKUPAL HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. KIKUPAL SHALL NOT BE LIABLE FOR ANY DAMAGES, LIABILITY OR LOSSES ARISING OUT OF: (i) YOUR USE OF OR RELIANCE ON THE SERVICES OR YOUR INABILITY TO ACCESS OR USE THE SERVICES; OR (ii) ANY TRANSACTION OR RELATIONSHIP BETWEEN YOU AND ANY SERVICE PROVIDER, EVEN IF KIKUPAL HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. KIKUPAL SHALL NOT BE LIABLE FOR DELAY OR FAILURE IN PERFORMANCE RESULTING FROM CAUSES BEYOND KIKUPAL’S REASONABLE CONTROL. IN NO EVENT SHALL KIKUPAL’S TOTAL LIABILITY TO YOU IN CONNECTION WITH THE SERVICES FOR ALL DAMAGES, LOSSES AND CAUSES OF ACTION EXCEED FIVE HUNDRED U.S. DOLLARS (US $500).</p>

				<p>THE LIMITATIONS AND DISCLAIMER IN THIS SECTION DO NOT PURPORT TO LIMIT LIABILITY OR ALTER YOUR RIGHTS AS A CONSUMER THAT CANNOT BE EXCLUDED	UNDER APPLICABLE LAW.</p>
				<h4>Disputes/Mandatory Individual Arbitration</h4>
				<p>Any dispute or claim relating in any way to your use of the Services will be resolved by binding arbitration on an individual basis, rather than in court, except that you may assert claims in small claims court if your claims qualify. ANY ARBITRATION UNDER THESE TERMS WILL TAKE PLACE ON AN INDIVIDUAL BASIS; CLASS ARBITRATIONS AND CLASS ACTIONS ARE NOT PERMITTED. The Federal Arbitration Act and federal arbitration law apply to this agreement.</p>
				<p>“Disputes” or “claims” under this provision shall include, but are not limited to, any dispute, claim or controversy, whether based on past, present, or future events, arising out of or relating to: the Terms and prior versions thereof (including the breach, termination, enforcement, interpretation or validity thereof), the Services, any other goods or services made available through the Services, your relationship with KIKUPAL, the threatened or actual suspension, deactivation or termination of your account with KIKUPAL, payments made for you, by you or any payments made or allegedly owed to you, any promotions or offers made by KIKUPAL, any claims for fraud, defamation, emotional distress, breach of any express or implied contract or covenant, claims arising under federal or state consumer protection laws; claims arising under antitrust laws, claims arising under the Telephone Consumer Protection Act and Fair Credit Reporting Act; and claims arising under the Uniform Trade Secrets Act, Civil Rights Act of 1964, Americans With Disabilities Act, and state statutes, if any, addressing the same or similar subject matters, and all other federal	and state statutory and common law claims. All disputes concerning the arbitrability of a claim (including disputes about the scope, applicability, enforceability, revocability or validity of the Arbitration Agreement) shall be decided by the arbitrator, except as expressly provided below.</p>

				<p>There is no judge or jury in arbitration, and court review of an arbitration award is limited. However, an arbitrator can award on an individual basis the same damages and relief as a court (including injunctive and declaratory relief or statutory damages), and must follow these Terms as a court would.</p>
				<p>To begin an arbitration proceeding, you must send a letter requesting arbitration and describing your claim to our Customer Service email address. We will reimburse payment of all filing, administration and arbitrator fees for claims totaling less than $10,000 unless the arbitrator determines the claims are frivolous. Likewise, KIKUPAL will not seek attorneys' fees and costs in arbitration unless the arbitrator determines the claims are frivolous. You may choose to have the arbitration conducted by telephone, based on written submissions, or in person in the county where you live or at another mutually agreed location.</p>
				<p>WE EACH AGREE THAT ANY DISPUTE RESOLUTION PROCEEDINGS WILL BE CONDUCTED ONLY ON AN INDIVIDUAL BASIS AND NOT IN A CLASS, CONSOLIDATED			OR REPRESENTATIVE ACTION. The arbitrator shall have no authority to consider or resolve	any claim or issue any relief on any basis other than an individual basis. The arbitrator shall have no authority to consider or resolve any claim or issue any relief on a class, collective, or representative basis. Other than disputes regarding the validity of the class action waiver contained herein, which disputes may be resolved only by a civil court of competent jurisdiction, all disputes regarding the scope and validity of these Terms will be resolved by the arbitrator.</p>
				<p>If for any reason a claim proceeds in court rather than in arbitration we each waive any right to a jury trial. We also both agree that you or we may bring suit in court to enjoin infringement or other misuse of intellectual property rights.</p>
			</div>
		</div>
	</div>
</div>

<!--====  End of Modal agregar contributor  ====-->
