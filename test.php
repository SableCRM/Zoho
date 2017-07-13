<?php

//	use ZohoAuth\CreateBooksAuth;
//	use ZohoAuth\CreateCRMAuth;
//	use ZohoRequest\MakeRequest;
//
	require_once "vendor/autoload.php";
//
//	$auth = new CreateCRMAuth(new MakeRequest(), "finalCRMTest");
//
//	$username = "ainsley.clarke@guardme.com";
//	$password = "Afc5446000";
//
//	$result = $auth->getAuth($username, $password);
//
//	$result = $result->getResult();
//
//	echo "<pre>";
//	print_r($result);

	use ZohoBooks\Contacts\Contact;
	use ZohoBooks\Contacts\ContactPerson;
	use ZohoBooks\Contacts\Create;
	use ZohoBooks\Objects\Address;

	$contact = new Contact();

	$jeff = new ContactPerson();

	$sheila = new ContactPerson();

	$shipping = new Address();

	$shipping->setAttention("Shipping Address")
		->setAddress1("45 Route 34")
		->setAddress2("Second Floor")
		->setCity("Old Bridge")
		->setStateCode("NJ")
		->setZip("08857")
		->setCountry("USA")
		->setFax("(222) 222-2222");

	$jeff
		->setSalutation("Mr")
		->setFirstName("Jeff")
		->setLastName("Miller")
		->setEmail("jeff.miller@gmail.com");

	$jeff
		->setPhone("(201) 859-8956")
		->setMobile("(845) 458-9658")
		->setIsPrimaryContact(true);

	$sheila
		->setSalutation("Mrs")
		->setFirstName("Sheila")
		->setLastName("Davis")
		->setEmail("Sheila.Davis@gmail.com");

	$sheila
		->setPhone("(718) 224-8745")
		->setMobile("(908) 418-1125")
		->setIsPrimaryContact(false);

	$contact
		->setFirstName("Ainsley")
		->setLastName("Clarke")
		->setBillingAddress(
			(new Address())
				->setAttention("Billing Address")
				->setAddress1("602 East 24th Street")
				->setAddress2("First Floor")
				->setCity("Paterson")
				->setStateCode("NJ")
				->setZip("07514")
				->setCountry("USA")
				->setFax("(111) 111-1111")
		);

	$contact
		->setShippingAddress($shipping);

	$contact
		->setCompanyName("GuardMe Security")
		->setPhone("(732) 425-2814")
		->setEmail("ainsley.clarke@guardme.com");

	$contact
		->setFacebook("ainsley@facebook.com")
		->setTwitter("ainsley@twitter.com")
		->setLanguageCode("en");

	$contact->addContactPerson($jeff);
	$contact->addContactPerson($sheila);

	echo "<pre>";
	//echo json_encode($contact);
	//print_r($contact->getParams());

	$create = new Create("647b8ac917b9fdab8c0d33a50685cc6a", "");

	print_r($create->request($contact));

