<?php

	require_once "vendor/autoload.php";
//
//	$auth = new CreateBooksAuth("finalBooksTest");
//
//	$username = "ainsley.clarke@guardme.com";
//	$password = "Afc5446000";
//
//	$result = $auth->getAuth($username, $password);
//
//	$result = $result->getResult();
//
//	echo "<pre>";
//	print_r($result); exit;

	use ZohoBooks\ArrayValues\LanguageCodes;
	use ZohoBooks\Contacts\Contact;
	use ZohoBooks\Contacts\ContactPerson;
	use ZohoBooks\Objects\Address;
	use ZohoBooks\Operations\BooksApi;

	$contact = new Contact();

	$jeff = new ContactPerson();

	$sheila = new ContactPerson();

	$shipping = new Address();

	$billing = new Address();

	$shipping->setAttention("Shipping Address")
		->setAddress1("45 Route 34")
		->setAddress2("Second Floor");

	$shipping
		->setCity("Old Bridge")
		//->setStateCode("NJ")
		->setState("NJ")
		->setZip("08857");

	$shipping
		->setCountry("USA")
		->setFax("(222) 222-2222");

	$billing->setAttention("Billing Address")
		->setAddress1("602 East 24th Street")
		->setAddress2("First Floor");

	$billing
		->setCity("Paterson")
		//->setStateCode("NJ")
		->setState("NJ")
		->setZip("07514");

	$billing
		->setCountry("USA");
		//->setFax("(111) 111-1111");

	$jeff
		->setSalutation("Mr")
		->setFirstName("Jeff")
		->setLastName("Miller");

	$jeff
		->setEmail("jeff.miller@gmail.com")
		->setPhone("(201) 859-8956")
		->setMobile("(845) 458-9658");

	//$jeff->setIsPrimaryContact();

	$sheila
		->setSalutation("Mrs")
		->setFirstName("Sheila")
		->setLastName("Davis");

	$sheila
		->setEmail("Sheila.Davis@gmail.com")
		->setPhone("(718) 224-8745")
		->setMobile("(908) 418-1125");

	$sheila->setIsPrimaryContact();

	$contact
		->setFirstName("Raza")
		->setLastName("Man")
		->setPhone("(732) 425-2814");

	$contact
		->setCompanyName("GuardMe Security")
		//->setTwitter("www.twitter.com")
		->setEmail("ainsley.clarke@guardme.com")
		->setBillingAddress($billing);

	$contact
		->setFacebook("http://www.facebook.com")
		->setLanguageCode();

	$contact
		->setShippingAddress($shipping);

	//$contact->addContactPerson($jeff);
	//$contact->addContactPerson($sheila);

	echo "<pre>";
	//echo json_encode($contact);
	//print_r($contact->getParams());

	$books = new BooksApi("647b8ac917b9fdab8c0d33a50685cc6a", "136886048");

	$books->Update($contact);

	print_r($books);

