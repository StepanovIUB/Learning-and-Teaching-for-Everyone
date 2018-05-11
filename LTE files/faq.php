<?php
include 'function.php';
?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=0.35">
	<link rel="stylesheet" type="text/css" href="style.css">

<style>
* {box-sizing: border-box}

.qua {
	font-size: 25px;
	font-family: "Lato", "Helvetica", sans-serif;
	margin-top: 12px;
	padding: 10px;
	text-align: center;
}

/* Side Navigation */

#Sidenavi a {
    position: absolute;
    left: -100px;
    transition: 0.3s;
    padding: 20px;
    width: 160px;
    text-decoration: none;
    font-size: 18px;
    color: white;
    border-radius: 0 5px 5px 0;
    margin-top: 230px;
}

#Sidenavi a:hover {
    left: 0;
}

#service {
    top: 20px;
    background-color: #bde0bc;
}

#contact {
    top: 110px;
    background-color: #91a8d0;
}



/* Set height of body and the document to 100% */
.faq{
    height: 100%;
    width: 70%;
    margin: 0;
    font-family: "Lato", "Helvetica", sans-serif;
    position: relative;
    top: 25%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%)
}

/* Style tab links */
.tablink {
    background-color: #fff;
    margin: 0px 0px auto;
    color: #435160;
    font-weight: bold;
    float: left;
    border-style: solid;
    border-color: #DCF7DB;
    outline: none;
    cursor: pointer;
    padding: 16px 20px;
    font-size: 17px;
    width: 25%;
}

.tablink:hover {
    background-color: #DCF7DB;
}

/* Style the tab content */
.tabcontent {
	background-color: #DCF7DB;
	margin: 230px 0px auto;
    color: white;
    padding: 100px 30px;
    display: none;
    height: 100%;
    width: 100%;
}

#Profile {background-color: #DCF7DB;}
#Register {background-color: #DCF7DB;}
#Creation {background-color: #DCF7DB;}
#Payment {background-color: #DCF7DB;}

.tabcontent h3 {
	color: #435160;
	font-size: 22px;
	padding: 5px 40px 10px;
}

.tabcontent li {
  width: 90%;
  display: block;
  font-size: 14px;
  font-family: Tahoma;
  padding: 10px;
  margin: 5px auto;
  color: #0E3C29;
}

.tabcontent li.q {
  width: 90%;
  float: left;
  font-size: 1.0em;
  cursor: pointer;
  background: rgba(40, 40, 40, 0.2);
  color: #202020;
  padding: 10px 20px;
}

.tabcontent li.q::before {
	content: attr(data-icon);
	margin-right: 10px;
}

.tabcontent li.a {
  width: 80%;
  float: left;
  padding: 0 0 12px 8px;
  margin-left: 20px;
  font-size: 0.9em;
}

</style>
</head>
<body>
	<?php
        include 'profile_js.php';
        ?>
        <div id="profile"></div>

		<div class="header">
			<div class="logo">
				<a href="home.php"><img src="images/logo.jpg"></a>
			</div>
			<div class="gnb">
				<div class="gnb1">
					<li><a href="home.php">Home</a></li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="content.php">View Classes & Activities</a></li>
					<li><a href="create.php">Create Activity</a></li>
					<li style="background-color: #A94343"><a href="customerservice.php" style="color:white">Customer Service</a></li>
				</div>
				<div class="login">
					<?php
                                        head_login();
                                        ?>

				</div>
			</div>
		</div>
		
		<div class="clear"></div>
		<div class="home_body">
 
<div class="qua">
	<h1>FAQ</h1>               
</div>

<div id="Sidenavi" class="sidenav">
  <a href="customerservice.php" id="service">Customer Service</a>
  <a href="contact.php" id="contact">Contact</a>
</div>


<div class="faq">
	<button class="tablink" onclick="openPage('Register', this, '#DCF7DB')"id="defaultOpen">Account</button>
	<button class="tablink" onclick="openPage('Profile', this, '#DCF7DB')">Profile</button>
	<button class="tablink" onclick="openPage('Creation', this, '#DCF7DB')">Activity</button>
	<button class="tablink" onclick="openPage('Payment', this, '#DCF7DB')">Payment</button>


	<div id="Register" class="tabcontent">
  		<ul>
    		<li class="q" data-icon="+"><b>How do I create an account?</b></li>
    		<li class="a">You can sign up using your email address, Facebook account, Google account.</br></br> Signing up and creating L.T.E. account is free.</li>
			<li class="q" data-icon="+"><b>How do I delete my account?</b></li>
    		<li class="a">1.Go to Account on L.T.E.com</br>2.Click Settings</br>3.Click Cancel my account</br></br>When you cancel your account, any reservations you've made as a host or a guest will automatically be canceled.</li>
			<li class="q" data-icon="+"><b>Can L.T.E. deactivate my account?</b></li>
    		<li class="a">L.T.E. may limit, suspend, or deactivate your account, as outlined in our Terms of Service.</br></br><b>Your account may be temporarily deactivated due to your response rate or acceptance rate.</b></br></br>To reactivate your account in this case, please follow the steps in the email you received.</br></br><b>Your account may be deactivated during a review of L.T.E. accounts. Reviews are part of an effort to foster a trustworthy community and uphold the Terms of Service.</b></br></br>The following may occur with or without notifying you directly:</br><b># Your account can be deactivated or suspended</b></br><b># You may not be able to access the platform, your account or content, or receive assistance from L.T.E. Customer Service.</b></br></br>Any upcoming pending or accepted reservations you have as either a host or guest can be canceled; you may not be entitled to any compensation for the reservations that were canceled as a result of your suspension.</li>
		</ul>
	</div>

	<div id="Profile" class="tabcontent">
  		<ul>
    		<li class="q" data-icon="+"><b>How do I reset my password?</b></li>
    		<li class="a">If you've forgotten your password or are having trouble logging in to your L.T.E. account, visit:.</br></br>Enter the email address you use for L.T.E., and you'll be emailed a link to reset your password.</li>
    		<li class="q" data-icon="+"><b>How do I edit my account settings or profile?</b></li>
    		<li class="a">You can edit the information that appears on your L.T.E. profile, such as your main profile photo or email address, from your account settings.</li>
    		<li class="q" data-icon="+"><b>Why do I need to have an LTE profile or profile photo?</b></li>
    		<li class="a">Your profile is a great way for others to learn more about you before they book your space.</br></br> When your profile is robust, it helps others feel that you're reliable, authentic, and committed to the spirit of L.T.E..</br></br> Whether you're a guest or a host, the more complete your profile is, the more reservations you're likely to book, too.</br></br>We highly recommend all hosts to have a profile photo, and guests are expected to upload a profile photo before checking into their first reservation.</li>
  		</ul> 
	</div>

	<div id="Creation" class="tabcontent">
  		<ul>
    		<li class="q" data-icon="+"><b>How do I prepare for my experience?</b></li>
    		<li class="a">You’ll find details on what to bring for each experience in your itinerary. You should also contact your host to confirm times and meeting locations.</li>
    		<li class="q" data-icon="+"><b>Should I tip my experience host?</b></li>
    		<li class="a">It's up to you. Your host set a price they expect will fully cover your experience. We suggest you research cultural hospitality norms in your destination. If you want to show appreciation for your host, write a review encouraging other guests to book their activities.</li>
    		<li class="q" data-icon="+"><b>How do reviews work?</b></li>
    		<li class="a">All the reviews on L.T.E. are written by guests from our community, so any review you see is based on an experience that a guest had in a host's listing.</br></br><h2><b>Writing a review</b></h2></br>To leave a review for a recent trip, go to your reviews. Reviews are limited to 500 words.</br></br><h2><b>Review history</b></h2></br>To see reviews you've written or reviews about you, go to your reviews. You'll also see any private feedback that people have left you.</br></br>Our community relies on honest, transparent reviews. We will remove a review if we find that it is not appropriate to be shown.</li>
			<li class="q" data-icon="+"><b>What happens if a host cancels my experience or event?</b></li>
    		<li class="a">While extremely rare, should a host need to cancel an experience or event, you will be notified as soon as the cancellation is reported. You’ll be refunded in full. We will reach out to you to determine rebooking options that may work for you.</br></br>We take host cancellations very seriously. If your host cancels, outside accepted exceptions, they may receive a fine or their experience could be suspended, pending a review of their account.</li>
    		<li class="q" data-icon="+"><b>What happens if I'm injured during my experience?</b></li>
    		<li class="a">Your safety is our first priority. If you’re injured or require medical attention while on an experience, you should get yourself to a safe place and contact local emergency services immediately.</br></br>Once you’re safe and your immediate concerns have been addressed, report the incident to us by going to the Profile tab of L.T.E. website and tapping "Customer Service", then choosing "Contact Us".</li>
  		</ul>
	</div>

	<div id="Payment" class="tabcontent">
  		<ul>
    		<li class="q" data-icon="+"><b>What methods of payment does L.T.E. accept?</b></li>
    		<li class="a">We support several payment methods, which depend on what country your payment account is located in.</br></br>You'll see which payment methods are available to you on the checkout page, before you submit a reservation request.</br></br>Offline or cash payments are a violation of our Terms of Service, and can result in removal from L.T.E..</br>We prohibit off-site payments because paying outside of L.T.E. makes it harder for us to protect your information and puts you at a greater risk of fraud and other security issues.</br></br><b>Payment options may include:</b></br></br><b># Major credit cards and pre-paid credit cards (Visa, MasterCard, Amex, Discover, JCB)</b></br><b># Many debit cards that can be processed as credit</b></br><b># PayPal for select countries</b></li>
    		<li class="q" data-icon="+"><b>How do I use PayPal to pay?</b></li>
    		<li class="a">Depending on the currency you're paying with, PayPal or other payment methods may not be available. If PayPal is available, you'll be able to select it on the checkout page and log in to your PayPal account. If you aren’t able to select PayPal, you’ll need to either switch to an eligible currency or select a different payment method.</br></br>Once your payment for the full amount of the reservation is authorized, your reservation request will be sent (or your Instant Book reservation will be confirmed). You'll only be charged once your reservation is confirmed. If your reservation request is canceled, declined, or it expires, the PayPal authorization will be voided and you won't be charged.</li>
    		<li class="q" data-icon="+"><b>Why is my credit card getting declined?</b></li>
    		<li class="a">Credit cards can be declined for a number of reasons. L.T.E. generally isn't notified of the specific reason.</br></br><h2><b>Common issues</b></h2></br>Check that you're entering your credit card number and billing address correctly, that your card has available funds, and that your card hasn't expired.</br></br><h2><b>Contact your bank or card issuer</b></h2></br>If you're getting an error when you try to pay, we recommend reaching out to your bank or credit card company for more information. Inform them of the amount and when tried to make the charge so they can let the transaction go through.</br></br>If your bank or card issuer isn't able to help, you may want to try another payment method.</li>
			<li class="q" data-icon="+"><b>Can I use more than one payment method to pay for a reservation?</b></li>
    		<li class="a">No, L.T.E. can't split your reservation cost across multiple payment methods.</br>To make a reservation, you'll need to make your payment with a single payment method.</li>
  		<li class="q" data-icon="+"><b>What is L.T.E.'s refund policy?</b></li>
    		<li class="a"><h2><b>For Users,</b></h2></br><h2>Refundable When:</h2></br># You ask for a refund at least 48 hours prior to the actual activity or class starts, you will get a full refund.</br></br># You ask for a 
refund after that, you will be paid 20% of the cost you are already paid for.</br></br># A provider cancels an activity or a class with notifications in terms of personal issues 12 hours prior to the actual starting time, a user 
would get a full refund.</br></BR><h2>Not Refundable When:</h2></br> # A user asks for a refund after an activity or a class started.</br></br><b>Typically, the entire process of refunds take 5-7 business days.</b></br></br><b>For 
more details, Feel free to ask a question <a href="contact.php">"Contact Us"</a></li>		 </ul>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


function faqControl(){
	$(".a").hide();
	$(".q").on("click", function(){
		var answerLi = $(this).next();
		if($(this).attr("data-icon") === "+"){
			$(this).attr("data-icon", "-");
			answerLi.slideDown();
		}else{
			$(this).attr("data-icon", "+");
			answerLi.slideUp();
		}
	});
}

$(document).ready(function(){
	faqControl();
});


</script>
   
</body>
</html> 
